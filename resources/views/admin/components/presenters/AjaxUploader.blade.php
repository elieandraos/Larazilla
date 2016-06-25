<p class="label"> {!! $component->label !!}</p>

<div id="{!! $component->html_id !!}-{!! $locale !!}" class="dropzone post-uploads">
	
	@if(count($dropzoneMedias))
        @foreach($dropzoneMedias as $key => $mediaItem)
            <div class="dz-preview dz-file-preview" id="{!! $key !!}">
                <div class="dz-details">
                    <img src="{!!  $mediaItem->getURL('dropzoneThumb') !!}" />
                    
                    <input type="hidden" name="{!! $name !!}[dz_file][]"  class="dz-file"   /> <!-- path of file -->
                    <input type="hidden" name="{!! $name !!}[dz_order][]"  class="dz-order"  /><!-- order of file -->
            		<input type="hidden" name="{!! $name !!}[dz_media_id][]" value="{!! $mediaItem->id !!}"   /><!-- media_id  -->
                </div>
                <a class="media-remove" href="#" data-media-id="{!! $mediaItem->id !!}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </div>
        @endforeach

    @endif

</div>
	

<!-- dropzone pewview template: http://www.dropzonejs.com/#layout  -->
<div id="preview-{!! $component->html_id !!}-{!! $locale !!}" style="display: none;">
    <div class="dz-preview dz-file-preview">
        <div class="dz-details">
            <img data-dz-thumbnail />

            <input type="hidden" name="{!! $name !!}[dz_file][]"  class="dz-file" /> <!-- path of file -->
            <input type="hidden" name="{!! $name !!}[dz_order][]"  class="dz-order" /><!-- order of file -->
        </div>
        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
        <div class="dz-error-message"><span data-dz-errormessage></span></div>
    </div>
</div>