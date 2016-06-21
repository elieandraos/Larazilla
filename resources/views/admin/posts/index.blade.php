@extends('admin.default')

@section('content')


@include('admin.navs.breadcrumb')


<div class="card-panel">
	<table class="table">
	  <thead>
	    <tr>
	      <th>Title</th>
	      <th>Action</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($posts as $post)
			<tr>
				<td>{!! $post->title !!}</td>
				<td>
					@include('admin.posts.partials.actions', ["postType" => $postType, "post" => $post])
				</td>
			</tr>
		@endforeach
	  </tbody>
	</table>
</div>

@stop