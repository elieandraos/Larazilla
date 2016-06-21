<div class="input-field"> 
	{!! Form::text(
		$name,
		($postMeta && isset($postMeta->translate($locale)->value))? $postMeta->translate($locale)->value : null,
		['class' => 'validate '.$component->css_class, 'id' => $id ]
	) !!}

	{!! Form::label($name, $component->label) !!}

	@if ($errors->has($error_key)) 
		<p class="form-error">
			{!! $errors->first($error_key) !!}
		</p> 
	@endif 
</div>