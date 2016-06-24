<?php 

namespace App\Acme\Repositories; 
use App\Models\Category;

class CategoryRepository extends DbRepository implements CategoryRepositoryInterface 
{
	
	/**
	 * Create a category 
	 * 
	 * @param type $input 
	 * @return type
	 */
	public function create($input)
	{
		$category = Category::create($input);
		return $category;
	}


	/**
	 * Update a category 
	 * 
	 * @param type $input 
	 * @return type
	 */
	public function update($input, $category)
	{
		return $category->update($input);
	}


	/**
	 * Return a category by id
	 * 
	 * @param type $id 
	 * @return type
	 */
	public function find($id)
	{
		return Category::findOrFail($id);
	}


	/**
	 * Delete the category
	 * 
	 * @param type $category 
	 * @return type
	 */
	public function delete($category)
	{
		return $category->delete();
	}


	/**
	 * Return all the categories
	 * 
	 * @return type
	 */
	public function all()
	{
		return Category::all();
	}
}


?>