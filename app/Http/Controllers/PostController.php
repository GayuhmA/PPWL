<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255|min:5',
            'description' => 'required|string|min:10',
        ]);

        Post::create($validatedData);

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil ditambahkan.');
    }

    public function show(Post $post)
    {
        return view('posts.detail', compact('post'));
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $data = [
            'post' => $post,
        ];
        return view('posts.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255|min:5',
            'description' => 'required|string|min:10',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validatedData);

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil dihapus.');
    }
}
