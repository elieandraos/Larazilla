<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\PostType;
use App\Models\PostTypePanel;
use App\Models\PostTypePanelComponent;
use App\Models\PostTypePanelComponentType;
use Flash;

class ComponentController extends Controller
{
    
    public function __construct()
    {
    	$this->components_types = PostTypePanelComponentType::lists('name', 'id');
    }

    
    /**
     * Lists the components of the panel 
     * 
     * @param PostType $postType 
     * @param PostTypePanel $panel 
     * @return type
     */
    public function index(PostType $postType, PostTypePanel $panel)
    {
    	$breadcrumb = [ 'links' => [], 'title' => $panel->name." panel", 'bg_icon' => $postType->fa_icon];
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.edit', $postType->slug), 'title' => $postType->singular_name]);
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.panels', $postType->slug), 'title' => 'Panels']);
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.panels.edit', [$postType->slug, $panel->id]), 'title' => $panel->name]);
        array_push($breadcrumb['links'], ['title' => 'Components']);
        $breadcrumb['link_icon'] = route('admin.post-types.panels.components.create', [$postType->slug, $panel->id]);

        $components = $panel->components;
        return view('admin.components.index', ['postType' => $postType, 'panel' => $panel, 'components' => $components, 'breadcrumb' => $breadcrumb]);

    }


    /**
     * Create a component
     * 
     * @param PostType $postType 
     * @param PostTypePanel $panel 
     * @return type
     */
    public function create(PostType $postType, PostTypePanel $panel)
    {
    	//breadcrumb
        $breadcrumb = [ 'links' => [], 'title' => $panel->name." panel", 'bg_icon' => $postType->fa_icon];
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.edit', $postType->slug), 'title' => $postType->singular_name]);
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.panels', $postType->slug), 'title' => 'Panels']);
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.panels.edit', [$postType->slug, $panel->id]), 'title' => $panel->name]);
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.panels.components', [$postType->slug, $panel->id]), 'title' => 'Components']);
        array_push($breadcrumb['links'], ['title' => 'Create']);

    	return view('admin.components.create', ['postType' => $postType, 'panel' => $panel, 'components_types' => $this->components_types ,'breadcrumb' => $breadcrumb]);
    }


    /**
     * Save the component
     * 
     * @param Request $request 
     * @param PostType $postType 
     * @param PostTypePanel $panel 
     * @return type
     */
    public function store(Request $request, PostType $postType, PostTypePanel $panel)
    {
    	$input = $request->all();
        
        $options = $input['options'];
        
        if(!$options) 
            $optionsToArray = null;
        else
            $optionsToArray = json_decode($options, true);
        
    	$input['html_name'] = $input['meta_key'];
        $input['post_type_panel_id'] = $panel->id;
    	$input['post_type_id'] = $postType->id;
        $input['options'] = $optionsToArray;
    	
    	$component = PostTypePanelComponent::create($input);
    	Flash::success('Component was created successfully.');
    	return redirect( route('admin.post-types.panels.components', [$postType->slug, $panel->id]));
    }


    /**
     * Edit the component
     * 
     * @param PostType $postType 
     * @param PostTypePanel $panel 
     * @return type
     */
    public function edit(PostType $postType, PostTypePanel $panel, PostTypePanelComponent $component)
    {
    	//breadcrumb
        $breadcrumb = [ 'links' => [], 'title' => $panel->name." panel", 'bg_icon' => $postType->fa_icon];
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.edit', $postType->slug), 'title' => $postType->singular_name]);
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.panels', $postType->slug), 'title' => 'Panels']);
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.panels.edit', [$postType->slug, $panel->id]), 'title' => $panel->name]);
        array_push($breadcrumb['links'], ['url' => route('admin.post-types.panels.components', [$postType->slug, $panel->id]), 'title' => 'Components']);
        array_push($breadcrumb['links'], ['title' => 'Edit']);

        //dd($component->present()->options_json);
        //dd($component->settings()->get('en.data'));
    	return view('admin.components.edit', ['postType' => $postType, 'component' => $component, 'panel' => $panel, 'components_types' => $this->components_types ,'breadcrumb' => $breadcrumb]);
    }


    /**
     * Update the component
     * 
     * @param Request $request 
     * @param PostType $postType 
     * @param PostTypePanel $panel 
     * @param Component $component 
     * @return type
     */
    public function update(Request $request, PostType $postType, PostTypePanel $panel, PostTypePanelComponent $component)
    {
    	$input = $request->all();
    	$input['html_name'] = $input['meta_key'];

        $options = $input['options'];
        
        if(!$options) 
            $optionsToArray = null;
        else
            $optionsToArray = json_decode($options, true);

        $input['options'] = $optionsToArray;

    	$component->update($input);
    	Flash::success('Post type panel was updated.');
    	return redirect( route('admin.post-types.panels.components', [$postType->slug, $panel->id]));
    }


    /**
     * Delete the component
     * 
     * @param Component $component 
     * @return type
     */
    public function delete(PostTypePanelComponent $component)
    {
        $component->delete();
    }
}
