<?php


namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Setting;


class Settings extends Controller
{
    public function setting(){
        return view("admin.settings");
    }
    //'sitename_en',


public function setting_save(){
 
   $data =  $this->validate(request(),[
        'logo'=>v_img(),
        'icon'=>v_img(),
        'status'=>'required',
        'email'=>'',
        'description'=>'',
        'keywords'=>'',
        'message_maintenance'=>'',
        'sitename_ar'=>'',
        'sitename_en'=>'',
    ],[],[

            'logo'=>trans("admin.logo"),
        'icon'=>trans("admin.icon"),
        ]);
    if(request()->hasFile("logo")){
      
           $data['logo'] = up()->upload([
             //  'new_name'=>null,
               'file'=>'logo',
               'upload_type'=>'single',
               'path'=>'settings',
               'delete_file'=>setting()->logo
           ]);
        
     
    }
    if(request()->hasFile("icon")){
    
        $data['icon'] =  up()->upload([
            //  'new_name'=>null,
              'file'=>'icon',
              'upload_type'=>'single',
              'path'=>'settings',
              'delete_file'=>setting()->icon
          ]);

    }
    Setting::orderBy('id','desc')->update($data);
    session()->flash('success',trans("admin.edit_been_admin"));
    return redirect(aurl("settings"));
}

}
