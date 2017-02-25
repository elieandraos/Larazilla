@if($settings->multilang)
<div class="lang-switcher">
    <a href="?locale=en" style="color:#2C3e50;font-family: 'Lato';font-weight: bold" >{!! trans('messages.english') !!} </a>&nbsp;&nbsp;
    <a href="?locale=ar" style="color:#2C3e50;font-family: 'TheSans';font-weight: bold" >{!! trans('messages.arabic') !!} </a>
</div>
@endif