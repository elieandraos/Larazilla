@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::model($panel, ['route' => ['admin.post-types.panels.update', $postType->slug, $panel->id]]) !!}
	@include('admin.panels.partials.form')
{!! Form::close() !!}


@stop