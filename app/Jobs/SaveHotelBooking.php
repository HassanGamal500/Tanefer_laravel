<?php

namespace App\Jobs;

use App\Models\HotelBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Propaganistas\LaravelPhone\PhoneNumber;

class SaveHotelBooking implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $requestData;
    public $bookingStatus;
    public $paymentStatus;
    public $paymentAuthCode;
    public $paymentTransactionId;
    public $totalAmount;
    public $lastCancellationDeadline;
    public $tboClientReference;
    public $bookingNumber;
    public $paymentType;
    public $tripId;
    public $client;
    public $mainClient;
    public $authUser;
    public $hotelRooms;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($requestData = [],$bookingStatus = null, $paymentStatus = null,
                                $paymentAuthCode = null,$paymentTransactionId = null,$totalAmount = null,
                                $lastCancellationDeadline = null,$tboClientReference = null,$bookingNumber = null,
                                $paymentType = null, $tripId = null,$client = null,$mainClient = null,$authUser = null,$hotelRooms = [])
    {
        $this->requestData = $requestData;
        $this->bookingStatus = $bookingStatus;
        $this->paymentStatus = $paymentStatus;
        $this->paymentAuthCode = $paymentAuthCode;
        $this->paymentTransactionId = $paymentTransactionId;
        $this->totalAmount = $totalAmount;
        $this->lastCancellationDeadline = $lastCancellationDeadline;
        $this->tboClientReference = $tboClientReference;
        $this->bookingNumber = $bookingNumber;
        $this->paymentType = $paymentType;
        $this->tripId = $tripId;
        $this->client = $client;
        $this->mainClient = $mainClient;
        $this->authUser = $authUser;
        $this->hotelRooms = $hotelRooms;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(count($this->requestData) == 0){
            $hotelBooking = HotelBooking::where('payment_transaction_id',$this->paymentTransactionId)->first();
            if($hotelBooking != null){
                $hotelBooking->update([
                    'hotel_booking_status_id' => $this->bookingStatus ?? $hotelBooking->hotel_booking_status_id,
                    'payment_status_id' => $this->paymentStatus ?? $hotelBooking->payment_status_id ,
                    'booking_number' => $this->bookingNumber ?? $hotelBooking->booking_number,
                    'trip_id'       => $this->tripId ?? $hotelBooking->trip_id,
                    'client_reference' => $this->tboClientReference ?? $hotelBooking->client_reference,
                    'last_cancellation_deadline' => $this->lastCancellationDeadline ?? $hotelBooking->last_cancellation_deadline
                ]);

                if(! is_null($this->authUser) && ! is_null($this->bookingNumber)){
                    $authUser = auth()->guard('api')->user()->toArray();
                    dispatch(new CollectPoint($hotelBooking->booking_number,'hotel',$this->totalAmount,$authUser,
                        count($this->requestData['guests'])))
                        ->delay(now()->addSeconds(15));
                }
            }
        }else{
            $contactInfo = $this->contactInfo();
         $hotelBooking = \App\Models\HotelBooking::create([
                'contact_name_person' => $contactInfo['contactPersonName'],
                'contact_phone'       => $contactInfo['contactPhone'],
                'contact_email'       => $contactInfo['contactEmail'],
                'payment_auth_code'   => $this->paymentAuthCode,
                'payment_transaction_id'=> $this->paymentTransactionId,
                'total_amount'          => $this->totalAmount,
                'hotel_name'            => $this->requestData['hotelName'],
                'hotel_code'            => $this->requestData['hotelCode'],
                'hotel_booking_status_id' => $this->bookingStatus,
                'payment_status_id'        => $this->paymentStatus,
                'user_id'               => $this->authUser ? $this->authUser->id : null,
                'last_cancellation_deadline' => $this->lastCancellationDeadline,
                'client_reference'           => $this->tboClientReference,
                'booking_number'             => $this->bookingNumber,
                'client_id'                  => $this->mainClient->id,
                'booked_from_id'             => $this->client->id,
                'payment_type'               => $this->paymentType,
                'paid_price'                 => $this->totalAmount,
            ]);

            dispatch(new SaveHotelRooms($this->hotelRooms,$hotelBooking->id))->delay(5);
            dispatch(new SaveHotelGuests($this->requestData,$hotelBooking->id))->delay(6);
        }
    }

    public function contactPerson()
    {
        foreach ($this->requestData['guests'] as $guest){
            $isLead = $guest['isLead'];
            if($isLead){
                $contact_person = $guest['firstName']. ' '.$guest['lastName'];
                break;
            }
        }

        return $contact_person;
    }

    public function contactInfo()
    {
        if(is_null($this->authUser)){
            $contact_person_name = $this->contactPerson();
            $contact_phone = $this->requestData['phoneNumber'];
            $contact_email = $this->requestData['email'];
        }else{
            $atsRole = $this->authUser->roles()->where('name','LIKE','ats_%')->first();

            if($atsRole != null || $this->authUser->hasRole('subAgent')){
                $contact_person_name = $this->contactPerson();
                $contact_phone = PhoneNumber::make($this->requestData['phoneNumber'])
                    ->ofCountry($this->requestData['countryIsoCode'])->formatInternational();
                $contact_email = $this->requestData['email'];
            }else{
                $contact_person_name = $this->authUser->name;
                $contact_phone = $this->authUser->phone;
                $contact_email = $this->authUser->email;
            }
        }

        return [
            'contactPersonName' => $contact_person_name,
            'contactPhone' => $contact_phone,
            'contactEmail' => $contact_email
        ];
    }
}
