<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\Controller;
use App\DataTables\StateDataTable;
use App\State;
use Illuminate\Http\Request;
use App\Rules\ExistRow;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StateDataTable  $state)
    {
        return $state->render('admin.state.index');
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
       
        if(request()->ajax()){
            $c_names =   \Illuminate\Support\Facades\DB::table('cites')->where('contries_id',request('country_id'))->pluck("cites_name_ar",'id');
           
            
           $data = json_encode($c_names );
           $datas = json_decode($data);
          
       if( $datas === []  ){
        return "";
       }else{
    
        
           return    \Form::label('cites_id_name',trans('admin.cites_id_name')) .
           \Form::select("cites_id",$c_names,null,['class'=>'form-control']) ;
       }

        }
        return view("admin.state.create");
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
         'state_name_ar'=>'required',
         'state_name_en'=>'required',
         'cites_id'=>new ExistRow,
         'contries_id'=>'required',
         
         
   
     ]);

    
     state::create($data);
     session()->flash('success',trans("admin.add_been_admin") . request('name'));
     return redirect(aurl("state"));
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
      $data =   State::find($id);
 return view('admin.state.edit',['data'=>$data]);
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
            'state_name_ar'=>'required',
            'state_name_en'=>'required',
            'contries_id'=>'required',
            'cites_id'=>new ExistRow,
        ]);
        

        
        State::find($id)->update($data);
        session()->flash('success',trans("admin.edit_been_admin"));
        return redirect(aurl("state"));
     
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
       
        State::find($id)->delete();
        session()->flash('delete',trans("admin.delete_been_admin"));
        return back();
    }

    public function multidelete(){
        if(is_array(request("item"))){
            State::destroy(request("item"));
       
        }else{
           
            State::find(request("item"))->delete();
        }
     
     session()->flash('delete',trans("admin.delete_been_admin"));
        return back() ;
    }
}
