@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::open(['route' => ['admin.categories.store'] ]) !!}
	@include('admin.categories.partials.form')
{!! Form::close() !!}

@stop