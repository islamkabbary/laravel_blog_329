<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session("success"))
            <div class="mb-6 rounded-md bg-green-100 text-gray-800">{{ session('success') }}</div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- @can('create')                         --}}
                    <div class="mb-4 flex justify-end">
                        <a href="{{ route('posts.create') }}" class="border text-white font-bold py-2 px-4 rounded">
                            + Create New Post
                        </a>
                    </div>
                    {{-- @endcan --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white text-black dark:bg-gray-700 dark:text-white rounded">
                            <thead>
                                <tr class="bg-gray-900 shadow-md dark:bg-gray-600 text-left">
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Content</th>
                                    <th class="px-4 py-2">User</th>
                                    <th class="px-4 py-2">Image</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (App\Models\Post::orderBy('id', 'desc')->paginate(10) as $post)
                                    {{-- <tr class="border-b border-gray-300 dark:border-gray-600"> --}}
                                        <td class="px-4 py-2">{{$post->id}}</td>
                                        <td class="px-4 py-2">{{$post->title}}</td>
                                        <td class="px-4 py-2">{{$post->content}}</td>
                                        <td class="px-4 py-2">{{$post?->user?->name}}</td>
                                        <td class="px-4 py-2"><img width="100" src="{{ asset('storage/' . $post->image) }}"></td>
                                        <td class="px-4 py-2 flex space-x-2">
                                            <a href=""
                                                class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-1 px-3 rounded">
                                                ✏️ Edit
                                            </a>
                                            {{-- @can("delete-post" , $post)        --}}
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                                    🗑️ Delete
                                                </button>
                                            </form>
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Posts Found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="my-4">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
