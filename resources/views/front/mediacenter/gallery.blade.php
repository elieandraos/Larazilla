@if($post->getMetaValue('album'))
	<div id="aniimated-thumbnials">
		@foreach($post->getMedia($post->getMetaValue('album')) as $mediaItem)
			  <a href="{!! $mediaItem->getUrl('large') !!}" class="gallery-thumb">
			    <img src="{!! $mediaItem->getUrl('thumb') !!}" />
			  </a>
		@endforeach
	</div>
@endif