@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::open(['route' => ['admin.posts.store', $postType->slug], 'enctype' => 'multipart/form-data']) !!}
	@include('admin.posts.partials.form', ['form_method' => 'create'])
{!! Form::close() !!}

@stop