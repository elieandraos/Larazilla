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

        $breadcrumb = [ trans('messages.personalLife'), 'Timeline'];

        if($postType->slug == "timeline-events")
            return view('front.personal.timeline', [
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

        return view('front.mediacenter.show', [
            'post' => $post,
            'breadcrumb' => $breadcrumb
        ]);
    }
}
