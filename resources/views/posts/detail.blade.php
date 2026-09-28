@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $post->title }}</h1>
        <p class="text-gray-700 mb-6">{{ $post->description }}</p>

        <div class="flex items-center space-x-4">
            <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
            
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 cursor-pointer">Delete</button>
            </form>

            <span class="text-gray-300">|</span>
            <a href="{{ route('posts.index') }}" class="text-blue-500 hover:text-blue-700">Back to List</a>
        </div>
    </div>
@endsection
