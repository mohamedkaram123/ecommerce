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
            {!! Form::open(['route'=>'users.store']) !!}
 <div class="form-group">
     {!! Form::label('name',trans('admin.name')) !!}
     {!! Form::text("name",old('name'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('email',trans('admin.email')) !!}
     {!! Form::email("email",old('email'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('password',trans('admin.password')) !!}
     {!! Form::password("password",['class'=>'form-control']) !!}
</div>


            
<div class="form-group">
     {!! Form::label('level',trans('admin.level')) !!}
     {!! Form::select("level",["user"=>trans("admin.user"),"company"=>trans("admin.company"),"vendor"=>trans("admin.vendor"),old("level"),"placeholder"=>"...."],['class'=>'form-control']) !!}
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