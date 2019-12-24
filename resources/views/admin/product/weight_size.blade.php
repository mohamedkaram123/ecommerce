
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
