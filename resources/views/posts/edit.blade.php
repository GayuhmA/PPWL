@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Edit Blog Post</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required class="border border-gray-300 p-2 rounded w-full @error('title') border-red-500 @enderror">
                @error('title')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" id="description" required rows="5" class="border border-gray-300 p-2 rounded w-full @error('description') border-red-500 @enderror">{{ old('description', $post->description) }}</textarea>
                @error('description')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center space-x-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Submit</button>
                <a href="{{ route('posts.show', $post->id) }}" class="text-gray-500 hover:text-gray-700">Cancel</a>
            </div>
        </form>
    </div>
@endsection
