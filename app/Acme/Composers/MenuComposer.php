<?php

namespace App\Acme\Composers;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostType;
use Illuminate\Contracts\View\View;

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


	public function medialibrary(View $view)
	{
		$postTypeNews = PostType::where('slug', '=', 'newspapers')->first();
		$news = $postTypeNews->posts()->orderBy('publish_date', 'ASC')->take(2)->get();

		$postTypeVideos = PostType::where('slug', '=', 'videos')->first();
		$videos = $postTypeVideos->posts()->orderBy('publish_date', 'ASC')->take(2)->get();

		$postTypePersonalAlbums = PostType::where('slug', '=', 'albums')->first();
        $postTypeOfficialArticles = PostType::where('slug', '=', 'articles')->first();
        $galleries = Post::where('post_type_id', '=', $postTypePersonalAlbums->id)
                        ->orWhere('post_type_id', '=', $postTypeOfficialArticles->id)
                        ->whereHas('categories', function($q) {
                             $q->where('slug', 'like', 'gallery');
                        })
                        ->take(2)->get();

		$view
			->with('news', $news)->with('postTypeNews', $postTypeNews)
			->with('videos', $videos)->with('postTypeVideos', $postTypeVideos)
			->with('galleries', $galleries)->with('postTypeGalleries', $postTypePersonalAlbums);
	}
}