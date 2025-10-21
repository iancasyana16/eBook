<x-layouts.dashboard>
    @if (session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded shadow">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-2 p-5">
        <a href="/dashboard">
            <x-button :type="'button'" :variant="'danger'" :size="'sm'" class="w-md my-3">
                Back
            </x-button>
        </a>
        <div class="bg-white shadow-md p-3 rounded-lg">
            <div class="my-2 text-2xl font-bold">
                Add eBook
            </div>
            <form action="{{ route('ebook.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="my-2">
                    <x-label :for="'title'">Title</x-label>
                    <x-input :type="'text'" :name="'title'" :id="'title'" />
                    @error('title')
                        <div class="my-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-2">
                    <x-label :for="'file'">PDF</x-label>
                    <x-input :type="'file'" :name="'file'" :id="'file'" />
                    @error('file')
                        <div class="my-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-2">
                    <x-button :type="'submit'">Add</x-button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>