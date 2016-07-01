<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Elie Andraos">

    <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/lightgallery/dist/css/lightgallery.min.css" />
    <link rel="stylesheet" type="text/css" href="/front/css/style.css">
    <link rel="stylesheet" type="text/css" href="/front/css/timeline.css">

    @if(Lang::getLocale() == "en")
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="/front/css/style-en.css">
    @else
        <link rel="stylesheet" type="text/css" href="/front/fonts/arabicfaces.css">
        <link rel="stylesheet" type="text/css" href="/vendor/bootstrap-rtl/dist/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" type="text/css" href="/front/css/style-ar.css">
    @endif
    

    <title>Tamam Salam</title>
    
</head>
<body>	

    <!-- header -->
    <div class="container-fluid header-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a class="logo" href="/">{!! trans('messages.logo') !!}</a>
                </div>
                <div class="col-md-8">
                    @include('front.header.top-menu')
                    <div class="lang-switcher">
                        <a href="?locale=en"><img src="/front/images/eng.png" /></a>
                        <a href="?locale=ar"><img src="/front/images/ar.png" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/vendor/lightgallery/dist/js/lightgallery-all.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            if($('#aniimated-thumbnials').length)
                $('#aniimated-thumbnials').lightGallery({
                    thumbnail:false,
                    animateThumb: false,
                    showThumbByDefault: false,
                    download: false,
                    counter: false,
                    zoom: false
                }); 

            if($("#video-gallery").length)
                $('#video-gallery').lightGallery({
                    download: false,
                    counter: false,
                    zoom: false
                }); 
        })
    </script>
</body>
</body>