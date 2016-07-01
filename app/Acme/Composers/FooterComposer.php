<?php

namespace App\Acme\Composers;
use Illuminate\Contracts\View\View;

class FooterComposer
{
	public function composer(View $view)
	{	
		//$view->with('latestPersonalArticles', Article::latest()->first());
	}
}