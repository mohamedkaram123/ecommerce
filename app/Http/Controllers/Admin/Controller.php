<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\Controller;
use App\DataTables\AdminDataTable;
use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDataTable  $admin)
    {
        return $admin->render('admin.admins.index',['title'=>'Admin Controller']);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.admins.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
     $data = $this->validate(request(),[
         'name'=>'required|min:4',
         'email'=>'required|email|unique:admins',
         'password'=>'required|numeric|min:6'
     ]);
     $data['remember_token'] = $request->_token;
     $data['password'] = bcrypt(request('password'));
     Admin::create($data);
     session()->flash('success',trans("admin.add_been_admin") . request('name'));
     return redirect(aurl("admin"));
    /* $data =  \Validator::make($request->all(), [
        'name'=>'required',
        'email'=>'required',
        'password'=>'required'
    ])->validate();*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      $data =   Admin::find($id);
 return view('admin.admins.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       // $data =   Admin::find($id);
        $data = $this->validate(request(),[
            'name'=>'required|min:4',
            'email'=>'required|email|unique:admins,email,' .$id,
            'password'=>'sometimes|nullable|min:6'
        ]);
        
      //  $dataadmin =   Admin::find($id);
        if(request()->has("password")){
            $data['password'] = bcrypt(request('password'));
        //    $dataadmin->password = $data["password"];
        }
      
       
      /*  $dataadmin->name = $data["name"];
        $dataadmin->email = $data["email"];
        
        $dataadmin->save();
        or */
        Admin::find($id)->update($data);
        session()->flash('success',trans("admin.edit_been_admin"));
        return redirect(aurl("admin"));
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Admin::find($id)->delete();
        session()->flash('delete',trans("admin.delete_been_admin"));
        return back();
    }

    public function multidelete(){
        if(is_array(request("item"))){
            Admin::destroy(request("item"));
        }else{
            Admin::find(request("item"))->delete();
        }
     
     session()->flash('delete',trans("admin.delete_been_admin"));
        return back() ;
    }
}
