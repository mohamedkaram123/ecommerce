<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;

class StyleHomeController extends Controller
{
    //
    public function viewstyle(){

        $departments =   Department::where('parent',null)->pluck('dep_name_'.session('lang'),"id");

        return view('style.home',["departments"=>$departments]);

    }  

    public function loadul(){
         

      
        $departments =   Department::where('parent',request("id"))->pluck('dep_name_'.session('lang'),"id");
        sleep(0.8);
     
     return  view("style.layouts.ullist",["departments"=>$departments]);
    

    }
  
   
    public function loadback(){
    
      
        return request("id");
        $departments =   Department::where('parent',request("id"))->pluck('dep_name_'.session('lang'),"id");
      
       
            array_push($arrs,$departments);
        
     return $arrs;

    }


}
