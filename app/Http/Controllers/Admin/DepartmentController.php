<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\Controller;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.department.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.department.create");
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
         'dep_name_ar'=>'required',
         'dep_name_en'=>'required',
         'parent'=>'sometimes|nullable|numeric',
         'icon'=>'sometimes|nullable|' . v_img(),
         'description'=>'sometimes|nullable',
         'keywords'=>'sometimes|nullable',
         
   
     ]);

     if(request()->hasFile("icon")){
      
        $data['icon'] = up()->upload([
          //  'new_name'=>null,
            'file'=>'icon',
            'upload_type'=>'single',
            'path'=>'department',
            'delete_file'=>Department::find($id)->icon
        ]);
     
  
 }
     Department::create($data);
     session()->flash('success',trans("admin.add_been_admin") . request('name'));
     return redirect(aurl("department"));
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
      $data =   Department::find($id);
 return view('admin.department.edit',['data'=>$data]);
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
            'dep_name_ar'=>'required',
            'dep_name_en'=>'required',
            'parent'=>'sometimes|nullable|numeric',
            'icon'=>'sometimes|nullable',
            'description'=>'sometimes|nullable',
            'keywords'=>'sometimes|nullable',
            
      
        ]);
        

        if(request()->hasFile("icon")){
      
            $data['icon'] = up()->upload([
              //  'new_name'=>null,
                'file'=>'icon',
                'upload_type'=>'single',
                'path'=>'department',
               // 'delete_file'=>setting()->logo
            ]);
         
      
     }
        
        Department::find($id)->update($data);
        session()->flash('success',trans("admin.edit_been_admin"));
        return redirect(aurl("department"));
     
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
        \Storage::delete( Department::find($id)->icon);
        Department::find($id)->delete();
        session()->flash('delete',trans("admin.delete_been_admin"));
        return back();
    }

    public function multidelete(){
      //  dd(str_split(request('parent')));
    $itemms =  str_replace(', ',"",request('parent'));
       $item = str_split($itemms);
        if(is_array($item)){
            \Storage::delete($data->icon);
            Department::destroy($item);
      
        }else{
            \Storage::delete( Department::find(request("item"))->icon);

            Department::find($item)->delete();
        }
     
     session()->flash('delete',trans("admin.delete_been_admin"));
        return back() ;
    }
}
