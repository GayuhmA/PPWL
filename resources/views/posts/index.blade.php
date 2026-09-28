@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-900">Posts</h1>
            <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Create New Post</a>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-4">
            @forelse ($posts as $post)
                <div class="border-b border-gray-200 pb-4">
                    <h2 class="text-xl font-bold">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">{{ $post->title }}</a>
                    </h2>
                    <p class="text-gray-600 mt-2">{{ Str::limit($post->description, 100) }}</p>
                </div>
            @empty
                <p class="text-gray-500">Belum ada post.</p>
            @endforelse
        </div>
    </div>
@endsection
