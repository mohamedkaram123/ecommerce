@extends('admin.index')

@section('content')

@push('js')

<script type="text/javascript" >
$(document).ready(function(){

  $(document).on('change','.country',function(){
   let country_id =  $(".country").val()
   $.ajax({ 
     url:"{{aurl('state/create')}}",
     type:'get',
     dataType:'html',
     data:{country_id:country_id},
     success:function(data){
    $('.data').html(data);
     }



   })
  })
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
            {!! Form::open(['route'=>'state.store',"files"=>true]) !!}
 <div class="form-group">
     {!! Form::label('state_name_ar',trans('admin.state_name_ar')) !!}
     {!! Form::text("state_name_ar",old('state_name_ar'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('state_name_en',trans('admin.state_name_en')) !!}
     {!! Form::text("state_name_en",old('state_name_en'),['class'=>'form-control']) !!}
</div>


<div class="form-group">
     {!! Form::label('contries_id_name',trans('admin.contries_id_name')) !!}
     {!! Form::select("contries_id",country_id(),null,['class'=>'form-control country','placeholder'=>"....."]) !!}
</div>


<div class="form-group data">
    
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