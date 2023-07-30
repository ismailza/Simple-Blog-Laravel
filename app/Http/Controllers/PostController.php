<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Redirect;

class PostController extends Controller
{
    public function index () {
        return view('blog.index', [
            'posts' => Post::with('tags', 'category')->paginate(5)
        ]);
    }

    public function show ($slug, Post $post) {
        if ($post->slug !== $slug) return to_route('blog.show', ['slug' => $post->slug, 'post' => $post->id]);
        return view('blog.show',[
            'post' => $post
        ]);
    }

    public function create () {
        $post = new Post;
        return view('blog.create', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get()
        ]);
    }

    public function store (CreatePostRequest $request) {
        $post = Post::create($request->validated());
        $post->tags()->sync($request->validated('tags'));
        return redirect()->route('blog.show', [
            'slug' => $post->slug,
            'post' => $post->id
        ])->with('success', "L'article a été ajouté avec succès");
    }

    public function edit (Post $post) {
        return view('blog.edit', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get()
        ]);
    }

    public function update (Post $post, CreatePostRequest $request) {
        $post->update($request->validated());
        $post->tags()->sync($request->validated('tags'));
        return redirect()->route('blog.show', [
            'slug' => $post->slug,
            'post' => $post->id
        ])->with('success', "L'article a été modifié avec succès");
    }

    public function category (Category $category) {
        return view('blog.category', [
            'category' => $category,
            'posts' => Category::with('posts')->find($category->id)->posts()->paginate(5)
        ]);
    }

}
