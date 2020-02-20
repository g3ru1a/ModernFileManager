<?php

namespace MAZE\MFM\Controllers;

use App\Http\Controllers\Controller;

class MFMController extends Controller
{
    public static function get($path){
        $path = str_replace('-', '/', $path);
        $dirs = scandir($path);
        $arr = [];
        foreach($dirs as $d){
            if(is_dir($path.'/'.$d) && $d != '.' && $d != '..'){
                array_push($arr, $d);
            }
        }
        return json_encode($arr);
    }
}
