<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Answer;
use App\User;

class AnswersController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

    public function postAnswers(Request $request) {
    	//le paso a la variable questions el valor de array de los input de question[]
    	$questions=$request->input('question');

    	//$current_section = 1;
    	//itero el arrray de question $clave como is de pregunta y $valor como resultado
		foreach($questions as $clave  => $valor){
			$answer= new Answer;
			$answer->user_id=$request->input('user_id');
    		$answer->section_id=$request->input('section_id');
    		$current_section = $answer->section_id;
    		$answer->survey_id=$request->input('survey_id');
    		$answer->question_id=$clave;
    		$answer->result=$valor;
    		
    		//validación de llenado correcto de infomación a base de datos
    		if($answer->save()){
    			continue;
    		}else{
    			return view('layouts.survey', "Error al guardar los datos");
    		}
		}
		
		$current_section++;

		$request->session()->put('current_section', $current_section);
		return back();

    }
}
