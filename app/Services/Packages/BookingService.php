<?php


namespace App\Services\Packages;


use App\Models\Booking;
use App\Models\BookingTraveller;
use App\Models\Package;
use App\Models\PackageActivity;
use App\Models\PackageHotelRoom;
use App\Models\Trip;

class BookingService
{
    public static function storeBookingMainData( $validatedData ){
        return Booking::create(
            self::collectBookingMainData($validatedData)
        );
    }
    public static function storeBookingCityData($booking, $booking_city )
    {
        $bookingCity = $booking->bookingCity()->create(self::collectBookingCityData($booking_city));

        foreach ($booking_city['activity'] as $key => $activity) {
            $bookingCity->bookingCityActivity()->create(self::collectBookingCityActivityData($activity));
        }

        foreach ($booking_city['hotelRooms'] as $hotelRoom){
            $numberOfNights = $bookingCity['nights_number'];
            $bookingCity->packageHotelRooms()->create(self::collectBookingCityHotelRoomsData($hotelRoom,$numberOfNights));
        }
    }

    public static function storeBookingTravelerData($booking, $validatedData ){
         $data = self::collectBookingTravellerData($validatedData);
         $data['booking_id'] = $booking->id;
         BookingTraveller::create($data);
    }

    public static function  storeBookingTData($booking, $validatedData){
        $booking->bookingData()->create(self::collectBookingData($validatedData));

    }

    public static function storeBookingPaymentData($booking, $validatedData ){
        $booking->bookingPayment()->create(self::collectBookingPaymentData($validatedData));
    }


    private static function collectBookingMainData($validatedData)
    {
        $cityStart  = $validatedData['city_start'] ;
        $cityEnd    = $validatedData['city_end'] ;
        $totalPrice = $validatedData['total_price'];

        $adults = 0;
        $children = 0;
        foreach ($validatedData['roomGuests'] as $roomGuest){
            $adults += $roomGuest['adults'];
            $children += array_key_exists('children',$roomGuest) ? $roomGuest['children'] : 0;
        }

        return [
            'package_id'                    => $validatedData['package_id'],
            'trip_price_per_person'         => Package::find( $validatedData['package_id'])->price_per_person,
            'city_start_id'                 => $cityStart['id'],
            'start_with_flight'             => $cityStart['with_flight'],
            'city_end_id'                   => $cityEnd['id'],
            'end_with_flight'               => $cityEnd['with_flight'],
            'accommodation_price'           => $totalPrice['accommodation'] ?? null,
            'transport_price'               => $totalPrice['transport'] ?? null,
            'itineraries_price'             => $totalPrice['itineraries'] ?? null,
            'total_price'                   => $totalPrice['total'],
            'adults'                        => $adults,
            'children'                      => $children,
            'status'                        => 'pending payment',
            'model_id'                      => $validatedData['package_id'],
            'model_type'                    => get_class(new Package())
        ];
    }

    private static function collectBookingCityData($booking_city)
    {
        foreach ($booking_city['hotelRooms'] as $hotelRoom){
            $roomId = $hotelRoom['roomID'];
        }

        $data = [
            'city_id'                     => $booking_city['city_id'],
            'nights_number'               => $booking_city['nights_number'],
            'transportation_type'         => $booking_city['transportation_type'] ?? 'limousine',
            'package_hotel_id'            => isset($roomId) ? PackageHotelRoom::find($roomId)->package_hotel_id : null,
        ];

        return $data;
    }

    private static function collectBookingCityActivityData($validatedData){
        return [
            'package_activity_id'     => $validatedData['activityID'],
            'day_number'              => $validatedData['day_number'],
            'price_per_person'       => PackageActivity::find($validatedData['activityID'])->price_per_person,
        ];
    }

    private static function collectBookingPaymentData($validatedData){
        $paymentCard  = $validatedData['creditCardInfo'];
        return [
            'card_number'              => substr($paymentCard['card_number'],-4,4) ?? null,
            'card_holder_name'         => $paymentCard['holder_name'] ?? null,
            'card_expiry'              => $paymentCard['card_expiry_date'] ?? null,
        ];
    }

    private static function collectBookingTravellerData($validatedData){
        $passengerDetails  = $validatedData;
        $gender = [
            'M' => 'male',
            'F' => 'female',
        ];

        return [
            'passengerTitle'            => $passengerDetails['passengerTitle'] ?? null,
            'passengerGender'           => array_key_exists('passengerGender',$passengerDetails) ? $gender[$passengerDetails['passengerGender']] : null,
            'passengerFirstName'        => $passengerDetails['passengerFirstName'] ?? null,
            'passengerLastName'         => $passengerDetails['passengerLastName'] ?? null,
            'date_of_birth'             => $passengerDetails['date_of_birth'] ?? null,
            'passport_number'           => $passengerDetails['passport_number'] ?? null,
            'passport_expire_date'      => $passengerDetails['passport_expire_date'] ?? null,
            'passengerType'             => $passengerDetails['passengerType'] ?? null,
            'passport_issue_country'    => $passengerDetails['passport_issue_country'] ?? null,

        ];
    }
    private static function collectBookingData($validatedData)
    {
        $bookingDetails  = $validatedData;

        return [
            'flight_id'                 =>$bookingDetails['flight_id'] ?? 0,
            'zipCode'                   => $bookingDetails['zipCode'] ?? null,
            'contact_phone'             => $bookingDetails['contact_phone'] ?? null,
            'contact_email'             => $bookingDetails['contact_email'] ?? null,
            'address'                    =>$bookingDetails['address'] ?? null,
            'streetLine'                 =>$bookingDetails['streetLine'] ?? null,
            'contact_name'               => $bookingDetails['contact_name'] ?? null,
        ];
    }

    private static function collectBookingCityHotelRoomsData($hotelRoom,$numberOfNights)
    {
        $totalPrice = $numberOfNights * $hotelRoom['selectionNumber'] * $hotelRoom['roomSeason']['roomSeasonPricePerDay'];
        return [
            'room_id' => $hotelRoom['roomID'],
            'room_type' => $hotelRoom['roomType'],
            'room_occupancy' => $hotelRoom['roomOccupancy'],
            'room_inclusions' => $hotelRoom['roomInclusions'],
            'room_amenities' => $hotelRoom['roomAmenities'],
            'room_categories' => $hotelRoom['roomCategories'],
            'room_max_number_of_adult' => $hotelRoom['roomMaxNumberOfAdult'],
            'room_max_number_of_children' => $hotelRoom['roomMaxNumberOfChildren'],
            'room_season_price_per_day' => $hotelRoom['roomSeason']['roomSeasonPricePerDay'],
            'total_price'  => $totalPrice,
            'duration' => $numberOfNights,
            'number_of_rooms' => $hotelRoom['selectionNumber'],
            'season_start_date' => $hotelRoom['roomSeason']['roomSeasonStartDate'],
            'season_end_date' => $hotelRoom['roomSeason']['roomSeasonEndDate'],
        ];
    }
}
