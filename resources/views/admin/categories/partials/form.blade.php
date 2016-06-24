<div class="row">
	<!-- Normal Column -->
	<div class="col m6 s12">

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
							{!! Form::textarea($locale.'[description]', null, ['class' => 'materialize-textarea', 'id' => $locale.'[description]']) !!}
							{!! Form::label($locale.'[description]', 'Description') !!}
							@if ($errors->has($locale.'.description')) <p class="form-error">{{ $errors->first($locale.'.description') }}</p> @endif
						</div>

						<button class="btn" type="submit" name="action"> Submit <i class="mdi-content-send right"></i> </button>

		  			</div> 
		  		@endforeach
			</div> <!-- .card .content -->
		</div> <!-- .card -->
	</div>
</div>