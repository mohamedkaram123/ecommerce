<?php

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){//what is mean prefix admin => it is mean all controller when into this group when retuen redirect(see from into admin in views)


  Route::get('login','AdminAuth@login');

  Route::post('login','AdminAuth@dologin');
  Config::set('auth.defines','admin');
Route::group(['middleware'=>'admin:admin'],function(){

  Route::resource('admin','AdminController');
  Route::delete('admin/destroy/all','AdminController@multidelete');

  
  Route::resource('contries','ContriesController');
  Route::delete('contries/destroy/all','ContriesController@multidelete');

  Route::resource('cites','CitesController');
  Route::delete('cites/destroy/all','CitesController@multidelete');

  Route::resource('state','StateController');
  Route::delete('state/destroy/all','StateController@multidelete');
  
  Route::resource('users','UsersController');
  Route::delete('users/destroy/all','UsersController@multidelete');

    
  Route::resource('department','DepartmentController');
  Route::delete('department/destroy/all','DepartmentController@multidelete');
  

  
  Route::resource('trademark','TradeMarkController');
  Route::delete('trademark/destroy/all','TradeMarkController@multidelete');

  Route::resource('manufact','ManufactController');
  Route::delete('manufact/destroy/all','ManufactController@multidelete');


  Route::resource('shipping','shippingController');
  Route::delete('shipping/destroy/all','shippingController@multidelete');

  
  Route::resource('mall','MallController');
  Route::delete('mall/destroy/all','MallController@multidelete');

  Route::resource('color','ColorController');
  Route::delete('color/destroy/all','ColorController@multidelete');

  Route::resource('size','SizeController');
  Route::delete('size/destroy/all','SizeController@multidelete');

 
  Route::resource('weight','WeightController');
  Route::delete('weight/destroy/all','WeightController@multidelete');

   
  Route::resource('product','ProductController');
  Route::delete('product/destroy/all','ProductController@multidelete');


  Route::post('upload/image/{id}','ProductController@multiuploads');
  Route::post('delete/image','ProductController@imagedelete');
  Route::post('update/image/{id}','ProductController@updatephoto');
  Route::post('updates/deptSizeWeight/{id}','ProductController@updatedeptSizeWeight');
  
 

  Route::get('/',function(){
    session()->flash('error',trans('admin.informtion_correct'));

    return  view('admin.home');
  });

  Route::get('settings','Settings@setting');
  Route::post('settings','Settings@setting_save');


  Route::any('logout','AdminAuth@logout');


});



Route::any('forget','AdminAuth@forget_password');
Route::post('forget','AdminAuth@forgetpassword');
Route::get('reset/password','AdminAuth@resetPassword');
Route::get('reset/password/{token}','AdminAuth@reset_password');
Route::post('reset/password/{token}','AdminAuth@insert_newpassword');

Route::get('lang/{lang}',function($lang){
  session()->has('lang')?session()->forget('lang'):'';
  $lang == 'en'?session()->put('lang','en'):session()->put('lang','ar');


return back();
});

});