<?php 

namespace App\Acme\Repositories;
	
interface PostRepositoryInterface
{
	public function create($input, $postType);
	public function update($input, $post, $postType);
	public function find($id);
	public function delete($post); 
	public function all($postType);
}

?>