<div class="row">
    <div class="col-md-6">
        <ul class="footer-list">
            @for($i=0; $i < ( count($latestPersonalArticles) /2); $i++)
            	<li>
                	<a href="/"> {!! $latestPersonalArticles[$i]->title !!} </a>
            	</li>
			@endfor
        </ul>
    </div>

    <div>
        <ul class="footer-list">
            @for($i = ( (count($latestPersonalArticles) / 2) + 1); $i < count($latestPersonalArticles); $i++)
            	<li>
                	<a href="/"> {!! $latestPersonalArticles[$i]->title !!} </a>
            	</li>
			@endfor
        </ul>
    </div>  
</div>

