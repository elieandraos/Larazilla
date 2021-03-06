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
			<div class="col-md-12">
				<ul class="timeline">
					@foreach($posts as $key => $post)
				        <li 
				        	class="@if($key % 2 == 1) timeline-inverted @endif os-animation" 
				        	data-os-animation="@if($key % 2 == 1)animate-left @else animate-right @endif" 
				        	data-os-animation-delay="0s"
				        >
							<div class="timeline-badge">{!! $post->getMetaValue('year') !!}</div>
							<div class="timeline-panel">
								<table>
									<tr>
										@if($key % 2 == 1) <!-- swap the image/content -->
											<td class="timeline-panel-body">
												<h4 class="timeline-title">{!! $post->title !!}</h4>
									  			<p>{!! $post->excerpt !!}
											</td>
											<td class="timeline-panel-image">
												<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}" />
											</td>
										@else
											<td class="timeline-panel-image">
												<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}" />
											</td>
											<td class="timeline-panel-body">
												<h4 class="timeline-title">{!! $post->title !!}</h4>
									  			<p>{!! $post->excerpt !!}
											</td>
										@endif
										<tr>
											<td colspan="2" class="readmore-td">
												<a href="{!! route('personal.show', [$postType->slug, $post->slug]) !!}" class="button-link active readmore">{!! trans('messages.more') !!}</a>
											</td>
								</table>  
							</div>
				        </li>
			        @endforeach
			    </ul>
			</div>
		</div>
	</div>
@stop