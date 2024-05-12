<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Book extends Model
{
    protected $fillable =[
        'ISBN',
        'title',
        'author',
        'genre',
        'availability',
    ];
    use HasFactory;
    public $table = 'books';
    public function authors()
    {
        return $this->belongsToMany(Author::class,'books_authors','book_id','author_id');
    }
    public function reviews():MorphToMany
    {
        return $this->morphToMany(Review::class,'reviewable');
    }
}
