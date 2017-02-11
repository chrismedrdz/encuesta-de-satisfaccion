<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Teacher;

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
        //$data = Item::select("title as name")->where("title","LIKE","%{$request->input('query')}%")->get();

        return response()->json(Teacher::all());

       /* $data_array = array();
        $data_array[] = array('value' => 'Pedro Salazar Villa', 'description' => 'Ciencias');
        $data_array[] = array('value' => 'Americo Sotelo Peña', 'description' => 'Computación');
        return response()->json($data_array);*/
    }
}
