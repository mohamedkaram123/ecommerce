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
            {!! Form::open(['route'=>["contries.update",$data->id],"method"=>"PUT",'files'=>true]) !!}
 <div class="form-group">
     {!! Form::label('country_name_ar',trans('admin.country_name_ar')) !!}
     {!! Form::text("country_name_ar",$data->country_name_ar,['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('country_name_en',trans('admin.country_name_en')) !!}
     {!! Form::text("country_name_en",$data->country_name_en,['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('mob',trans('admin.mob')) !!}
     {!! Form::text("mob",$data->mob,['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('code',trans('admin.code')) !!}
     {!! Form::text("code",$data->code,['class'=>'form-control']) !!}
</div>
<div class="form-group">
     {!! Form::label('currancy',trans('admin.currancy')) !!}
     {!! Form::text("currancy",$data->currancy,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('logo',trans('admin.logo')) !!}
     {!! Form::file("logo",['class'=>'form-control']) !!}
     @if($data->logo)
<img src="{{Storage::url($data->logo)}}" style="width:50px;height:50px;" />
     @endif
</div>


 {!! Form::submit(trans("admin.editbtn"),['class'=>'form-control btn btn-primary']) !!}
         
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