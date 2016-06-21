@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::open(['route' => ['admin.posts.store', $postType->slug], 'enctype' => 'multipart/form-data']) !!}
	@include('admin.posts.partials.form', ['form_method' => 'create'])
	<div class="row">
		<div class="col m12 s12">
			<button class="btn" type="submit" name="action"> Submit <i class="mdi-content-send right"></i> </button>
		</div>
	</div>
{!! Form::close() !!}

@stop