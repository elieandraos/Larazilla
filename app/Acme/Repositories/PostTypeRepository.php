<?php 

namespace App\Acme\Repositories; 
use App\Models\PostType;

class PostTypeRepository extends DbRepository implements PostTypeRepositoryInterface 
{
	
	/**
	 * Create a post type 
	 * 
	 * @param type $input 
	 * @return type
	 */
	public function create($input)
	{
		$input['slug'] = str_slug( $input['plural_name']);
		$postType = PostType::create($input);
		return $postType;
	}


	/**
	 * Update a post type 
	 * 
	 * @param type $input 
	 * @return type
	 */
	public function update($input, $postType)
	{
		$input['slug'] = str_slug( $input['plural_name']);
		return $postType->update($input);
	}


	/**
	 * Return a postType by id
	 * 
	 * @param type $id 
	 * @return type
	 */
	public function find($id)
	{
		return PostType::findOrFail($id);
	}


	/**
	 * Delete the postType
	 * 
	 * @param type $postType 
	 * @return type
	 */
	public function delete($postType)
	{
		return $postType->delete();
	}


	/**
	 * Return all the postTypes
	 * 
	 * @return type
	 */
	public function all()
	{
		return PostType::all();
	}
}


?>