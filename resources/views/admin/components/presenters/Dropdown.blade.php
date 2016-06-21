<p class="label"> {!! $component->label !!}</p>

{!! Form::select(
	$name, 
	$component->settings()->get($locale.".data"), 
	($postMeta && isset($postMeta->translate($locale)->value))? $postMeta->translate($locale)->value : $component->settings()->get($locale.".defaultSelected"), 
	['class' => 'validate '.$component->css_class, 'id' => $id ]
)!!}

@if ($errors->has($error_key)) 
	<p class="form-error">
		{!! $errors->first($error_key) !!}
	</p> 
@endif 

