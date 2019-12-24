<?php

namespace App\Http\Controllers;

use \App\File;
use Illuminate\Http\Request;

/*
       'name',
       'size',
       'file',
       'path',
       'full_file',
       'mime_type',
       'file_type',
       'relation_id',
       $request,$path,$upload_type = 'single',$delete_file,$new_name = null,$crud_type=[]
*/

class Upload extends Controller
{


    public function delete($id){

        $file =File::find($id);
        if(!empty($file)){
            $pathfile =   $file->full_file;
            \Storage::delete($pathfile);
            File::find($id)->delete();
        }
 
   
    }

    public  function upload($data=[]){
        if(array_key_exists('new_name',$data)){
            $data['new_name'] = $data['new_name'] === null?rand():$data['new_name'];
        }else{
            if(request()->hasFile($data['file']) && $data['upload_type'] == 'single'){
                array_key_exists('delete_file',$data)   && \Storage::has($data['delete_file'])?\Storage::delete($data['delete_file']):'';
                           return  request()->file($data['file'])->store($data['path']);
                
                        } else if(request()->hasFile($data['file']) && $data['upload_type'] == 'files'){
                          
                          
                            $file =  request()->file($data['file']);
                         $size = $file->getSize();
                         $mime_type= $file->getMimeType();
                         $name = $file->getClientOriginalName();
                         $hashname = $file->hashName();
                         $file->store($data['path']);
                                 $add = File::create([
                                    'name'=>$name,
                                    'size' =>$size,
                                    'file'=>$hashname   ,
                                    'path'=>$data['path'],
                                    'full_file'=>$data['path']."/" . $hashname,
                                    'mime_type'=>$mime_type,
                                    'file_type'=>$data['file_type'],
                                    'relation_id'=>$data['relation_id'],
                                 ]);

                                 return $add->id;
                                    }
        }
       



    
}


}