@extends('admin.index')

@section('content')

<div class="row justify-content-end content-wrapper">
<div class="col-sm-12 text-{{leftable()}}">
@foreach($errors->all() as $error) 
        
        <div class="alert alert-danger">
       
            <li class="list-unstyled">{{$error}}</li>
       
       </div>
       @endforeach
</div>
<div class="offset-2 col-8 text-{{leftable()}} ">
<div class="card topic">
<div class="card-header">
    <h3 class="card-title rightable" >{{ trans("admin.settings") }}</h3>
</div>
<div class="card-body">
    {!! Form::open(['url'=>aurl('contries'),'files'=>true])!!}

    <div class="form-group">
    {!! Form::label('sitename_ar',trans('admin.sitename_ar')) !!}
     {!! Form::text("sitename_ar",setting()->sitename_ar,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('sitename_en',trans('admin.sitename_en')) !!}
     {!! Form::text("sitename_en",setting()->sitename_en,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email',trans('admin.email')) !!}
     {!! Form::email("email",setting()->email,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('logo',trans('admin.logo')) !!}
     {!! Form::file("logo",['class'=>'form-control']) !!}
     @if(setting()->logo)
<img src="{{Storage::url(setting()->logo)}}" style="width:50px;height:50px;" />
     @endif
</div>
<div class="form-group">
    {!! Form::label('icon',trans('admin.icon')) !!}
     {!! Form::file("icon",['class'=>'form-control']) !!}
     @if(setting()->icon)
<img src="{{Storage::url(setting()->icon)}}" style="width:50px;height:50px;" />
     @endif
</div>
<div class="form-group">
    {!! Form::label('description',trans('admin.description')) !!}
     {!! Form::textarea("description",setting()->description,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('keywords',trans('admin.keywords')) !!}
     {!! Form::textarea("keywords",setting()->keywords,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('main_lang',trans('admin.main_lang')) !!}
     {!! Form::select("main_lang",['ar'=>trans('admin.ar'),'en'=>trans('admin.en')],setting()->main_lang,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('status',trans('admin.status')) !!}
     {!! Form::select("status",['open'=>trans('admin.open'),'close'=>trans('admin.close')],setting()->status,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('name',trans('admin.name')) !!}
     {!! Form::textarea("name",setting()->name,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('name',trans('admin.name')) !!}
     {!! Form::text("name",setting()->name,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('message_maintenance',trans('admin.message_maintenance')) !!}
     {!! Form::textarea("message_maintenance",setting()->message_maintenance,['class'=>'form-control']) !!}
</div>
{!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}

    </div>

</div>
</div>

</div>
@endsection