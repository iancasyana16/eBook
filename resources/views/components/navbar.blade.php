<div class="container-fluid bg-zinc-800 text-white px-6 py-4 flex justify-between items-center">
    <div class="flex items-center space-x-6">
        <div class="text-2xl font-bold">
            eBook
        </div>
    </div>
    <div class="text-xl font-semibold flex items-center space-x-2">
        <div>
            Hi, {{ auth()->user()->name }}
        </div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            @method('POST')
            <x-button :type="'submit'" :size="'sm'" :variant="'danger'">Logout</x-button>
        </form>
    </div>
</div>