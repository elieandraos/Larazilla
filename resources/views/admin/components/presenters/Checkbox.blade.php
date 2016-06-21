<p class="label"> {!! $component->label !!}</p>

@foreach($component->settings()->get($locale.".data") as $data)
	<input 
		type="checkbox" 
		id="{!! $data['id'] !!}" 
		name="{!! $name.'['.$data['name'].'][]' !!}" 
		value="{!! $data['value'] !!}"  

		@if($postMeta && isset($postMeta->translate($locale)->value) && in_array($data['value'],json_decode($postMeta->translate($locale)->value))) 
			checked
		@elseif (!isset($postMeta) && isset($data['checked']) && $data['checked'] == 1 && $form_method == "create")
			checked
		@endif
		
	/> 
	<label for="{!! $data['id'] !!}">{!! $data['label'] !!}</label>
@endforeach
