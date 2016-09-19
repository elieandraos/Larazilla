<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

use App\Models\Post;
use App\Models\PostType;
use App\Models\Category;

use Mail;

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
        
        //most read posts 
        $most_read = Post::where('views', '>', 0)->orderBy('views')->take(4)->get();

        return view('front.home.index', [
            'slides' => $slides, 
            'categoryTitle' => $category->title,
            'articles' => $articles,
            'current_category' => $category,
            'postType' => $articles_post_type,
            'most_read' => $most_read,
            'route' => 'offical.category.show'
        ]);
    }


    public function contact()
    {
        return view('front.home.contact');
    }

    public function submitContact(ContactRequest $request)
    {
        $input = $request->all();
        
        $data = [
            'full_name' => $input['full_name'],
            'email' => $input['email'],
            'body' => $input['message']
        ];


        Mail::send('emails.contact', $data, function ($message) use ($data) 
        {
            $message->from($data['email']);
            //$message->to('contact@tammamsalam.com');
            $message->to('elieandraos31@gmail.com');
        });

        return redirect( route('home'));
    }


}
