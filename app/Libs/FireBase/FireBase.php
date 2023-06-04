<?php


namespace App\Libs\FireBase;




class FireBase
{

    protected $messaging;
    protected $database;

    public function __construct()
    {
        $this->messaging = app('firebase.messaging');
        $this->database = app('firebase.database');
    }


}
