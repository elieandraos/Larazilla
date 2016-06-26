@extends('front.layout')

@section('content')

	<div class="container">
		<!-- Block Title -->
		@include('front.common.block-title', ['title' => $title])

		<div class="row">
			<div class="col-md-12">
				<div class="button-menu">
					@foreach($categories as $category)
						<a 
							class='button-link @if(Request::is("*official*articles*category*$category->slug")) active @endif'
							href="{!! route('official.category', [$postTypeSlug, $category->slug]) !!}"
							/>
							{!! $category->title !!}
						</a>
					@endforeach
				</div>
			</div>
		</div>

		@include('front.common.grid_two_columns', ['posts' => $articles])	
	</div>
@stop