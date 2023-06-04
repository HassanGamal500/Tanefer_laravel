<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;
use App\Models\Pnr;
use App\Traits\UpdateFlightBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SabreNotificationController extends Controller
{
    use UpdateFlightBooking;

    public function getNotification(Request $request)
    {
        if(($request->getContent() != '') && ($request->getContent() != null)){

            $notificationRequest = $request->getContent();

            Storage::put('sabreRequests/'.now()->format('Y-m-d').'/notifications/'.now()->format('H:i:s').'notification.xml',
                $notificationRequest);
            $xmlObject = simplexml_load_string($notificationRequest)->children('http://schemas.xmlsoap.org/soap/envelope/',)
                ->Body->children('http://wse.sabre.com/eventing');

            $pnrChange = $xmlObject->{'CCC.PNRCHNG'};
            if(! empty($pnrChange)){
                $indicators = $pnrChange->ChangeIndicators->Indicator;

                $pnrLocator = ((array)$pnrChange->Locator)[0];
                $pnrEloquent = Pnr::where('pnr_id',$pnrLocator)->first();

                if(is_null($pnrEloquent)){
                    return response()->json([],202);
                }
                $this->pnrChange($indicators,$pnrEloquent);
            }
        }

       $response = $pnrChange ?? [];

        return response()->json($response,202);
    }

    private function pnrChange(array $indicators,Pnr $pnrObject)
    {
        foreach ($indicators as $indicator){
            $indicatorName = ((array)$indicator->attributes()->name[0])[0];
            switch ($indicatorName){
                case 'Itinerary':
                    $this->updateItineraryChange($pnrObject);
                    continue 2;
                case 'Ticketing':
                    $this->updateTicketing($pnrObject);
                    continue 2;
                default:
                    return;
            }
        }
    }
}
