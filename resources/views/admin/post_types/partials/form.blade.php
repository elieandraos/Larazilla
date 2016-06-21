<div class="row">
	<!-- Large Column -->
	<div class="col m8 s12">

		<!-- Information Card -->
		<div class="card">
			<div class="title">
				<h5><i class="fa fa-pencil"></i> Edit Information</h5>
			</div>

			<div class="content">
				<blockquote> 
					<p> 
						See full list of font awesome icons. <br> 
						<small><a href="http://fontawesome.io/icons" target="_blank">
						http://fontawesome.io/icons</a></small> 
					</p> 
				</blockquote>                         


				<div class="input-field"> 
					{!! Form::text('singular_name', null, ['class' => 'validate', 'id' => 'singular_name']) !!}
					{!! Form::label('singular_name', 'Singular Name') !!}
					@if ($errors->has('singular_name')) <p class="form-error">{{ $errors->first('singular_name') }}</p> @endif
				</div>

				<div class="input-field"> 
					{!! Form::text('plural_name', null, ['class' => 'validate', 'id' => 'plural_name']) !!}
					{!! Form::label('plural_name', 'Plural Name') !!}
					@if ($errors->has('plural_name')) <p class="form-error">{{ $errors->first('plural_name') }}</p> @endif
				</div>

				<div class="input-field"> 
					{!! Form::text('fa_icon', null, ['class' => 'validate', 'id' => 'fa_icon']) !!}
					{!! Form::label('fa_icon', 'Font Awesome Icon') !!}
				</div>

				<button class="btn" type="submit" name="action"> Submit <i class="mdi-content-send right"></i> </button>
			</div>
		</div>

	</div>
</div>
