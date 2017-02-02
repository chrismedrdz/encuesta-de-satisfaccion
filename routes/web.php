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

// Authentication routes...
Route::get('/',   'Auth\LoginController@showLoginForm');
Route::get('login',   'Auth\LoginController@showLoginForm');
Route::post('login1',  'Auth\LoginController@authenticateClients');
Route::get('logout',  'Auth\LoginController@logout');

//CLIENTS

Route::group(['middleware' => 'survey'], function () {

  Route::get('/',                         'HomeController@index');
  Route::get('/home',                       'HomeController@index');

  Route::post('/home/postSurveyUser',[
    'uses'  =>  'SurveyController@postSurveyUser',
    'as'  =>  'userPost'
  ]);

  Route::post('/postSurveyUser',[
    'uses'  =>  'SurveyController@postSurveyUser',
    'as'  =>  'userPost'
  ]);
  
  Route::get('survey/{id}',[
    'uses'  =>  'SurveyController@index',
    'as'  =>  'surveyView'
  ]);

  Route::post('survey/{id}/postanswers',[
    'uses'  =>  'AnswersController@postAnswers',
    'as'  =>  'answerPost'
  ]);

  Route::get('autocomplete-basic',array('as'=>'autocomplete-basic','uses'=>'AutoCompleteController@autocomplete_basic'));

  Route::get('autocomplete-maestros', 'AutoCompleteController@autocomplete_maestros');
  


});


/*
//login Admin

//Route::get('admin', 'Auth\AuthController@getLogin');


//Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getLogout']);
*/
/*
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('home', 'HomeController@index');
*/

//ADMINISTRADOR
/*
Route::group(['prefix'=>'admin', 'middleware' => ['auth', 'admin'] ], function () {
    Route::get('/', 'HomeController@admin');
   });
*/

