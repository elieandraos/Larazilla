@extends('front.layout')

@section('content')

	<div class="container">
		<!-- Block Title -->
		@include('front.common.block-title', ['title' => $title])

		<div class="row">
			<div class="col-md-12">
				<ul class="timeline">
					@foreach($posts as $key => $post)
				        <li class="@if($key % 2 == 1) timeline-inverted @endif">
							<div class="timeline-badge">{!! $post->getMetaValue('year') !!}</div>
							<div class="timeline-panel">
								<div class="timeline-heading">
								  <h4 class="timeline-title">{!! $post->title !!}</h4>
								</div>
								<div class="timeline-body">
								  <p>{!! $post->body !!}
								</div>
							</div>
				        </li>
			        @endforeach
			    </ul>
			</div>
		</div>
	</div>
@stop