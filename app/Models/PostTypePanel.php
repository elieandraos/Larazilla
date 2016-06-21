<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class PostTypePanel extends Model
{
    use PresentableTrait;

    protected $table = "posts_types_panels";
    protected $fillable = ['name', 'position', 'fa_icon', 'order', 'post_type_id'];
    protected $presenter = 'App\Acme\Presenters\PostTypePanelPresenter';
    public $timestamps = false;


    /**
     * The post that the meta belongs to
     * @return type
     */
    public function postType()
    {
    	return $this->hasOne('App\Models\PostType');
    }


    /**
     * The components that belongs to the panel
     * 
     * @return type
     */
    public function components()
    {
        return $this->hasMany('App\Models\PostTypePanelComponent');
    }


    /**
     * Local model scope to query panel by position 
     * 
     * @param type $query 
     * @param type|string $type 
     * @return type
     */
    public function scopePosition($query, $type = "normal")
    {
        return $query->where('position', $type);
    }

}
