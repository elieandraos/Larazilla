<?php

namespace App\Http\Controllers\Admin;;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use App\Acme\Repositories\CategoryRepositoryInterface;
use App\Http\Requests\Admin\CategoryRequest;
use Flash;

class CategoryController extends Controller
{
    protected $categoryRepos;


    public function __construct(CategoryRepositoryInterface $categoryRepos)
    {
    	$this->categoryRepos = $categoryRepos;
    	$this->locales = config('translatable.locales');
    	$this->default_locale = config('translatable.fallback_locale');
        
        //set the breadcrumbs
        $breadcrumb = [ 'links' => [], 'title' => 'Categories', 'bg_icon' => 'fa fa-sitemap'];
        array_push($breadcrumb['links'], ['url' => route('admin.categories'), 'title' => 'Categories']);
        $this->breadcrumb = $breadcrumb;
    }


    /**
     * List all categories
     * 
     * @return type
     */
    public function index()
    {
    	$categories = $this->categoryRepos->all();
        array_push($this->breadcrumb['links'], ['title' => 'List']);
        $this->breadcrumb['link_icon'] = route('admin.categories.create');
    	return view('admin.categories.index', ['categories' => $categories, 'breadcrumb' => $this->breadcrumb]);
    }


    /**
     * Create a category 
     * 
     * @return type
     */
    public function create()
    {
    	array_push($this->breadcrumb['links'], ['title' => 'Create']);
    	return view('admin.categories.create', ['breadcrumb' => $this->breadcrumb, 'locales' => $this->locales]);
    }


    /**
     * Store the category
     * 
     * @param CategoryRequest $request 
     * @return type
     */
    public function store(CategoryRequest $request)
    {
    	$input = $request->all();
    	$input['slug'] = str_slug($input[$this->default_locale]['title']); //TODO: switch this to form input

    	$this->categoryRepos->create($input);
    	Flash::success('Category was created successfully.');
    	return redirect( route('admin.categories'));
    }


    /**
     * Edit a category
     * 
     * @param Category $category 
     * @return type
     */
    public function edit(Category $category)
    {
    	array_push($this->breadcrumb['links'], ['title' => $category->title]);
        array_push($this->breadcrumb['links'], ['title' => 'Edit']);
        
        $category = $category->addAllTranslations();

        return view('admin.categories.edit', ['category' => $category, 'locales' => $this->locales, 'breadcrumb' => $this->breadcrumb]);
    }


    /**
     * Update the category
     * 
     * @param CategoryRequest $request 
     * @param Category $category 
     * @return type
     */
    public function update(CategoryRequest $request, Category $category)
    {
    	$input = $request->all();
    	$input['slug'] = str_slug($input[$this->default_locale]['title']); //TODO: switch this to form input

        $this->categoryRepos->update($input, $category);
        Flash::success('Category was updated successfully.');
        return redirect( route('admin.categories'));
    }


    /**
     * Delete the category
     * 
     * @param Category $category 
     * @return type
     */
    public function delete(Category $category)
    {
    	$category->delete();
    }

}
