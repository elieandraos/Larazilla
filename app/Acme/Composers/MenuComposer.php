<?php

namespace App\Acme\Composers;
use Illuminate\Contracts\View\View;
use App\Models\PostType;
use App\Models\Category;

class MenuComposer
{
	public function personal(View $view)
	{	
		$postType = PostType::where('slug', '=', 'timeline-events')->first();
		$posts = $postType->posts()->orderBy('publish_date', 'ASC')->take(2)->get();

		$albums =  PostType::where('slug', '=', 'albums')->first();
		$albumsPosts = $albums->posts()->orderBy('publish_date', 'ASC')->take(2)->get();

		$view->with('menuLatestPersonalArticles', $posts)->with( 'menuLatestPersonalAlbums', $albumsPosts)->with('postType', $postType);
	}


	public function official(View $view)
	{
		$postType = PostType::where('slug', '=', 'articles')->first();
		$rootCategory = Category::where('slug', '=', 'official-life')->first();
    	$categories = $rootCategory->descendants()->defaultOrder()->get();

		$posts = [];
		foreach($categories as $category)
		{
			$posts[] = $postType->posts()->whereHas('categories', function($q) use ($category){
    		 $q->where('slug', 'like', $category->slug);
    		})->take(2)->orderBy('publish_date', 'DESC')->get();
		}
		
		$view->with('posts', $posts)->with('categories', $categories)->with('postType', $postType);
	}
}