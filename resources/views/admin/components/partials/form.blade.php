<div class="row">
	<!-- Large Column -->
	<div class="col m6 s12">

		<div class="card-panel">
			<div class="title">
				<h5><i class="fa fa-cogs"></i> Required Info</h5>
			</div>

		
				
  				<div class="input-field"> 
					{!! Form::text('label', null, ['class' => 'validate', 'id' => 'label']) !!}
					{!! Form::label('label', 'Label') !!}
					@if ($errors->has('label')) <p class="form-error">{{ $errors->first('label') }}</p> @endif
				</div>
				
  				<div class="input-field"> 
					{!! Form::text('meta_key', null, ['class' => 'validate', 'id' => 'meta_key']) !!}
					{!! Form::label('meta_key', 'Meta Key') !!}
					@if ($errors->has('meta_key')) <p class="form-error">{{ $errors->first('meta_key') }}</p> @endif
				</div>

				{{ Form::select('component_type_id', $components_types, null, ['class' => '']) }}
				@if ($errors->has('component_type_id')) <p class="form-error">{{ $errors->first('component_type_id') }}</p> @endif

				<button class="btn" type="submit" name="action"> Submit <i class="mdi-content-send right"></i> </button>
		  			
		  		
		
		</div> <!-- .card-panel -->
	</div>

		<!-- Large Column -->
	<div class="col m6 s12">

		<div class="card-panel">
			<div class="title">
				<h5><i class="fa fa-cogs"></i> Additional Info</h5>
			</div>

				
			<div class="input-field"> 
				{!! Form::text('html_id', null, ['class' => 'validate', 'id' => 'html_id']) !!}
				{!! Form::label('html_id', 'HTML Id') !!}
			</div>
			
				<div class="input-field"> 
				{!! Form::text('css_class', null, ['class' => 'validate', 'id' => 'css_class']) !!}
				{!! Form::label('css_class', 'CSS Class') !!}
			</div>

			<div class="input-field"> 
				{!! Form::textarea('options', (isset($component) && $component->id)?$component->present()->options_json:'', ['class' => 'materialize-textarea', 'id' => 'json-options']) !!}
				{!! Form::label('options', 'Options') !!}
			</div>

			<blockquote> 
				<p> 
					See json options samples for different components types. <br> 
					<small><a href="#json-options-modal" class="modal-trigger">
					options configuration</a></small> 
				</p> 
			</blockquote>
			  		
		</div> <!-- .card -->
	</div>
</div>



@include('admin.components.partials.json_modal_info')

