<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public $timestamps = true;
    
    protected $fillable = [
        'section_id', 'scraped_section_id', 'scraped_jenis', 'group_type',
        'zendesk_id', 'inaproc_jenis', 'inaproc_section_id', 'inaproc_category',
        'title', 'content', 'url'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}