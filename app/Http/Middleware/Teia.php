<?php

namespace App\Http\Middleware;

use Closure;

class Valid
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
        try {
             //
        }catch (GuzzleHttp\Exception\GuzzleException $e) {
			 return response()->json([
                    'Count' => 0, 'Results'  => [],
                ], \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND);
		}

        return $next($request);
    }
}
