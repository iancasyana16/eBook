<x-layouts.auth>
    <div class="min-h-screen flex justify-center items-center">
        @if (session('success'))
            <div class="fixed top-4 right-4 z-50 bg-green-500 text-white px-4 py-2 rounded shadow">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="fixed top-4 right-4 z-50 bg-red-500 text-white px-4 py-2 rounded shadow">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
            @method('POST')
            <div class="bg-white shadow-md w-md rounded-lg p-3">
                <div class="text-center font-semibold text-2xl mb-5">
                    Login
                </div>
                <div class="my-2">
                    <x-label :for="'email'">email</x-label>
                    <x-input :type="'text'" :name="'email'" :id="'email'" :value="old('email')" />
                    @error('email')
                        <div class="my-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-2">
                    <x-label :for="'password'">password</x-label>
                    <x-input :type="'password'" :name="'password'" :id="'password'" :value="old('password')" />
                    @error('passsword')
                        <div class="my-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-2">
                    <x-label :class="'text-blue-500'">
                        <a href="{{ route('registerForm') }}">dont have account? click here</a>
                    </x-label>
                </div>
                <div class="my-2">
                    <x-button :type="'submit'">Login</x-button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.auth>