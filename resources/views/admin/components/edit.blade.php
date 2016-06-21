@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

{!! Form::model($component, ['route' => ['admin.post-types.panels.components.update', $postType->slug, $panel->id, $component->id]]) !!}
	@include('admin.components.partials.form')
{!! Form::close() !!}


@stop