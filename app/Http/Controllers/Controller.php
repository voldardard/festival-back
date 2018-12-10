<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Lang;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getTranslation($array){

        $description=json_decode($array, true);

        if(!is_array($description)){
            \Log::error('Error in database, bad translation');
            abort(403, lang::get('errors.notAnArray'));
        }
        if(key_exists(\App::getLocale(), $description))$description=$description[\App::getLocale()];
        else {
            if(isset($description['en']))$description =$description['en'];
            else$description = NULL;
        }
        return $description;
    }

    public function getLangageInterface(){
        $array = Lang::get('interfaces');
        return $array;
    }
    public function getLangageInfo(){
        $array = Lang::get('info');
        return $array;
    }
}
