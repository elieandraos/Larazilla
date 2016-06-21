@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::model($postType, ['route' => ['admin.post-types.update', $postType->slug] ]) !!}
	@include('admin.post_types.partials.form')
{!! Form::close() !!}


@stop