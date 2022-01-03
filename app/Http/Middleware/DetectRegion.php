<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use IPGeoBase;

class DetectRegion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('user_region')) {
            $geobase = new IPGeoBase(base_path() . '/vendor/ipgeobase/data/cidr_optim.txt', base_path() . '/vendor/ipgeobase/data/cities.txt');
            $ip = $request->getClientIp();
            if ($ip === '127.0.0.1') {
                $ip = '83.142.9.61';
            }
            $geodata = $geobase->getRecord($ip);
            $georegion = array_get($geodata, 'region');
            if ($georegion) {
                $request->session()->put('user_region', $georegion);
            }
        }
        return $next($request);
    }
}