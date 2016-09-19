@extends('front.layout')

@section('content')

	<!-- Blider -->
	@include('front.home.slider')

	<div class="container">
		<!-- Block Title -->
		@include('front.common.block-title', ['title' => $categoryTitle])

		<div class="row">
			<div class="col-md-8">
				@include('front.home.latest_news')	
			</div>
			<div class="col-md-4">
				<h3 class="title">{!! trans('messages.mostRead') !!}</h3>
				@include('front.home.most_read_posts')

				<h3 class="title">{!! trans('messages.tweets') !!}</h3>
				<a class="twitter-timeline" href="https://twitter.com/SalamTammam" data-tweet-limit=5 data-chrome="noheader">
					{!! trans('messages.tweets') !!}
				</a> 
				<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
	</div>
@stop