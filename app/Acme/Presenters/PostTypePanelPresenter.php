<?php 

namespace App\Acme\Presenters;
use Laracasts\Presenter\Presenter;
use View;

class PostTypePanelPresenter extends Presenter 
{
	/**
	 * Renders the card header
	 * @return type
	 */
	public function card($form_method, $post = null)
    {
    	$locales = config('translatable.locales');
        return View::make('admin.panels.presenters.card', ['panel' => $this, 'post' => $post,'locales' => $locales, 'form_method' => $form_method]);
    }
    
}