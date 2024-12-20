<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Other fields, relationships, etc.
    protected $fillable = ['title', 'slug', 'description', 'category_id'];
}
