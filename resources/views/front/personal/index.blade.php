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

		@include('front.common.breadcrumb', ['breadcrumb' => $breadcrumb])
		
		@include('front.common.grid_four_columns', ['posts' => $posts])	
		
	</div>
@stop