<?php

namespace App\Http\Controllers\ApiV1\Admin;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Models\EmailSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClientController extends AdminController
{
    public function index()
    {
        $clients = Client::all();

        return apiResponse(ClientResource::collection($clients),'',true);
    }

    public function show($id)
    {
        $client = Client::find($id);

        if(is_null($client)){
            return apiResponse(new \stdClass(),'Client Not Found',false);
        }

        return new ClientResource($client);
    }

    public function store(ClientRequest $request)
    {
        $client = Client::create([
            'name' => $request->name,
            'url'  => $request->urlOrSecret,
            'email' => $request->email,
            'terms_url' => $request->termsUrl,
            'client_id' => $request->clientId,
        ]);

        EmailSetting::create([
            'to' => $request->emailTo,
            'cc' => $request->emailCc,
            'client_id' => $client->id
        ]);

        Cache::forget('clients-'.app()->environment());


        return apiResponse(ClientResource::collection(Client::where('name','!=','Back Office')->get()),
            'Client Save Successfully',true);
    }


    public function update(ClientRequest $request,$id)
    {
        $client = Client::find($id);
        if(is_null($client)){
            return apiResponse([],'Client Not Found',false);
        }
        $client->update([
            'name' => $request->name,
            'url'  => $request->urlOrSecret,
            'email' => $request->email,
            'terms_url' => $request->termsUrl,
            'client_id' => $request->clientId,
        ]);

        $emailSettings = EmailSetting::where('client_id',$id)->first();
        if(is_null($emailSettings)){
            EmailSetting::create([
                'to' => $request->emailTo,
                'cc' => $request->emailCc,
                'client_id' => $id
            ]);
        }else{
            $emailSettings->update([
                'to' => $request->emailTo,
                'cc' => $request->emailCc,
            ]);
        }

        Cache::forget('clients-'.app()->environment());

        return apiResponse(new ClientResource(new ClientResource($client)),
            'Client Updated Successfully',true);
    }

    public function updateClientBlocking(Request $request,$id)
    {
        $client = Client::find($id);

        if(is_null($client)){
            return apiResponse(new \stdClass(),'Client not Found',false);
        }
        $client->update(['block' => $request->status]);

        Cache::forget('clients-'.app()->environment());

        return apiResponse(new ClientResource($client),'Update Blocking Status',true);
    }

}
