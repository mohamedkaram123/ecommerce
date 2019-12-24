<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\Controller;
use App\DataTables\MallDataTable;
use App\Mall;
use Illuminate\Http\Request;

class MallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MallDataTable  $mall)
    {
        return $mall->render('admin.mall.index');
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
        return view("admin.mall.create");
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
         'name_ar'=>'required',
         'name_en'=>'required',
         'country_id'=>'required',
         'mobile'=>'required|numeric',
         'email'=>'required|email',
         'adress'=>'sometimes|nullable',
         'facebook'=>'sometimes|nullable',
         'twitter'=>'sometimes|nullable',
         'website'=>'sometimes|nullable',
         'contact_name'=>'sometimes|nullable|string',
         'lat'=>'sometimes|nullable',
         'lng'=>'sometimes|nullable',
         'logo'=>v_img(),
     ]);
     if(request()->hasFile("logo")){
      
        $data['logo'] = up()->upload([
          //  'new_name'=>null,
            'file'=>'logo',
            'upload_type'=>'single',
            'path'=>'manufact',
           // 'delete_file'=>setting()->logo
        ]);
     
  
 }
    
 Mall::create($data);
     session()->flash('success',trans("admin.add_been_admin") . request('name'));
     return redirect(aurl("mall"));
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
      $data =   Mall::find($id);
 return view('admin.mall.edit',['data'=>$data]);
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
            'name_ar'=>'required',
            'name_en'=>'required',
            'country_id'=>'required',
            'mobile'=>'required|numeric',
            'email'=>'required|email',
            'adress'=>'sometimes|nullable',
            'facebook'=>'sometimes|nullable',
            'twitter'=>'sometimes|nullable',
            'website'=>'sometimes|nullable',
            'contact_name'=>'sometimes|nullable|string',
            'lat'=>'sometimes|nullable',
            'lng'=>'sometimes|nullable',
            'logo'=>v_img(),
        ]);
        
        if(request()->hasFile("logo")){
      
            $data['logo'] = up()->upload([
              //  'new_name'=>null,
                'file'=>'logo',
                'upload_type'=>'single',
                'path'=>'mall',
                'delete_file'=>Mall::find($id)->logo,
            ]);
         
      
     }
        
     Mall::find($id)->update($data);
        session()->flash('success',trans("admin.edit_been_admin"));
        return redirect(aurl("mall"));
     
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
        \Storage::delete( Mall::find($id)->logo);
        Mall::find($id)->delete();
        session()->flash('delete',trans("admin.delete_been_admin"));
        return back();
    }

    public function multidelete(){
        if(is_array(request("item"))){
            Mall::destroy(request("item"));
            foreach(request('item') as $id){
                $data =   Mall::find($id);
                \Storage::delete($data->logo);
                $data->delete();
            }
        }else{
            \Storage::delete( Mall::find(request("item"))->logo);
            Mall::find(request("item"))->delete();
        }
     
     session()->flash('delete',trans("admin.delete_been_admin"));
        return back() ;
    }
}
