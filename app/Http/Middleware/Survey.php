<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Survey{
    
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    

    public function handle($request, Closure $next) {

        if (Auth::guard('client')->user() ) {
            return $next($request);
        } else {
            return redirect('logout');
        }

    return $next($request);

    }

    /**
     * Certifica que o usuário logado está no contexto correto
     *
     * @return boolean
     */

}