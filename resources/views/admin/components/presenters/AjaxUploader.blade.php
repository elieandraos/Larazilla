<p class="label"> {!! $component->label !!}</p>

{!! csrf_field() !!}

<div id="post-uploads" class="dropzone">

</div>
	

<!-- dropzone pewview template: http://www.dropzonejs.com/#layout  -->
<div id="preview-template" style="display: none;">
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