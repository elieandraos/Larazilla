<?php 

namespace App\Acme\Repositories; 
use App\Models\PostType;
use App\Models\Post;
use App\Models\PostMeta;

class PostRepository extends DbRepository implements PostRepositoryInterface 
{
	
	/**
	 * Create a post 
	 * 
	 * @param type $input 
	 * @return type
	 */
	public function create($input, $postType)
	{
		$input['post_type_id'] = $postType->id;
		$post = Post::create($input);
		
		return $post;
	}


	/**
	 * Update a post 
	 * 
	 * @param type $input 
	 * @return type
	 */
	public function update($input, $post, $postType)
	{
		return $post->update($input);
	}


	/**
	 * Return a post by id
	 * 
	 * @param type $id 
	 * @return type
	 */
	public function find($id)
	{
		return Post::findOrFail($id);
	}


	/**
	 * Delete the post
	 * 
	 * @param type $post 
	 * @return type
	 */
	public function delete($post)
	{
		return $post->delete();
	}


	/**
	 * Return all the postTypes
	 * 
	 * @return type
	 */
	public function all($postType)
	{
		return $postType->posts;
	}
}


?>