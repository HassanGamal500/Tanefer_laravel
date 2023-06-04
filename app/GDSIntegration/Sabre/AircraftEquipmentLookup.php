<?php


namespace App\GDSIntegration\Sabre;


use App\Models\Aircraft;
use App\GDSIntegration\HttpClient\HttpClient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class AircraftEquipmentLookup extends Sabre
{
    public function getResponse($code)
    {

        $http_client = new HttpClient();
        $request = [
            "aircraftcode"   => $code,
        ];
        //log aircraft equipment request data
        Storage::put('sabreRequests/'.$this->nowDate.'/aircraftEquipment/'.$this->nowTime.'aircraftRQ.json',json_encode($request));

        $result = $http_client->
        executeGetCall($this->rest_url,'/v1/lists/utilities/aircraft/equipment',$request,$this->getAccessToken());

        //log aircraft equipment response data
        Storage::put('sabreRequests/'.$this->nowDate.'/aircraftEquipment/'.$this->nowTime.'aircraftRS.json',$result);

        try {
            $data = (json_decode($result,true)['AircraftInfo']);
            $this->DbStore($data);
        }catch (\Exception $e){
            //  sendErrorToMail($e);
            $data = '';
            $this->DbStore('',$code);
        }

        return $data;
    }

    public function DbStore($data , $code = null)
    {
        if($data == ''){
            Aircraft::create([
                'code' => $code,
                'name' => ''
            ]);
        }else{
            foreach ($data as $item){
                $aircraft = Aircraft::where('code',$item['AircraftCode'])->first();
                if(is_null($aircraft)){
                    Aircraft::create([
                        'code' => $item['AircraftCode'],
                        'name' => $item['AircraftName']
                    ]);
                }
            }
        }

    }
}
