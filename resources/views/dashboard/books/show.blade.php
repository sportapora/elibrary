<x-app-layout>
    <x-slot name="title">{{$book->judul}}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($book->judul) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col gap-4 items-center mb-6">
                        <img src="{{asset('storage/' . $book->sampul_buku)}}" alt="{{$book->judul}}" class="w-[200px]">
                        <h1 class="text-center text-2xl font-bold">{{$book->judul}}</h1>
                    </div>

                    <div class="grid grid-cols-2">
                        <div>
                            <p>Category</p>
                            <p>Penulis</p>
                            <p>Penerbit</p>
                            <p>Tahun Terbit</p>
                            <p>Ringkasan</p>
                        </div>
                        <div class="font-medium">
                            <p>: {{$book->category->namaKategori}}</p>
                            <p>: {{$book->penulis}}</p>
                            <p>: {{$book->penerbit}}</p>
                            <p>: {{$book->tahunTerbit}}</p>
                            <p>: {{$book->ringkasan}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
