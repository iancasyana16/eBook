<x-layouts.dashboard>
    @if (session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded shadow">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-2 p-5">
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('dashboard.create') }}">
                <x-button :type="'submit'" :class="'w-md'" :size="'sm'" :variant="'primary'">
                    Add eBook
                </x-button>
            </a>
        @endif
        <div class="bg-white shadow-md rounded p-3 mt-3">
            <x-table.table>
                <x-slot:head>
                    <x-table.th>no</x-table.th>
                    <x-table.th>ebook name</x-table.th>
                    <x-table.th>action</x-table.th>
                </x-slot:head>
                <x-slot:body>
                    @foreach ($ebooks as $index => $ebook)
                        <x-table.tr>
                            <x-table.td>{{ $index + 1 }}</x-table.td>
                            <x-table.td>{{ $ebook->title }}</x-table.td>
                            <x-table.td>
                                <div class="space-x-2 flex items-center">
                                    <a href="{{ route('ebook.show', $ebook->id) }}" target="_self">
                                        <x-button>view</x-button>
                                    </a>
                                    <form action="{{ route('ebook.destroy', $ebook->id) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <x-button :type="'submit'" :variant="'danger'">delete</x-button>
                                    </form>
                                </div>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-slot:body>
            </x-table.table>
            @if ($ebooks->isEmpty())
                <div class="text-center m-3 p-3">no data available</div>
            @endif
        </div>
    </div>
    <script>
        function konfirmasiDelete() {
            if (confirm('Yakin ingin menghapus data ini?')) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
</x-layouts.dashboard>