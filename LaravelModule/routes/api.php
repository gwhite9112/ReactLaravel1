<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('apitest',function(){
    return ['name'=>'Test Name'];
});

Route::get('home', function () {
    return '{
        "posts": [
          {
            "id": 1,
            "title": "hello"
          }
        ],
        "profile": {
          "name": "typicode"
        }
      }';
    /*
    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA'
    ]);
    
    $returnArray = ['name'=>'Test Name'];
    return response($returnArray, 200)
                  ->header('Content-Type', 'json');
                  */
});
Route::get('products', function () {
    
    //return response(['Name':"Produc1", "ID":"12", "Email":"sdfsdf@aol.com"],200);
});
Route::get('movies','MovieController@index');
Route::get('movie/{id}','MovieController@show');
Route::post('movie','MovieController@store');
Route::put('movie','MovieController@store');
Route::delete('movie/{id}','MovieController@destroy');