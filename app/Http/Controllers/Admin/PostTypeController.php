<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\PostType;
use App\Models\Post;
use App\Acme\Repositories\PostTypeRepositoryInterface;
use App\Http\Requests\Admin\PostTypeRequest;
use Flash;


class PostTypeController extends Controller
{
    
	protected $postTypeRepos;


    public function __construct(PostTypeRepositoryInterface $postTypeRepos)
    {
    	$this->postTypeRepos = $postTypeRepos;
        $this->panelPositions = ['normal', 'side'];

        //set the breadcrumbs
        $breadcrumb = [ 'links' => [], 'title' => 'post types', 'bg_icon' => 'fa fa-cubes'];
        array_push($breadcrumb['links'], ['url' => route('admin.post-types'), 'title' => 'Post Types']);
        $this->breadcrumb = $breadcrumb;
    }


    /**
     * List post types
     * 
     * @return type
     */
    public function index()
    {
    	$postTypes = $this->postTypeRepos->all();
        array_push($this->breadcrumb['links'], ['title' => 'List']);
        $this->breadcrumb['link_icon'] = route('admin.post-types.create');
    	return view('admin.post_types.index', ['postTypes' => $postTypes, 'breadcrumb' => $this->breadcrumb]);
    }


    /**
     * Create a post type
     * 
     * @return type
     */
    public function create()
    {
        array_push($this->breadcrumb['links'], ['title' => 'Create']);
    	return view('admin.post_types.create', ['breadcrumb' => $this->breadcrumb]);
    }


    /**
     * Save a post type 
     * 
     * @param PostTypeRequest $request 
     * @return type
     */
    public function store(PostTypeRequest $request)
    {
    	$input = $request->all();
    	$this->postTypeRepos->create($input);
    	Flash::success('Post type was created successfully.');
    	return redirect( route('admin.post-types'));
    }


    /**
     * Edit post type
     * 
     * @param PostType $postType 
     * @return type
     */
    public function edit(PostType $postType)
    {
        array_push($this->breadcrumb['links'], ['title' => $postType->singular_name]);
        array_push($this->breadcrumb['links'], ['title' => 'Edit']);
        
        return view('admin.post_types.edit', ['postType' => $postType, 'breadcrumb' => $this->breadcrumb]);
    }


    /**
     * Update a post type
     * 
     * @param PostTypeRequest $request 
     * @param PostType $postType 
     * @return type
     */
    public function update(PostTypeRequest $request, PostType $postType)
    {
        $input = $request->all();
        $this->postTypeRepos->update($input, $postType);
        Flash::success('Post type was updated successfully.');
        return redirect( route('admin.post-types'));
    }


    /**
     * Delete a post type
     * 
     * @param PostType $postType 
     * @return type
     */
    public function delete(PostType $postType)
    {
        $postType->delete();
    }


    /**
     * Manage validation settings and fields display for the post type
     * 
     * @return type
     */
    public function settings(PostType $postType)
    {
        $validator = $postType->settings()->get('validator');
        $conversions = $postType->settings()->get('media.conversions');
       
        $post = new Post;
        $attributes = $post->getFillable();

        array_push($this->breadcrumb['links'], ['title' => $postType->singular_name]);
        array_push($this->breadcrumb['links'], ['title' => 'Settings']);

        return view('admin.post_types.settings', ['postType' => $postType, 'validator' => $validator, 'conversions' => $conversions, 'fields' => $attributes, 'breadcrumb' => $this->breadcrumb]);
    }


    /**
     * Save post type settings
     * 
     * @param Request $request 
     * @param PostType $postType 
     * @return type
     */
    public function storeSettings(Request $request, PostType $postType)
    {
        $input = $request->all();
        $validator = [];
        
        if(isset($input['key']))
        {
            $keys = $input['key'];
            $rules = $input['rule'];

            foreach($keys as $i => $key)
                $validator[$key] = $rules[$i];
        }
        

        $postType->settings()->set('validator' , $validator);
        Flash::success('Settings were updated successfully.');
        return redirect( route('admin.post-types'));
    }


    /**
     * Save post type settings
     * 
     * @param Request $request 
     * @param PostType $postType 
     * @return type
     */
    public function storeConversions(Request $request, PostType $postType)
    {
        $input = $request->all();
        $conversions = [];

        if(isset($input['name']))
        {
            $names = $input['name'];
            $widths = $input['width'];
            $heights = $input['height'];
            $collections = $input['collection'];

            foreach($names as $i => $name)
            {
                $c = [];
                $c['name'] = $name;
                $c['manipulations'] = [ 'w' => $widths[$i] , 'h' => $heights[$i]];
                $c['collection'] = $collections[$i];
                array_push($conversions, $c);
            }
        }
        
        $postType->settings()->set('media.conversions' , $conversions);
        Flash::success('Conversions were updated successfully.');
        return redirect( route('admin.post-types'));
    }

    /**
     * Lists the post type panels
     * 
     * @param PostType $postType 
     * @return type
     */
    public function panels(PostType $postType)
    {
        return view('admin.post_types.panels', ['postType' => $postType, 'breadcrumb' => $this->breadcrumb]);
    }

}

