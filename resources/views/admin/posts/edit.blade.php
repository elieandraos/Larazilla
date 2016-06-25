@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::model($post, ['route' => ['admin.posts.update', $postType->slug, $post->id], 'enctype' => 'multipart/form-data']) !!}
	@include('admin.posts.partials.form', ['form_method' => 'edit'])
{!! Form::close() !!}


@stop