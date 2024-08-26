<x-layout>

    <div class="card">

        {{-- Session Messages --}}
        @if (session('message'))
            <x-flashMsg msg="{{ session('message') }}" />
        @endif

        <h1 class="title">Please verify your email through the email we've sent you.</h1>

        <p class="card mb-4 p-6 rounded-lg shadow-md bg-white">Didn't get the email?</p>
        <form action="{{ route('verification.send') }}" method="post">
            @csrf

            <button class="w-full bg-[#1b2a41] text-white py-2 px-4 rounded-lg hover:bg-[#162230] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Send the email verification again</button>
        </form>

    </div>
</x-layout>