<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Http\Request;


use Auth;
use Session;

use App\Survey;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    
    protected function guard() {
        return Auth::guard('client');
    }

    public function showLoginForm() {
        if(Auth::check()){
            return redirect()->intended('/');
        }else{
            return view('client.access');
        }
    }

    public function authenticateClients(Request $request) {

        $messages = [
            'code.required'        => 'El código de acceso es requerido.',
        ];

        $this->validate($request, [
            'code' => 'required'
        ], $messages);


        $code= $request->only('code');
        $id=Self::getId($code);

        if (Auth::guard('client')->loginUsingId($id, true) ) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {

            $loginFailed = [
                'loginFailed' => 'El código de acceso es incorrecto',
            ];
            return redirect()->back()->withInput()->withErrors($loginFailed);
        }
    }


    protected function getId($code){
        $id=Survey::where('code', $code)->value('id');
        return $id;
    }

    public function logout() {

        Auth::guard('client')->logout();
        Session::flush();
        return redirect()->intended('/login');
    }
}
