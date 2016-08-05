<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Post;
use App\Models\PostType;

class MediaCenterController extends Controller
{
    public function index(PostType $postType)
    {
    	$posts = $postType->posts()->take(8)->orderBy('publish_date', 'DESC')->paginate(8);
        $postSlugs = ['newspapers', 'interviews', 'galleries', 'videos'];

        $breadcrumb = [ trans('messages.mediaCenter'), trans('messages.'.$postType->slug)];
        $breadcrumb_links = [ 
            route('mediacenter', [$postType->slug])
        ];

    	return view('front.mediacenter.index', [
            'posts' => $posts, 
            'title' => trans('messages.mediaCenter'),
            'postTypeSlug' => $postType->slug,
            'postSlugs' => $postSlugs,
            'breadcrumb' => $breadcrumb,
            'breadcrumb_links' => $breadcrumb_links
        ]);
    }


    public function show(PostType $postType, Post $post)
    {
        $breadcrumb = [ trans('messages.mediaCenter'), trans('messages.'.$postType->slug), $post->title];

        $breadcrumb_links = [ 
            route('mediacenter', [$postType->slug]),
            route('mediacenter', [$postType->slug])
        ];

        return view('front.mediacenter.show', [
            'post' => $post,
            'breadcrumb' => $breadcrumb,
            'breadcrumb_links' => $breadcrumb_links
        ]);
    }
}
