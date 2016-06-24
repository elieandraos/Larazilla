<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $table = 'categories_translations';
    protected $fillable = ['title', 'description'];
   
    public $timestamps = false;
}
