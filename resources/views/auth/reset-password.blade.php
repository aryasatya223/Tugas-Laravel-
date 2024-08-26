<x-layout>
    <h1 class="title">Reset Your Password</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <!-- Pastikan input hidden token tertutup dengan benar -->
            <input type="hidden" name="token" value="{{ $token }}" />

            {{-- email --}}
            <div class="mb-4">
                <label for="email" class="block">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="input @error('email') ring-red-500 @enderror w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />

                @error('email')
                    <p class="error text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- password --}}
            <div class="mb-4">
                <label for="password" class="block">Password</label>
                <input type="password" name="password" class="input @error('password') ring-red-500 @enderror w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />

                @error('password')
                    <p class="error text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- confirm password --}}
            <div class="mb-4">
                <label for="password_confirmation" class="block">Confirm Password</label>
                <input type="password" name="password_confirmation" class="input w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            {{-- submit --}}
            <div class="mt-8">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Reset Password</button>
            </div>
        </form>
    </div>
</x-layout> 
