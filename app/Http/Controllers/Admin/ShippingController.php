<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\Controller;
use App\DataTables\ShippingDataTable;
use App\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShippingDataTable  $shipping)
    {
        return $shipping->render('admin.shipping.index');
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
        return view("admin.shipping.create");
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
         'user_id'=>'required|numeric',
         'adress'=>'sometimes|nullable',
         'lat'=>'sometimes|nullable',
         'lng'=>'sometimes|nullable',
         'logo'=>v_img(),
     ]);

     
     if(request()->hasFile("logo")){
      
        $data['logo'] = up()->upload([
          //  'new_name'=>null,
            'file'=>'logo',
            'upload_type'=>'single',
            'path'=>'shipping',
           // 'delete_file'=>setting()->logo
        ]);
     
  
 }
    

 Shipping::create($data);
     session()->flash('success',trans("admin.add_been_admin") . request('name'));
 
     return redirect(aurl("shipping"));
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
      $data =   Shipping::find($id);
 return view('admin.shipping.edit',['data'=>$data]);
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
            'user_id'=>'required|numeric',
            'lat'=>'sometimes|nullable',
            'lng'=>'sometimes|nullable',
            'logo'=>v_img(),
        ]);
        
        if(request()->hasFile("logo")){
      
            $data['logo'] = up()->upload([
              //  'new_name'=>null,
                'file'=>'logo',
                'upload_type'=>'single',
                'path'=>'shipping',
                'delete_file'=>Shipping::find($id)->logo,
            ]);
         
      
     }
        
     Shipping::find($id)->update($data);
        session()->flash('success',trans("admin.edit_been_admin"));
        return redirect(aurl("shipping"));
     
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
        \Storage::delete( Shipping::find($id)->logo);
        Shipping::find($id)->delete();
        session()->flash('delete',trans("admin.delete_been_admin"));
        return back();
    }

    public function multidelete(){
        if(is_array(request("item"))){
            Shipping::destroy(request("item"));
            foreach(request('item') as $id){
                $data =   Shipping::find($id);
                \Storage::delete($data->logo);
                $data->delete();
            }
        }else{
            \Storage::delete( Shipping::find(request("item"))->logo);
            Shipping::find(request("item"))->delete();
        }
     
     session()->flash('delete',trans("admin.delete_been_admin"));
        return back() ;
    }
}
