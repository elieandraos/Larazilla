<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Elie Andraos">

    <title>Skinny Dashboard</title>

    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'> -->
 
    <!-- bower -->
    <link rel="stylesheet" type="text/css" href="/vendor/nanoscroller/bin/css/nanoscroller.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/ionicons/css/ionicons.min.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/jquery-jsonview/dist/jquery.jsonview.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Main -->
    <link rel="stylesheet" type="text/css" href="/admin/assets/material-design-icons/css/material-design-icons.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/assets/_con/css/con-base.css" />
    <link rel="stylesheet" type="text/css" href="/admin/assets/_con/css/con-cyan.min.css" />

    <style>
        .row .input-field label { left: 0;}
        i.delete-rule{ margin-top: 30px; font-size: 16px;}
        .link-icon{ cursor: pointer;}
        .hidden { display: none}
        .card-right-btn { display: block; float: right}
        .page-title h1 { text-transform: capitalize;}
        .form-error {     margin-top: -10px;padding-bottom:10px; font-size: 12px; color: red;}
        .modal-footer a { margin-left: 15px !important; }
        ul.tabs { margin-bottom: 20px;}
        .page-title ul.breadcrumb-list li a { color: #42A5F5;text-transform: capitalize;}
        p.label { font-size: 0.8rem;color:#9e9e9e;margin-bottom: 5px;}
        .json-info .collapsible { box-shadow: none !important; border: none !important; }
        div.jsonview { font-size: 0.9rem }
        .card .content { overflow: hidden;}

        .dropzone
        {
            text-align: left;
            padding: 15px;
            min-height: 220px;
        }
        .dz-preview 
        {
            display: inline-block;
            width: auto;
            margin: 20px;
        }
        a.dz-remove, a.media-remove 
        {
            color: #c02638;
            font-size: 11px;
            display: block;
            margin-top: 5px;
            text-align: center;
        }
        .dropzone .dz-message { display: none;}
    </style>

    <!--[if lt IE 9]>
        <script src="vendor/html5shiv/dist/html5shiv.min.js"></script>
    <![endif]-->

    <style>
        body table, body td, body th { font-size: 13px; }
    </style>

</head>
<body>

    @include('admin.navs.top')
	@include('admin.navs.aside')
	
<!-- Main Content -->
    <section class="content-wrap">
        <!-- /Breadcrumb -->
         @yield('content')

    </section>
    <!-- /Main Content -->

   

   	<footer>&copy; {!! date('Y') !!}. All rights reserved. </footer>

    <script type="text/javascript" src="/vendor/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/jquery-requestAnimationFrame/dist/jquery.requestAnimationFrame.min.js"></script>
    <script type="text/javascript" src="/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.min.js"></script>
    <script type="text/javascript" src="/vendor/materialize/bin/materialize.js"></script>
    <script type="text/javascript" src="/vendor/Sortable/Sortable.min.js"></script>
    <script type="text/javascript" src="/vendor/jquery-jsonview/dist/jquery.jsonview.js"></script>
    <script type="text/javascript" src="/vendor/dropzone/dist/min/dropzone.min.js"></script>
 

    <!-- Main -->
    <script type="text/javascript" src="/admin/assets/_con/js/_con.js"></script>
    <script type="text/javascript" src="/admin/js/application.js"></script>

    @if (Session::has('flash_notification.message'))
        <script type="text/javascript">
            window.onload = function() {
                    Materialize.toast("{{ Session::get('flash_notification.message') }}", 3000);
            };
        </script>
    @endif


</body>
</body>