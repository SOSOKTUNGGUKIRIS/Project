<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Siswa
        </h2>
    </x-slot>

    <x-content>
        <form method="post" action="{{ route('student.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
    
            <div>
                <x-input-label for="name" value="Nama Siswa" />
                <x-text-input id="name" name="name" type="text"
                    value="{{ old('name') }}" class="mt-1 w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="nis" value="NIS" />
                <x-text-input id="nis" name="nis" type="text"
                    value="{{ old('nis') }}" class="mt-1 w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('nis')" />
            </div>

            <div>
                <x-input-label for="gender" value="Gender" />
                <x-select id="gender" name="gender" type="text"
                    value="{{ old('gender') }}" class="mt-1 w-full">
                    <option value="B">Laki-laki</option>
                    <option value="G">Perempuan</option>
                </x-select>
                <x-input-error class="mt-2" :messages="$errors->get('gender')" />
            </div>

            <div>
                <x-input-label for="rombel_id" value="Kelas" />
                <x-select id="rombel_id" name="rombel_id" type="text"
                    value="{{ old('rombel_id') }}" class="mt-1 w-full">
                    @foreach ($rombels as $rombel)
                        <option value="{{$rombel->id}}">{{ $rombel->name }}</option>
                    @endforeach
                </x-select>
                <x-input-error class="mt-2" :messages="$errors->get('rombel_id')" />
            </div>

            <div>
                <x-input-label for="photo" value="Foto Siswa" />
                <x-text-input id="photo" name="photo" type="file"
                    value="{{ old('photo') }}" class="mt-1 w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('photo')" />
            </div>

            <x-primary-button>Simpan</x-primary-button>
        </form>
    </x-content>
    
</x-app-layout>
