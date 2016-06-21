<?php 

namespace App\Acme\Repositories;
	
interface PostTypeRepositoryInterface
{
	public function create($input);
	public function update($input, $postType);
	public function find($id);
	public function delete($postType);
	public function all();
}

?>