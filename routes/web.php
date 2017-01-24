<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//login
Route::get('/', 'Auth\AuthController@getAccess');
//Route::get('/', 'Auth\AuthController@getLogin');

Route::get('admin', 'Auth\AuthController@getLogin');

Route::post('login1', ['as' =>'login1', 'uses' => 'Auth\AuthController@postAccess']);

Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);


Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('home', 'HomeController@index');

//ADMINISTRADOR

Route::group(['prefix'=>'admin', 'middleware' => ['auth', 'admin'] ], function () {
    Route::get('/', 'HomeController@admin');
   });


//PRIMARIA MAYOR
Route::group(['prefix'=>'mayor', 'middleware' => ['auth', 'mayor'] ], function () {
  Route::get('/', 'HomeController@mayor');


  Route::get('survey/{id}', 'SurveyController@index');
  
  Route::get('survey/{id}',[
    'uses'  =>  'SurveyController@index',
    'as'  =>  'surveyView'
  ]);

  Route::post('survey/{id}/postanswers',[
    'uses'  =>  'AnswersController@postAnswers',
    'as'  =>  'answerPost'
  ]);

});

Route::get('autocomplete-basic',array('as'=>'autocomplete-basic','uses'=>'AutoCompleteController@autocomplete_basic'));
Route::get('autocomplete-maestros',array('as'=>'autocomplete_maestros','uses'=>'AutoCompleteController@autocomplete_maestros'));


//SECUNDARIA
Route::group(['prefix'=>'secundaria', 'middleware' => ['auth', 'secundaria'] ], function () {
    Route::get('/', 'HomeController@secundaria');
   });


//PADRES DE FAMILIA
Route::group(['prefix'=>'tutor', 'middleware' => ['auth', 'tutor'] ], function () {
    Route::get('/', 'HomeController@tutor');
   });


//PERSONAL DOCENTE
    Route::group(['prefix'=>'personal', 'middleware' => ['auth', 'personal'] ], function () {
      Route::get('/', 'HomeController@personal');
    
   });

   //  Route::group(['middleware' => ['auth', 'tutor'], 'prefix'=>'personal'], function () {
   //  Route::get('/', function ()    {
   //      Route::get('tutor.home', 'HomeController@index');
   //  });
   // });
