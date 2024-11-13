<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            Data LKS
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
        <a href="{{ route('rombel.create') }}">
            <x-secondary-button class="mb-5">Tambah</x-secondary-button>    
        </a> 
        <!-- NOTIFIKASI -->  
        @if (session('success'))
            <div class="bg-green-400 border border-green-700 text-green-100 py-3 rounded text-center mb-2" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif        
        <x-table>
            <x-slot:thead>
                <th class="p-3">No</th>
                <th class="p-3">Nama Kelas</th>
                <th class="p-3">Aksi</th>
            </x-slot:thead>
            @foreach ($rombels as $rombel)
            <tr class="border-b">
                <td class="p-3">{{ $loop->iteration }}</td>
                <td class="p-3">{{ $rombel->name }}</td>
                <td class="p-3">
                    <a href="{{ route('rombel.edit', $rombel->id) }}">
                        <x-secondary-button class="mb-2">Edit</x-secondary-button>    
                    </a>
                    <form method="post" action="{{ route('rombel.destroy', $rombel->id) }}" class="ms-2 inline">
                        @csrf
                        @method('DELETE')
                
                        <x-primary-button>Hapus</x-primary-button>
                    </form>   
                </td>  
            </tr>
            @endforeach
        </x-table>

                 {{ $rombels->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
