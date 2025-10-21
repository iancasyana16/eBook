<x-layouts.auth>
    <div class="min-h-screen flex justify-center items-center">
        <form action="{{ route('register') }}" method="post">
            @csrf
            @method('POST')
            <div class="bg-white shadow-md w-md rounded-lg p-3">
                <div class="text-center font-semibold text-2xl mb-5">
                    Register
                </div>
                <div class="my-2">
                    <x-label :for="'name'">name</x-label>
                    <x-input :type="'text'" :name="'name'" :id="'name'"/>
                    @error('name')
                        <div class="my-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-2">
                    <x-label :for="'email'">email</x-label>
                    <x-input :type="'text'" :name="'email'" :id="'email'"/>
                    @error('email')
                        <div class="my-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-2">
                    <x-label :for="'password'">password</x-label>
                    <x-input :type="'password'" :name="'password'" :id="'password'"/>
                    @error('password')
                        <div class="my-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-2">
                    <x-button :type="'submit'">Register</x-button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.auth>