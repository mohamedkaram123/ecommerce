@push('js')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js'></script>
<script type="text/javascript">

Dropzone.autoDiscover = false;
$(document).ready(function(){
  $('#dropzonefile').dropzone({
    url:"{{aurl('upload/image/'.$data->id)}}",
    paramName:'file',
    uploadMultiple:false,
    maxFiles:15,
    maxFilessize:2,
    acceptedFiles:'image/*',
dictDefaultMessage:'اسحب الملف الذي تريد رفعه واسقطه هنا',
dictRemoveFile:'{{ trans("admin.delete")}}',
    params:{
      
      _token:'{{csrf_token()}}'
    },
    addRemoveLinks:true,
    removedfile:function(file){
$.ajax({
  dataType:'json',
  type:"post",
  url:"{{aurl('delete/image')}}",
  data:{_token:'{{ csrf_token()}}',id:file.fid }
});

let fmok ;
 
 return(fmok = file.previewElement) != null?fmok.parentNode.removeChild(file.previewElement):void 0 ;

    },
    init:function(){

    
      @foreach($data->files()->get() as $file)
var mok = {name:'{{$file->name}}', fid:'{{ $file->id }}' ,size:'{{$file->size}}',type:'{{$file->mime_type}}' };
this.emit('addedfile',mok);
this.options.thumbnail.call(this,mok,'{{ url("storage/" . $file->full_file) }}');
      @endforeach

      this.on('sending',function(file,xhr,formData){
        formData.append('fid','');
        file.fid = '';
      });
      this.on('success',function(file,response){
        file.fid = response.id;
      });
    }
  });




  $('#mainphoto').dropzone({
    url:"{{aurl('update/image/'.$data->id)}}",
    paramName:'file',
    uploadMultiple:false,
    maxFiles:1,
    maxFilessize:3,
    acceptedFiles:'image/*',
dictDefaultMessage:'{{ trans("admin.main_photo") }}',
dictRemoveFile:'{{ trans("admin.delete")}}',
    params:{
      
      _token:'{{csrf_token()}}'
    },
    addRemoveLinks:true,
    removedfile:function(file){
$.ajax({
  dataType:'json',
  type:"post",
  url:"{{aurl('update/image/'.$data->id)}}",
  data:{_token:'{{ csrf_token()}}',id:file.fid,exist:"lolo" }
});

let fmok ;
 
 return(fmok = file.previewElement) != null?fmok.parentNode.removeChild(file.previewElement):void 0 ;

    },
    init:function(){

   @if(!empty($data->photo))
var mok = {name:'{{ $data->photo }}',size:'',type:'' };
this.emit('addedfile',mok);
this.options.thumbnail.call(this,mok,'{{ url("storage/" . $data->photo) }}');
@endif

      this.on('sending',function(file,xhr,formData){
        formData.append('fid','');
        file.fid = '';
      });
      this.on('success',function(file,response){
        file.fid = response.id;
      });
    }
  });
});

</script>
@endpush
  <div class="tab-pane fade" id="product_media" role="tabpanel" aria-labelledby="contact-tab">
  <div><h3>{{trans('admin.product_media')}}</h3></div>
  <hr />  
  <div class="dropzone">
  <div class="dropzone " id="mainphoto" ></div>
  <hr />
  <div class="dropzone " id="dropzonefile" ></div>
  </div>
</div>