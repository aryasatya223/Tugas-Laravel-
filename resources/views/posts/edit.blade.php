<x-layout>

    <a href="{{ route('dashboard') }}" class="block mb-2 text-xs
    text-blue-500">&larr; Go Back to Your Dashboard</a>

    <div class="card mb-8 mt-4 gray-card p-4 bg-white shadow-md rounded-lg">
        <h2 class="font-bold mb-4">Update Ur New Post</h2>


    <form action="{{ route('posts.update', $post) }}" 
    method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Post Title --}}
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Post Title</label>
            <input type="text" name="title" value="{{ $post->title }}" 
            class="w-full border border-gray-300 p-2 rounded @error('title') border-red-500 @enderror">

            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Post Content --}}
        <div class="mb-4">
            <label for="body" class="block text-gray-700">Post Content</label>
            <textarea name="body" rows="5" class="w-full border border-gray-300 p-2 rounded @error('body') border-red-500 @enderror">{{ $post->body }}</textarea>

            @error('body')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{--Current cover photo if exist--}}
        @if ($post->image)
        <div class="h-100 rounded-md mb-4 w-full object-cover overflow-hidden">
            <label>Current Cover Photo</label>
            <img src="{{ asset('storage/' . $post->image) }}" alt="">
        </div>
        @endif

        {{--Post Image--}}
        <div class="mb-4">
            <label for="image">Cover photo</label>
            <input type="file" name="image" id="image">

            @error('image')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit --}}
        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Update</button>
    </form>
</div>



</x-layout>