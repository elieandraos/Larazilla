<div class="card-panel">
	<div class="title">
		<h5><i class="{!! $panel->fa_icon !!}"></i> {!! $panel->name !!}</h5>
	</div>

	<ul class="tabs"> 
			@foreach($locales as $locale)
				<li class="tab col s3">
					<a class="@if($locale == $locales[0]) active @endif" href="#panel-content-{!! $panel->id !!}-{!! $locale !!}">{!! $locale !!}</a>
				</li> 
			 @endforeach
		</ul> 

	@foreach($locales as $locale)
	  	<div id="panel-content-{!! $panel->id !!}-{!! $locale !!}" class="col s12">
	  		@if($panel->components->count())
				@foreach($panel->components as $component)
					{!! $component->present()->formInput($locale, $post, $form_method) !!}
				@endforeach
			@endif
	  	</div>		
	 @endforeach
		
</div>