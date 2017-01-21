<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;


class Secundaria
{
    
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
         
        if ( $this->auth->user()->rols_id != '3')
        {
           
                return redirect('logout');

            if ($request->ajax()) {
                return response('no autorizado');
            }

            }
            else
            {
                
                return $next($request);
            }

            
    

    return $next($request);

}
}
