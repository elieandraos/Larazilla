@if(count($articles))
	@foreach($articles as $article)
		
		<div class="row">
			<div class="col-md-12">
				<div class="grid-row">
					<div class="row">
						<a href="{!! route('official.category.show', [$postType->slug, $current_category->slug, $article->slug]) !!}">
							<div class="col-md-5 grid-image">
								<img src="{!! $article->getFirstMediaUrl( $article->getMetaValue('image') , 'grid') !!}" />
							</div>
						</a>
						<div class="col-md-7 grid-details">
							<h5>{!! $article->title !!}</h5>
							<span class="date">		
								{!! LocalizedCarbon::instance(Carbon\Carbon::parse($article->publish_date))->formatLocalized('%d %f %Y') !!}
							</span>
							<div class="excerpt">{!! $article->excerpt !!}</div>
						</div>	
					</div>
				</div> 
			</div>
		</div>	
	@endforeach
@endif