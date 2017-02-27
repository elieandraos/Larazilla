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

    	return view('front.official.index', [
            'articles' => $articles, 
            'title' => trans('messages.officialLife'),
            'categories'	=> $categories,
            'current_category' => $category,
            'postTypeSlug' => $postType->slug,
            'breadcrumb' => $breadcrumb
        ]);
    }


    public function show(PostType $postType, Category $category, Post $post)
    {
        $breadcrumb = [ trans('messages.officialLife'), $category->title, $post->title];
        $post->incrementView();
        
        //most read posts 
        $most_read = Post::where('views', '>', 0)->orderBy('views')->take(4)->get();
        $related = Post::whereHas('categories', function($query) use ($category) {
            $query->where('category_id', '=', $category->id);
        })->take(4)->get();

        return view('front.official.show', [
            'post' => $post,
            'breadcrumb' => $breadcrumb,
            'most_read' => $most_read,
            'postType' => $postType,
            'current_category' => $category,
            'related' => $related,
            'route' => 'official.category.show'
        ]);
    }


    public function career()
    {   
        $postType = PostType::where('slug', '=', 'career')->first();
        $posts = $postType->posts()->orderBy('publish_date', 'ASC')->get();

        $postSlugs = ['timeline-events', 'albums'];

        $rootCategory = Category::where('slug', '=', 'official-life')->first();
        $categories = $rootCategory->descendants()->defaultOrder()->get();
        $breadcrumb = [ trans('messages.personalLife'), trans('messages.timeline-events')];

        return view('front.official.timeline-horizontal', [
            'posts' => $posts,
            'postType'  => $postType,
            'categories'    => $categories,
            'postTypeSlug' => 'articles',
            'breadcrumb' => $breadcrumb,
            'title' => trans('messages.officialLife'),
        ]);
    }  

    public function careerShow(Post $post)
    {
        $breadcrumb = [ trans('messages.officialLife'), trans('messages.timeline-events'), $post->title];
        $post->incrementView();
        
        //most read posts 
        $most_read = Post::where('views', '>', 0)->orderBy('views')->take(4)->get();
        $postType = PostType::where('slug', '=', 'career')->first();
        $related = $postType->posts()->where('id', '!=', $post->id)->take(4)->get();
        $category = Category::where('slug', '=', 'activities')->first();

        return view('front.official.career-show', [
            'post' => $post,
            'breadcrumb' => $breadcrumb,
            'most_read' => $most_read,
            'postType' => $postType,
            'related' => $related,
            'current_category' => $category,
            'route' => 'official.career.show'
        ]);
    } 
}
