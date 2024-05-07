<?php

use App\Models\RouteSEOData;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\Debug\ExceptionHandler as SymfonyExceptionHandler;

if(! function_exists('convertToHoursMins')){

    function convertToHoursMins($time, $format = '%02d:%02d') {
        if ($time < 1) {
            return '';
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }

}

if(! function_exists('apiResponse')){

    function apiResponse($data,$message,$status){
        return response()->json([
            'data'    => $data,
            'message' => $message,
            'status'  => $status
        ]);
    }
}

if(! function_exists('deleteFirstCreatedFolderFromMonth')){

    function deleteFirstCreatedFolderFromMonth(){

        $dayBeforeMonth = \Carbon\Carbon::now()->subMonths(1)->format('Y-m-d');

        if(is_dir(storage_path('app/public/tboRequests/'.$dayBeforeMonth))){
            \Illuminate\Support\Facades\Storage::deleteDirectory('tboRequests/'.$dayBeforeMonth);
        }
    }
}

if(! function_exists('sendErrorToMail')){

    function sendErrorToMail(Exception $exception){
        $url = request()->url();
        //$html = $this->render(request(), $exception)->getContent();
        $e = FlattenException::create($exception);
        $handler = new SymfonyExceptionHandler();
        $html = $handler->getHtml($e);

        if(! app()->environment('local')){
            Mail::send('email_templates.exception_mail', [
                'html' => $html,
                'url'  => $url,
                'environment' => app()->environment()
            ], function ($message)
            {
                $errorNo = rand(10,1000);
                $message->from('sameh.samra@tanefer.com','Tanefer');
                $message->to('ahmed.salim@adamtravel.net');
                $message->subject('Error'.' '.$errorNo);
            });
        }else{
            throw  $exception;
        }
    }
}

if(! function_exists('airline_logo_small_url')){

    function airline_logo_small_url($airlineCode){
        return asset('images/airlinesSM/'.$airlineCode.'.png');
    }
}

if(! function_exists('convertStringToDate')){

    function convertStringToDate($dateString){
        return \Carbon\Carbon::parse($dateString)->format('Y-m-d');
    }

}

if(! function_exists('convertStringToTime')){

    function convertStringToTime($dateString){
        return \Carbon\Carbon::parse($dateString)->format('H:i:s');
    }

}

if(! function_exists('responseJson')){

    function responseJson(\Illuminate\Http\Request $request, $data, $message, $status = 200 , $anyData = null){

        if(is_array($anyData)){
            $data = array_merge($anyData,[
                'data' => $data,
                'message' => $message,
                'status'  => $status,
            ]);
        }else{
            $data = [
                'data' => $data,
                'message' => $message,
                'status'  => $status,
            ];
        }

        $routeSeoData = RouteSEOData::where('route',$request->route()->uri)->first();
        if(is_null($routeSeoData)){
            $data = array_merge($data,[
               'seo_data' => new stdClass()
            ]);
        }else{
            $data = array_merge($data,[
                'seo_data' => [
                    'title' => $routeSeoData->seo_title,
                    'meta_description' => $routeSeoData->meta_description
                ]
            ]);
        }

        return response()->json($data,$status);

    }

}

if(! function_exists('calculateAdventureDate')){

    function calculateAdventureDate($startDate, $dayNumber) {
        $startDateTime = new DateTime($startDate);
        $interval = new DateInterval('P' . ($dayNumber - 1) . 'D');
        $adventureDate = $startDateTime->add($interval);
        return $adventureDate->format('Y-m-d');
    }

}
