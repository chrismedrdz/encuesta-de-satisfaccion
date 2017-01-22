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
		$survey_id=\Auth::user()->survey_id;
		$survey=Survey::find($survey_id);
        $sections_str = $survey->sections_ids;
        $sections = explode(',', $sections_str);
        return view('layouts.survey')->with("sections",  $sections);
		

	}
}
