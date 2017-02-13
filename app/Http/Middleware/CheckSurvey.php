<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class CheckSurvey
{
     public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
          //obtenemos el parametro del número de la encuesta
          $srv_id=trim(self::obtenerCadena(url()->full().'.','y/','.'));
          //Encuesta que debe estar activa
          $active_survey=Auth::guard('client')->user()->id;
       //Se acredita que la encuesta sea la misma con que inicio sesion
        if ( $active_survey != $srv_id) {
          //si el el parametro de la encuesta es modificado te redireccionara al que corresponde.
            return redirect('survey/'.$active_survey);
                
        } else {
            return $next($request); 
        }

    return $next($request);
    }

    //función para obtener cadena.
    protected function obtenerCadena($contenido,$inicio,$fin) {
          $r = explode($inicio, $contenido);
          if (isset($r[1])){
              $r = explode($fin, $r[1]);
              return $r[0];
          }
          return '';
    }
}
