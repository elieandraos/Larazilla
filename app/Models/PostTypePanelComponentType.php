<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTypePanelComponentType extends Model
{
    protected $table = "posts_types_panels_components_types";
    protected $fillable = ['name', 'caption', 'presenter_name'];
    public $timestamps = false;


    /**
     * the components that belongs to this component type
     * 
     * @return type
     */
    public function components()
	{
		return $this->hasMany('App\Models\PostTypePanelComponent');
	}
}
