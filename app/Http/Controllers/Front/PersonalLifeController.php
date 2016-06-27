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
            'title' => trans('messages.personalLife'),
            'breadcrumb' => $breadcrumb
        ]);
    }
}
