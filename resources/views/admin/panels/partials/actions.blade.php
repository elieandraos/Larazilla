<div class="btn-group">
	<a href="{{ route('admin.post-types.panels.edit', [$postType->slug, $panel->id]) }}" class="waves-effect waves-cyan btn-flat btn-small teal-text">
		edit
	</a> 
	
	<a href="{!! route('admin.post-types.panels.components', [$postType->slug, $panel->id]) !!}" class="waves-effect waves-cyan btn-flat btn-small purple-text">
		components
	</a> 

	<a class="waves-effect waves-cyan btn-flat btn-small red-text modal-trigger" href="#modal-{!! $panel->id !!}">delete</a>
</div>



<div id="modal-{!! $panel->id !!}" class="modal bottom-sheet">
	<div class="modal-content flow-text">
		<h3>Are you sure ?</h3> 
		<p>This action will remove the {!! $panel->name !!} panel permanently.</p> 
	</div> 
	<div class="modal-footer"> 
		{!! Form::open(['route' => ['admin.post-types.panels.delete', $panel->id], 'data-remote' => true, 'data-callback' => 'removeTableRow' ]) !!}
			<a href="#!" class="modal-action modal-close waves-effect btn red">Cancel</a> 
			<a href="#!" class="modal-action modal-close waves-effect btn light-green submit-btn">Confirm</a> 
		{!! Form::close() !!}
	</div> 
</div>
