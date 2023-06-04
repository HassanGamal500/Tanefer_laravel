<?php


namespace App\Services;


class StoreFileService
{
    public static function SaveFile($path,$file,$name = null){
        $extension = $file->getClientOriginalExtension();
        if(is_null($name)){
            return $file->store($path);
        }else{
         return $file->storeAs($path,$name.'.'.$extension);
        }
    }
}
