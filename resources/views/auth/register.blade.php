<x-layout>
    
    <h1 class="title">Register a New Account</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('register') }}" method="post"
            x-data="formSubmit" @submit.prevent="submit">
            @csrf
            
            {{-- username --}}
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" class="input @error('username') ring-red-500" @enderror>

                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- email --}}
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="input @error('email') ring-red-500" @enderror>

                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- password --}}
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" class="input @error('password') ring-red-500" @enderror>

                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- confirm password --}}
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="input @error('password') ring-red-500" @enderror>
            </div>

            <div class="mb-4">
                <input type="checkbox" name="subscribe" id="subscribe">
                <label for="subscribe">Subscribe to our newsletter</label>
            </div>

            {{-- submit --}}
            <div class="mt-8">
                <button  x-ref="btn" type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Register</button>
            </div>
        </form>
    </div>
</x-layout>