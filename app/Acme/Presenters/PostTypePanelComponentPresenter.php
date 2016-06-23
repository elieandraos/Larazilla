<?php 

namespace App\Acme\Presenters;
use Laracasts\Presenter\Presenter;
use View;

class PostTypePanelComponentPresenter extends Presenter 
{
	/**
	 * Renders the form input of the component
	 * @return type
	 */
	public function formInput($locale, $post, $form_method)
    {
        $componentTypePresenter = $this->componentType->presenter_name;
        $name = 'meta['.$this->html_name.']['.$locale.']';
        $id = 'meta['.$this->html_id.']['.$locale.']';
        
        if($post)
        {
            $postMeta = $post->getPostMeta($this->meta_key);
            if($componentTypePresenter == "Image")
            {
                $collection = $this->settings()->get("collection");
                $media = $post->getMediaByCustomProperties( [ 'key' => $this->meta_key, 'locale' => $locale], $collection);
            }
            else
                $media = null;

            if($componentTypePresenter == "AjaxUploader")
            {
                $collection = $this->settings()->get("collection");
                $dropzoneMedias = $post->getMediaByCustomProperties( [ 'key' => $this->meta_key, 'locale' => $locale], $collection, true);
            }
            else
                $dropzoneMedias = null;
        }
        else
        {
            $postMeta = null;
            $media = null;
            $dropzoneMedias = null;
        }

        return View::make('admin.components.presenters.'.$componentTypePresenter, [
        	'component' => $this, 
        	'locale' => $locale, 
            'post' => $post,
            'postMeta' => $postMeta,
            'media' => $media,
            'dropzoneMedias' => $dropzoneMedias,
        	'name' => $name,
        	'id' => $id,
            'form_method' => $form_method,
        	'error_key' => 'meta.'.$this->html_name.'.'.$locale
        ]);
    }

    
    /**
     * The options attribute is casted as json in the PostTypePanelComponent model $casts property, 
     * so by default it will be treated as an array when retrieving it.
     * This method will presnet it as plain json string 
     * 
     * @param type $value 
     * @return type
     */
    public function options_json()
    {
        if(!$this->options)
            return '';

        return json_encode($this->options);
    }


    /**
     * The Laracast presenter object only uses the __get() magic method. 
     * It therefore will not check if the method you're trying to run may exist on you entity.
     * 
     * @return type
     */
    public function settings()
    {
        return $this->entity->settings();
    }
    
}
