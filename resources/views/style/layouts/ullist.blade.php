

@push('js')
<script type="text/javascript">

$(".withli").click(function(){


let id = $(this).children("a").attr("data-target");


$("#in").val(id);



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
</script>
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