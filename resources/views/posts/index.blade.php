<x-layout>
    <h1 class="text-3xl font-bold mb-6">Latest Posts</h1>
  
    
{{--List Of Post--}}
    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <x-postCard :post="$post" />
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>
</x-layout>