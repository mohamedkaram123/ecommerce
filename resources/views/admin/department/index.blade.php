@extends('admin.index')

@section('content')
@push("js")
<script type="text/javascript"> 
$(document).ready(function(){



             
       
               $(document).on('click',".del_all",function(){
           $("#parent_id").submit();
           
             })



             $(document).on('click',".delBtn",function(){
             if($('.jstree-anchor').hasClass('jstree-clicked')){
            
             $(".massge1").css("display","none");
             $(".massge2").css("display","block");
             $(".record_count").text($('.jstree-clicked').length);
             console.log($('.jstree-clicked').length)
   //  let editBtn =   `<a class="btn btn-success" id="edit_btn" />`;

              }else if($('.jstree-anchor:checked').length === 0 ){
            
             $(".massge1").css("display","block");
             $(".massge2").css("display","none");

              }

              
              $("#myModal").modal('show');
             })


                   $(document).on('click',".deletebtn",function(){
        
              
              $("#mod").modal('show');
             })

             
  $('#jstree').jstree({
  "core" : {
    'data' : {!! load_dep(old()) !!},
    "themes" : {
      "variant" : "large"
    }
  },
  "checkbox" : {
    "keep_selected_style" : true
  },
  "plugins" : [ "wholerow" ]
});
$('#jstree').on('changed.jstree',function(e,data){
  let i,j,r = [];
  j=data.selected.length
  for(i=0;i < j ;i++){
    r.push(data.instance.get_node(data.selected[i]).id)
  }
  $(".parent_id").val(r.join(", "));
  console.log(r);
if(r.join(", ") != ''){
  $(".showbtn_control").removeClass('d-none');
  $(".edit_btn").attr('href',"{{ aurl('/')}}"+'/department/'+r+'/edit')
}else{
  $(".showbtn_control").addClass('d-none');

}

});




})
</script>

@endpush
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 rightable">
            <h1>{{ trans("admin.dataTablesdepartment") }}</h1>
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
              <h3 class="card-title rightable">{{ trans('admin.departmentcontroller') }}</h3>
            </div>
           
            <!-- /.card-header -->
            <div class="card-body">
            <a class="btn btn-success edit_btn showbtn_control d-none  rightable" id="edit_btn" >Edit</a>
            <a class="btn btn-danger  showbtn_control d-none  rightable  delBtn" id="delete_btn" ><i class="fa fa-trash" >{{trans("admin.delete")}}</i></a>
            <br class="showbtn_control d-none" />
            <br class="showbtn_control d-none"/>
           
            <div id="jstree" class="rightable"></div>
            
            {!! Form::open(['id'=>'parent_id','url'=>aurl('department/destroy/all'),"method"=>"delete"]) !!}

            <input type="hidden" name="parent" class="parent_id" value="">
            {!! Form::close() !!}
            </div>
            <!-- /.card-body -->
          </div>
          </div>
          </div>

</section>
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
          </div>

@endsection