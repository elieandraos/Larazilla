<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Post;
use App\Models\PostType;
use App\Models\Category;

class OfficialLifeController extends Controller
{
    
    public function index(PostType $postType, $category)
    {
    	$articles = $postType->posts()->whereHas('categories', function($q) use ($category){
    		 $q->where('slug', 'like', $category->slug);
    	})->with('categories')->take(6)->orderBy('publish_date', 'DESC')->paginate(8);

    	$rootCategory = Category::where('slug', '=', 'official-life')->first();
    	$categories = $rootCategory->descendants()->defaultOrder()->get();
        $breadcrumb = [ trans('messages.officialLife'), $category->title];

         $breadcrumb_links = [ 
            route('official.category', [$postType->slug, 'latest-news'])
        ];

    	return view('front.official.index', [
            'articles' => $articles, 
            'title' => trans('messages.officialLife'),
            'categories'	=> $categories,
            'current_category' => $category,
            'postTypeSlug' => $postType->slug,
            'breadcrumb' => $breadcrumb,
            'breadcrumb_links' => $breadcrumb_links
        ]);
    }


    public function show(PostType $postType, Category $category, Post $post)
    {
        $breadcrumb = [ trans('messages.officialLife'), $category->title, $post->title];
        $breadcrumb_links = [ 
            route('official.category', [$postType->slug, $category->slug]),  
            route('official.category', [$postType->slug, $category->slug]) 
            ];

        return view('front.official.show', [
            'post' => $post,
            'breadcrumb' => $breadcrumb,
            'breadcrumb_links' => $breadcrumb_links
        ]);
    }
}
