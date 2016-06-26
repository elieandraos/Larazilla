@if($slides->count())
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
        <ol class="carousel-indicators">
	    	@foreach($slides as $key => $slide)
	      		<li data-target="#myCarousel" data-slide-to="{!! $key !!}" class="@if($key == 0) active @endif"></li>
	    	@endforeach
		</ol>

      <div class="carousel-inner" role="listbox">
		@foreach($slides as $key => $slide)
			<div class="item @if($key == 0) active @endif">
				<div class="carousel-gradient"></div>
				<img src="{!! $slide->getFirstMediaUrl( $slide->getMetaValue('image')) !!}" />
		        
		            <div class="carousel-caption">
		                <p class="slide-title">{!! $slide->title !!}</p>
		              	<p><a class="btn btn-lg btn-slider" href="#" role="button">{!! trans('messages.more') !!}</a></p>
		            </div>
		     
			</div>
		@endforeach
      </div>
      
    </div><!-- /.carousel -->

@endif