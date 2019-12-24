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
            {!! Form::open(['route'=>["manufact.update",$data->id],"method"=>"PUT",'files'=>true]) !!}
 <div class="form-group">
     {!! Form::label('name_ar',trans('admin.name_ar')) !!}
     {!! Form::text("name_ar",$data->name_ar,['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('name_en',trans('admin.name_en')) !!}
     {!! Form::text("name_en",$data->name_en,['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('mobile',trans('admin.mobile')) !!}
     {!! Form::text("mobile",$data->mobile,['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('email',trans('admin.email')) !!}
     {!! Form::email("email",$data->email,['class'=>'form-control']) !!}
</div>
<div class="form-group">
     {!! Form::label('facebook',trans('admin.facebook')) !!}
     {!! Form::text("facebook",$data->facebook,['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('twitter',trans('admin.twitter')) !!}
     {!! Form::text("twitter",$data->twitter,['class'=>'form-control']) !!}
</div>
<div class="form-group">
     {!! Form::label('website',trans('admin.website')) !!}
     {!! Form::text("website",$data->website,['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('contact_name',trans('admin.contact_name')) !!}
     {!! Form::text("contact_name",$data->contact_name,['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('adress',trans('admin.adress')) !!}
     {!! Form::text("adress",$data->adress,['class'=>'form-control']) !!}
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