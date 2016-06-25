@extends('admin.default')

@section('content')

@include('admin.navs.breadcrumb')

<div class="card-panel">
	@if($categories->count())
		
		<textarea id="nestable-output" class="hidden" ></textarea>
		<h5><p>Drag and drop categories to change their orders</p></h5>
		<div class="dd" id="nestable">
	        <ol class="dd-list">
				@foreach($categories as $category)
					{!! $category->present()->nestedListRow() !!}
				@endforeach
			</ol>
		</div>
		<br/>
		<button class="btn" id="categories-save-order"> Save Order <i class="mdi-content-send right"></i> </button>
	@endif
</div>


@stop