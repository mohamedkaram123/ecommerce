@extends('admin.index')

@section('content')
@push("js")
<script type="text/javascript"> 
$(document).ready(function(){
$('#jstree').jstree({
  "core" : {
    'data' : {!! load_dep(old('department_id')) !!},
    "themes" : {
      "variant" : "large"
    }
  },
  "checkbox" : {
    "keep_selected_style" : true
  },
  "plugins" : [ "wholerow" ]
});
$('#jstree').on('changed.jstree',function(e,data){
  let i,j,r = [];
  j=data.selected.length
  for(i=0;i < j ;i++){
    r.push(data.instance.get_node(data.selected[i]).id)
  }
  $(".parent_id").val(r.join(", "));

if(r.join(", ") != ''){
  $("#dept_id").val(r.join(", "));
}

});




})
</script>

@endpush
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 ">
          <div class="col-sm-6 rightable">
              
            <h1>{{ trans("admin.addadmin") }}</h1>
          </div>
          <div class="col-sm-6 ">
        
          @foreach($errors->all() as $error) 
        
 <div class="alert alert-danger">

     <li class="list-unstyled">{{$error}}</li>

</div>
@endforeach

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
<div class="row justify-content-center">
<div class="col-4  text-{{leftable()}} ">
<div class="card">
            <div class="card-header">
              <h3 class="card-title rightable">{{ trans('admin.admincontroller') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            {!! Form::open(['route'=>'size.store',"files"=>true]) !!}
 <div class="form-group">
     {!! Form::label('name_ar',trans('admin.name_ar')) !!}
     {!! Form::text("name_ar",old('name_ar'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('name_en',trans('admin.name_en')) !!}
     {!! Form::text("name_en",old('name_en'),['class'=>'form-control']) !!}
</div>

<input type="hidden" name="department_id" id="dept_id" value="{{ old('department_id') }}">

<div style="margin-bottom:30px" id="jstree" class="rightable"></div>
<div class='clearfix'></div>
<div class="form-group">
     {!! Form::label('is_public',trans('admin.is_public')) !!}
     {!! Form::select("is_public",['yes'=>trans("admin.yes"),'no'=>trans("admin.no")],null,['class'=>'form-control']) !!}
</div>

 {!! Form::submit(trans("addadmin"),['class'=>'form-control btn btn-primary']) !!}
         
         {!! Form::close() !!}
            </div>




         
            <!-- /.card-body -->
          </div>
          </div>
          </div>
</section>
          </div>
</div>
@endsection