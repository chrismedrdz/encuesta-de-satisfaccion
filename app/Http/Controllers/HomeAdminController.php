<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\User;

class HomeAdminController extends Controller
{
    public function __construct() {
		$this->middleware('admin');
	}

	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */	

	public function home(){
		return view('admin.inicio');
	}

}
