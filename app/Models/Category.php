<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;
use Kalnoy\Nestedset\Node;

class Category extends Model
{
    use Translatable;
    
    protected $table = "categories";
    protected $fillable = ['title', 'description', 'slug', 'category_id'];

    public $translatedAttributes = ['title', 'description'];
    public $translationModel = 'App\Models\CategoryTranslation';
    public $timestamps = false;


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
}
