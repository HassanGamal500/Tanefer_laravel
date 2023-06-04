<?php


namespace App\Traits;


use App\Enum\SabreBookingStatus;
use App\GDSIntegration\Sabre\GetReservation;
use App\GDSIntegration\Sabre\Sabre;
use App\Libs\FireBase\PushNotification;
use App\Libs\FireBase\RealTimeNotification;
use App\Models\FlightSegment;
use App\Models\FlightSegmentHistory;
use App\Models\Pnr;
use App\Models\Status;
use Illuminate\Support\Facades\Mail;

trait UpdateFlightBooking
{

    /**
     * Update Ticketing status
     * */
    protected function updateTicketing(Pnr $pnrObject)
    {
        $reservation = $this->getReservationDetails($pnrObject);
        $ticketingInfo = $reservation->PassengerReservation->TicketingInfo;
        if(isset($ticketingInfo->AlreadyTicketed)){
            if(empty($reservation->PassengerReservation->Segments)){
                $pnrObject->update(['status_id'=>SabreBookingStatus::Void]);
                $this->sendNotifications($pnrObject,'Your Booking is Cancelled',
                    'Your Flight Booking is cancelled, please contact customer support for more details');
            }else{
                $bookingNumber = $ticketingInfo->TicketDetails->TicketNumber;

                $pnrObject->update([
                    'status_id' => SabreBookingStatus::ETicketed,
                    'ticket_number' => $bookingNumber
                ]);

                $this->sendNotifications($pnrObject,'Your booking is confirmed with number '.$bookingNumber);
            }
        }
    }


    /**
     * Update Change in Itinerary for PNR
     *
     * @param Pnr $pnr
     *
     * */
    protected function updateItineraryChange(Pnr $pnrObject)
    {
        $reservation = $this->getReservationDetails($pnrObject);

        if(empty($reservation)){
            return;
        }

        $itinerary = $reservation->PassengerReservation->Segments->Segment;

        if(empty($itinerary)  && $pnrObject->status_id != SabreBookingStatus::CANCELLED){
            $this->setPNRCancelled($pnrObject);
        }else{
            $this->checkSegmentsChanges($pnrObject,$itinerary);
        }
    }

    /**
     * Get Reservation Details for PNR given and data type of details
     *
     * @param Pnr $pnr
     *
     * @return \SimpleXMLElement $reservationDetailsObject
     * */
    private function getReservationDetails(Pnr $pnrObject)
    {
        $pnr = $pnrObject->pnr_id;
        $sabre = new Sabre();
        try {
            $session = $sabre->getSoapSession();
        }catch (\Exception $e){
            return new \SimpleXMLElement('<body></body>');
        }

        $readReservation = new GetReservation();
        $reservationDetails = $readReservation->travelItineraryRead($pnr,$session);

        $sabre->closeSoapSession($session);

        if($reservationDetails['curlErrorCode'] != 0){
            return new \SimpleXMLElement('<body></body>');
        }

        $reservationDetailsObject = simplexml_load_string($reservationDetails['xmlResponse'])
            ->children('http://schemas.xmlsoap.org/soap/envelope/',)
            ->Body->children('http://webservices.sabre.com/pnrbuilder/v1_19')
            ->GetReservationRS
            ->Reservation;

        return $reservationDetailsObject;
    }

    /**
     * set booking status to cancel by giving PNR
     *
     * @param object $pnr
     *
     * @return void
     * */
    public function setPNRCancelled(Pnr $pnr)
    {
        $cancelStatus = Status::find(SabreBookingStatus::CANCELLED);
        if(is_null($cancelStatus)){
            return;
        }
        $pnr->update(['status_id' => $cancelStatus->id]);

        $this->sendNotifications($pnr,'Your preBooking cancelled');
    }

