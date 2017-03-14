<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;


class Admin
{
    
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
         

        /*if ( $this->auth->user()->rols_id != '1')
        {
           
                return view('admin.index');

            if ($request->ajax()) {
                return response('no autorizado');
            }

            }
            else
            {
                
                return $next($request);
            }

            
    

    return $next($request);*/

    if ($this->auth->user()) {
            return $next($request);
        } else {
            return redirect('admin/acces');
        }

        return $next($request);
}

}