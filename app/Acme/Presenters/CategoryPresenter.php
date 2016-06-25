<?php
namespace App\Acme\Presenters;

use Laracasts\Presenter\Presenter;
use View;

class CategoryPresenter extends Presenter 
{
	
	public function nestedListRow()
	{
		return View::make('admin.categories.presenters.nestedListRow', ['category' => $this]);
	}


	/**
     * The Laracast presenter object only uses the __get() magic method. 
     * It therefore will not check if the method you're trying to run may exist on you entity.
     * 
     * @return type
     */
    public function hasChildren()
    {
        return $this->entity->hasChildren();
    }

    
    /**
     * The Laracast presenter object only uses the __get() magic method. 
     * It therefore will not check if the method you're trying to run may exist on you entity.
     * 
     * @return type
     */
    public function getChildren()
    {
        return $this->entity->getChildren();
    }


}