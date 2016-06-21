@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::open(['route' => ['admin.post-types.store'] ]) !!}
	@include('admin.post_types.partials.form')
{!! Form::close() !!}

@stop