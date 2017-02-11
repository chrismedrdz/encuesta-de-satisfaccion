<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Teacher;
use DB;

class AutocompleteController extends Controller
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
        $data = Teacher::select("name as name")->where("name","LIKE","%{$request->input('query')}%")->get();

        $user_srv_id = session('usuario_id');

        $data = DB::select("select * from teachers where name LIKE '%{$request->input('query')}%' collate utf8_general_ci");

        //dd();
        return response()->json( $data );
    }
}
