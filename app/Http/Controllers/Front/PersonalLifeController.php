<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Post;
use App\Models\PostType;
use App\Models\Category;

class PersonalLifeController extends Controller
{
    
    public function index(PostType $postType)
    {
    	
    	$posts = $postType->posts()->orderBy('publish_date', 'ASC')->get();
        $postSlugs = ['timeline-events', 'albums'];

        $breadcrumb = [ trans('messages.personalLife'), trans('messages.albums')];

        if($postType->slug == "timeline-events")
            return view('front.personal.timeline-horizontal', [
                'posts' => $posts, 
                'postType' => $postType,
                'postSlugs' => $postSlugs,
                'postTypeSlug' => $postType->slug,
                'title' => trans('messages.personalLife'),
                'breadcrumb' => $breadcrumb
            ]);
        else
            return view('front.personal.index', [
                'posts' => $posts, 
                'postType' => $postType,
                'postSlugs' => $postSlugs,
                'postTypeSlug' => $postType->slug,
                'title' => trans('messages.personalLife'),
                'breadcrumb' => $breadcrumb
            ]);
        	
    }


    public function show(PostType $postType, Post $post)
    {
        $breadcrumb = [ trans('messages.personalLife'), trans('messages.'.$postType->slug), $post->title];
        $post->incrementView();
        $related = Post::where('post_type_id', '=', $postType->id)->take(4)->get();
        $most_read = Post::where('views', '>', 0)->orderBy('views')->take(4)->get();

        return view('front.mediacenter.show', [
            'post' => $post,
            'breadcrumb' => $breadcrumb,
            'most_read' => $most_read,
            'postType' => $postType,
            'related' => $related
        ]);
    }
}
