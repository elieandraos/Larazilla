<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\PostType;

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
    	$articles_post_type = PostType::where('slug', '=', 'articles')->with('posts')->first();
    	$slug = 'latest-news';
    	$articles = $articles_post_type->posts()->whereHas('categories', function($q) use ($slug){
    		 $q->where('slug', 'like', $slug);
    	})->with('categories')->take(6)->orderBy('publish_date', 'DESC')->get();

        return view('front.home.index', ['slides' => $slides]);
    }


}
