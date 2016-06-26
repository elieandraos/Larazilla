@if(count($posts))
	<div class="row">
	@foreach($posts as $post)	
		<div class="col-md-6">
			<div class="grid-row grid-row-two-col">
				<div class="row">
					<div class="col-md-6 grid-image">
						<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}" />
						<div class="info-stripe">
							<span class="date pull-left flip">		
							{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%d %f %Y') !!}
							</span>
							<a class="more" href="#">{!! trans('messages.more') !!}</a>
						</div>
					</div>
					<div class="col-md-6 grid-details">
						<h5>{!! $post->title !!}</h5>
						<div class="excerpt">{!! $post->excerpt !!}</div>
					</div>	
				</div>
			</div> 
		</div>
	@endforeach
	</div>		
@endif