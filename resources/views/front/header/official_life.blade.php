<div class="row">
	<div class="col-md-12">
		<div class="toggle-menu">
			@foreach($categories as $key => $category)
				<span class='button-link @if($key == 0) active @endif' data-container="category-{!! $key !!}" />
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
				<img src="{!! $post->getFirstMediaUrl( $post->getMetaValue('image') , 'grid') !!}"  style="width:100% !important"/>
				<div class="info-stripe">
					<span class="date">		
						{!! LocalizedCarbon::instance(Carbon\Carbon::parse($post->publish_date))->formatLocalized('%d %f %Y') !!}
					</span>
					<p style="color:#FFF">{!! $post->title !!}</p>
				</div>
			</div>
		</li>
	@endforeach

	<li class="col-sm-2">
		<a class="button-link active" href="{!! url('personal/albums') !!}">{!! trans('messages.more') !!}</a>
	</li>
</div>

@endforeach