<ul class="top-menu">
	<li> 
		<a href="/personal/timeline-events" class="@if(Request::is('*personal*')) active @endif"> {!! trans('messages.personalLife') !!} </a>
	</li>
	<li> 
		<a href="/official/articles/category/latest-news" class="@if(Request::is('*official*')) active @endif"> 
			{!! trans('messages.officialLife') !!} 
		</a>
	</li>
	<li> 
		<a href="/mediacenter/newspapers" class="@if(Request::is('*mediacenter*')) active @endif"> 
			{!! trans('messages.mediaCenter') !!} 
		</a>
	</li>	
	<li>
		 <a href="/contact" class="@if(Request::is('*contact*')) active @endif"> {!! trans('messages.contactUs') !!} </a>
	</li>
</ul>