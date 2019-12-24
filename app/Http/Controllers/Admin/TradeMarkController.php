<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\Controller;
use App\DataTables\TradeMarkDataTable;
use App\TradeMark;
use Illuminate\Http\Request;

class TradeMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TradeMarkDataTable  $trademark)
    {
        return $trademark->render('admin.trademark.index');
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
        return view("admin.trademark.create");
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
         'logo'=>v_img(),
     ]);
     if(request()->hasFile("logo")){
      
        $data['logo'] = up()->upload([
          //  'new_name'=>null,
            'file'=>'logo',
            'upload_type'=>'single',
            'path'=>'trademark',
           // 'delete_file'=>setting()->logo
        ]);
     
  
 }
    
 TradeMark::create($data);
     session()->flash('success',trans("admin.add_been_admin") . request('name'));
     return redirect(aurl("trademark"));
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
      $data =   TradeMark::find($id);
 return view('admin.trademark.edit',['data'=>$data]);
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
            'logo'=>v_img(),
        ]);
        
        if(request()->hasFile("logo")){
      
            $data['logo'] = up()->upload([
              //  'new_name'=>null,
                'file'=>'logo',
                'upload_type'=>'single',
                'path'=>'trademark',
                'delete_file'=>TradeMark::find($id)->logo,
            ]);
         
      
     }
        
     TradeMark::find($id)->update($data);
        session()->flash('success',trans("admin.edit_been_admin"));
        return redirect(aurl("contries"));
     
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
        \Storage::delete( TradeMark::find($id)->logo);
        TradeMark::find($id)->delete();
        session()->flash('delete',trans("admin.delete_been_admin"));
        return back();
    }

    public function multidelete(){
        if(is_array(request("item"))){
            TradeMark::destroy(request("item"));
            foreach(request('item') as $id){
                $data =   TradeMark::find($id);
                \Storage::delete($data->logo);
                $data->delete();
            }
        }else{
            \Storage::delete( TradeMark::find(request("item"))->logo);
            TradeMark::find(request("item"))->delete();
        }
     
     session()->flash('delete',trans("admin.delete_been_admin"));
        return back() ;
    }
}
