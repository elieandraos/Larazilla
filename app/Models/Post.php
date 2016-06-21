<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use App\Models\PostType;



class Post extends Model implements HasMediaConversions
{
    use Translatable, HasMediaTrait;

    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'post_type_id'];
    
    public $translatedAttributes = ['title', 'excerpt', 'body'];
    public $translationModel = 'App\Models\PostTranslation';


    /**
     * The post type of the post
     * @return type
     */
    public function postType()
    {
    	return $this->belongsTo('App\Models\PostType');
    }


    /**
     * the metas that belongs to the post
     * 
     * @return type
     */
    public function postMetas()
    {
        return $this->hasMany('App\Models\PostMeta');
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
     * Get the post meta object by key
     * 
     * @param type $meta_key 
     * @return type
     */
    public function getPostMeta($meta_key)
    {
        return $this->postMetas()->where('key', '=', $meta_key)->where('post_id', '=', $this->id)->first();
    }


    /**
     * Media Conversions
     * 
     * @return type
     */
    public function registerMediaConversions()
    {
        //register the post types conversions
        $postTypes = PostType::all();
        if($postTypes->count())
        {
            foreach($postTypes as $postType)
            {
               $media = $postType->settings()->get('media');
               if($media && isset($media['conversions']))
               {
                    $conversions = $media['conversions'];
                    foreach($conversions as $c)
                    {
                        $this->addMediaConversion($c['name'])
                            ->setManipulations(['w' => $c['manipulations']['w'], 'h' => $c['manipulations']['h']])
                            ->performOnCollections($c['collection']);
                    }
               }
            }
        }

        $this->addMediaConversion('adminThumb')
             ->setManipulations(['w' => 48, 'h' => 48])
             ->performOnCollections('*');
    }


    /**
     * Returns a media object filtered by custom properties (meta_key, locale ...)
     * 
     * @param type $properties 
     * @param type|string $collection 
     * @return type
     */
    public function getMediaByCustomProperties($properties , $collection = 'images')
    {
        $medias = $this->getMedia($collection);
        if(count($medias))
        {
            foreach($properties as $key => $value)
            {
                //filter them one by one
                $medias = $medias->filter(function($item) use ($key, $value) {
                    return $item->getCustomProperty($key) == $value;
                });
            }
            
            if($medias->count())
                return $medias->first();
            else
                return null;
        }
        
        return null;
    }


    /*
{
    "media": {
        "conversions": [{
            "name": "featuredImage",
            "manipulations": {
                "w": "620",
                "h": "480"
            },
            "collection": "player"
        }, {
            "name": "gridImage",
            "manipulations": {
                "w": "200",
                "h": "140"
            },
            "collection": "player"
        }]
    }
}
*/

}
