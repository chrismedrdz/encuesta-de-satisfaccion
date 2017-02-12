<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use  App\User;
use  App\Survey;
use  App\GroupQuestions;
use  App\Sport;
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
	
	public function __construct() {
		$this->middleware('auth:client');

	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */	
	public function index()	{

		$survey=\Auth::guard('client')->user();

		# Si ya fue registrado el usuario y se quiere regresar, lo mandará nuevamente a la encuesta, hasta que no la termine 
		if ( session('usuario_id') != null ) {
			return redirect('survey/'.$survey->id);
		} else {
			return view('client.index')->with("survey",  $survey);
		}

	}

}