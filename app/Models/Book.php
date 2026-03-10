<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'title', 'isbn', 'description', 'price', 'published_on'];

    protected $casts = [
        'published_on' => 'date',
        'price'        => 'float',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}