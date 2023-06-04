<?php


namespace App\GDSIntegration\Sabre\Cars;


use App\GDSIntegration\HttpClient\HttpClient;
use App\GDSIntegration\Sabre\GeoAutoComplete;
use App\GDSIntegration\Sabre\Sabre;
use App\Models\Airport;
use App\Models\CarAirconFuel;
use App\Models\CarCategory;
use App\Models\CarTransDrive;
use App\Models\CarType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class GetVehAvail extends Sabre
{
    public function requestVeh($request)
    {
        $now = Carbon::now()->format('Y-m-d');
        $http_client = new HttpClient();

        $getVahRQ = $this->getVehAvailRQ($request);

        //log request
        Storage::put('sabreRequests/'.$now.'/cars/search/'.now()->format('H:i:s').
        'getVahRQ.json',json_encode($getVahRQ));

        $response = $http_client
            ->executePostCall($this->rest_url,'/v1.0.0/get/vehavail',json_encode($getVahRQ),$this->getAccessToken());

        //log response
        Storage::put('sabreRequests/'.$now.'/cars/search/'.now()->format('H:i:s').
        'getVahRS.json',$response);

        try{
            $responseArray = json_decode($response,true)['GetVehAvailRS'];
        }catch (\Exception $e){
            sendErrorToMail($e);
            return 'No results matching your criteria';
        }

        if(array_key_exists('VehAvailInfos',$responseArray) && array_key_exists('GetVehAvailRS',json_decode($response,true))){
            $responseData = $responseArray['VehAvailInfos'];
        }else{
            return 'No results matching your criteria';
        }

        $result = $this->reArrangeResponseData($responseData);

        return $result;
    }

    public function getVehAvailRQ($request)
    {
        $dropOff = (is_null($request->dropOffLocation)) ?
            $request->pickUpLocation : $request->dropOffLocation;
        $getvahRQ = [
            "GetVehAvailRQ" => [
                "SearchCriteria" =>  [
                      "PickUpDate"   => $request->pickUpDate,
                      "PickUpTime"   => $request->pickUpTime,
                      "ReturnDate"   => $request->returnDate,
                      "ReturnTime"   => $request->returnTime,
                      "SortBy"       => "Preferred",
                      "SortOrder"    => $request->sortOrder,
                      "AirportRef" => [
                          "PickUpLocation" => [
                              "LocationCode"   => strtoupper($request->pickUpLocation)
                          ],
                          "ReturnLocation" => [
                              "LocationCode"   => strtoupper($dropOff)
                          ]
                      ],
                      "ImageRef" => [
                          "Image" => [
                              "Type" => "ORIGINAL"
                          ]
                      ],
                      "LocPolicyRef" => [
                          "Include" => true
                      ],
                    "CarExtrasPrefs" => [
                            "CarExtrasPref" => [
                              [
                                  "Type"=> "NAV"
                              ],
                                [
                                    "Type" => "CST"
                                ],
                                [
                                    "Type" => "PAI"
                                ],
                                [
                                    "Type" => "HCL"
                                ]
                            ]
                        ],
                    ]
            ]
        ];

        return $getvahRQ;
    }

    public function reArrangeResponseData($response)
    {
        $carsResults['pickUpDate'] = $response['PickUpDate'];
        $carsResults['pickUpTime'] = Carbon::parse($response['PickUpTime'])->format('H:i');
        $carsResults['returnDate'] = $response['ReturnDate'];
        $carsResults['returnTime'] = Carbon::parse($response['ReturnTime'])->format('H:i');
        $carsResults['rentalDays'] = $response['RentalDays'];
        $carsResults['rentalHours'] = $response['RentalHours'];
        $carsResults['numberOfCars']   = count($response['VehAvailInfo']);

        $c = 0;
        foreach ($response['VehAvailInfo'] as $info){

            $carTypesArray = str_split($info['VehRentalRate']['Vehicle']['VehType']);

            $carCategoryCode = $carTypesArray[0];
            $carTypeCode     = $carTypesArray[1];
            $carTransCode    = $carTypesArray[2];
            $carFuelCode     = $carTypesArray[3];

            $carsResults['cars'][$c]['id'] = $c;
            $carsResults['cars'][$c]['session_time'] = time();
            //vendor info
            $carsResults['cars'][$c]['vendorCode'] = $info['Vendor']['Code'];
            $carsResults['cars'][$c]['vendorName'] = $info['Vendor']['Name'];
            $carsResults['cars'][$c]['vendorLogo'] =
                array_key_exists('Logo',$info['Vendor'])?$info['Vendor']['Logo']:'';
            //pickup & dropOff info
            $carsResults['cars'][$c]['pickUpLocationCode'] = $info['PickUpLocation']['LocationCode'];
            $carsResults['cars'][$c]['returnLocationCode'] = $info['ReturnLocation']['LocationCode'];
            $carsResults['cars'][$c]['pickUpLocation'] = $this->getAirportName($info['PickUpLocation']['LocationCode']);
            $carsResults['cars'][$c]['returnLocation'] = $this->getAirportName($info['ReturnLocation']['LocationCode']);

            //car info
            $carsResults['cars'][$c]['carInfo']['carTypeCode'] = $info['VehRentalRate']['Vehicle']['VehType'];
            $carsResults['cars'][$c]['carInfo']['carCategory'] = is_null(CarCategory::where('code',$carCategoryCode)->first())?'':CarCategory::where('code',$carCategoryCode)->first()->name;
            $carsResults['cars'][$c]['carInfo']['carType']  = is_null(CarType::where('code',$carTypeCode)->first())?'':CarType::where('code',$carTypeCode)->first()->name;
            $carsResults['cars'][$c]['carInfo']['carTrans'] = is_null(CarTransDrive::where('code',$carTransCode)->first())?'':CarTransDrive::where('code',$carTransCode)->first()->name;
            $carsResults['cars'][$c]['carInfo']['carFuel']  = is_null(CarAirconFuel::where('code',$carFuelCode)->first())?'':CarAirconFuel::where('code',$carFuelCode)->first()->name;
            $carsResults['cars'][$c]['carInfo']['seats']   =
                array_key_exists('SeatBeltsAndBagsInfo',$info['VehRentalRate']['Vehicle'])?
                $info['VehRentalRate']['Vehicle']['SeatBeltsAndBagsInfo']['SeatBelts']['Quantity']:0;
            $carsResults['cars'][$c]['carInfo']['bags'] =
                array_key_exists('SeatBeltsAndBagsInfo',$info['VehRentalRate']['Vehicle'])?
                    $info['VehRentalRate']['Vehicle']['SeatBeltsAndBagsInfo']['BagsInfo']['Bags']:[];
            $carsResults['cars'][$c]['carInfo']['images'] =
                array_key_exists('Image',$info['VehRentalRate']['Vehicle']['Images'])?
                    $info['VehRentalRate']['Vehicle']['Images']['Image']:[];

            //fare Info
            $carsResults['cars'][$c]['fareInfo'] = $this->carCharges($info['VehRentalRate']['VehicleCharges']['VehicleCharge']);

//            $carsResults['cars'][$c]['extraCharges'] =
//                array_key_exists('CarExtra',$info['VehRentalRate']['CarExtraCharges'])?
//                    $info['VehRentalRate']['CarExtraCharges']['CarExtra']:[];

            $c++;
        }
        $carsResults['filterPrice'] = $this->maxMinPrice($carsResults['cars']);
        $carsResults['categories']  = $this->category($carsResults['cars']);
        $carsResults['seats']       = $this->seats($carsResults['cars']);
        $carsResults['vendors']     = $this->vendors($carsResults['cars']);

        return $carsResults;

    }

    public function carCharges($chargesArray)
    {
        $i = 0;
        foreach ($chargesArray as $charge){
            if($charge['ChargeType'] == 'ApproximateTotalPrice'){
                $charges[$i]['Amount'] = $charge['Amount'];
                $charges[$i]['MileageAllowance'] = $charge['MileageAllowance'];
                $charges[$i]['ExtraMileageCharge'] = $charge['ExtraMileageCharge'];
                $charges[$i]['UOM'] = $charge['UOM'];
                $charges[$i]['ChargeType'] = 'totalPrice';
            }
            elseif ($charge['ChargeType'] == 'BaseRateTotal'){
                continue;
            }else{
                $charges[$i] = $charge;
            }
            $i++;
        }
            //->where('ChargeType','=','totalPrice')->first()['Amount'];
        return collect($charges);
    }


    public function getAirportName($code)
    {
        $airport = Airport::where('code',$code)->first();

        if(is_null($airport) || $airport == null){
            $airportAPI = new GeoAutoComplete();
            $airportAPI->getResponse($code);
            return $this->getAirportName($code);
        }else{
            $airport_name = $airport->name.','.$airport->city.','.$airport->countryName.','.$airport->country;
        }

        return $airport_name;
    }

    //filtration methods

     //min/max price
    public function maxMinPrice($cars)
    {

        $price  = ($cars[0]['fareInfo'])->where('ChargeType','=','totalPrice')->first()['Amount'];
        foreach ($cars as $car){
            if($price < ($car['fareInfo'])->where('ChargeType','=','totalPrice')->first()['Amount']){
                $price = ($car['fareInfo'])->where('ChargeType','=','totalPrice')->first()['Amount'];
            }
        }

        $maxPrice = $price;

        $price  =  ($cars[0]['fareInfo'])->where('ChargeType','=','totalPrice')->first()['Amount'];
        foreach ($cars as $car){
            if($price > ($car['fareInfo'])->where('ChargeType','=','totalPrice')->first()['Amount']){
                $price = ($car['fareInfo'])->where('ChargeType','=','totalPrice')->first()['Amount'];
            }
        }
        $minPrice = $price;

        return ['maxPrice' => $maxPrice, 'minPrice' => $minPrice];
    }


    //category filter
    public function category($cars)
    {
        foreach ($cars as $car){
            $categories[] = $car['carInfo']['carCategory'];
        }
        $categories =  array_count_values($categories);
        foreach ($categories as $key => $value){
            $newCategories[] = [
                'category' => $key,
                'numberOfCars' => $value
            ];
        }
        return $newCategories;
    }

    //number of seats filter
    public function seats($cars)
    {
        foreach ($cars as $car){
            $seats[] = $car['carInfo']['seats'];
        }
        $seats = array_count_values($seats);

        foreach ($seats as $key => $value){
            $newSeats[] = [
              'numberOfSeats' => $key,
              'numberOfCars'  => $value
            ];
        }
        return $newSeats;
    }

    //vendors
    public function vendors($cars)
    {
        foreach ($cars as $car) {
            $vendors[] = $car['vendorName'];
        }
        $vendors = array_count_values($vendors);

        foreach ($vendors as $key => $value) {
            $newVendors[] = [
                'vendor' => $key,
                'numberOfCars' => $value
            ];
        }

        return $newVendors;
    }

}
