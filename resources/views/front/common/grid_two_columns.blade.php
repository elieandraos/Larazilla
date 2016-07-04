@if(count($posts))
	<div class="row">
	@foreach($posts as $post)	
		<div class="col-md-6">
			<div class="grid-row grid-row-two-col">
				<div class="row">

					<div class="col-md-6 grid-image">
						@if(Request::is('*mediacenter*'))
							<a href="{!! route('mediacenter.show', [$postTypeSlug, $post->slug]) !!}">
						@elseif(Request::is('*official*'))
							<a href="{!! route('official.category.show', [$postTypeSlug, $current_category->slug, $post->slug]) !!}">
						@endif

							<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}" />
							<div class="info-stripe">
								<span class="date pull-left flip">		
								{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%d %f %Y') !!}
								</span>
								@if(Request::is('*mediacenter*'))
									<a href="{!! route('mediacenter.show', [$postTypeSlug, $post->slug]) !!}" class="more">
								@elseif(Request::is('*official*'))
									<a href="{!! route('official.category.show', [$postTypeSlug, $current_category->slug, $post->slug]) !!}" class="more">
								@endif
									{!! trans('messages.more') !!}
									</a>
							</div>
						</a>
					</div>
					<div class="col-md-6 grid-details">
						@if(Request::is('*mediacenter*'))
							<a href="{!! route('mediacenter.show', [$postTypeSlug, $post->slug]) !!}" class="more">
						@elseif(Request::is('*official*'))
							<a href="{!! route('official.category.show', [$postTypeSlug, $current_category->slug, $post->slug]) !!}" class="more">
						@endif

						<h5>{!! $post->title !!}</h5>
						<div class="excerpt">{!! $post->excerpt !!}</div>
						</a>
					</div>

				</div>
			</div> 
		</div>
	@endforeach
	</div>		
@endif