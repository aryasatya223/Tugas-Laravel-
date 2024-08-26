{{-- resources/views/components/postCard.blade.php --}}
@props(['post', 'full' => false])

<div class="card gray-card p-4 bg-white shadow-md rounded-lg mb-6 overflow-hidden">
    {{-- Cover Photo--}}
    <div>
        @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="">
            
        @else
        <img src="{{ asset('storage/posts_images/bO6Fvl7GbQkZMz7sCMW3tfV4AymCtaLSCooLZFpi.png') }}" alt="">
        @endif

    </div>
    {{-- Title --}}
    <h2 class="font-bold text-xl mb-2">{{ $post->title }}</h2>

    {{-- Author and Date --}}
    <div class="text-xs font-light mb-4">
        <span>Posted {{ $post->created_at->diffForHumans() }} by </span>
        <a href="#" class="text-blue-500 font-medium">{{ $post->user->username }}</a>
    </div>

    {{-- Body --}}
    @if ($full)
    <div class="text-sm">
        <span>{{ ($post->body) }}</span>
    </div>
    @else
    <div class="text-sm">
        <span>{{ Str::words($post->body, 15) }}</span>
        <a href="{{ route('posts.show', $post) }}" 
        class="text-blue-500 ml-2">Read More &rAarr;</a>
    </div>
    @endif

    <div class="flex items-center justify-end gap-4 mt-6">
        {{$slot}}
    </div>
</div>
