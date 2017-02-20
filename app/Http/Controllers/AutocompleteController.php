<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\UserSurvey;
use App\Teacher;
use DB;
use Session;

class AutoCompleteController extends Controller
{
    public function autocomplete_basic(Request $request)
    {
        //$data = Item::select("title as name")->where("title","LIKE","%{$request->input('query')}%")->get();

        $data = array();
        $data[] = 'Item 1';
        $data[] = 'Item 2';
        $data[] = 'Item 3';
        return response()->json($data);
    }

    public function autocomplete_maestros(Request $request)
    {
        $school=self::getSchoolId();
       
        /*$data = Teacher::select("name as name")->where([
            ['schools_id','=', $school],
            ["name","LIKE","%{$request->input('query')}%"],
            ])->get();
                No funciono
            */

         //$data = Teacher::select("name as name")->where("name","LIKE","%{$request->input('query')}%")->get();
        //$school=1;
        $query = "select * from teachers where schools_id= '{$school}' AND name LIKE '%{$request->input('query')}%' COLLATE utf8_general_ci";

       $data = DB::select($query);

        return response()->json( $data );
    }

    //obtenemos el valor de la escuela del usuario que esta en ssesion
    protected function getSchoolId(){
        $user_srv_id = session('usuario_id');
        $id=UserSurvey::where('id', $user_srv_id)->value('school_id');
        return $id;

    }
    
}
