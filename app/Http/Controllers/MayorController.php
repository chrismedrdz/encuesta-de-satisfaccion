<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\User;
use Session;

class MayorController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');

	}

	public function section_1(){
		//$survey=Self::survey();
		$section=Self::sections(1);
		$questions=Self::questions($section);
		//dd($question);
		return view("mayor.formularios.section_1")->with("questions",  $questions);
	}
	public function section_2a(){
		
		$section=Self::sections(2);
		$questions=Self::questions($section);
		
		return view("mayor.formularios.section_2a")->with("questions",  $questions);
	}
	public function section_2b(){
		
		$section=Self::sections(3);
		$questions=Self::questions($section);
		
		return view("mayor.formularios.section_2b")->with("questions",  $questions);
	}
	public function section_2c(){
		
		$section=Self::sections(4);
		$questions=Self::questions($section);
		
		return view("mayor.formularios.section_2c")->with("questions",  $questions);
	}
	public function section_2d(){
		
		$section=Self::sections(5);
		$questions=Self::questions($section);
		
		return view("mayor.formularios.section_2d")->with("questions",  $questions);
	}
	public function section_2e(){
		
		$section=Self::sections(6);
		$questions=Self::questions($section);
		
		return view("mayor.formularios.section_2f")->with("questions",  $questions);
	}
	public function section_2f(){
		
		$section=Self::sections(7);
		$questions=Self::questions($section);
		
		return view("mayor.formularios.section_2a_formacion_cristina")->with("questions",  $questions);
	}

	protected function survey(){
		$user=\Auth::user();
		$sections=$user->survey->sections_ids;
		$la=explode( ',', $sections);

		$resul=$user->survey->section->whereIn('id', $la)->get();	
		return $resul;

	}

	protected function sections($arg){

		$user=\Auth::user();
		//dd($user->survey);
		$resul=$user->survey->section->where('id', '=', $arg)->value('questions_ids');
		return $resul;

	}

	protected function questions($arg){
		$user=\Auth::user();
		$la=explode( ',', $arg);

		$resul=$user->survey->section->question->whereIn('id', $la)->get();

		return $resul;

	}

	

}
