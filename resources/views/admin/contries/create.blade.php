@extends('admin.index')

@section('content')

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
            {!! Form::open(['route'=>'contries.store',"files"=>true]) !!}
 <div class="form-group">
     {!! Form::label('country_name_ar',trans('admin.country_name_ar')) !!}
     {!! Form::text("country_name_ar",old('country_name_ar'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('country_name_en',trans('admin.country_name_en')) !!}
     {!! Form::text("country_name_en",old('country_name_en'),['class'=>'form-control']) !!}
</div>



<div class="form-group">
     {!! Form::label('mob',trans('admin.mob')) !!}
     {!! Form::text("mob",old('mob'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('code',trans('admin.code')) !!}
     {!! Form::text("code",old('code'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('currancy',trans('admin.currancy')) !!}
     {!! Form::text("currancy",old('currancy'),['class'=>'form-control']) !!}
</div>


            
<div class="form-group">
    {!! Form::label('logo',trans('admin.country_logo')) !!}
     {!! Form::file("logo",['class'=>'form-control']) !!}
 
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