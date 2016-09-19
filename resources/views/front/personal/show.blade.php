@extends('front.layout')

@section('content')

<div class="container no-page-title">

	@include('front.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="row">
		<div class="col-md-12">
			<div class="post-content">
				<div class="row">
					<div class="col-md-8 post-body" style="position:relative">
						@if($post->getMetaValue('youtube_url'))
							<div id="video-gallery">
								<a href="{!! $post->getMetaValue('youtube_url') !!}" >
									<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'featured') !!}" />
									<div class="video-overlay"><img src="/front/images/play-button.png" /></div>
								</a>
							</div>
						@else
							<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'featured') !!}" />

						@endif

						<h5>{!! $post->title !!}</h5>
						<div class="full-text">{!! $post->body !!}</div>

						@include('front.mediacenter.gallery', ['post' => $post])

					</div>
					<div class="col-md-4">
						<h3 class="title">{!! trans('messages.mostRead') !!}</h3>
						@include('front.home.most_read_posts', ['route' => 'personal.show'])

						<?php /*
						<h3 class="title">{!! trans('messages.related') !!}</h3>
						@include('front.home.most_read_posts', ['most_read' => $related]) */ ?>

						<h3 class="title">{!! trans('messages.tweets') !!}</h3>
						<a class="twitter-timeline" href="https://twitter.com/SalamTammam" data-tweet-limit=5 data-chrome="noheader">
							{!! trans('messages.tweets') !!}
						</a> 
						<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop