
<div class="row">
	<div class="col-md-12">
		<div class="toggle-menu">
			@foreach([ 'newspapers', 'interviews', 'galleries', 'videos' ] as $key => $slug)
				<span class='button-link @if($key == 0) active @endif' data-container="{!! $slug !!}" href="{!! url('mediacenter/'.$slug) !!}" />
					{!! trans('messages.'.$slug) !!}
				</span>
			@endforeach 
		</div>
	</div>
</div>



<div id="newspapers" class="visible dropdown-menu-item">
	@foreach($news as $post)
		<li class="col-sm-4">
			<div class="article">
				<a class="article-link" href="{!! route('mediacenter.show', [$postTypeNews->slug, $post->slug]) !!}">
					<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}"  style="width:100% !important"/>
					<div class="info-stripe">
						<span class="date">		
							{!! Carbon\Carbon::parse($post->publish_date)->format('j') !!}
							{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%f') !!}
							{!! Carbon\Carbon::parse($post->publish_date)->format('Y') !!}
						</span>
						<p style="color:#FFF">
							{!! substr($post->title, 0, 70) !!}
							@if( strlen($post->title) > 70)
								...
							@endif
						</p>
					</div>
				</a>
			</div>
		</li>
	@endforeach

	<li class="col-sm-2" style="height:200px;">
		<a class="button-link active" href="{!! route('mediacenter', [$postTypeNews->slug]) !!}">{!! trans('messages.more') !!}</a>
	</li>
</div>


<div id="interviews" class="hidden dropdown-menu-item">
	@foreach($interviews as $post)
		<li class="col-sm-4">
			<div class="article">
				<a class="article-link" href="{!! route('mediacenter.show', [$postTypeInterviews->slug, $post->slug]) !!}">
					<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}"  style="width:100% !important"/>
					<div class="info-stripe">
						<span class="date">		
							{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%d %f %Y') !!}
						</span>
						<p style="color:#FFF">
							{!! substr($post->title, 0, 70) !!}
							@if( strlen($post->title) > 70)
								...
							@endif
						</p>
					</div>
				</a>
			</div>
		</li>
	@endforeach

	<li class="col-sm-2" style="height:200px;">
		<a class="button-link active" href="{!! route('mediacenter', [$postTypeInterviews->slug]) !!}">{!! trans('messages.more') !!}</a>
	</li>
</div>


<div id="galleries" class="hidden dropdown-menu-item">
	@foreach($galleries as $post)
		<li class="col-sm-4">
			<div class="article">
				<a class="article-link" href="{!! route('mediacenter.show', [$postTypeGalleries->slug, $post->slug]) !!}">
					<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}"  style="width:100% !important"/>
					<div class="info-stripe">
						<span class="date">		
							{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%d %f %Y') !!}
						</span>
						<p style="color:#FFF">
							{!! substr($post->title, 0, 70) !!}
							@if( strlen($post->title) > 70)
								...
							@endif
						</p>
					</div>
				</a>
			</div>
		</li>
	@endforeach

	<li class="col-sm-2" style="height:200px;">
		<a class="button-link active" href="{!! route('mediacenter', [$postTypeGalleries->slug]) !!}">{!! trans('messages.more') !!}</a>
	</li>
</div>


<div id="videos" class="hidden dropdown-menu-item">
	@foreach($videos as $post)
		<li class="col-sm-4">
			<div class="article">
				<a class="article-link" href="{!! route('mediacenter.show', [$postTypeVideos->slug, $post->slug]) !!}">
					<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}"  style="width:100% !important"/>
					<div class="info-stripe">
						<span class="date">		
							{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%d %f %Y') !!}
						</span>
						<p style="color:#FFF">
							{!! substr($post->title, 0, 70) !!}
							@if( strlen($post->title) > 70)
								...
							@endif
						</p>
					</div>
				</a>
			</div>
		</li>
	@endforeach

	<li class="col-sm-2" style="height:200px;">
		<a class="button-link active" href="{!! route('mediacenter', [$postTypeVideos->slug]) !!}">{!! trans('messages.more') !!}</a>
	</li>
</div>