@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-semibold mb-4">Forum posts</h1>
            <a href="{{ route('forum.create') }}" class="text-blue-500 hover:underline">Create new post</a>
        </div>

        @foreach ($posts as $post)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow mb-4">
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <div class="font-semibold text-lg">{{ $post->subject }}</div>
                        @if(auth()->check() && $post->user_id == auth()->user()->id)
                            <div class="flex space-x-2">
                                <a href="{{ route('forum.edit', $post->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                <form action="{{ route('forum.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="text-gray-600 dark:text-gray-300 mb-4">{{ $post->content }}</div>
                    <div class="text-gray-500 dark:text-gray-400">By {{ $post->user->name }}</div>
                </div>

                @if (count($post->comments) > 0)
                    <div class="bg-gray-100 dark:bg-gray-700 p-4">
                        <h2 class="text-lg font-semibold mb-2">Comments</h2>
                        @foreach ($post->comments as $comment)
                            <div class="mb-2">
                                <div class="text-gray-600 dark:text-gray-300">{{ $comment->content }}</div>
                                <div class="text-gray-500 dark:text-gray-400">By {{ $comment->user->name }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection
