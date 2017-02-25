@if(count($posts))
	<div class="row">
	@foreach($posts as $post)	
		<div class="col-md-3">
			<div class="grid-row grid-row-four-col">
				<div class="row">
					@if(Request::is('*mediacenter*'))
						<a href="{!! route('mediacenter.show', [$postTypeSlug, $post->slug]) !!}">
					@elseif(Request::is('*official*'))
						<a href="{!! route('official.category.show', [$postTypeSlug, $current_category->slug, $post->slug]) !!}">
					@elseif(Request::is('*personal*'))
						<a href="{!! route('personal.show', [$postTypeSlug, $post->slug]) !!}">	
					@endif

					<div class="col-md-12 grid-image">
						<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}" />
						<div class="info-stripe">
							<span class="date">		
							{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%d %f %Y') !!}
							</span>
							<p>{!! substr($post->title, 0, 70)."..." !!}</p>
						</div>
					</div>

					</a>
					
				</div>
			</div> 
		</div>
	@endforeach
	</div>		
@endif