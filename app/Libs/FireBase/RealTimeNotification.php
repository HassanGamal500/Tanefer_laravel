<?php


namespace App\Libs\FireBase;


use App\Libs\FireBase\FireBase as FireBaseNotification;
use Illuminate\Support\Facades\Cache;

class RealTimeNotification extends FireBaseNotification
{

    /**
     * set notification in user collection on realtime firebase database
     *
     * @param string $pnr
     * @param string $title
     * @param string $body
     * @param int $userKey
     *
     * @return void
     * */
    public function setNotification($pnr, $title, $body, $userKey)
    {
        $data = [
            'pnr' => $pnr,
            'title' => $title,
            'text'  => $body,
            'dateTime' => now(),
            'read' => 0
        ];

        $this->database->getReference('users/'.$userKey)
           ->push($data);
    }

    /**
     * Update Readability of notification
     *
     * @param integer $user_id
     * @param string $key
     * @param array $notificationArray
     * @param integer $readability
     *
     * @return void
     */
    public function updateReadOFNotification($user_id, $key, $notificationArray)
    {

        if($notificationArray['text'] == null){
            $notificationArray['text'] = "";
        }

        $this->database->getReference('users/'.$user_id.'/'.$key)
        ->update($notificationArray);
    }


    public function pushFlights($value,$searchId,$countKey = null)
    {

        if($countKey != null){
            $this->database->getReference('flights/'.$searchId)->update([ $countKey => $value ]);
        }else{
            $flights = $this->database->getReference('flights/'.$searchId)->push($value);
            $key = $flights->getKey();

            return $key;
        }
    }

    public function removeFlights($searchId)
    {
        $flights = $this->database->getReference('flights/'.$searchId);

        if($flights->getSnapshot()->exists()){
            $flights->remove();
        }
    }
}
