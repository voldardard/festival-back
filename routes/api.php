<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$languages = Config::get('app.languages');
$locale = \Request::segment(2);

foreach ($languages as $key => $value){
    if (($locale == $value['locale'])) {
        \App::setLocale($locale);
    }
}
 if(empty(Config::get('app.locale'))) {
    $locale = Config::get('app.fallback_locale');
    \App::setLocale($locale);
}

Route::group(['prefix' => Config::get('app.locale'), 'middleware'=>'cors' ], function () {



    Route::get('test', function ()    {
        dd("The language is: " . Config::get('app.locale'));
    });

    Route::get('articles', 'Shop\Shop@getAllArticles');




});
