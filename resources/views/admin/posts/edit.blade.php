@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::model($post, ['route' => ['admin.posts.update', $postType->slug, $post->id], 'enctype' => 'multipart/form-data']) !!}
	@include('admin.posts.partials.form', ['form_method' => 'edit'])
	<div class="row">
		<div class="col m12 s12">
			<button class="btn" type="submit" name="action"> Submit <i class="mdi-content-send right"></i> </button>
		</div>
	</div>
{!! Form::close() !!}


@stop