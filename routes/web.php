<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//http://localhost/laravel/project2/public/loadul
//http://localhost/laravel/project2/public/loadul
Route::group(['middleware'=>'maintance'],function(){

  
    Route::get('/',"StyleHomeController@viewstyle");
  

    Route::post('loadul',"StyleHomeController@loadul");

    Route::post('loadback',"StyleHomeController@loadback");

});


Route::get('maintance',function(){
    if(setting()->status == 'open'){
        return redirect('/');
    }
    return view('style.maintance');
});
