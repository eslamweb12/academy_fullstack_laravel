<?php

namespace App\action;

class message
{
    public static function  success($data=null,$message,$token=null)
    {
        return response()->json(['data'=>$data,'message'=>$message,'token'=>$token]);

    }
    public static function  error($message,$status){
        return response()->json(['message'=>$message,'status'=>$status]);

    }

}
