<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use App\Acme\Services\Settings;

class PostTypePanelComponent extends Model
{
    use PresentableTrait;
    
    protected $table = "posts_types_panels_components";
    protected $fillable = ['label', 'meta_key', 'html_name', 'html_id', 'css_class', 'options', 'order', 'post_type_panel_id', 'component_type_id', 'post_type_id'];
    protected $casts = ['options' => 'json'];
    protected $presenter = 'App\Acme\Presenters\PostTypePanelComponentPresenter';

    public $timestamps = false;


    /**
     * The post type that the component belongs to
     * 
     * @return type
     */
    public function postType()
    {
        return $this->hasOne('App\Models\PostType');
    }
    

    /**
     * The panel that the component belongs to
     * 
     * @return type
     */
    public function panel()
    {
    	return $this->hasOne('App\Models\PostTypePanel');
    }


    /**
     * The componentType that the component belongs to
     * 
     * @return type
     */
    public function componentType()
    {
        return $this->belongsTo('App\Models\PostTypePanelComponentType');
    }


    /**
     * A service class to handle the json data
     * to get something like this: $user->settings()->get($key), $user->settings()->set($key, $value)
     * 
     * @return type
     */
    public function settings()
    {
        return new Settings($this, 'options');
    }
}
