@if(count($most_read))
	@foreach($most_read as $article)
		
		<div class="row">
			<div class="col-md-12">
				<div class="grid-row grid-row-read">
					<div class="row">

						@if($route == 'personal.show')
							<a href="{!! route($route, [$postType->slug, $article->slug]) !!}">
						@else
							<a href="{!! route('official.category.show', [$postType->slug, $current_category->slug, $article->slug]) !!}">
						@endif

							<div class="col-md-5 grid-image">
								<img src="{!! $article->getFirstMediaUrl( $article->getMetaValue('image') , 'grid') !!}" />
							</div>
						</a>
						<div class="col-md-7 grid-details">
							@if($route == 'personal.show')
								<a href="{!! route($route, [$postType->slug, $article->slug]) !!}">
							@else
								<a href="{!! route('official.category.show', [$postType->slug, $current_category->slug, $article->slug]) !!}">
							@endif
						
								<h5>{!! $article->title !!}</h5>
								<span class="date">		
									{!! Carbon\Carbon::parse($article->publish_date)->format('j') !!}
									{!! LocalizedCarbon::instance(Carbon\Carbon::parse($article->publish_date))->formatLocalized('%f') !!}
									{!! Carbon\Carbon::parse($article->publish_date)->format('Y') !!}
								</span>
							</a>
						</div>	
					</div>
					<hr/>
				</div> 
			</div>
		</div>	
	@endforeach
@endif