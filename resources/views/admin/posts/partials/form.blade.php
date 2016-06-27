<div class="row">
	<!-- Normal Column -->
	<div class="col m7 s12">

		<div class="card-panel">
			<div class="title">
				<h5><i class="fa fa-database"></i> Content</h5>
			</div>

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

						<div class="@if(in_array( 'excerpt', $postType->settings()->get('hiddenFields'))) hidden @endif">
							<div class="input-field"> 
								{!! Form::textarea($locale.'[excerpt]', null, ['class' => 'materialize-textarea', 'id' => $locale.'[excerpt]']) !!}
								{!! Form::label($locale.'[excerpt]', 'Excerpt') !!}
								@if ($errors->has($locale.'.excerpt')) <p class="form-error">{{ $errors->first($locale.'.excerpt') }}</p> @endif
							</div>
						</div>

						<div class="@if(in_array( 'body', $postType->settings()->get('hiddenFields'))) hidden @endif">
							<div class="input-field"> 
								{!! Form::textarea($locale.'[body]', null, ['class' => 'materialize-textarea', 'id' => $locale.'[body]']) !!}
								{!! Form::label($locale.'[body]', 'Content') !!}
								@if ($errors->has($locale.'.body')) <p class="form-error">{{ $errors->first($locale.'.body') }}</p> @endif
							</div>
						</div>
		  			</div> 
		  		@endforeach
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
			
		<div class="card-panel">
				<div class="title"><h5><i class="fa fa-paper-plane-o"></i> Publish</h5></div>

				<div style="text-align:right">
					<button class="btn" type="submit" name="action"> Submit <i class="mdi-content-send right"></i> </button>
				</div>
				<div class="@if(in_array( 'categories', $postType->settings()->get('hiddenFields'))) hidden @endif">
					<p class="label"> Categories</p>
					
					{!! Form::select(
						'category_id[]', 
						[ '-1' => 'Select Category'] + $categories, 
						(isset($post))?$post->categories()->lists('category_id')->toArray():null, 
						['multiple' => 'multiple' ]
					)!!}
				</div>

				<div class="input-field" style="margin-top:30px;"> 
				 	{!! Form::date("publish_date", null, ['class' => 'datepicker']) !!}
				 	<label for="input_date">Date</label> 
				</div>
		</div>

		<!-- Custom Post Type Panels -->
		@if($sidePanels->count())
			@foreach($sidePanels as $panel)
				{!! $panel->present()->card($form_method, $post) !!}
			@endforeach
		@endif
	</div>
</div>