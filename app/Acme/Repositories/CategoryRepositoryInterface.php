<?php 

namespace App\Acme\Repositories;
	
interface CategoryRepositoryInterface
{
	public function create($input);
	public function update($input, $category);
	public function find($id);
	public function delete($category);
	public function getAll();
	public function getRoots();
}

?>