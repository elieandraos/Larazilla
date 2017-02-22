<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;
use Kalnoy\Nestedset\NodeTrait;
use Laracasts\Presenter\PresentableTrait;

class Category extends Model
{
    use Translatable, PresentableTrait, NodeTrait;
    
    protected $table = "categories";
    protected $fillable = ['title', 'description', 'slug', 'category_id'];
    protected $presenter = 'App\Acme\Presenters\CategoryPresenter';

    public $translatedAttributes = ['title', 'description'];
    public $translationModel = 'App\Models\CategoryTranslation';
    public $timestamps = false;


    /**
     * The posts that belongs to the category.
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    /**
     * Method that loads the translations to the model attributes
     * when using Form::model() 
     * 
     * @return type
     */
    public function addAllTranslations()
    {
        $locales = array_unique(config('translatable.locales'));
        foreach ($locales as $locale) {
            $this->$locale = $this->getTranslation($locale);
        }
        return $this;
    }


    /**
     * a method to get the children by order
     * @param type $categories 
     * @return type
     */ 
    public function getChildren()
    {
        return $this->children()->orderBy('_lft')->get();
    }
    
}
