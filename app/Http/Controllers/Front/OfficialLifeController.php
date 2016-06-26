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
    	})->with('categories')->take(6)->orderBy('publish_date', 'DESC')->get();

    	$rootCategory = Category::where('slug', '=', 'official-life')->first();
    	$categories = $rootCategory->descendants()->defaultOrder()->get();

    	return view('front.official.index', [
            'articles' => $articles, 
            'title' => trans('messages.officialLife'),
            'categories'	=> $categories,
            'postTypeSlug' => $postType->slug
        ]);
    }
}
