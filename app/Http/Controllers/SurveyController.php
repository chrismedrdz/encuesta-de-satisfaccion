<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Survey;
use  App\Section;
use  App\Question;

class SurveyController extends Controller
{
    public function index()
	{
		$survey=\Auth::user()->survey_id;

		switch ($survey) {
            case '1':
            	$survey=Survey::find($survey);
                $sections = $survey->sections_ids;
				return view('layouts.survey')->with("sections_str",  $sections);
                break;
            default:
                return 'algo salio mal';
                break;
        
		}
		

	}
}
