<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Survey;
use  App\Section;
use  App\Sector;
use  App\Question;
use  App\GroupQuestions;
use  App\UserSurvey;

class SurveyController extends Controller {

    public function postSurveyUser(Request $request) {
        //Hay que hacer validacion si al usuario le corresponde esa encuesta (survey_id)
        $survey_id=$request->input('survey_id');
        $srv=\Auth::guard('client')->user();

        if($srv->id == $survey_id ) {
            //Ok

            $messages = [
                'alumno_nombre' => 'El nombre es requerido y debe ser mayor a 3 caracteres',
                'alumno_apaterno' => 'El apellido paterno es requerido y debe ser mayor a 3 caracteres.',
                'alumno_amaterno' => 'El apellido materno es requerido y debe ser mayor a 3 caracteres.',
                'alumno_colegio' => 'El colegio es requerido',
            ];

            $this->validate($request, [
                'alumno_nombre' => 'required|min:3|max:20',
                'alumno_apaterno' => 'required|min:3|max:20',
                'alumno_amaterno' => 'required|min:3|max:20',
                'alumno_colegio' => 'required',
                'survey_id' => 'required',
            ], $messages);


            $sector_nombre=$request->input('alumno_colegio');
            $sector_id = Self::getSectorID($sector_nombre);
            $school_id = Self::getSchoolID($sector_nombre);
            
            if($srv->id <= 9){

            $user= new UserSurvey;
            $user->student_name=$request->input('alumno_nombre');
            $user->student_lastname1=$request->input('alumno_apaterno');
            $user->student_lastname2=$request->input('alumno_amaterno');

            $user->school_id=$school_id;
            $user->sector_id=$sector_id;
            $user->survey_id=$survey_id;
            }
            else{
            $user= new UserSurvey;
            $user->name=$request->input('alumno_nombre');
            $user->lastname1=$request->input('alumno_apaterno');
            $user->lastname2=$request->input('alumno_amaterno');

            $user->school_id=$school_id;
            $user->sector_id=$sector_id;
            $user->survey_id=$survey_id;
            }
            //validación de llenado correcto de infomación a base de datos
            if($user->save()){
                $lastInsertedId= $user->id; //get last inserted record's user id value
                $sections_str = $srv->sections_ids;
                $request->session()->put('survey_id', $srv->id);
                $request->session()->put('sections', $sections_str);
                $request->session()->put('section_initial', '0');
                $request->session()->put('usuario_id', $lastInsertedId);

                return redirect('survey/'.$srv->id);

            }else{
                $saveFailed = [
                    'saveFailed' => 'Ocurrió un error inesperado al guardar en base de datos.',
                ];
                return redirect()->back()->withInput()->withErrors($saveFailed);
            }

        } else {

            $submitFailed = [
                'submitFailed' => 'La encuesta no le corresponde',
            ];
            return redirect()->back()->withInput()->withErrors($submitFailed);

        }
  
    }

    public function index($options) {
        return view('client.survey');
    }

    protected function getSectorID($name){
        $id=Sector::where('name', $name)->value('id');
        return $id;
    }

    protected function getSchoolID($name){
        $school_id=Sector::where('name', $name)->value('schools_id');
        return $school_id;
    }
}
