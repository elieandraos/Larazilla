<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;

class PostMeta extends Model
{
    use Translatable;
    
    protected $table = "posts_metas";
    protected $fillable = ['key', 'value', 'post_id', 'component_id'];
    protected $casts = [ 'value' => 'json'];

    public $translatedAttributes = ['value'];
    public $translationModel = 'App\Models\PostMetaTranslation';
    public $timestamps = false;

     /**
     * The post that the meta belongs to
     * @return type
     */
    public function post()
    {
    	return $this->hasOne('App\Models\Post');
    }


    /**
     * The post type component that the meta belongs to
     * @return type
     */
    public function component()
    {
        return $this->hasOne('App\Models\PostTypePanelComponent');
    }

}
