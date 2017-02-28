@extends('front.layout')

@section('content')

	<div class="container">
		<!-- Block Title -->
		@include('front.common.block-title', ['title' => trans('messages.search')])

		@if(count($posts))
			<div class="row">
			@foreach($posts as $post)	
				<div class="col-md-6">
					<div class="grid-row grid-row-two-col">
						<div class="row">

							<div class="col-md-6 grid-image">
								<a href="{!! $post->show_url !!}">
									<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}" />
									<div class="info-stripe">
										<span class="date pull-left flip">		
										{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%d %f %Y') !!}
										</span>
									</div>
								</a>
							</div>
							<div class="col-md-6 grid-details">
								<a href="{!! $post->show_url !!}">
									<h5>{!! $post->title !!}</h5>
									<div class="excerpt">{!! $post->getCutExcerpt(180) !!}</div>
								</a>
							</div>

						</div>
					</div> 
				</div>
			@endforeach

			{{-- <div align=center> {!! $posts->links() !!} </div> --}}

			</div>		
		@endif
	</div>
@stop