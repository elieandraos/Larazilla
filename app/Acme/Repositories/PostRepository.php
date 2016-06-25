<?php 

namespace App\Acme\Repositories; 

use App\Models\PostType;
use App\Models\Post;
use App\Models\PostMeta;
use Carbon\Carbon;

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
		$input['publish_date'] = Carbon::parse($input['publish_date'])->format('Y-m-d');

		$post = Post::create($input);

		if(isset($input['category_id']))
			$post->categories()->sync($input['category_id']);
		else
			$post->categories()->detach();
		
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
		if(isset($input['category_id']))
			$post->categories()->sync($input['category_id']);
		else
			$post->categories()->detach();
		
		$input['publish_date'] = Carbon::parse($input['publish_date'])->format('Y-m-d');
		
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