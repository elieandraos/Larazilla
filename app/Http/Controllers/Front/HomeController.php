<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\PostType;
use App\Models\Category;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$slider_post_type = PostType::where('slug', '=', 'sliders')->with('posts')->first();
    	$slides = $slider_post_type->posts;

    	//articles that has category: latest-news
        $category = Category::where('slug', '=', 'latest-news')->first();
    	$articles_post_type = PostType::where('slug', '=', 'articles')->with('posts')->first();
    	$articles = $articles_post_type->posts()->whereHas('categories', function($q) use ($category){
    		 $q->where('slug', 'like', $category->slug);
    	})->with('categories')->take(6)->orderBy('publish_date', 'DESC')->get();

        return view('front.home.index', [
            'slides' => $slides, 
            'categoryTitle' => $category->title,
            'articles' => $articles
        ]);
    }


}
