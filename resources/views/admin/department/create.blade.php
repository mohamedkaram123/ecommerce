@extends('admin.index')

@section('content')

@push("js")
<script type="text/javascript"> 
$(document).ready(function(){
  $('#jstree').jstree({
  "core" : {
    'data' : {!! load_dep(old('parent')) !!},
    "themes" : {
      "variant" : "large"
    }
  },
  "checkbox" : {
    "keep_selected_style" : false
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
});
});
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
            {!! Form::open(['route'=>'department.store',"files"=>true]) !!}
 <div class="form-group">
     {!! Form::label('dep_name_ar',trans('admin.dep_name_ar')) !!}
     {!! Form::text("dep_name_ar",old('dep_name_ar'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('dep_name_en',trans('admin.dep_name_en')) !!}
     {!! Form::text("dep_name_en",old('dep_name_en'),['class'=>'form-control']) !!}
</div>
<div class="clearfix">
<div id="jstree" class="rightable"></div>
<input type="hidden" name="parent" class="parent_id" value="{{ old('parent') }}">

</div>

<div class="form-group">
     {!! Form::label('description',trans('admin.description')) !!}
     {!! Form::textarea("description",old('description'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('keywords',trans('admin.keywords')) !!}
     {!! Form::textarea("keywords",old('keywords'),['class'=>'form-control']) !!}
</div>

            
<div class="form-group">
    {!! Form::label('icon',trans('admin.dep_icon')) !!}
     {!! Form::file("icon",['class'=>'form-control']) !!}
 
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