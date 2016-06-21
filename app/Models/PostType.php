<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Acme\Services\Settings;
 
class PostType extends Model
{
    protected $table = "posts_types";
    protected $fillable = [ 'singular_name', 'plural_name', 'slug', 'fa_icon', 'options' ];
 
    public $timestamps = false;
    protected $casts = [ 'options' => 'json'];


    /**
     * the posts that belongs to the post type
     * 
     * @return type
     */
    public function posts()
    {
    	return $this->hasMany('App\Models\Post');
    }


    /**
     * the panels that belongs to the post type
     * 
     * @return type
     */
    public function panels()
    {
        return $this->hasMany('App\Models\PostTypePanel');
    }


    /**
     * the panels that belongs to the post type
     * 
     * @return type
     */
    public function components()
    {
        return $this->hasMany('App\Models\PostTypePanelComponent');
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
