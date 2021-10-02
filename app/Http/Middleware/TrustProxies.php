<?php

namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{

    protected $proxies = "*";

    protected $headers = Request::HEADER_X_FORWARDED_ALL;

//    public function handle($request, Closure $next)
//    {
//
//        if (!$request->secure() ) {
//            Request::setTrustedProxies([$request->getClientIp()],Request::HEADER_X_FORWARDED_ALL);
//            return redirect()->secure($request->getRequestUri());
//        }
//
//        return $next($request);
//    }
}
