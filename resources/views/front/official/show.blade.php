@extends('front.layout')

@section('content')

<div class="container no-page-title">
	<div class="row">
		<div class="col-md-12">
			@include('front.common.breadcrumb', ['breadcrumb' => $breadcrumb])

			<div class="post-content">
				<div class="row">
					<div class="col-md-6">
						<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'featured') !!}" />
					</div>
					<div class="col-md-6 post-body">
						<h5>{!! $post->title !!}</h5>
						<div>{!! $post->body !!}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop