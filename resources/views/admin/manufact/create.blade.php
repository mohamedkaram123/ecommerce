@extends('admin.index')

@section('content')

@push('js')

<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    <script src="{{ url('/') }}/desighn/style/js/locationpicker.jquery.js"></script>
    <script type="text/javascript" >
      $('#us1').locationpicker({
                        location: {
                            latitude: 46.15242437752303,
                            longitude: 2.7470703125
                        },
                        radius: 300,
                        markerIcon: 'http://www.iconsdb.com/icons/preview/tropical-blue/map-marker-2-xl.png',
                        inputBinding: {
        latitudeInput: $('#lat'),
        longitudeInput: $('#lng'),
     //   radiusInput: $('#us2-radius'),
       // locationNameInput: $('#us2-address')
    }
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
<div class="col-6  text-{{leftable()}} ">
<div class="card">
            <div class="card-header">
              <h3 class="card-title rightable">{{ trans('admin.admincontroller') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            {!! Form::open(['route'=>'manufact.store',"files"=>true]) !!}
 <div class="form-group">
     {!! Form::label('name_ar',trans('admin.name_ar')) !!}
     {!! Form::text("name_ar",old('name_ar'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('name_en',trans('admin.name_en')) !!}
     {!! Form::text("name_en",old('name_en'),['class'=>'form-control']) !!}
</div>



<div class="form-group">
     {!! Form::label('mobile',trans('admin.mobile')) !!}
     {!! Form::text("mobile",old('mobile'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
<div id="us1" style="width: 600px; height: 600px;"></div>

</div>


<div class="form-group">
     {!! Form::label('email',trans('admin.email')) !!}
     {!! Form::email("email",old('email'),['class'=>'form-control']) !!}
</div>



<div class="form-group">
     {!! Form::label('facebook',trans('admin.facebook')) !!}
     {!! Form::text("facebook",old('facebook'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('twitter',trans('admin.twitter')) !!}
     {!! Form::text("twitter",old('twitter'),['class'=>'form-control']) !!}
</div>
<div class="form-group">
     {!! Form::label('website',trans('admin.website')) !!}
     {!! Form::text("website",old('website'),['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('contact_name',trans('admin.contact_name')) !!}
     {!! Form::text("contact_name",old('contact_name'),['class'=>'form-control']) !!}
</div>


            
<div class="form-group">
     {!! Form::label('adress',trans('admin.adress')) !!}
     {!! Form::text("adress",old('adress'),['class'=>'form-control']) !!}
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