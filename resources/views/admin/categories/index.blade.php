@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

<div class="card-panel">
	<table class="table">
	  <thead>
	    <tr>
	      <th>Title</th>
	      <th>Parent Name</th>
	      <th>Action</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($categories as $category)
			<tr>
				<td>{!! $category->title !!}</td>
				<td></td>
				<td>
					@include('admin.categories.partials.actions', ["category" => $category])
				</td>
			</tr>
		@endforeach
	  </tbody>
	</table>
</div>


@stop