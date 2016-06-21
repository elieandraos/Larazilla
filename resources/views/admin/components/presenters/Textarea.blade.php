<div class="input-field">
	{!! Form::textarea(
		$name,
		($postMeta  && isset($postMeta->translate($locale)->value))? $postMeta->translate($locale)->value : null,
		['class' => 'materialize-textarea '.$component->css_class, 'id' => $id ]
	) !!}

	{!! Form::label($name, $component->label) !!}

	@if ($errors->has($error_key)) 
		<p class="form-error">
			{!! $errors->first($error_key) !!}
		</p> 
	@endif 
</div>