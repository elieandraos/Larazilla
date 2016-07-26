<?php

namespace App\Acme\Composers;
use Illuminate\Contracts\View\View;
use App\Models\PostType;
use App\Models\Category;

class FooterComposer
{
	public function compose(View $view)
	{	
		
		$rootCategory = Category::where('slug', '=', 'official-life')->first();
    	$categories = $rootCategory->descendants()->defaultOrder()->get();

    	$postSlugs = ['newspapers', 'interviews', 'galleries', 'videos'];

		$view->with('categories', $categories)->with('postSlugs', $postSlugs);
	}
}