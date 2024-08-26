<x-layout>
    <h1 class="title">Login to ur account</h1>

        {{-- Session Messsage --}}
        @if (session('status'))
        <x-flashMsg msg="{{ session('status') }}" bg="bg-green-500" />
@endif

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('login') }}" method="post">
            @csrf

            {{-- email --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="input @error('email') ring-red-500 @enderror">

                @error('email')
                    <p class="error text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- password --}}
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" class="input @error('password') ring-red-500 @enderror">

                @error('password')
                    <p class="error text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- remember me --}}
            <div>
                <div class="mb-4 flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-gray-700">Remember me</label>
                </div>
                <a class="text-blue" href="{{route('password.request')}}">Forgot your password?</a>
                
            </div>

            @error('failed')
                <p class="error text-red-500">{{ $message }}</p>
            @enderror

            {{-- submit --}}
            <div class="mt-8">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Login</button>
            </div>
        </form>
    </div>
</x-layout>
