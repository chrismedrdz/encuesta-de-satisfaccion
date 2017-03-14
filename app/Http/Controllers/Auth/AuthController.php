<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Survey;
use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;
//use DB;


use Config;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    //use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    
   /* public function __construct(Guard $auth)
    {
        //$this->auth = $auth;
        $this->middleware('admin', ['except' => 'getLogout']);
      
    }*/
    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
 public function getLoginAdmin(){
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

        
$credentials = $request->only('email', 'password');

    if ($this->auth->attempt($credentials, $request->has('remember'))){
                return redirect('admin/home');

        } else {

            $loginFailed = [
                'loginFailed' => 'el correo o contraseña son incorrectos',
            ];
            return redirect()->back()->withInput()->withErrors($loginFailed);
            
        }

    return true;
}


/*

//login2

       protected function getLogin()
    {
        return view("login");
    }

    public function postLogin(Request $request) {
    $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if ($this->auth->attempt($credentials, $request->has('remember')))
    {
        
        return redirect('home');
    }

    return view()->with("msjerror","credenciales incorrectas");

    }


 //registro   


        protected function getRegister()
    {
        return view("register");
    }


        

        protected function postRegister(Request $request)

   {
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ]);


    $data = $request;


    $user=new User;
    $user->name=$data['name'];
    $user->email=$data['email'];
    $user->password=bcrypt($data['password']);
    $user->rols_id=$data['rol'];
    $user->sectors_id=$data['sector'];
    $user->familiar_key=$data['familiar'];
    

    if($user->save()){

         return "se ha registrado correctamente el usuario";
               
    }
   

   

}

//registro

*/

    protected function getLogout() {
        $this->auth->logout();

        Session::flush();

        return redirect('/');
    }

    public function getLoginAdmin(){
        return view('admin.index');
    }

    public function getLogoutAdmin() {

    return "hola"; 

       // $this->auth->logout();

       //  Session::flush();

       //  return redirect('admin/loginAdmin');
    }

}