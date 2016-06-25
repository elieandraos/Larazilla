<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\PostType;
use App\Models\Post;
use App\Models\Category;
use App\Acme\Repositories\PostRepositoryInterface;
use App\Events\PostIsSaved;
use Validator;
use Flash;
use Event;

class PostController extends Controller
{
    
    protected $locales;


    public function __construct(PostRepositoryInterface $postRepos)
    {
    	$this->locales = config('translatable.locales');
    	$this->default_locale = config('translatable.fallback_locale');
    	$this->postRepos = $postRepos;
        $this->categories = Category::all()->lists('title', 'id')->toArray();
    }


    /**
     * List the posts of the specific post type
     * 
     * @param PostType $postType 
     * @return type
     */
    public function index(PostType $postType)
    {
    	$posts = $this->postRepos->all($postType);
        
        //breadcrumb
        $breadcrumb = [ 'links' => [], 'title' => $postType->plural_name, 'bg_icon' => $postType->fa_icon];
        array_push($breadcrumb['links'], ['url' => route('admin.posts', $postType->slug), 'title' => $postType->slug]);
        array_push($breadcrumb['links'], ['title' => 'List']);
        $breadcrumb['link_icon'] = route('admin.posts.create', $postType->slug);

    	return view('admin.posts.index', ['posts' => $posts, 'postType' => $postType, 'breadcrumb' => $breadcrumb]);
    }


    /**
     * Create a post of the specific post type
     * 
     * @param PostType $postType 
     * @return type
     */
    public function create(PostType $postType)
    {
        //breadcrumb
        $breadcrumb = [ 'links' => [], 'title' => $postType->plural_name, 'bg_icon' => $postType->fa_icon];
        array_push($breadcrumb['links'], ['url' => route('admin.posts', $postType->slug), 'title' => $postType->slug]);
        array_push($breadcrumb['links'], ['title' => 'Create']);

        //get the post type panels by type
        $normalPanels = $postType->panels()->position('normal')->get();
        $sidePanels = $postType->panels()->position('side')->get();
        
    	return view('admin.posts.create', ['postType' => $postType, 'post' => null, 'locales' => $this->locales, 'categories' => $this->categories, 'normalPanels' => $normalPanels , 'sidePanels' => $sidePanels, 'breadcrumb' => $breadcrumb]);
    }


    /**
     * Save the post 
     * 
     * @param Request $request 
     * @param PostType $postType 
     * @return type
     */
    public function store(Request $request, PostType $postType)
    {
    	$input = $request->all();
        $rules = $postType->settings()->get('validator');
        
        if(is_array($rules) && count($rules))
        {
            $validator = Validator::make($input, $rules);
            if($validator->fails())
                return redirect( route('admin.posts.create', $postType->slug))->withErrors($validator)->withInput();
        }

    	$input['slug'] = str_slug($input[$this->default_locale]['title']); //TODO: switch this to form input
        $post = $this->postRepos->create($input, $postType);
        Event::fire(new PostIsSaved($post, $input));
        Flash::success($postType->singular_name.' was created successfully.');

    	return redirect( route('admin.posts', $postType->slug) );
    }


    /**
     * Edit the post 
     * 
     * @param PostType $postType 
     * @param Post $post 
     * @return type
     */
    public function edit(PostType $postType, Post $post)
    {
        //breadcrumb
        $breadcrumb = [ 'links' => [], 'title' => $postType->plural_name, 'bg_icon' => $postType->fa_icon];
        array_push($breadcrumb['links'], ['url' => route('admin.posts', $postType->slug), 'title' => $postType->slug]);
        array_push($breadcrumb['links'], ['title' => 'Edit']);

        //get the post type panels by type
        $normalPanels = $postType->panels()->position('normal')->get();
        $sidePanels = $postType->panels()->position('side')->get();
        //bind the translated attribute to the post model
        $post = $post->addAllTranslations();
        //dd($post->postMetas->toArray());
        return view('admin.posts.edit', ['postType' => $postType, 'post' => $post, 'locales' => $this->locales, 'categories' => $this->categories, 'normalPanels' => $normalPanels , 'sidePanels' => $sidePanels, 'breadcrumb' => $breadcrumb]);
    }


    /**
     * Update the post 
     * 
     * @param Request $request 
     * @param PostType $postType 
     * @param Post $post 
     * @return type
     */
    public function update(Request $request, PostType $postType, Post $post)
    {
        $input = $request->all();
        $rules = $postType->settings()->get('validator');
        
        if(is_array($rules) && count($rules))
        {
            $validator = Validator::make($input, $rules);
            if($validator->fails())
                return redirect( route('admin.posts.edit', [$postType->slug, $post->id]))->withErrors($validator)->withInput();
        }
        
        $this->postRepos->update($input, $post, $postType);
        Event::fire(new PostIsSaved($post, $input));
        Flash::success($postType->singular_name.' was updated successfully.');

        return redirect( route('admin.posts', $postType->slug) );
    }


    public function delete(Post $post)
    {
        $post->delete();
    }
}
