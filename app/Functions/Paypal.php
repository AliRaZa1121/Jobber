<?php

namespace App\Functions;

use App\Setting;

class Paypal
{
    public static function getClientID(){
        

        $paypal = Setting::where('key', 'paypal_client_id')->first();
        return $paypal->value;

    } 
}
