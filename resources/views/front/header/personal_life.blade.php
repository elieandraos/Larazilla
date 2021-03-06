
<div class="row">
	<div class="col-md-12">
		<div class="toggle-menu">
			@foreach([ 'timeline-events', 'albums' ] as $key => $slug)
				<span class='button-link @if($key == 0) active @endif' data-container="{!! $slug !!}"  href="{!! url('personal/'.$slug) !!}"  />
					{!! trans('messages.'.$slug) !!}
				</span>
			@endforeach 
		</div>
	</div>
</div>


<div id="timeline-events" class="visible dropdown-menu-item">
	@foreach($menuLatestPersonalArticles as $post)
		<li class="col-sm-4">
			<div class="article">
				<div class="row">
						<a class="article-link" href="{!! route('personal.show', [$postType->slug, $post->slug]) !!}">
						<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}"  style="width:100% !important"/>
							<div class="info-stripe">
								<span class="date">		
									{!! Carbon\Carbon::parse($post->publish_date)->format('j') !!}
									{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%f') !!}
									{!! Carbon\Carbon::parse($post->publish_date)->format('Y') !!}
								</span>
								<p style="color:#FFF">{!! $post->title !!}</p>
							</div>
						</a>
				</div>
			</div>
		</li>
	@endforeach

	<li class="col-sm-2" style="height:200px;">
		<a class="button-link active" href="{!! url('personal/timeline-events') !!}">{!! trans('messages.more') !!}</a>
	</li>
</div>


<div id="albums" class="hidden dropdown-menu-item">
	@foreach($menuLatestPersonalAlbums as $post)
		<li class="col-sm-4">
			<div class="article">
				<a class="article-link" href="{!! route('personal.show', [$postType->slug, $post->slug]) !!}">
					<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}"  style="width:100% !important"/>
					<div class="info-stripe">
						<span class="date">		
							{!! Carbon\Carbon::parse($post->publish_date)->format('j') !!}
							{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%f') !!}
							{!! Carbon\Carbon::parse($post->publish_date)->format('Y') !!}
						</span>
						<p style="color:#FFF">{!! $post->title !!}</p>
					</div>
				</a>
			</div>
		</li>
	@endforeach

	<li class="col-sm-2" style="height:200px;">
		<a class="button-link active" href="{!! url('personal/albums') !!}">{!! trans('messages.more') !!}</a>
	</li>
</div>