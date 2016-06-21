<div class="page-title">
    <div class="row">
        <div class="col s12 m9 l10">
            <h1>{!! $breadcrumb['title'] !!}</h1>

            <ul class="breadcrumb-list">
                <li>
                    <a href="{!! route('admin.dashboard') !!}">Home</a> /
                </li>

               @foreach($breadcrumb['links'] as $link)
                    <li>
                        @if(isset($link['url']) && isset($link['title']))
                            <a href="{!! $link['url'] !!}">{!! $link['title'] !!}</a> /
                        @elseif(isset($link['title']))
                            {!! $link['title'] !!} /
                        @endif
                    </li>
               @endforeach

            </ul>
        </div>
        <div class="col s12 m3 l2 right-align">
            
            @if(isset($breadcrumb['link_icon']))
                <a class="btn-floating light-blue" href="{!! $breadcrumb['link_icon']!!}">
                    <i class="mdi-content-add"></i>
                </a>
            @elseif(isset($breadcrumb['bg_icon']))
                <i class="{!! $breadcrumb['bg_icon'] !!}" style="font-size:40px;color:#d8d8d8"></i>
            @endif
        </div>
    </div>
</div>