<?php



if(! function_exists('parentAndSiblingsDept')){
function parentAndSiblingsDept($id,$type = null){
    $parentId = [];
  $parent = [];

  $int = 1;
  $parent[0] = \App\Department::find($id)->parent;
  if(!empty($parent[0])){ 
  array_push($parentId,$parent[0]);

  

     
    for ($i=0;  ; $i++) { 

        $parent[$i +1] = \App\Department::find($parent[$i])->parent;
      array_push($parentId,$parent[$i +1]);
      if (in_array(null, $parentId)) {
    break;
}
    
    }


    $allSiblings = \App\Department::where('parent',$parent[0])->where('id','!=',$id)->get();
  
  


  $allSiblingss = [];
   
for ($i=0; $i < count($allSiblings) ; $i++) { 

array_push($allSiblingss,$allSiblings[$i]->id);

}

    
if($type == null){
    $parentsallandsiblings =
    [
    'firstParent'=>$parent[0],
     'allParents' => $parentId,
     'siblings' => $allSiblingss,
    ];

    return $parentsallandsiblings;
}else if($type == 'allParents'){
    return $parentId;
}else if($type == 'firstParent'){
    return $parent[0];
}else if($type == 'siblings'){
    return $allSiblingss;
}






}else{
return 'no parent';
}


}};





