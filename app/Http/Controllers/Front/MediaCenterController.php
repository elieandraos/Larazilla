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

    	return view('front.mediacenter.index', [
            'posts' => $posts, 
            'title' => trans('messages.mediaCenter'),
            'postTypeSlug' => $postType->slug,
            'postSlugs' => $postSlugs,
            'breadcrumb' => $breadcrumb
        ]);
    }


    public function show(PostType $postType, Post $post)
    {
        $breadcrumb = [ trans('messages.mediaCenter'), trans('messages.'.$postType->slug), $post->title];
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
