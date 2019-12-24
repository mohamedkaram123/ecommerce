@push('js')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js'></script>
<script type="text/javascript">
let dataSelect = [
  @foreach(App\Contries::all() as $country)
{ 
  'text':"{{  $country->{"country_name_".session("lang")} }}",

'children':[ 

@foreach($country->addbycountry()->get()  as $mall)
{ 
  "id":'{{ $mall->id }}',
  "text":"{{ $mall->{'name_'.session('lang')} }}",
    "selected":true


},
@endforeach

],
},
@endforeach
];

$('.select2').select2({data:dataSelect});

let sizeVal= "";
let sizeid=  $(".size_id").val();
let weightVal= "";
let weightid=  $(".size_id").val();
$(".size").keyup(function(){
  sizeVal = $(this).val();
})

$(".size_id").change(function(){
  sizeid = $(this).val();
})

$(".weights").keyup(function(){
  weightVal = $(this).val();
})

$(".weights_id").change(function(){
  weightid = $(this).val();
})
$('.save').click(function(e){

 e.preventDefault();
$.ajax({

dataType:'json',
type:'post',
  url:"{{aurl('updates/deptSizeWeight/' . $data->id)}}",
data:{
  _token:"{{ csrf_token() }}",
  sizeVal:sizeVal,
  sizeid:sizeid,
  weightVal:weightVal,
  weightid:weightid,
}
});
});
</script>
@endpush


<div class="tab-pane fade" id="size_weight" role="tabpanel" aria-labelledby="contact-tab">
  <div><h3>{{trans('admin.product_size_weight')}}</h3></div>

  <div class="clearfix" id="sizes_weights">
 
 
  @if($data->department_id != "")
  <div class="form-group col-md-6 col-12">
     {!! Form::label('size',trans('admin.size')) !!}
     {!! Form::text("size",$data->size,['class'=>'form-control size']) !!}
</div>


<div class="form-group col-md-6 col-12">
     {!! Form::label('size_id',trans('admin.size_id')) !!}
     {!! Form::select("size_id",$size,$data->size_id,['class'=>'form-control size_id']) !!}
</div>


  
<div class="form-group col-md-6 col-12">
     {!! Form::label('wight',trans('admin.wight')) !!}
     {!! Form::text("wight",$data->wight,['class'=>'form-control weights']) !!}
</div>


<div class="form-group col-md-6 col-12">
     {!! Form::label('weight_id',trans('admin.weight_id')) !!}
     {!! Form::select("weight_id",relations_product('weight'),$data->weight_id,['class'=>'form-control weights_id']) !!}
</div>

@else
<h1>{{ trans('admin.deptMessage') }}</h1>


@endif

</div>
<hr />
<div class="color_data {{ !empty($data->department_id)?'':'d-none' }} clearfix">
<div class="form-group col-md-4  col-12">
     {!! Form::label('color_id',trans('admin.color_id')) !!}
     {!! Form::select("color_id",relations_product('color'),$data->color_id,['class'=>'form-control ']) !!}
</div>

<div class="form-group col-md-4  col-12">
     {!! Form::label('trademarkt_id',trans('admin.trademarkt_id')) !!}
     {!! Form::select("trademarkt_id",relations_product('trademark'),$data->trademarkt_id,['class'=>'form-control ']) !!}
</div>


<div class="form-group col-md-4  col-12">
     {!! Form::label('manufact_id',trans('admin.manufact_id')) !!}
     {!! Form::select("manufact_id",relations_product('manufact'),$data->manufact_id,['class'=>'form-control ']) !!}
</div>

<div class="form-group col-md-4 offset-8  ">
{!! Form::label('mall',trans('admin.mall')) !!}
<select name="mall[]"  class="form-control select2" multiple='multiple' style='width:100%'>

</select>
</div>
</div>



</div>