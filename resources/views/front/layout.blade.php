<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Elie Andraos">

    <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/lightgallery/dist/css/lightgallery.min.css" />
    <link rel="stylesheet" type="text/css" href="/front/css/style.css">
    {{--   <link rel="stylesheet" type="text/css" href="/front/css/timeline.css"> --}}
    <link rel="stylesheet" type="text/css" href="/front/css/timeline-horizontal.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/front/fonts/arabicfaces.css">
    <link rel="stylesheet" type="text/css" href="/vendor/font-awesome/css/font-awesome.min.css" />

    @if(Lang::getLocale() == "en")
        <link rel="stylesheet" type="text/css" href="/front/css/style-en.css">
    @else
        <link rel="stylesheet" type="text/css" href="/vendor/bootstrap-rtl/dist/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" type="text/css" href="/front/css/style-ar.css">
    @endif
    

    <title>Tammam Salam</title>
    
</head>
<body>	
    <!-- header -->
    <div class="container-fluid header-container @if(Route::is('home')) home @endif">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <a class="logo" href="/">{!! trans('messages.logo') !!}</a>
                </div>
                <div class="col-md-10">
                    <img class="push-menu menu-left" src="/front/images/burger.png" style="width: 64px" />

                    @include('front.header.top-menu')
                    @include('front.header.lang_switcher')
                    @include('front.header.search_bar')
                </div>
            </div>
        </div>
    </div>

    @include('front.header.side-menu')

    @yield('content')

    <!-- Footer -->
     <div class="container-fluid footer-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('front.footer.bio')
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <h3 class="title"> {!! trans('messages.sitemap') !!}</h3>
                    @include('front.footer.sitemap')
                </div>
                <div class="col-md-4">
                    <h3 class="title"> {!! trans('messages.followUs') !!}</h3>
                    @include('front.footer.social')
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/vendor/lightgallery/dist/js/lightgallery-all.min.js"></script>
    <script type="text/javascript" src="/front/side-menu.js"></script>
    <script type="text/javascript" src="/front/timeline-horizontal.js"></script>
    <script type="text/javascript" src="/front/waypoint.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".search-bar i").click(function(){
               $(".search-bar #search").focus(); 
            })


            $("#aniimated-thumbnials a.gallery-thumb").click(function(){
                _src = $(this).attr('href');
                $(".post-body").find('img:first').attr('src', _src);
                return false;
            })

            if($("#video-gallery").length)
                $('#video-gallery').lightGallery({
                    download: false,
                    counter: false,
                    zoom: false
                }); 

            $(".toggle-menu .button-link").hover(function(){
                
                _li = $(this).closest('li.mega-dropdown');

                 $(_li).find("span.button-link").each(function(){
                    $(this).removeClass('active');
                })

                $(this).addClass('active');
                
                var id = "#" + $(this).data('container');

                $(_li).find(".dropdown-menu-item").each(function(){
                    $(this).removeClass('visible').addClass('hidden');
                });
                $(id).removeClass('hidden').addClass('visible');

            })

             $(".toggle-menu .button-link").click(function(){
                window.location = $(this).attr('href');
             });

            $('.push-menu').jPushMenu();
            
        })
    </script>
    <script>
        onScrollInit( $('.os-animation') );

        function onScrollInit( items, trigger ) {
          items.each( function() {
            var osElement = $(this),
                osAnimationClass = osElement.attr('data-os-animation'),
                osAnimationDelay = osElement.attr('data-os-animation-delay');
              
                osElement.css({
                  '-webkit-animation-delay':  osAnimationDelay,
                  '-moz-animation-delay':     osAnimationDelay,
                  'animation-delay':          osAnimationDelay
                });

                var osTrigger = ( trigger ) ? trigger : osElement;
                
                osTrigger.waypoint(function() {
                  osElement.addClass('animated').addClass(osAnimationClass);
                  },{
                      triggerOnce: true,
                      offset: '90%'
                });
          });
        }

    </script>
</body>
</body>