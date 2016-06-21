<div class="btn-group">
	<a href="{{ route('admin.post-types.edit', $postType->slug) }}" class="waves-effect waves-cyan btn-flat btn-small teal-text">
		edit
	</a> 

	<a class="waves-effect waves-cyan btn-flat btn-small purple-text" href="{{ route('admin.post-types.settings', $postType->slug) }}" >
		settings
	</a>

	<a class="waves-effect waves-cyan btn-flat btn-small purple-text" href="{!! route('admin.post-types.panels', $postType->slug) !!}">
		panels
	</a> 
	<a class="waves-effect waves-cyan btn-flat btn-small red-text modal-trigger" href="#modal-{!! $postType->slug !!}">delete</a> 
</div>



<div id="modal-{!! $postType->slug !!}" class="modal bottom-sheet">
	<div class="modal-content flow-text">
		<h3>Are you sure ?</h3> 
		<p>This action will remove the post type permanently.</p> 
	</div> 
	<div class="modal-footer"> 
		{!! Form::open(['route' => ['admin.post-types.delete', $postType->slug], 'data-remote' => true, 'data-callback' => 'removeTableRow' ]) !!}
			<a href="#!" class="modal-action modal-close waves-effect btn red">Cancel</a> 
			<a href="#!" class="modal-action modal-close waves-effect btn light-green submit-btn">Confirm</a> 
		{!! Form::close() !!}
	</div> 
</div>