<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * The news that belong to the tag.
     */
    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
