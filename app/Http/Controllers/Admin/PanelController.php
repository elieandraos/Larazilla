<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\PostType;
use App\Models\PostTypePanel;
use Flash;

class PanelController extends Controller
{
    
    
	/**
	 * List of the post type panels
	 * 
	 * @param PostType $postType 
	 * @return type
	 */
    public function index(PostType $postType)
    {
    	$breadcrumb = [ 'links' => [], 'title' => $postType->plural_name." panels", 'bg_icon' => $postType->fa_icon];
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.edit', $postType->slug), 'title' => $postType->singular_name]);
    	array_push($breadcrumb['links'], ['title' => 'Panels']);
    	$breadcrumb['link_icon'] = route('admin.post-types.panels.create', $postType->slug);

    	$panels = $postType->panels;
    	return view('admin.panels.index', ['postType' => $postType ,'panels' => $panels, 'breadcrumb' => $breadcrumb]);
    }


    /**
     * Create a post type panel 
     * 
     * @param PostType $postType 
     * @return type
     */
    public function create(PostType $postType)
    {
		//breadcrumb
        $breadcrumb = [ 'links' => [], 'title' => $postType->plural_name." panels", 'bg_icon' => $postType->fa_icon];
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.edit', $postType->slug), 'title' => $postType->singular_name]);
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.panels', $postType->slug), 'title' => 'Panels']);
        array_push($breadcrumb['links'], ['title' => 'Create']);

    	return view('admin.panels.create', ['postType' => $postType, 'breadcrumb' => $breadcrumb]);
    }


    /**
     * Save a post type panel
     * 
     * @param Request $request 
     * @param PostType $postType 
     * @return type
     */
    public function store(Request $request, PostType $postType)
    {
    	$input = $request->all();
    	$panel = new PostTypePanel( $input );
    	$postType->panels()->save($panel);
    	Flash::success('Panel saved to the post type.');
    	return redirect( route('admin.post-types.panels', $postType->slug));
    }


    /**
     * Edit the post type panel 
     * 
     * @param PostType $postType 
     * @param PostTypePanel $panel 
     * @return type
     */
    public function edit(PostType $postType, PostTypePanel $panel)
    {
    	//breadcrumb
        $breadcrumb = [ 'links' => [], 'title' => $postType->plural_name." panels", 'bg_icon' => $postType->fa_icon];
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.edit', $postType->slug), 'title' => $postType->singular_name]);
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.panels', $postType->slug), 'title' => 'Panels']);
        array_push($breadcrumb['links'], ['title' => 'Edit']);

        return view('admin.panels.edit', ['postType' => $postType, 'panel' => $panel, 'breadcrumb' => $breadcrumb]);
    }


    /**
     * Update the post type panel 
     * 
     * @param Request $request 
     * @param PostType $postType 
     * @param PostTypePanel $panel 
     * @return type
     */
    public function update(Request $request, PostType $postType, PostTypePanel $panel)
    {
    	$input = $request->all();
    	$panel->update($input);
    	Flash::success('Post type panel was updated.');
    	return redirect( route('admin.post-types.panels', $postType->slug));
    }


    /**
     * Delete the post type panel 
     * 
     * @param PostTypePanel $panel 
     * @return type
     */
    public function delete(PostTypePanel $panel)
    {
        $panel->delete();
    }
}
