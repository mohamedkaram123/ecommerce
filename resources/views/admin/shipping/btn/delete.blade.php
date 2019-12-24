
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal{{ $id }}"><i class="fa fa-trash"></i>  {{ trans("admin.delete") }}</button>

<!-- Modal -->
<div id="myModal{{ $id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans("admin.delete") }}</h4>
      </div>
      {!!Form::open(["route"=>["shipping.destroy",$id],"method"=>"delete"])!!}
      <div class="modal-body">
        <p class="alert alert-danger">{{trans("admin.you_want_delete") }} </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {!!Form::submit(trans("admin.delete"),["class"=>"btn btn-danger"])!!}
      </div>
      {!!Form::close()!!}
    </div>

  </div>
</div>