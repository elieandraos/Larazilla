<ul class="top-menu nav navbar-nav">
	<li class="dropdown mega-dropdown"> 
		<a href="/personal/timeline-events" class="dropdown-toggle @if(Request::is('*personal*')) active @endif"> {!! trans('messages.personalLife') !!} </a>
		
		<ul class="dropdown-menu mega-dropdown-menu row">
            @include('front.header.personal_life') 
        </ul>

	</li>
	<li class="dropdown mega-dropdown"> 
		<a href="/official/articles/category/latest-news" class="dropdown-toggle @if(Request::is('*official*')) active @endif" > 
			{!! trans('messages.officialLife') !!} 
		</a>
		<ul class="dropdown-menu mega-dropdown-menu row">
            @include('front.header.official_life')
        </ul>

	</li>
	<li class="dropdown mega-dropdown"> 
		<a href="/mediacenter/newspapers" class="@if(Request::is('*mediacenter*')) active @endif"> 
			{!! trans('messages.mediaCenter') !!} 
		</a>
		<ul class="dropdown-menu mega-dropdown-menu row">
            @include('front.header.media_library')
        </ul>
	</li>	
	<li>
		 <a href="/contact" class="@if(Request::is('*contact*')) active @endif"> {!! trans('messages.contactUs') !!} </a>
	</li>
</ul>