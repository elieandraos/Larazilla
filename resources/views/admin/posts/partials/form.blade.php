<div class="row">
	<!-- Normal Column -->
	<div class="col m7 s12">

		<div class="card">
			<div class="title">
				<h5><i class="fa fa-database"></i> Content</h5>
			</div>

			<div class="content">
				<ul class="tabs"> 
		  			@foreach($locales as $locale)
		  				<li class="tab col s3">
		  					<a class="@if($locale == $locales[0]) active @endif" href="#content-{!! $locale !!}">{!! $locale !!}</a>
		  				</li> 
		  			 @endforeach
		  		</ul> 
  				
		  		@foreach($locales as $locale)
		  			<div id="content-{!! $locale !!}" class="col s12">
		  				<div class="input-field"> 
							{!! Form::text($locale.'[title]', null, ['class' => 'validate', 'id' => $locale.'[title]']) !!}
							{!! Form::label($locale.'[title]', 'Title') !!}
							@if ($errors->has($locale.'.title')) <p class="form-error">{{ $errors->first($locale.'.title') }}</p> @endif
						</div>

						<div class="input-field"> 
							{!! Form::textarea($locale.'[excerpt]', null, ['class' => 'materialize-textarea', 'id' => $locale.'[excerpt]']) !!}
							{!! Form::label($locale.'[excerpt]', 'Excerpt') !!}
							@if ($errors->has($locale.'.excerpt')) <p class="form-error">{{ $errors->first($locale.'.excerpt') }}</p> @endif
						</div>

						<div class="input-field"> 
							{!! Form::textarea($locale.'[body]', null, ['class' => 'materialize-textarea', 'id' => $locale.'[body]']) !!}
							{!! Form::label($locale.'[body]', 'Content') !!}
							@if ($errors->has($locale.'.body')) <p class="form-error">{{ $errors->first($locale.'.body') }}</p> @endif
						</div>
		  			</div> 
		  		@endforeach
			</div> <!-- .card .content -->
		</div> <!-- .card -->
		
		<!-- Custom Post Type Panels -->
		@if($normalPanels->count())
			@foreach($normalPanels as $panel)
				{!! $panel->present()->card($form_method, $post) !!}
			@endforeach
		@endif

	</div>

	<!-- Side Column -->
	<div class="col m5 s12">
		<!-- Custom Post Type Panels -->
		@if($sidePanels->count())
			@foreach($sidePanels as $panel)
				{!! $panel->present()->card($form_method, $post) !!}
			@endforeach
		@endif
	</div>
</div>