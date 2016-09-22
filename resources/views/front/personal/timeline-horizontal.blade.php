@extends('front.layout')

@section('content')

	<div class="container">
		<!-- Block Title -->
		@include('front.common.block-title', ['title' => $title])

		<div class="row">
			<div class="col-md-12">
				<div class="button-menu">
					@foreach($postSlugs as $slug)
						<a 
							class='button-link @if(Request::is("*personal*$slug")) active @endif'
							href="{!! route('personal', [$slug]) !!}"
							/>
							{!! trans('messages.'.$slug) !!}
						</a>
					@endforeach 
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10 col-md-push-1">
				<section class="cd-horizontal-timeline">
					<div class="events-content">
						<div class="row">
							<ol style="list-style: none">
								@foreach($posts as $key => $post)
								<li class="" data-date="{!! ($key+1) !!}/02/2014">
									<div class="col-md-6">
										<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}" />
									</div>
									<div class="col-md-6">
										<h4 class="timeline-title">{!! $post->title !!}</h4>
										<p class="timeline-body">{!! $post->excerpt !!}</p>
									</div>
								</li>
								@endforeach
							</ol>
						</div>
					</div> <!-- .events-content -->

					<div class="timeline">
						<div class="events-wrapper">
							<div class="events">
								<ol style="list-style: none">
									@foreach($posts as $key => $post)
										<li>
											@if($key == 0)
												<a href="#0" data-date="{!! ($key+1) !!}/02/2014" class="selected">
											@else
												<a href="#0" data-date="{!! ($key+1) !!}/02/2014" class="">
											@endif
											{!! $post->getMetaValue('year') !!}</a>
										</li>
									@endforeach
								</ol>
								<span class="filling-line" aria-hidden="true"></span>
							</div> <!-- .events -->
						</div> <!-- .events-wrapper -->
							
						<ul class="cd-timeline-navigation">
							<li style="list-style:none"><a href="#0" class="prev inactive">Prev</a></li>
							<li style="list-style:none"><a href="#0" class="next">Next</a></li>
						</ul> <!-- .cd-timeline-navigation -->
					</div> <!-- .timeline -->

				</section>
			</div>
		</div>
	</div>
@stop