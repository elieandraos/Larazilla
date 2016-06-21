<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMetaTranslation extends Model
{
    protected $table = 'posts_metas_translations';
    protected $fillable = ['value'];
   
    public $timestamps = false;
}
