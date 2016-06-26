<div class="breadcrumbs">
	@foreach($breadcrumb as $key => $item)
		<span class="item @if($key == count($breadcrumb)-1) active @endif">{!! $item !!} </span>

		@if($key < (count($breadcrumb)-1)) <span class="sep"> > </span> @endif
	@endforeach
</div>