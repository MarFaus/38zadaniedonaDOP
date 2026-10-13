<?php

namespace App\Models;

use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory, HasSearch;

    protected $fillable = ['name', 'birth_date', 'country', 'biography'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}