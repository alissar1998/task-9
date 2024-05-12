<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Author extends Model
{
    protected $fillable=[
        'authorName',
    ];
    use HasFactory;
    public $table = 'authors';
    public function books()
    {
        return $this->belongsToMany(Book::class,'books_authors','author_id','book_id');
    }
    public function reviews():MorphToMany
    {
        return $this->morphToMany(Review::class,'reviewable');
    }
}
