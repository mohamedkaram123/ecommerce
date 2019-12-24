

@push('js')
<script type="text/javascript">
$(document).ready(function(){

console.log($("#departments").val());
	
  $("#sidebarCollapse").click(function(){

   $(".overlay").removeClass("hidden-overlay");
   
   $(".btn-close").removeClass("d-none");
   $("body").addClass("hidden-scroll");
  })

  $(".btn-close").click(function(){
  
$(".overlay").addClass("hidden-overlay");
$("body").removeClass("hidden-scroll");
$("#sidebar").addClass("active");
$(".btn-close").addClass("d-none");
})

$(".overlay").click(function(){
  
  $(".overlay").addClass("hidden-overlay");
  $("body").removeClass("hidden-scroll");
  $("#sidebar").addClass("active");
  $(".btn-close").addClass("d-none");
  })

$(".p-4").mouseover(function(){
    $(this).children().children(".icon-item").css("color",'#fff');
	$(this).children().children(".span-li").css("color",'#fff');
	
})

$(".p-4").mouseleave(function(){
    $(this).children().children(".icon-item").css("color",'rgba(255, 255, 255, 0.6)');
    $(this).children().children(".span-li").css("color",'rgba(255, 255, 255, 0.6)');
})

$(".withli").click(function(){


let id = $(this).children("a").attr("data-target");
let id1 = $("#in").val();
	arrs.push(id1);
	
$("#in").val(id);

console.log($("#in").val())

	$.ajax({
	url:"{{ url('loadul') }}",
	dataType:'html',
	type:'post',
	data:{id:id,
	    _token:"{{ csrf_token() }}",
	},
	beforeSend:function(){
		$(".list1").addClass("trans-li");

	
	},
	success:function(data){
		$(".list1").removeClass("trans-li");
		$(".list1").addClass("trans-li2");
		$(".ullist2").html(data);
	


		
	}


});
});

let arrs = [];

$(".back1").click(function(){

	

	let id = $("#in").val();
	arrs.push(id);
	
	console.log(arrs);
	$.ajax({
	url:"{{ url('loadback') }}",
	dataType:'json',
	type:'post',
	data:{
		id:arrs,
	    _token:"{{ csrf_token() }}",
		
	},
	beforeSend:function(){
	
	},
	success:function(data){
	

		
	}


});

});

})
</script>
@endpush


<nav id="sidebar" class="active">

<a class="btn-close d-none"><i class="fa fa-times"></i></a>
	   

				<div class=>
				  <h1><a href="index.html" class="p-4 logo">Portfolic <span class="p-4">Portfolio Agency</span></a></h1>
				  <div>
<a href="#"><span class="iconback back1"><i class="fa fa-arrow-circle-left p-4"></i> BACK</span></a>
<br />
<a href="#"><span class="iconback menu1"><i class="fa fa-arrow-circle-left p-4"></i> Menu</span></a>
</div>
<hr />
	      <div class=" list1" id="rm1">
		    <ul class="list-unstyled components ullist2  mb-5">
				@foreach($departments as $key => $dept)
				@if(departopt($key) == null)
				
				<li class=" p-4 withoutli">
	            <a href="#" data-target ="{{ $key }}">   <span class='span-li' >{{$dept}}</span></a>
			  </li>
				@else
			
				<li class=" p-4 withli">
	            <a href="#" data-target ="{{ $key }}">   <span class='span-li' >{{$dept}}</span><i class="fa icon-item fa-chevron-right"></i></a>
			  </li>
				
			  
				@endif
	       
			  @endforeach
	
	        </ul>
			
	        <div class="footer p-4">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
			
			</div>    


<input type="hidden" id="in" >
	      </div>
        </nav>

        <div class="overlay hidden-overlay">

        </div>