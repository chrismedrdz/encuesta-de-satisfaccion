<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;


use Session;

use App\User;

class LoginAdminController extends Controller
{



    

    public function index()	{

		//$user=\Auth::guard('client')->user();

		# Si ya fue registrado el usuario y se quiere regresar, lo mandará nuevamente a la encuesta, hasta que no la termine 
			return view('admin.index');
		

	}

	public function postLoginAdmin(Request $request){


        $messages = [
            'email.required'        => ' El email de acceso es requerido.',
            'password.required'        => ' La contraseña es requerida.',
        ];

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ], $messages);

        $email = $request->input('email');
        $password = $request->input('password');
        $remember= $request->input('token');

    if (Auth::attempt(['email' => $email, 'password' => $password], $remember)){
                return redirect('admin/home');

        } else {

            $loginFailed = [
                'loginFailed' => 'el correo o contraseña son incorrectos',
            ];
            return redirect()->back()->withInput()->withErrors($loginFailed);
            
        }

    return true;
}

     public function getLogoutAdmin() {

		    Auth::guard('web')->logout();

		     Session::flush();

		     return redirect()->intended('admin/acces');
    }
}
