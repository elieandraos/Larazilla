<li class='dd-item dd3-item' data-id='{!! $category->id !!}'>
	
	<div class="dd-handle dd3-handle">Drag</div>
	
	<div class='dd3-content'>
		{!! $category->title !!}
		@include('admin.categories.partials.actions', ["category" => $category])
	</div>
	  
	@if($category->hasChildren())
	    <ol class='dd-list'>
	    	@foreach($category->getChildren() as $child) 
	    		{!! $child->present()->nestedListRow() !!}
	    	@endforeach
	    </ol>
	@endif
</li>