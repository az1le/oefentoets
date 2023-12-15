@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-semibold mb-4">Create new post</h1>
            <a href="{{ route('forum.index') }}" class="text-blue-500 hover:underline">Back to posts</a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <form action="{{ route('forum.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="subject" class="block text-gray-600 dark:text-gray-300 text-sm font-semibold mb-2">Subject:</label>
                    <input type="text" name="subject" id="subject" class="w-full border p-2" required>
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-gray-600 dark:text-gray-300 text-sm font-semibold mb-2">Content:</label>
                    <textarea name="content" id="content" rows="4" class="w-full border p-2" required></textarea>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Post</button>
            </form>
        </div>
    </div>
@endsection
