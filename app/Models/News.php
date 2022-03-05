<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'tags', 'author'];

    protected $casts = ['tags' => 'array', 'created_at' => 'datetime:d.m.Y' ];

    /**
     * The tags that belong to the news.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
