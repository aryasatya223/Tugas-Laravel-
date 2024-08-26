<x-layout>
    <h1 class="font-bold mb-4">Hello {{ auth()->user()->username }},
    you have {{ $posts->total() }} posts</h1>

    {{-- Create Form --}}
    <div class="card mb-8 mt-4 gray-card p-4 bg-white shadow-md rounded-lg">
        <h2 class="font-bold mb-4">Create a new post</h2>

        {{-- Session Message --}}
        @if (session('success'))
            <div>
                <x-flashMsg msg="{{ session('success') }}" bg="bg-green-500" />
            </div>
            @elseif (session('delete'))

                <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
            </div>
        @endif


        {{--create post form--}}
        <form action="{{ route('posts.store') }}" method="post"
        enctype="multipart/form-data">
            @csrf

            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Post Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full border border-gray-300 p-2 rounded @error('title') border-red-500 @enderror">

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post body avv --}}
            <div class="mb-4">
                <label for="body" class="block text-gray-700">Post Content</label>
                <textarea name="body" rows="5" class="w-full border border-gray-300 p-2 rounded @error('body') border-red-500 @enderror">{{ old('body') }}</textarea>

                @error('body')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{--post image--}}
            <div class="mb-4">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image">

                @error('image')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Create</button>
        </form>
    </div>

    {{-- User Post --}}
    <h2 class="font-bold mb-4">Your Latest Posts</h2>

    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <x-postCard :post="$post">
               
                {{--Update Post--}}
                <a href="{{ route('posts.edit', $post) }}" 
                class="bg-blue-500 text-white px-2 py-1 text-xs rounded-md">Update</a>
                
                {{--Delete Post--}}
                <form action="{{ route('posts.destroy', $post) }}
                " method="post">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-2 py-1 text-xs rounded-md">Delete</button>
            </form>
            </x-postCard>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</x-layout>
 