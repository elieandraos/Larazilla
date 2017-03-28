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
        $category = Category::where('slug', '=', 'speeches-statements')->first();
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
            $message->to('team@tammamsalam.net');
        });

        return redirect( route('home'));
    }

    public function search(Request $request)
    {
        $search = trim($request->get('search'));
  
        $ids = [];
        $postTypes = PostType::whereIn('slug', ['bio', 'sliders'])->get();
        foreach($postTypes as $postType)
            array_push($ids, $postType->id);
        $posts = Post::whereNotIn('post_type_id', $ids)
                        ->whereHas('translations', function ($query) use ($search){
                            $query->where('locale', 'ar')
                                     ->where('title', "LIKE", "%".$search."%")
                                     ->orWhere('body', "LIKE", "%".$search."%");
                        })
                        ->paginate(8);
                       
        return view('front.home.search', ['posts' => $posts]);
    }


}
