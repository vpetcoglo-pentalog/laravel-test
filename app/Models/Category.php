<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'parent_id'
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function adverts(): HasMany
    {
        return $this->hasMany(Advert::class, 'category_id');
    }

    public function adverts_count(): int
    {
        return $this->hasMany(Advert::class, 'category_id')->count();
    }
}
