@push("js")
<script type="text/javascript"> 
$(document).ready(function(){




             
  $('#jstree').jstree({
  "core" : {
    'data' : {!! load_dep($data->department_id) !!},
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


if(r.join(", ") != '' ){
  $(".dept").val(r.join(", "));
$('#sizes_weights').removeClass('d-none');

/*
let sizeval ="";
let wightval ="";
let sizeid ="";
let wightid ="";

$('.size').keyup(function(){
  sizeval = $(this).val();
 
});
$('.weights').keyup(function(){
  wightval = $(this).val();
 
});

$('.size_id').change(function(){
  sizeid = $(this).val();
 
});
$('.weights_id').change(function(){
  wightid = $(this).val();
});*/


}else{

  if($(".dept").val() == ""){
    $('#sizes_weights').addClass('d-none')
  }


}




});


$('#jstree').click(function(){

  $.ajax({

  dataType:'html',
  type:'post',
    url:"{{aurl('updates/deptSizeWeight/' . $data->id)}}",
  data:{
    _token:"{{ csrf_token() }}",
 deptid:$(".dept").val(),

  },

  success:function(data){
$("#sizes_weights").html(data);
$(".color_data").removeClass('d-none');
  }
});

});


})
</script>

@endpush

<div class="tab-pane fade" id="department" role="tabpanel" aria-labelledby="contact-tab">
  <div><h3>{{trans('admin.department')}}</h3></div>
  <div id="jstree"></div>
<input type="hidden" class="dept" value="" name="department_id" />
...</div>