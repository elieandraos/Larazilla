@extends('front.layout')

@section('content')

<div class="container no-page-title">

	@include('front.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="row">
		<div class="col-md-12">
			<div class="post-content">
				<div class="row">
					<div class="col-md-7" style="position:relative">
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
					</div>
					<div class="col-md-5 post-body">
						<h5>{!! $post->title !!}</h5>
						<div class="full-text">{!! $post->body !!}</div>

						@include('front.mediacenter.gallery', ['post' => $post])
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop