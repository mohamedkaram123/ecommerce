<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\Controller;
use App\DataTables\CitesDataTable;
use App\Cites;
use Illuminate\Http\Request;

class CitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CitesDataTable  $Cites)
    {
        return $Cites->render('admin.cites.index');
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
        return view("admin.cites.create");
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
         'cites_name_ar'=>'required',
         'cites_name_en'=>'required',
         'contries_id'=>'required',
   
     ]);

    
     Cites::create($data);
     session()->flash('success',trans("admin.add_been_admin") . request('name'));
     return redirect(aurl("cites"));
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
      $data =   Cites::find($id);
 return view('admin.cites.edit',['data'=>$data]);
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
            'cites_name_ar'=>'required',
            'cites_name_en'=>'required',
            'contries_id'=>'required',
        ]);
        

        
        Cites::find($id)->update($data);
        session()->flash('success',trans("admin.edit_been_admin"));
        return redirect(aurl("cites"));
     
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
       
        Cites::find($id)->delete();
        session()->flash('delete',trans("admin.delete_been_admin"));
        return back();
    }

    public function multidelete(){
        if(is_array(request("item"))){
            Cites::destroy(request("item"));
      
        }else{
         
            Cites::find(request("item"))->delete();
        }
     
     session()->flash('delete',trans("admin.delete_been_admin"));
        return back() ;
    }
}
