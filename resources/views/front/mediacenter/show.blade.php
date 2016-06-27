@extends('front.layout')

@section('content')

<div class="container no-page-title">

	@include('front.common.breadcrumb', ['breadcrumb' => $breadcrumb])

	<div class="row">
		<div class="col-md-12">
			<div class="post-content">
				<div class="row">
					<div class="col-md-7">
						<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'featured') !!}" />
					</div>
					<div class="col-md-5 post-body">
						<h5>{!! $post->title !!}</h5>
						<div>{!! $post->body !!}</div>

						@include('front.mediacenter.gallery', ['post' => $post])
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop