<?php


namespace App\Libs\FireBase;


use App\Libs\FireBase\FireBase as FireBaseNotification;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class PushNotification extends FireBaseNotification
{
    /**
     * Send Notification to one device with its token
     *
     * @param string $token
     * @param string $title
     * @param string $body
     * @param array $data
     *
     * @return void|string
     * */
    public function notificationToDevice($token,$title,$body,$data)
    {
        $dataArray = array_merge(['click_action' => 'FLUTTER_NOTIFICATION_CLICK'],$data);

        $notification = $this->notification($title,$body);
        $message = CloudMessage::withTarget('token',$token)
            ->withNotification($notification)
            ->withData($dataArray);

        try {
            $this->messaging->send($message);
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }


    /**
     * Send Notification to one device with its token
     *
     * @param array $token
     * @param string $title
     * @param string $body
     * @param array $data
     *
     * @return void
     * */
    public function notificationToDevices($token,$title,$body,$data)
    {
        $notification = $this->notification($title,$body);

        $message = CloudMessage::new();

        $this->messaging->send($message);
    }


    public function notification($title, $body)
    {
        $imageUrl = 'http://lorempixel.com/400/200/';

//        $notification = Notification::fromArray([
//            'title' => $title,
//            'body' => $body,
//            'image' => $imageUrl,
//        ]);

        $notification = Notification::create($title, $body);

        return $notification;
    }
}