if(! function_exists('aurl')){
    function aurl($url = null){
return url('admin/' . $url);
    }};
    
    if(! function_exists('admin')){
        function admin(){
    return auth()->guard('admin');
        }
    }


    if(! function_exists('setting')){
        function setting(){
    return \App\Setting::orderBy('id','desc')->first();
        }
    }

    if(! function_exists('up')){
        function up(){
    return new \App\Http\Controllers\Upload;
        }
    }

    
    if(! function_exists('load_dep')){
        function load_dep($select = null ,$dep_id = null){


if($dep_id != null){
    $departments =  \App\Department::whereNull('parent')->orWhere('parent','!=',$dep_id)->selectRaw('dep_name_' . session('lang') .' as text')
    ->selectRaw('id as id')
    ->selectRaw('parent as parent')
    ->get("id",'parent','text');
   
}else{
    $departments =  \App\Department::selectRaw('dep_name_' . session('lang') .' as text')
    ->selectRaw('id as id')
    ->selectRaw('parent as parent')
    ->get("id",'parent','text');    
}


     $dep_arr  = [];
     foreach ($departments as $department) {
            $list_arr = [];
            $list_arr['icon'] = '';
            $list_arr['li_attr'] = '';
            $list_arr['a_attr'] = '';
            $list_arr['children'] = [];
            
            if($dep_id != null && $dep_id == $department->id ){
                $list_arr['state'] = [
                    'opened'=>false,
                    'selected'=>false,
                    
                    'disabled'=>true,
                ];
            }
            if($select != null && $select == $department->id ){ 
            $list_arr['state'] = [
            'opened'=>true,
            'selected'=>true,
            
            'disabled'=>false,
          ];
        }
    

      
      $list_arr['id'] =  $department->id;
      $list_arr['parent'] =  $department->parent !== null ?$department->parent:'#';
      $list_arr['text'] = $department->text;
      array_push($dep_arr,$list_arr);
     }
     return json_encode($dep_arr,JSON_UNESCAPED_UNICODE);

        }
    }

    if(! function_exists('lang')){
        function lang(){
    if(session()->has('lang')){
        return session('lang');
    }else if(!empty( setting()->main_lang)){
      
        return setting()->main_lang;

    }else{
        return 'en';
    }
        }
    }

    
    if(! function_exists('direction')){
        function direction(){
    if(session()->has('lang')){
        if(session('lang') == 'ar'){
            return 'rtl';
        }else{
            return 'ltr';
        }
     
    }else{
        return "ltr";
    }

  
        }
    }


    if(! function_exists('rightable')){
       function rightable(){
        if(session()->has('lang')){
            if(session('lang') == 'ar'){
                return 'left';
            }else{
                return 'right';
            }
         
        }else{
            return "right";
        }
       }


    }

    if(! function_exists('leftable')){
        function leftable(){
         if(session()->has('lang')){
             if(session('lang') == 'ar'){
                 return 'right';
             }else{
                 return 'left';
             }
          
         }else{
             return "left";
         }
        }
 
 
     }

     if(! function_exists('departopt')){
        function departopt($id){
       
$dept = \App\Department::where("parent",$id)->first();


    return $dept;


        }
 
 
     }



   

     if(! function_exists('country_id')){
        function country_id($id = null){
            if($id === null){
                if(session("lang") == 'ar'){
                    $c_names =   \Illuminate\Support\Facades\DB::table('contries')->pluck("country_name_ar",'id');
                   
                    return  $c_names;
                    
                  }else{
                    $c_names =   \Illuminate\Support\Facades\DB::table('contries')->pluck("country_name_en",'id');
                   
                    return  $c_names;
                  }
            }else{ 
            if(session("lang") == 'ar'){
              return  \App\Cites::find($id)->addbycontries->country_name_ar;
            }else{
             return  \App\Cites::find($id)->addbycontries->country_name_en;
            }
        }
            
        }
 
 
     }

     if(! function_exists('user_name')){
        function user_name($id = null){
            if($id === null){
               
                    $c_names =   \Illuminate\Support\Facades\DB::table('users')->pluck("name",'id');
                   
                    return  $c_names;
            }
            else{
                return  \App\Shipping::find($id)->addbyusername->name;
            }
        }
    }


    if(! function_exists('department_id')){
        function department_id($id = null){
            if($id === null){
                if(session("lang") == 'ar'){
                    $departments =   \Illuminate\Support\Facades\DB::table('departments')->pluck("dep_name_ar",'id');
                   
                    return  $departments;
                  }else{
                    $departments =   \Illuminate\Support\Facades\DB::table('departments')->pluck("dep_name_en",'id');
                   
                    return  $departments;
                  }
                   
            }
            else{

                if(session("lang") == 'ar'){
                    return  \App\Size::find($id)->departname->dep_name_ar;

                }else{
                    return  \App\Size::find($id)->departname->dep_name_en;

                }
            }
        }
    }



    if(! function_exists('relations_product')){
        function relations_product($relation_type){
               if($relation_type == 'size'){
           
                    $size =   \Illuminate\Support\Facades\DB::table('size')->pluck("name_".session('lang'),'id');
                        
                    return  $size;
                 
                    
               }else  if($relation_type == 'weight'){
               
                $size =   \Illuminate\Support\Facades\DB::table('weight')->pluck("name_".session('lang'),'id');
                    
                return  $size;
             
               
           }else  if($relation_type == 'color'){
               
            $size =   \Illuminate\Support\Facades\DB::table('color')->pluck("name_".session('lang'),'id');
                
            return  $size;
         
           
       }else  if($relation_type == 'trademark'){
               
        $size =   \Illuminate\Support\Facades\DB::table('trademark')->pluck("name_".session('lang'),'id');
            
        return  $size;
     
       
   }else  if($relation_type == 'manufact'){
               
    $size =   \Illuminate\Support\Facades\DB::table('manufact')->pluck("name_".session('lang'),'id');
        
    return  $size;
 
   
}else  if($relation_type == 'country'){
               
    $size =   \Illuminate\Support\Facades\DB::table('contries')->pluck("country_name_".session('lang'),'id');
        
    return  $size;
 
   
}
  



        }}
     
     if(! function_exists('cites_id')){
        function cites_id($id = null){
            if($id === null){
                if(session("lang") == 'ar'){
                    $c_names =   \Illuminate\Support\Facades\DB::table('cites')->pluck("cites_name_ar",'id');
                   
                    return  $c_names;
                    
                  }else{
                    $c_names =   \Illuminate\Support\Facades\DB::table('cites')->pluck("cites_name_en",'id');
                   
                    return  $c_names;
                  }
            }else{ 
            if(session("lang") == 'ar'){
              return  \App\State::find($id)->addbycites->cites_name_ar;
            }else{
             return  \App\State::find($id)->addbycites->cites_name_en;
            }
        }
            
        }
 
 
     }


     if(! function_exists('datatable_lang')){
        function datatable_lang(){
   
            return [
                "sProcessing"=> trans('admin.sProcessing'),
              "sentries"=> trans('admin.entries'),
                "sZeroRecords"=> trans('admin.sZeroRecords'),
                "sEmptyTable"=> trans('admin.sEmptyTable'),
                "sInfo"=> trans('admin.sInfo'),
                "sInfoEmpty"=> trans('admin.sInfoEmpty'),
                "sInfoPostFix"=> trans('admin.sInfoPostFix'),
                "sSearch"=> trans('admin.sSearch'),
                "sUrl"=> trans('admin.sUrl'),
                "sInfoThousands"=> trans('admin.sInfoThousands'),
                "sLoadingRecords"=> trans('admin.sLoadingRecords'),
                "oPaginate"=> [ 
                    "sFirst"=> trans('admin.sFirst'),
                    "sLast"=> trans('admin.sLast'),
                    "sNext"=> trans('admin.sNext'),
                    "sPrevious"=> trans('admin.sPrevious')
                ],
                "oAria"=> [ 
                    "sSortAscending"=> trans('admin.sSortAscending'),
                    "sSortDescending"=> trans('admin.sSortDescending')
                ]
            ];
        }
    }


    /// helper function validate ////
    if(! function_exists('v_img')){
        function v_img($ext = null){
          if($ext == null){
              return 'image|mimes:jpg,jpeg,png,gif,bmp';
          }else{
             return 'image|mimes:' . $ext;
          }

        }}


    /// helper function validate ////
 
 
     