<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\Controller;
use App\DataTables\ContriesDataTable;
use App\Contries;
use Illuminate\Http\Request;

class ContriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContriesDataTable  $contries)
    {
        return $contries->render('admin.contries.index',['title'=>'Admin Controller']);
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
        return view("admin.contries.create");
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
         'country_name_ar'=>'required',
         'country_name_en'=>'required',
         'mob'=>'required',
         'code'=>'required',
         'logo'=>"required|image"
     ]);
     if(request()->hasFile("logo")){
      
        $data['logo'] = up()->upload([
          //  'new_name'=>null,
            'file'=>'logo',
            'upload_type'=>'single',
            'path'=>'contries',
           // 'delete_file'=>setting()->logo
        ]);
     
  
 }
    
     Contries::create($data);
     session()->flash('success',trans("admin.add_been_admin") . request('name'));
     return redirect(aurl("contries"));
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
      $data =   Contries::find($id);
 return view('admin.contries.edit',['data'=>$data]);
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
            'country_name_ar'=>'required',
            'country_name_en'=>'required',
            'mob'=>'required',
            'code'=>'required',
            'logo'=>"required|image"
        ]);
        
        if(request()->hasFile("logo")){
      
            $data['logo'] = up()->upload([
              //  'new_name'=>null,
                'file'=>'logo',
                'upload_type'=>'single',
                'path'=>'contries',
                'delete_file'=>Contries::find($id)->logo,
            ]);
         
      
     }
        
        Contries::find($id)->update($data);
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
        Contries::find($id)->delete();
       \Storage::delete( Contries::find($id)->logo);
        session()->flash('delete',trans("admin.delete_been_admin"));
        return back();
    }

    public function multidelete(){
        if(is_array(request("item"))){
            Contries::destroy(request("item"));
            foreach(request('item') as $id){
                $data =   Contries::find($id);
                \Storage::delete($data->logo);
                $data->delete();
            }
        }else{
            \Storage::delete( Contries::find(request("item"))->logo);
            Contries::find(request("item"))->delete();
        }
     
     session()->flash('delete',trans("admin.delete_been_admin"));
        return back() ;
    }
}
