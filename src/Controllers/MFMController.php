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

    public static function getFiles($path){
        $path = str_replace('-', '/', $path);
        $dirs = scandir($path);
        $arr = [];
        foreach($dirs as $d){
            if($d != '.' && $d != '..'){
                array_push($arr, $d);
            }
        }
        return json_encode($arr);
    }

    public static function getFileType($path){
        $path = str_replace('-', '/', $path);

        if(is_dir($path)) return 'folder';

        $image = ['png', 'jpg', 'jpeg', 'gif', 'tiff'];
        $text = ['txt', 'rtf', 'wpd', 'odt','text'];
        $word = ['doc', 'docx'];
        $power_point = ['ppt', 'pptx'];
        $pdf = ['pdf'];
        $excel = ['xls', 'xlsx', 'xlsm', 'xltx', 'xltm'];
        $video = ['avi', 'mov', 'mp4'];
        $sound = ['mp3', 'flv', 'wav'];
        $code = ['css', 'js', 'py', 'cpp', 'c', 'cs', 'sqlite', 'php'];

        $ext = pathinfo($path, PATHINFO_EXTENSION);

        switch ($ext){
            case in_array($ext, $image):
                return 'file-image';
                break;
            case in_array($ext, $text):
                return 'file-alt';
                break;
            case in_array($ext, $word):
                return 'file-word';
                break;
            case in_array($ext, $power_point):
                return 'file-powerpoint';
                break;
            case in_array($ext, $pdf):
                return 'file-pdf';
                break;
            case in_array($ext, $excel):
                return 'file-excel';
                break;
            case in_array($ext, $video):
                return 'file-video';
                break;
            case in_array($ext, $sound):
                return 'file-audio';
                break;
            case in_array($ext, $code):
                return 'file-code';
                break;
            default:
                return 'file';
                break;
        }
    }
}
