@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

<div class="card-panel">
	<table class="table">
	  <thead>
	    <tr>
	      <th>Singular Name</th>
	      <th>Plural Name</th>
	      <th>Slug</th>
	      <th>Icon</th>
	      <th>Action</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($postTypes as $postType)
			<tr>
				<td>{!! $postType->singular_name !!}</td>
				<td>{!! $postType->plural_name !!}</td>
				<td>{!! $postType->slug !!}</td>
				<td><span class="{!! $postType->fa_icon !!}"></span></td>
				<td>
					@include('admin.post_types.partials.actions', ["postType" => $postType])
				</td>
			</tr>
		@endforeach
	  </tbody>
	</table>
</div>


@stop