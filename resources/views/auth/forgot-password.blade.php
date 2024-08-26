<x-layout>
    <h1 class="title">Request a password reset email</h1>

    {{-- Session Messsage --}}
    @if (session('status'))
        <x-flashMsg msg="{{ session('status') }}" bg="bg-green-500" />
@endif

    <div class="mx-auto max-w-screen-sm card">
        <form action=" {{route('password.request')}}" method="post"
        x-data="formSubmit" @submit.prevent="submit">
            @csrf

            {{-- email --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="input @error('email') ring-red-500 @enderror">

                @error('email')
                    <p class="error text-red-500">{{ $message }}</p>
                @enderror
            </div>


            {{-- submit --}}
            <div class="mt-8">
                <button  x-ref="btn" type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Submit</button>
            </div>
        </form>
    </div>
</x-layout>
