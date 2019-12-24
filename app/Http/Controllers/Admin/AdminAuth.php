<?php

namespace App\Http\Controllers\Admin;
use App\Admin;
use DB;
use Mail;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;

use App\Mail\AdminResetPassword;
use Carbon\Carbon;
class AdminAuth extends Controller
{
    //

    public function login(){
        return view('admin.login');
    }


    public function dologin(){
        $rememberme = request('rememberme') == 1?true:false;
        if(auth()->guard('admin')->attempt(['email'=>request('email'),'password'=>request('password')],$rememberme)){
      return redirect('admin');
        }else{
            return redirect('admin/login');
        }
    }


    public function logout(){
      auth()->guard('admin')->logout();
      return redirect('admin/login');
    }

    public function forget_password(){
     
      return view('admin.forgetPassword');
    }

    public function forgetpassword(){
      $admin = Admin::where('email',request('email'))->first();
      if(! empty($admin)){
      
       
        $token = app('auth.password.broker')->createToken($admin);
       $data =   DB::insert('insert into password_resets(email,token,created_at) values(?,?,?) ',[$admin->email,$token,Carbon::now()]);
       
          Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token ]));
          session()->flash('success',trans('admin.resetpassword') );
          return back();
      }
      return back();
    }


    public function reset_password($token){

      $check_token = DB::select(' select * from password_resets where token = ? and created_at > ?',[$token ,Carbon::now()->subHours(2)]);
     
      if(! empty($check_token)){
       
        return view('admin.reset_password',['data'=>$check_token[0]]);
      }else{
        return  redirect(aurl('forget'));
      }
    }


    public function insert_newpassword($token){

      $rests = DB::select(' select * from password_resets where token = ? ',[$token] ); 
      $admin = Admin::where('email',$rests[0]->email)->get()->first();

   $data =   $this->validate(request(),[
       'email'=>'required',
       'password'=>'required|confirmed',
       'password_confirmation'=>'required',
     ]);

     if(! empty($data)){ 
      $admin['password'] = Hash::make(request('password'));
      $admin['remember_token'] = $token;
      $admin->save();
      DB::delete(' delete from password_resets where email = ? ',[$rests[0]->email] ); 
      
      return redirect('admin/login');
     //Admin::create();

   

     
    }
  }
}
