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
    	
    	$events = $postType->posts()->orderBy('publish_date', 'ASC')->get();

        $breadcrumb = [ trans('messages.personalLife'), 'Timeline'];

    	return view('front.personal.timeline', [
            'posts' => $events, 
            'postType' => $postType,
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
