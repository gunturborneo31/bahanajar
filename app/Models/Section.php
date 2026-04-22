<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    public $timestamps = false;
    protected $fillable = [
        'category_id', 'group_type', 'zendesk_id', 'name', 'url'
    ];

    public function articles()
    {
        return $this->hasMany(\App\Models\Article::class, 'section_id');
    }
}
