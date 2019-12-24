@extends('admin.index')

@section('content')


<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-single').select2();


    i=1;

$(".nav-link").click(function(){
  i=parseInt($(this).attr("data-id"));
  i++
})


    $('.save_and_contniou').click(function(e){
console.log(i)
  //    console.log()
let nextlink = $(this).parent().children('ul').children();
//nextlink.trigger("click");



let link = "";

link = nextlink[i].children[0];
i++
//console.log(link.attr("aria-selected"));



  link.click();

if(i == 6){
  i=0;
}
console.log(link)

      
      let form_data = $("#product_form").serialize();
e.preventDefault();
$.ajax({

dataType:'json',
type:'post',
 url:"{{aurl('product/' . $data->id)}}",
data:form_data,
beforeSend:function(){
$(".loading_save_c").removeClass('d-none');
$(".error_massage").addClass('d-none');
$(".validation_message").html("");
$(".success_massage").addClass('d-none');
$(".success_massage").html("");
},
success:function(data){
  if(data.status == true){
    $(".loading_save_c").addClass('d-none');
  $(".success_massage").html("<h1>" +data.message +"</h1>").removeClass("d-none")
  }

},
error(xhr){
  $(".loading_save_c").addClass('d-none');
  
  let errors = xhr.responseJSON.errors;
  let error_li = "";
  $.each(errors,function(index,value){
    error_li += '<li>'+ value +'</li>';

  });

    $(".error_massage").removeClass('d-none');
    $(".validation_message").html(error_li);
}

});
return false;
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
<div class="col-12  text-{{leftable()}} ">
<div class="card">
            <div class="card-header">
              <h3 class="card-title rightable">{{ trans('admin.admincontroller') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            {!! Form::open(['method'=>'put',"files"=>true,'id'=>'product_form']) !!}

            <a href="#" class='btn btn-primary save'><i class="fa fa-file"></i> {{ trans('admin.save') }}</a>
            <a href="#" class='btn btn-success save_and_contniou'><i class="fa fa-floppy"></i> {{ trans('admin.save_and_contniou') }}
            <i class="fa fa-spin fa-spinner loading_save_c d-none"></i>
            </a>
            <a href="#" class='btn btn-info copy'><i class="fa fa-copy"></i> {{ trans('admin.copy') }}</a>
            <a href="#" class='btn btn-danger delete'><i class="fa fa-trash"></i> {{ trans('admin.delete') }}</a>
            <hr />
<div class="alert alert-danger error_massage d-none">
<ul class="validation_message">

</ul>
</div>

<div class="alert alert-success success_massage d-none">

</div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-id=0 id="home-tab" data-toggle="tab" href="#product_info" role="tab" aria-controls="home" aria-selected="true">{{trans('admin.product_info')}} <i class="fa fa-info"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-id=1 id="contact-tab" data-toggle="tab" href="#department" role="tab" aria-controls="contact" aria-selected="false">{{trans('admin.department')}} <i class="fa fa-list"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-id=2 id="profile-tab" data-toggle="tab" href="#product_setting" role="tab" aria-controls="profile" aria-selected="false">{{trans('admin.product_setting')}} <i class="fa fa-cog"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-id=3 id="contact-tab" data-toggle="tab" href="#product_media" role="tab" aria-controls="contact" aria-selected="false">{{trans('admin.product_media')}} <i class="fa fa-info"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-id=4 id="contact-tab" data-toggle="tab" href="#size_weight" role="tab" aria-controls="contact" aria-selected="false">{{trans('admin.product_shipping')}} <i class="fas fa-shipping-fast"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-id=5 id="contact-tab" data-toggle="tab" href="#other_data" role="tab" aria-controls="contact" aria-selected="false">{{trans('admin.other_data')}} <i class="fa fa-database"></i></a>
  </li>

</ul>
<div class="tab-content" id="myTabContent">
  
@include('admin.product.Tabs.product_info')
@include('admin.product.Tabs.department')
@include('admin.product.Tabs.product_setting')
@include('admin.product.Tabs.product_media')
@include('admin.product.Tabs.product_size_weight')
@include('admin.product.Tabs.other_data')


</div>

<hr />
<a href="#" class='btn btn-primary save'><i class="fa fa-file"></i> {{ trans('admin.save') }}</a>
            <a href="#" class='btn btn-success save_and_contniou'><i class="fa fa-floppy"></i> {{ trans('admin.save_and_contniou') }}</a>
            <a href="#" class='btn btn-info copy'><i class="fa fa-copy"></i> {{ trans('admin.copy') }}</a>
            <a href="#" class='btn btn-danger delete'><i class="fa fa-trash"></i> {{ trans('admin.delete') }}</a>




         
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