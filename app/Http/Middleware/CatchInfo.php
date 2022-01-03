<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class CatchInfo
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
        if($request->isMethod('get')){
            $this->getReferer($request);
            $this->getParams($request);
        }

        return $next($request);
    }
    
    /**
     * Try to get referer from incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function getReferer(Request $request){
        
        $referer = $request->server('HTTP_REFERER');
        if(empty($referer)){
            return;
        }
        
        $referer_host = parse_url($referer, PHP_URL_HOST);

        if($referer_host && strpos($referer_host, $request->server('HTTP_HOST')) !== false){
            return;
        }

        $request->session()->put('parsed.referer', $referer);
    }
    
    /**
     * Try to get referer from incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function getParams(Request $request){
        
        if($request->get('utm_campaign')){
            $get_params = $request->all();
            $request->session()->put('parsed.additional_params', $get_params);
            if(!empty($get_params['url'])){
                $request->session()->put('parsed.referer', $get_params['url']);
            }elseif(!empty($get_params['referer'])){
                $request->session()->put('parsed.referer', $get_params['referer']);
            }
        }
    }
}
