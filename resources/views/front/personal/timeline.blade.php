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
								<table>
									<tr>
										@if($key % 2 == 1) <!-- swap the image/content -->
											<td class="timeline-panel-body">
												<h4 class="timeline-title">{!! $post->title !!}</h4>
									  			<p>{!! $post->body !!}
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
									  			<p>{!! $post->body !!}
											</td>
										@endif
								</table>  
							</div>
				        </li>
			        @endforeach
			    </ul>
			</div>
		</div>
	</div>
@stop