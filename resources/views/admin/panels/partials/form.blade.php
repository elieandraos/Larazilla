<div class="row">
	<!-- Large Column -->
	<div class="col m7 s12">

		<div class="card">
			<div class="title">
				<h5><i class="fa fa-cogs"></i> Settings</h5>
			</div>

			<div class="content">
				
  				<div class="input-field"> 
					{!! Form::text('name', null, ['class' => 'validate', 'id' => 'name']) !!}
					{!! Form::label('name', 'Name') !!}
					@if ($errors->has('name')) <p class="form-error">{{ $errors->first('name') }}</p> @endif
				</div>

				
				{{ Form::select('position', ['' => 'Position', 'normal' => 'Normal' , 'side' => 'Side'], null, ['class' => '']) }}
				@if ($errors->has('position')) <p class="form-error">{{ $errors->first('position') }}</p> @endif
				

				<div class="input-field"> 
					{!! Form::text('fa_icon', null, ['class' => 'validate', 'id' => 'fa_icon']) !!}
					{!! Form::label('fa_icon', 'Font Awesome Icon') !!}
				</div>

				<button class="btn" type="submit" name="action"> Submit <i class="mdi-content-send right"></i> </button>
		  			
		  		
			</div> <!-- .card .content -->
		</div> <!-- .card -->
		
	</div>
</div>