<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use  App\User;
use Session;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');

	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */	
	public function index()
	{
		$usuarioactual=\Auth::user()->rols_id;
		switch ($usuarioactual) {
            case '1':
                return redirect('admin')->with("usuario",  $usuarioactual);
                break;
            case '2':
                return redirect('mayor')->with("usuario",  $usuarioactual);
                break;
            case '3':
                return redirect('secundaria')->with("usuario",  $usuarioactual);
                break;
            case '4':
                return redirect('tutor')->with("usuario",  $usuarioactual);
                break;
            case '5':
                return redirect('personal')->with("usuario",  $usuarioactual);
                break;
                
            default:
                return 'algo salio mal';
                break;
        
		}

	}

	public function personal(){
		$usuarioactual=\Auth::user();

		return view('personal.home')->with("usuario",  $usuarioactual);

	}

	public function mayor(){
		
		view()->share('sess_usr', \Auth::user());

		$usuario=\Auth::user();
        return view('mayor.index',compact( 'usuario', $usuario) );
		//return view('mayor.index')->with("usuario",  $usuarioactual);

	}

	public function secundaria(){
		
	$usuarioactual=\Auth::user();
		return view('secundaria.home')->with("usuario",  $usuarioactual);

	}

	public function tutor(){
		
	$usuarioactual=\Auth::user();
		return view('tutor.home')->with("usuario",  $usuarioactual);

	}

	public function admin(){
		
	$usuarioactual=\Auth::user();
		return view('admin.home')->with("usuario",  $usuarioactual);

	}




}