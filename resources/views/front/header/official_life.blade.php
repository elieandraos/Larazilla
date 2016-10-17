<div class="row">
	<div class="col-md-12">
		<div class="toggle-menu">
			@foreach($categories as $key => $category)
				<span class='button-link @if($key == 0) active @endif' data-container="category-{!! $key !!}" href="{!! route('official.category', [$postType->slug, $category->slug]) !!}" />
					{!! $category->title !!}
				</span>
			@endforeach 
		</div>
	</div>
</div>


@foreach($categories as $i => $category)

<div id="category-{!! $i !!}" class="@if($i == 0) visible @else hidden @endif dropdown-menu-item">
	@foreach($posts[$i] as $post)
		<li class="col-sm-4">
			<div class="article">
				<a class="article-link" href="{!! route('official.category.show', [$postType->slug, $category->slug, $post->slug]) !!}">
					<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}"  style="width:100% !important"/>
					<div class="info-stripe">
						<span class="date">		
							{!! Carbon\Carbon::parse($post->publish_date)->format('j') !!}
							{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%f') !!}
							{!! Carbon\Carbon::parse($post->publish_date)->format('Y') !!}
						</span>
						<p style="color:#FFF">{!! substr($post->title, 0, 70)."..." !!}</p>
					</div>
				</a>
			</div>
		</li>
	@endforeach

	<li class="col-sm-2" style="height: 200px !important">
		<a class="button-link active" href="{!! route('official.category', [$postType->slug, $category->slug]) !!}">
			{!! trans('messages.more') !!}
		</a>
	</li>
</div>

@endforeach