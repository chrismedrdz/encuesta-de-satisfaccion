<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;
//use DB;

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
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   


    //login1

    protected function getAccess()
    {
        return view("access");
    }


    public function postAccess(Request $request) {
   
        $this->validate($request, [
            'code' => 'required',
        ]);

        $code= $request->only('code');
        $id=Self::getId($code);

        if($this->auth->loginUsingId($id, true)){
            return redirect('home');
        } else {
            return redirect("/");
        }
    
    }


//login2

       protected function getLogin()
    {
        return view("login");
    }

    protected function getId($code){
        $id=User::where('code', $code)->value('id');
        return $id;
    }


       

        public function postLogin(Request $request)
   {
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


//login

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

protected function getLogout()
    {
        $this->auth->logout();

        Session::flush();

        return redirect('/');
    }






}