<ul class="top-menu">
	<li> <a href="/" class="@if(Request::is('*personal*')) active @endif"> {!! trans('messages.personalLife') !!} </a></li>
	<li> 
		<a href="/official/articles/category/latest-news" class="@if(Request::is('*official*')) active @endif"> 
			{!! trans('messages.officialLife') !!} 
		</a>
	</li>
	<li> <a href="/"> {!! trans('messages.mediaCenter') !!} </a></li>
	<li> <a href="/"> {!! trans('messages.contactUs') !!} </a></li>
</ul>