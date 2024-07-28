<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmIntegrationBooking;
use App\Models\Booking;

class FinalBookingGTA implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $tries =3;
    public $timeout = 6000000;
    public $bookingId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($bookingId)
    {
        $this->bookingId = $bookingId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $booking = Booking::find($this->bookingId);
        $hotelFormData = \DB::table('hotel_object_forms')->where('id', $booking->hotel_object_form_id)->first();
        if ($booking->model_type == 'App\Models\Package') {
            $hotelData = \DB::table('gta_hotel_portfolios')->where('id', $booking->model_id)->first();
        } else {
            if ($booking->hotel_jpcode) {
                $hotelData = \DB::table('gta_hotel_portfolios')->where('Jpd_code', $booking->hotel_jpcode)->first();
            }
        }
        $getRequestData = json_decode($hotelFormData->request_data);
        $getBodyData = json_decode($hotelFormData->body);
        $options = array(
            'soap_version'  => SOAP_1_2,
            'encoding'      => 'UTF-8',
            'exceptions'    => true,
            'trace'         => true,
            'compression'   => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        );
        
        $client = new \SoapClient("http://xml.gte.travel/WebService/JP/WebServiceJP.asmx?WSDL", $options);
        
        $requestData = $getRequestData;
        
        try {
            $response = $client->__soapCall('HotelBooking', array('parameters' => $requestData));
            $bookingRS = $response->BookingRS;
            if($bookingRS) {
                if($booking->model_type == 'App\Models\GtaHotelPortfolio'){
                    Mail::to($getBodyData->email)->send(new ConfirmIntegrationBooking($getBodyData->name, $hotelData->name, $bookingRS->Reservations ? $bookingRS->Reservations->Reservation->Locator : null, $getBodyData->startDate, $getBodyData->endDate, $booking->adults, $booking->children));
                }
                $booking->update([
                    'integration_booked'    => 1,
                    'hotel_int_code'        => $bookingRS->IntCode,
                    'hotel_locator'         => $bookingRS->Reservations ? $bookingRS->Reservations->Reservation->Locator : null,
                    'hotel_start_date'      => $getBodyData->startDate,
                    'hotel_end_date'        => $getBodyData->endDate,
                    'send_confirm_email'    => 1
                ]);
            }
        } catch (SoapFault $fault) {
            // echo "Error: " . $fault->getMessage();
        }
    }
}
