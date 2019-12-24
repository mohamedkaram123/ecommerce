@extends('admin.index')

@section('content')

<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 rightable">
            <h1>{{ trans("admin.dataTablesstate") }}</h1>
            @if(session("success"))
            <h2 class="alert alert-success">{{ session("success") }}</h2>
            @endif
            @if(session("delete"))
            <h2 class="alert alert-danger">{{ session("delete") }}</h2>
            @endif
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-{{rightable()}}">
              <li class="breadcrumb-item"><a href="#">{{ trans("admin.home") }}</a></li>
              <li class="breadcrumb-item active">{{ trans("admin.datatable") }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
<div class="row">
<div class="col-12">
<div class="card">
            <div class="card-header">
              <h3 class="card-title rightable">{{ trans('admin.statecontroller') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             {!! Form::open(['id'=>'form_data','url'=>aurl('state/destroy/all'),"method"=>"delete"]) !!}
    
              {!! $dataTable->table(['class'=> 'dataTable  table-responsive table content table-striped table-bordered  table-hover col-10'],true) !!}
               {!! Form::close() !!}
            </div>
            <!-- /.card-body -->
          </div>
          </div>
          </div>
</section>
          </div>


          <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center" >{{ trans('admin.delete') }}</h4>
      </div>
      <div class="modal-body">
       <div class="alert alert-danger">
       <h1 class="massge1">{{ trans('admin.please_check_some_records') }}</h1>
         <h1 class="massge2">{{ trans('admin.ask_delete_item') }} <span class="record_count" >5</span></h1>
       </diV>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
        <input type="submit" name="del_all" value="{{ trans('admin.delete') }}" class="btn btn-danger del_all del" /> 
      </div>
    </div>

  </div>
</div>

          <script src="{{ url('desighn/AdminPanelDesighn/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
          <script>
          $(document).ready(function(){
          
           $(".checkall").click(function(){
            $('.box').each(function(){
               if($('.checkall:checked').length == 0){
                $(this).prop('checked',false);
               }else{
                $(this).prop('checked',true);
               } }) })

             
       
               $(document).on('click',".del_all",function(){
           $("#form_data").submit();
             })



             $(document).on('click',".delBtn",function(){
              if($('.checkall:checked').length == 0 && $('.box:checked').length == 0){
             $(".massge1").css("display","block");
             $(".massge2").css("display","none");
             $(".del").css("display","none");
              }else if($('.checkall:checked').length > 0 && $('.box:checked').length > 0 || $('.box:checked').length > 0){
                $(".massge1").css("display","none");
                $(".massge2").css("display","block");
                $(".del").css("display","block");
                $(".record_count").text($('.box:checked').length);
              }
              
              $("#myModal").modal('show');
             })


                   $(document).on('click',".deletebtn",function(){
        
              
              $("#mod").modal('show');
             })

             

          })
          </script>
             @push('js')
          {!! $dataTable->scripts() !!}
          @endpush
@endsection