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
            {!! Form::open(['route'=>["cites.update",$data->id],"method"=>"PUT",'files'=>true]) !!}
 <div class="form-group">
     {!! Form::label('cites_name_ar',trans('admin.cites_name_ar')) !!}
     {!! Form::text("cites_name_ar",$data->cites_name_ar,['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('cites_name_en',trans('admin.cites_name_en')) !!}
     {!! Form::text("cites_name_en",$data->cites_name_en,['class'=>'form-control']) !!}
</div>


<div class="form-group">
     {!! Form::label('contries_id_name',trans('admin.contries_id_name')) !!}
     {!! Form::select("contries_id",country_id(),$data->contries_id,['class'=>'form-control']) !!}
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