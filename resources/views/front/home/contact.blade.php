@extends('front.layout')

@section('content')

	<div class="container">
		<!-- Block Title -->
		@include('front.common.block-title', ['title' => trans('messages.contactUs')])

		{!! Form::open(['route' => ['home.contact.submit']]) !!}

		<div class="row">
			<div class="col-md-4 contact-group">

				<div class="@if ($errors->has('full_name')) frm-error @endif" >
					<label for="full_name">{!! trans('messages.fullName') !!}</label>
					{!! Form::text('full_name', old('full_name'), ['class' => 'txt']) !!}
				</div>

				<div class="@if ($errors->has('email')) frm-error @endif" >
					<label for="email">{!! trans('messages.email') !!}</label>
					{!! Form::text('email', old('email'), ['class' => 'txt']) !!}
				</div>
			</div>

			<div class="col-md-5 contact-group">
				<div class="@if ($errors->has('message')) frm-error @endif" >
					<label for="message">{!! trans('messages.message') !!}</label>
					{!! Form::textarea('message', old('message'), ['class' => 'txt']) !!}
				</div>
			</div>

			<div class="col-md-3 contact-btn">
				<input type="submit" class="button-link active" value="{!! trans('messages.submit') !!}"> 
			</div>
		</div>

		{!! Form::close() !!}
	</div>
@stop