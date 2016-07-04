<ul class="top-menu nav navbar-nav">
	<li> 
		<a href="/personal/timeline-events" class="@if(Request::is('*personal*')) active @endif"> {!! trans('messages.personalLife') !!} </a>
	</li>
	<li class="dropdown mega-dropdown"> 
		<a href="/official/articles/category/latest-news" class="dropdown-toggle @if(Request::is('*official*')) active @endif" > 
			{!! trans('messages.officialLife') !!} 
		</a>
		
        <ul class="dropdown-menu mega-dropdown-menu row">
            <li class="col-sm-3 mega-menu-col">
              <div>Content 3</div>
            </li>
            <li class="col-sm-3">
              <div>Content 3</div>
            </li>
            
            <li class="col-sm-5">
              <div>Content 6</div>
            </li>
        </ul>

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