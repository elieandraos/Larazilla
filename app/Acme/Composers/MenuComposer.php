<?php

namespace App\Acme\Composers;
use Illuminate\Contracts\View\View;
use App\Models\PostType;

class MenuComposer
{
	public function personal(View $view)
	{	
		$postType = PostType::where('slug', '=', 'timeline-events')->first();
		$posts = $postType->posts()->orderBy('publish_date', 'ASC')->take(2)->get();

		$albums =  PostType::where('slug', '=', 'albums')->first();
		$albumsPosts = $albums->posts()->orderBy('publish_date', 'ASC')->take(2)->get();

		$view->with('menuLatestPersonalArticles', $posts)->with( 'menuLatestPersonalAlbums', $albumsPosts);
	}
}