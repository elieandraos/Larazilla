@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::open(['route' => ['admin.post-types.panels.components.store', $postType->slug, $panel->id]]) !!}
	@include('admin.components.partials.form') 
{!! Form::close() !!}

@stop