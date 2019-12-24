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
            {!! Form::open(['route'=>'color.store',"files"=>true]) !!}
 <div class="form-group">
     {!! Form::label('name_ar',trans('admin.name_ar')) !!}
     {!! Form::text("name_ar",old('name_ar'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('name_en',trans('admin.name_en')) !!}
     {!! Form::text("name_en",old('name_en'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('color',trans('admin.color')) !!}
     {!! Form::color("color",old('color'),['class'=>'form-control']) !!}
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