<?php

namespace App\Http\Middleware;

use Closure;

class CORS
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

        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Credentials: true ");
		header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
		header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
		
        $headers = [

            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',

            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'

        ];

        if($request->getMethod() == "OPTIONS") {

            return Response::make('OK', 200, $headers);

        }

        

        $response = $next($request);

        foreach($headers as $key => $value)

            $response->header($key, $value);

        return $response;

    }
}
