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
							class='button-link @if(Request::is("*mediacenter*$slug")) active @endif'
							href="{!! route('mediacenter', [$slug]) !!}"
							/>
							{!! trans('messages.'.$slug) !!}
						</a>
					@endforeach 
				</div>
			</div>
		</div>

		@include('front.common.breadcrumb', ['breadcrumb' => $breadcrumb])
		
		@if(in_array( $postTypeSlug, ['newspapers', 'interviews']))
			@include('front.common.grid_two_columns', ['posts' => $posts])
		@else
			@include('front.common.grid_four_columns', ['posts' => $posts])	
		@endif
	</div>
@stop