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
    if (($locale == $value['value'])) {
        \App::setLocale($locale);
    }
}
 if(empty(Config::get('app.locale'))) {
    $locale = Config::get('app.fallback_locale');
    \App::setLocale($locale);
}/*
Route::pattern('id', '\d+');
Route::pattern('hash', '[a-z0-9]+');
Route::pattern('hex', '[a-f0-9]+');
Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
Route::pattern('base', '[a-zA-Z0-9]+');
Route::pattern('slug', '[a-z0-9-]+');
Route::pattern('username', '[a-z0-9_-]{3,16}');
*/
Route::get('order', 'Shop\Shop@addOrder');
Route::group(['prefix' => Config::get('app.locale')], function () {




    Route::get('test', function ()    {
        dd("The language is: " . Config::get('app.locale'));
    });

    Route::get('lang/interface', 'Controller@getLangageInterface');
    Route::get('lang/info', 'Controller@getLangageInfo');
    Route::get('lang/available', function(){return response()->json(array('status_code'=>200, 'lang'=> Config::get('app.languages')));});


    /*
     * Shop
     */

    Route::get('products', 'Shop\Shop@getAllArticles');
    Route::get('articles', 'Shop\Shop@getAllArticles');
    Route::get('article/{id}', 'Shop\Shop@getArticleByID')->where('id', '[0-9]+');
    Route::get('category/{id}/articles', 'Shop\Shop@getCategoryArticles')->where('id', '[0-9]+');
    Route::get('order/{id}/{email}', 'Shop\Shop@getOrderByInfo')->where(['id', '[0-9]+'], ['email', '0-9A-Za-z\-']);

    Route::put('order', 'Shop\Shop@addOrder');
});
