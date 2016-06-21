@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::open(['route' => ['admin.post-types.panels.store', $postType->slug]]) !!}
	@include('admin.panels.partials.form') 
{!! Form::close() !!}

@stop