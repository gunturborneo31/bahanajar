<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FaqCategory extends Model
{
    protected $fillable = ['parent_id', 'name', 'urutan', 'source_type', 'source_id'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(FaqCategory::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(FaqCategory::class, 'parent_id');
    }

    public function articles(): HasMany
    {
        return $this->hasMany(FaqArticle::class, 'faq_category_id');
    }
}
