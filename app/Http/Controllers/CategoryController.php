<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function posts () {
        return $this->hasMany(Post::class);
    }
}
