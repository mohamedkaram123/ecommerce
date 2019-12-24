<div class="tab-pane fade show active" id="product_info" role="tabpanel" aria-labelledby="home-tab">
  
  <div><h3>{{trans('admin.product_info')}}</h3></div>
  
 <div class="form-group">
     {!! Form::label('title',trans('admin.product_title')) !!}
     {!! Form::text("title",$data->title,['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('content',trans('admin.product_content')) !!}
     {!! Form::textarea("content",$data->content,['class'=>'form-control']) !!}
</div>

 </div>