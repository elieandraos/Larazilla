<div class="btn-group">
	<a href="{{ route('admin.categories.edit', $category->id) }}" class="waves-effect waves-cyan btn-flat btn-small teal-text">
		edit
	</a> 

	<a class="waves-effect waves-cyan btn-flat btn-small red-text modal-trigger" href="#modal-{!! $category->id !!}">delete</a> 
</div>



<div id="modal-{!! $category->id !!}" class="modal bottom-sheet">
	<div class="modal-content flow-text">
		<h3>Are you sure ?</h3> 
		<p>This action will remove the category (and its posts) permanently.</p> 
	</div> 
	<div class="modal-footer"> 
		{!! Form::open(['route' => ['admin.categories.delete', $category->id], 'data-remote' => true, 'data-callback' => 'removeTableRow' ]) !!}
			<a href="#!" class="modal-action modal-close waves-effect btn red">Cancel</a> 
			<a href="#!" class="modal-action modal-close waves-effect btn light-green submit-btn">Confirm</a> 
		{!! Form::close() !!}
	</div> 
</div>