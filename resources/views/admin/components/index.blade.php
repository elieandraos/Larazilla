@extends('admin.default')

@section('content')


@include('admin.navs.breadcrumb')


<div class="card-panel">
	<table class="table">
	  <thead>
	    <tr>
	      <th>Label</th>
	      <th>Meta Key</th>
	      <th>Type</th>
	      <th>Action</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($components as $component)
			<tr>
				<td>{!! $component->label !!}</td>
				<td>{!! $component->meta_key !!}</td>
				<td>{!! $component->componentType->name !!}</td>
				<td>
					@include('admin.components.partials.actions', ["postType" => $postType, "panel" => $panel])
				</td>
			</tr>
		@endforeach
	  </tbody>
	</table>
</div>

@stop