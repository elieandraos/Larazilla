<div class="breadcrumbs">
	@foreach($breadcrumb as $key => $item)
		
		@if(isset($breadcrumb_links) && isset($breadcrumb_links[$key]))
			<span class="item @if($key == count($breadcrumb)-1) active @endif">
				<a href="{!! $breadcrumb_links[$key] !!}">{!! $item !!} </a>
			</span>
		@else
			<span class="item @if($key == count($breadcrumb)-1) active @endif">
				{!! $item !!} 
			</span>
		@endif

		@if($key < (count($breadcrumb)-1)) <span class="sep"> > </span> @endif
	@endforeach
</div>