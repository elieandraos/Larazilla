@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::model($category, ['route' => ['admin.categories.update', $category->id] ]) !!}
	@include('admin.categories.partials.form')
{!! Form::close() !!}


@stop