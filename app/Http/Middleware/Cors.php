<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
	        return $next($request)
			->header('Access-Control-Allow-Origin', '*')
                //PUT, PATCH, DELETE, POST, GET, OPTIONS, HEAD
            //->header('Content-Type', 'application/json;charset=UTF-8')
            //->header('Access-Control-Max-Age', '1728000')
            //->header('Access-Control-Allow-Credentials', true)
			->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS, HEAD')
            ->header('Access-Control-Allow-Headers', 'Origin, Host, Refer, Connection, X-Requested-With, Content-Type, Accept, Authorization, Content-Range, Content-Disposition, Content-Description');

    }
}
