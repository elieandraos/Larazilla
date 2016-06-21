@extends('admin.default')

@section('content')


@include('admin.navs.breadcrumb')


<div class="card-panel">
	<table class="table">
	  <thead>
	    <tr>
	      <th>Name</th>
	      <th>Position</th>
	      <th>Icon</th>
	      <th>Action</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($panels as $panel)
			<tr>
				<td>{!! $panel->name !!}</td>
				<td>{!! $panel->position !!}</td>
				<td><span class="{!! $panel->fa_icon !!}"></span></td>
				<td>
					@include('admin.panels.partials.actions', ["postType" => $postType, "panel" => $panel])
				</td>
			</tr>
		@endforeach
	  </tbody>
	</table>
</div>

@stop