<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\Controller;
use App\DataTables\ProductDataTable;
use App\Product;
use App\Size;
use App\Department;
use App\OtherData;
use App\OtherMall;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable  $product)
    {
        return $product->render('admin.product.index');
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
  $data =     Product::create([

'title'         =>'',
/*'photo'          =>'',
'department_id'  =>'',
'trademarkt_id'  =>'',
'manufact_id'    =>'',
'mall_id'        =>'',
'color_id'       =>'',
'size_id'        =>'',
'weight_id'      =>'',
'currancy_id'    =>'',
'wight'          =>'',
'price'          =>'',
'stock'          =>'',
'other_data'     =>'',
'status'         =>'',
'reason'         =>'',
'end_at'         =>'',
'start_at'       =>'',
'end_offer_at'   =>'',
'start_offer_at' =>'',
'price_offer'  =>'',*/

        ]);


        if(!empty($data)){
            return redirect(aurl('product/' . $data->id . '/edit'));
        }
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
         'logo'=>v_img(),
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
        $data =   Product::find($id);

        if($data->department_id != "" ){
            $deptid =$data->department_id;
           
                $sizearray = Size::where('department_id',$deptid)->pluck('name_'.session('lang'));
                $sizeparent = Department::find($deptid)->parent;
         $result = $sizearray;
            
                if(!empty($sizeparent)){
                  
                   $parentsid =  parentAndSiblingsDept($deptid,'allParents');
                   $parentsname = [];
                   $str = "";
                   for ($i=0; $i < count($parentsid); $i++) { 
                       $size = Size::where('department_id',$parentsid[$i])->where('is_public','yes')->pluck('name_'.session('lang'));
                      
                       
                       array_push($parentsname, $size);
                   }

                 
          //    
           
           //  
         
           $arrs = []; 
           for ($i=0; $i < count($parentsname) ; $i++) { 
               if($parentsname[$i] != "[]"){
                   array_push($arrs, $parentsname[$i][0]);
                   
               }
           
           }
           
$result1 = json_encode($arrs);
$result2 = json_encode($sizearray);

$result3 = json_decode($result1);
$result4 = json_decode($result2);

           $result = array_merge($result3,$result4);
           $keys = [];
           $arrayresult = [];
           for ($i=0; $i < count($result) ; $i++) { 
            $id =  Size::where('name_ar',$result[$i])->first()->id;
             array_push($keys,$id);
             $arrayresult[$keys[$i]] = $result[$i];
           }

                }
                $keys = [];
                $arrayresult = [];
                for ($i=0; $i < count($result) ; $i++) { 
                 $id =  Size::where('name_ar',$result[$i])->first()->id;
                  array_push($keys,$id);
                  $arrayresult[$keys[$i]] = $result[$i];
                }
             

 
              
                return view("admin.product.product",['data'=>$data,'size'=>$arrayresult]);
        }
  
     
 
 return view("admin.product.product",['data'=>$data]);
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
            'title'=>'required',
            'content'=>'required',
           // 'photo',
            'department_id'=>'required|numeric',
            'trademarkt_id'=>'required|numeric',
            'manufact_id'=>'required|numeric',
           // 'mall_id'=>'required|numeric',
            'color_id'=>'sometimes|nullable|numeric',
            'size_id'=>'sometimes|nullable|numeric',
            'weight_id'=>'sometimes|nullable|numeric',
            'currancy_id'=>'sometimes|nullable|numeric',
            'wight'=>'sometimes|nullable',
            'size'=>'sometimes|nullable',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
          // 'other_data',
            'status'=>'sometimes|nullable|in:pending,refused,active',
            'reason'=>'sometimes|nullable|numeric',
            'end_at'=>'required|date',
            'start_at'=>'required|date',
            'end_offer_at'=>'sometimes|nullable|date',
            'start_offer_at'=>'sometimes|nullable|date',
              'price_offer'=>'sometimes|nullable|numeric',
        ]);

        
        if(request()->has('mall')){
            OtherMall::where("product_id",$id)->delete();
            foreach(request('mall') as $mall){
              OtherData::create([
                  'product_id'=>$id,
                  'mall_id'=>$mall,
                 
              ]);
         
            }
           
        }
                if(request()->has('input_value') && request()->has('input_key') ){
                    $i = 0;
                    $other_data = '';
                    OtherData::where('product_id',$id)->delete(); 
                    foreach(request('input_key') as $key){
                        $data_value = !empty(request('input_value')[$i])?request('input_value')[$i]:"";
                        OtherData::create([
                            'product_id'=>$id,
                            'data_key'=>$key,
                            'data_value'=>$data_value
                        ]);
                        $i++; 
                    }
                    $data['other_data'] = $other_data;
                }
        
        Product::find($id)->update($data);
        return response(['status'=>true,'message'=>trans("admin.edit_been_admin")],200);
   
     
    }



    
    public function multiuploads($id){
 
        
        if(request()->hasFile("file")){
      
        $fid =   up()->upload([
              //  'new_name'=>null,
                'file'=>'file',
                'upload_type'=>'files',
                'path'=>'products/' . $id,
                'file_type'=>'product',
                'relation_id'=>$id,
            ]);
         
      return response(['status'=>true,'id'=>$fid],200);
     }

    
    }



    public function updatephoto($id,Request $request){

    if(request("exist")){

        $file =Product::find($id);
        \Storage::delete($file->photo);
        $data['photo'] = "";
    }else{
    if(request()->hasFile("file")){
      
  
            $data['photo'] = up()->upload([
              //  'new_name'=>null,
                'file'=>'file',
                'upload_type'=>'single',
                'path'=>'products/mainphoto/' . $id ."/",
                //'delete_file'=>Contries::find($id)->logo,
            ]);
         
      
     }
    }
    

   
    $file =Product::find($id);
    \Storage::delete($file->photo);
    Product::find($id)->update($data);
    }

    public function imagedelete(){
       
        if(request()->has("id")){
      
          up()->delete(request('id'));
         
      
     }   }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //
        \Storage::delete( Contries::find($id)->logo);
        Contries::find($id)->delete();
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


    public function updatedeptSizeWeight($id1){
   
        if(request()->ajax() && request()->has('deptid')){
            $deptid = request('deptid');
           
                $sizearray = Size::where('department_id',$deptid)->pluck('name_'.session('lang'));
                $sizeparent = Department::find($deptid)->parent;
         $result = $sizearray;
            
                if(!empty($sizeparent)){
                  
                   $parentsid =  parentAndSiblingsDept($deptid,'allParents');
                   $parentsname = [];
                   $str = "";
                   for ($i=0; $i < count($parentsid); $i++) { 
                       $size = Size::where('department_id',$parentsid[$i])->where('is_public','yes')->pluck('name_'.session('lang'));
                      
                       
                       array_push($parentsname, $size);
                   }

                 
          //    
           
           //  
         
           $arrs = []; 
           for ($i=0; $i < count($parentsname) ; $i++) { 
               if($parentsname[$i] != "[]"){
                   array_push($arrs, $parentsname[$i][0]);
                   
               }
           
           }
           
$result1 = json_encode($arrs);
$result2 = json_encode($sizearray);

$result3 = json_decode($result1);
$result4 = json_decode($result2);

           $result = array_merge($result3,$result4);
           $keys = [];
           $arrayresult = [];
           for ($i=0; $i < count($result) ; $i++) { 
            $id =  Size::where('name_ar',$result[$i])->first()->id;
             array_push($keys,$id);
             $arrayresult[$keys[$i]] = $result[$i];
           }

                }
                $keys = [];
                $arrayresult = [];
                for ($i=0; $i < count($result) ; $i++) { 
                 $id =  Size::where('name_ar',$result[$i])->first()->id;
                  array_push($keys,$id);
                  $arrayresult[$keys[$i]] = $result[$i];
                }
             

 
             

        }
  

        
        $datas['department_id'] = request('deptid');
     
      $data =  Product::find($id1);
 
      $data->update($datas);
  
    
 
        return view('admin.product.weight_size',['size'=>$arrayresult,'data'=>$data]);
    }               

}
