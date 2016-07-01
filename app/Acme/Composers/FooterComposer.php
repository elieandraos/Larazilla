<?php

namespace App\Acme\Composers;
use Illuminate\Contracts\View\View;
use App\Models\PostType;

class FooterComposer
{
	public function compose(View $view)
	{	
		$postType = PostType::where('slug', '=', 'timeline-events')->first();
		$events = $postType->posts()->orderBy('publish_date', 'ASC')->take(7)->get();

		$view->with('latestPersonalArticles', $events);
	}
}