@push('js')
<script type="text/javascript">

let x = 1;
$(document).on('click','.input_add',function(e){
e.preventDefault();
let max_input = 10;

if( x < max_input){
  x++;
  $(".input_div").append( "<div class='remove'>"+
    "<div class='form-group col-md-6  col-12'>" +
     '{!! Form::label('input_key',trans('admin.input_key')) !!}' +
    '{!! Form::text("input_key[]","",["class"=>"form-control "]) !!}'+
'</div>'+

  '<div class="form-group col-md-6  col-12">'+
     '{!! Form::label("input_value",trans("admin.input_value")) !!}'+
     '{!! Form::text("input_value[]","",["class"=>"form-control "]) !!}'+
'</div>'+
"<a href='#' class='input_remove btn btn-danger  col-3 offset-9' style='margin-bottom:30px'><i class='fa fa-trash'></i> delete</a>"+
"</div>"+
"</div>");
};
}) 

$(document).on('click','.input_remove',function(e){
  e.preventDefault();
  
  console.log($(this).parent());
  $(this).parent().remove();
  x--;
})
</script>

@endpush

<div class="tab-pane fade" id="other_data" role="tabpanel" aria-labelledby="contact-tab">
  <div><h3>{{trans('admin.other_data')}}</h3></div>
<div class="container">


@foreach($data->other_data()->get() as $otherdat)
<div class="row">

  <div class="form-group col-md-6  col-12">
     {!! Form::label('input_key',trans('admin.input_key')) !!}
     {!! Form::text("input_key[]",$otherdat->data_key,['class'=>'form-control ']) !!}
</div>

  <div class="form-group col-md-6  col-12">
     {!! Form::label('input_value',trans('admin.input_value')) !!}
     {!! Form::text("input_value[]",$otherdat->data_value,['class'=>'form-control ']) !!}
</div>


<a href="#" class="input_remove btn btn-danger  col-3 offset-9 form" style="margin-bottom:30px"><i class='fa fa-trash'></i> delete</a>


</div>
@endforeach


<div class='clearfix'>
<div class=" input_div">
</div>
</div>
<div class='clearfix'>
<a href="#" class="input_add btn btn-info form"><i class='fa fa-plus'></i> Add</a>
</div>


</div>
  
</div>