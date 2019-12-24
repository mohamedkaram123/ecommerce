

@push('js')


<script type="text/javascript">
$('.datepicker').datepicker({
  rtl:"{{ session('lang') == 'ar'?true:false}}",
  language:'{{ session('lang') }}',
  format:'yyyy-mm-dd',
  autoClose:false,
  todayBtn:true,
  clearBtn:true
})

  $(document).on('change','.status',function () {
if($('.status').val() == 'refused'){
$(".reason").removeClass("d-none");
}else{
  $(".reason").addClass("d-none");
}
})


</script>
@endpush

<div class="tab-pane fade" id="product_setting" role="tabpanel" aria-labelledby="profile-tab">
  <div><h3>{{trans('admin.product_setting')}}</h3></div>
  <div class="form-group col-md-3 col-12">
     {!! Form::label('price',trans('admin.price_product')) !!}
     {!! Form::text("price",$data->price,['class'=>'form-control ']) !!}
</div>

<div class="form-group col-md-3 col-12">
     {!! Form::label('stock',trans('admin.stock')) !!}
     {!! Form::text("stock",$data->stock,['class'=>'form-control ']) !!}
</div>


<div class="form-group col-md-3 col-12">
     {!! Form::label('start_at',trans('admin.start_at')) !!}
     {!! Form::text("start_at",$data->start_at,['class'=>'form-control datepicker']) !!}
</div>

<div class="form-group  col-md-3 col-12">
     {!! Form::label('end_at',trans('admin.end_at')) !!}
     {!! Form::text("end_at",$data->end_at,['class'=>'form-control datepicker ']) !!}
</div>

<div class="clearfix"></div>

<div class="form-group col-md-4 col-12">
     {!! Form::label('price_offer',trans('admin.price_offer')) !!}
     {!! Form::text("price_offer",$data->price_offer,['class'=>'form-control']) !!}
</div>


<div class="form-group col-md-4 col-12">
     {!! Form::label('start_offer_at',trans('admin.start_offer_at')) !!}
     {!! Form::text("start_offer_at",$data->start_offer_at,['class'=>'form-control datepicker']) !!}
</div>

<div class="form-group col-md-4 col-12">
     {!! Form::label('end_offer_at',trans('admin.end_offer_at')) !!}
     {!! Form::text("end_offer_at",$data->end_offer_at,['class'=>'form-control datepicker']) !!}
</div>

<div class="clearfix"></div>


<div class="form-group ">
     {!! Form::label('status',trans('admin.status')) !!}
     {!! Form::select("status",['active'=>'active','pending'=>'pending','refused'=>'refused'],$data->status,['class'=>'form-control status']) !!}
</div>

<div class="form-group reason  d-none">
     {!! Form::label('reason',trans('admin.reason')) !!}
     {!! Form::textarea("reason",$data->reason,['class'=>'form-control ']) !!}
</div>

 </div>