    /**
     * Update Segments Data
     *
     * @param object $pnr
     * @param \SimpleXMLElement $itineraries
     *
     * @return void
     * */
    public function checkSegmentsChanges(Pnr $pnr,\SimpleXMLElement $itineraries)
    {
        if(is_null($pnr)){
            return;
        }

        $flightSegments = [];
        $updatedSegments = [];
        foreach ($itineraries as $segment){

            if(! empty($segment)){
                $segment = $segment->Air;
                $departureDate = convertStringToDate($segment->DepartureDateTime);
                $departureTime = convertStringToTime($segment->DepartureDateTime);
                $arrivalDate   = convertStringToDate($segment->ArrivalDateTime);
                $arrivalTime   = convertStringToTime($segment->ArrivalDateTime);

                $flightSegment = FlightSegment::where('pnr_id',$pnr->id)->where('flight_number',(int)$segment->FlightNumber)->first();
                if(is_null($flightSegment)){
                    return;
                }

                if(($flightSegment->departure_date != $departureDate)
                    || $flightSegment->departure_time != $departureTime
                    || $flightSegment->arrival_date != $arrivalDate
                    || $flightSegment->arrival_time != $arrivalTime){

                    $flightSegments[] = $flightSegment;
                    $updatedSegments[] = $segment;

                }else{
                    return;
                }
            }
        }

        if(count($updatedSegments) > 0){
            $this->updateDatabase($flightSegments,$updatedSegments);
            $this->historyPreviousData($flightSegments);
            $this->notifyCustomerByEmail($pnr,$updatedSegments);

            $this->sendNotifications($pnr,'Your flight details changed','Click to see changed details');
        }
    }

    /**
     * Update Database with last updated Flight Segment Details get from sabre notifications
     *
     * @param array $flightSegments
     * @param array $updatedSegments
     *
     * @return void
     * */

    public function updateDatabase(array $flightSegments,array $updatedSegments)
    {
        for ($i=0; $i < count($flightSegments); $i++){
            $flightSegments[$i]->departure_date = convertStringToDate($updatedSegments[$i]->DepartureDateTime);
            $flightSegments[$i]->departure_time = convertStringToTime($updatedSegments[$i]->DepartureDateTime);
            $flightSegments[$i]->arrival_date = convertStringToDate($updatedSegments[$i]->ArrivalDateTime);
            $flightSegments[$i]->arrival_time = convertStringToTime($updatedSegments[$i]->ArrivalDateTime);
            $flightSegments[$i]->flight_duration = str_replace('.',':',$updatedSegments[$i]->ElapsedTime);
            $flightSegments[$i]->update();
        }
    }


    /**
     * Store old version of  flight Segment Data in Database
     *
     * @param array $flightSegments
     *
     * @return void
     * */
    public function historyPreviousData(array $flightSegments)
    {
        foreach ($flightSegments as $flightSegment){
            FlightSegmentHistory::create($flightSegment->toArray());
        }
    }

    /**
     * Send Email To Customer That booked the flight to inform him about flight updates received from Sabre
     *
     * @param object $pnr
     * @param array $updatedSegments
     *
     * @return void
     * */
    public function notifyCustomerByEmail(Pnr $pnr,array $updatedSegments)
    {
        $email = $pnr->contact_email;

        foreach ($updatedSegments as $segment){
            $flightSegments[] = FlightSegment::where('pnr_id',$pnr->id)->where('flight_number',(int)$segment->FlightNumber)->first();
        }

        Mail::send('email_templates.send_updated_flight_segment_to_customer', [
            'flightSegments' => $flightSegments,
            'pnr'  => $pnr->pnr_id
        ], function ($message) use ($email,$pnr)
        {
            $message->from($pnr->client->email,$pnr->client->name);

            $message->to($email);

            $message->subject('Your Flight Details updated');
        });
    }



    public function sendNotifications(Pnr $pnrObject,string $title,string $body = '')
    {
        if (!is_null($pnrObject->user_id)) {
            $realTimeNotification = new RealTimeNotification();
            $realTimeNotification->setNotification($pnrObject->pnr_id, $title, $body,$pnrObject->user_id);

            if(! is_null($pnrObject->user->device_token)){
                $deviceToken =  $pnrObject->user->device_token;
                $pushNotification = new PushNotification();
                $pushNotification->notificationToDevice($deviceToken,$title,$body,['pnr' => $pnrObject->pnr_id]);
            }
        }
    }

}
