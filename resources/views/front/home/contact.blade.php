@extends('front.layout')

@section('content')

	<div class="container">
		<!-- Block Title -->
		@include('front.common.block-title', ['title' => trans('messages.contactUs')])

		<div class="row">
			<div class="col-md-4 contact-group">
				<label for="full_name">{!! trans('messages.fullName') !!}</label>
				<input type="text" id="full_name" name="full_name" class="txt" />

				<label for="email">{!! trans('messages.email') !!}</label>
				<input type="text" id="email" name="email" class="txt"/>

			</div>
			<div class="col-md-5 contact-group">
				<label for="message">{!! trans('messages.message') !!}</label>
				<textarea id="message" name="message" class="txt"></textarea>
			</div>
			<div class="col-md-3 contact-btn">
				<a class="button-link active" href="#">{!! trans('messages.submit') !!}</a> 
			</div>
		</div>
	</div>
@stop