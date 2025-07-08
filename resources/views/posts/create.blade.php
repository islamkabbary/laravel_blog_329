<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Create Form -->
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-1" for="title">Title</label>
                            <input type="text" name="title" id="title"
                                class="w-full px-4 py-2 rounded text-black" value="{{ old('title') }}">
                            <p class="text-red-500">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1" for="content">Content</label>
                            <textarea name="content" id="content" rows="5" class="w-full px-4 py-2 rounded">{{ old('content') }}</textarea>
                            <p class="text-red-500">
                                @error('content')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1" for="image">Image</label>
                            <input type="file" name="image" id="image" accept="image/*" class="w-full">
                            <p class="text-red-500">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="text-white shadow-xl font-bold py-2 px-4 rounded">
                                Save Post
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
