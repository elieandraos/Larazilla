<div class="row">
    <div class="col-md-3">
        <ul class="footer-list">
            <li>
                 <a href="/"> {!! trans('messages.home') !!} </a>
            </li>
            <li> 
                <a href="/personal/timeline-events" class="@if(Request::is('*timeline-events*')) active @endif"> {!! trans('messages.personalLife') !!} </a>
            </li>
             <li> 
                <a href="/personal/albums" class="@if(Request::is('*albums*')) active @endif"> {!! trans('messages.albums') !!} </a>
            </li>
        </ul>
    </div>

    <div class="col-md-3">
        <ul class="footer-list">
            @foreach($categories as $category)
                <li>
                    <a class='@if(Request::is("*official*articles*category*$category->slug")) active @endif'
                        href="{!! route('official.category', ['official', $category->slug]) !!}"
                    />
                        {!! $category->title !!}
                    </a>
                </li>
            @endforeach
        </ul>
    </div> 

    <div class="col-md-3">
        <ul class="footer-list">
            <li> 
                <a href="/mediacenter/newspapers"> 
                    {!! trans('messages.mediaCenter') !!} 
                </a>
            </li>

            @foreach($postSlugs as $slug)
                <li>
                    <a 
                        class="@if(Request::is('*mediacenter*$slug')) active @endif"
                        href="{!! route('mediacenter', [$slug]) !!}"
                    />
                        {!! trans('messages.'.$slug) !!}
                    </a>
                </li>
            @endforeach 
        </ul>
    </div> 


    <div class="col-md-3">
        <ul class="footer-list">
            <li>
                 <a href="/contact"> {!! trans('messages.contactUs') !!} </a>
            </li>
        </ul>
    </div>


   
</div>