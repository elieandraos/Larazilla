@extends('front.layout')

@section('content')

<div class="container no-page-title">
	<div class="row">
		<div class="col-md-12">
			@include('front.common.breadcrumb', ['breadcrumb' => $breadcrumb])

			<div class="post-content">
				<div class="row">
					<div class="col-md-8 post-body">
						<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'featured') !!}" />
						<h5>{!! $post->title !!}</h5>
						<div>{!! $post->body !!}</div>
						<br/>
						@include('front.mediacenter.gallery', ['post' => $post])
					</div>
					<div class="col-md-4">
						<h3 class="title">{!! trans('messages.mostRead') !!}</h3>
						@include('front.home.most_read_posts')

						<h3 class="title relatedPosts">{!! trans('messages.related') !!}</h3>
						@include('front.home.most_read_posts', ['most_read' => $related])

						<h3 class="title tweetPosts">{!! trans('messages.tweets') !!}</h3>
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