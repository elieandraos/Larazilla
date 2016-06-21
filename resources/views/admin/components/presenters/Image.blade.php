<p class="label"> {!! $component->label !!}</p>

<div class="file-field input-field"> 
	<div class="btn"> 
		<span>upload</span> 
		<input type="file"  name="{!! $name !!}"> 
	</div> 
	<div class="file-path-wrapper"> 
		<input class="file-path validate" type="text"> 
	</div> 
</div>

@if($media)
	<table style="margin-bottom: 30px;">
		<tr>
			<td style="width: 60px;padding:0"><img src="{!! $media->getUrl('adminThumb')!!}" /></td>
			<td style="padding:0" valign="middle">
				<input type="checkbox" name="removeMedia[{!! $component->meta_key !!}][{!! $locale !!}]" id="remove[{!! $component->meta_key !!}][{!! $locale !!}]" value="1" /> 
				<label for="remove[{!! $component->meta_key !!}][{!! $locale !!}]">Delete</label>
			</td>
		</tr>
	</table>
@endif