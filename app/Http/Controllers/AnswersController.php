<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Answer;
use App\User;
use App\Comment;
use App\Teacher;

class AnswersController extends Controller {

	public function __construct() {
		$this->middleware('survey');
	}

    public function postAnswers(Request $request) {
    	//le paso a la variable questions el valor de array de los input de question[]
        $questions=$request->input('question');
        $comments=$request->input('comment');
        $survey_id=$request->input('survey_id');

    	//itero el arrray de question $clave como is de pregunta y $valor como resultado
        $i=0;

        $aux=[];
		foreach($questions as $clave  => $valor){

            if ($valor != '0' && $valor != '' ) {
                /*
                if ($i==0) {
                    if( strpos($clave, 'g_') !== false )
                        $aux[]=trim(self::obtenerCadena($clave,'g_','q'));
                    else 
                        $aux[] = 'xD';
                } else {
                    if( strpos($clave, 'g_') !== false )
                        $aux[]=trim(self::obtenerCadena($clave,'g_','q'));
                    else 
                        $aux[] = 'xD';


                    if ($aux[$i] == $aux[$i-1]) {
                        # continue
                        $answer->group_id=trim(self::obtenerCadena($clave,'g_','q'));
                    }
                }*/

                if( strpos($clave, 'g_') !== false ) {

                    if ( self::obtenerCadena($clave,'g_','q') == '9') {
                        $sportId=null;
                    } else {
                        if( trim(self::obtenerCadena($clave.'.','q_','.')) == '205' ){
                            $sportId=$valor;
                        }
                    }

                    $answer= new Answer;
                    $answer->user_id=$request->input('user_id');
                    $answer->section_id=$request->input('section_id');
                    $current_section = $answer->section_id;
                    $answer->survey_id=$request->input('survey_id');
                    $answer->question_id=trim(self::obtenerCadena($clave.'.','q_','.'));
                    $answer->group_id=trim(self::obtenerCadena($clave,'g_','q'));
                    

                    if ( is_array($valor) ) {
                        $answer->result=implode(',', $valor);
                    } else {
                        $answer->result=$valor;
                    }
                    
                    if(!empty($sportId)){
                        $answer->sports_id=$sportId;
                    }
                    else{$answer->sports_id=null;}

                } else {

                    if($clave>=74 && $clave<=97){
                        if($clave===74){
                            $teacher=$valor;
                            $TeacherId=self::getTeacherId($teacher);
                        }

                        $answer= new Answer;
                        $answer->user_id=$request->input('user_id');
                        $answer->section_id=$request->input('section_id');
                        $current_section = $answer->section_id;
                        $answer->survey_id=$request->input('survey_id');

                        $answer->question_id=$clave;
                        $answer->result=$valor;
                        $answer->teacher=$TeacherId;

                    }else{
                        $answer= new Answer;
                        $answer->user_id=$request->input('user_id');
                        $answer->section_id=$request->input('section_id');
                        $current_section = $answer->section_id;
                        $answer->survey_id=$request->input('survey_id');

                        $answer->question_id=$clave;
                        $answer->result=$valor;
                
                    }
                }                

                //validación de llenado correcto de infomación a base de datos
                if($answer->save()){
                    continue;
                }else{
                    return view('layouts.survey', "Error al guardar los datos");
                }
            }
			
        $i++;
		}

        if(!empty($comments)) {
            $comment= new Comment;
            $comment->users_id=$request->input('user_id');
            $comment->sections_id=$request->input('section_id');
            $comment->surveys_id=$request->input('survey_id');
            if(!empty($TeacherId))
                $comment->teachers_id= $TeacherId;

            $comment->comment=$request->input('comment');
            if( $comment->save() ){
                
            } else {
                return view('layouts.survey', "Error al guardar el comentario, revise su conexión a internet");
            }    

        }


        $sections = explode(',', session('sections'));
        $sec_actual = array_search($current_section, $sections);
        $sec_actual++;
		
        if (isset( $sections[$sec_actual] )) {
            $current_section = $sections[$sec_actual];
        } else {
            $current_section = 'finish';
        }

		$request->session()->put('current_section', $current_section);
		return back();


    }


    protected function obtenerCadena($contenido,$inicio,$fin) {
          $r = explode($inicio, $contenido);
          if (isset($r[1])){
              $r = explode($fin, $r[1]);
              return $r[0];
          }
          return '';
    }
    //Obtener el id del teacher.
    protected function getTeacherID($name){
            $id=Teacher::where('name', $name)->value('id');
            return $id;
    }
}
