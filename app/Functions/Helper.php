<?php

namespace App\Functions;

use DB;
use Auth;
use File;
use App\User;

class Helper
{
    public static function ifUserHasImage($logo){
        if($logo == '' || $logo == null){
            return false;
        }
        if (File::exists(public_path('storage'.$logo))) {
            return 'storage'.$logo;
        } 
        else {
            return false;
        }
        
    } 


    public static function getMillionCount(){
        $count = User::where('role_id', 4)->where('is_premium', true)->count();
        return $count;
    }
}
