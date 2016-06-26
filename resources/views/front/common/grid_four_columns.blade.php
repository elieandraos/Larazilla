@if(count($posts))
	<div class="row">
	@foreach($posts as $post)	
		<div class="col-md-3">
			<div class="grid-row grid-row-four-col">
				<div class="row">
					<div class="col-md-12 grid-image">
						<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}" />
						<div class="info-stripe">
							<span class="date">		
							{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%d %f %Y') !!}
							</span>
							<p>{!! $post->title !!}</p>
						</div>
					</div>
				</div>
			</div> 
		</div>
	@endforeach
	</div>		
@endif