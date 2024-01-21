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
                        <img src="{{asset('storage/' . $book->sampul_buku)}}" alt="{{$book->judul}}"
                             class="w-[200px]">
                        <h1 class="text-3xl font-bold">{{$book->judul}}</h1>
                    </div>

                    <div class="grid grid-cols-2 mb-10">
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

                    <h2 class="text-2xl font-bold">Ulasan</h2>
                    @role('Admin')
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-6">
                        <thead
                            class="text-md text-white uppercase bg-secondary">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ulasan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rating
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            @forelse($book->reviews as $review)
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$review->user->namaLengkap}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$review->user->email}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$review->ulasan}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$review->rating}}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <a href="{{route('review.destroy', $review)}}"
                                           class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5"
                                           onclick="event.preventDefault(); document.querySelector('#delete').submit()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                 class="lucide lucide-trash-2">
                                                <path d="M3 6h18"/>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                                <line x1="10" x2="10" y1="11" y2="17"/>
                                                <line x1="14" x2="14" y1="11" y2="17"/>
                                            </svg>
                                        </a>
                                        <form action="{{route('review.destroy', $review)}}" method="post" id="delete"
                                              class="hidden">@csrf @method('delete')</form>
                                    </div>
                                </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <h2 class="text-center text-2xl font-bold">Tidak ada ulasan terbaru...</h2>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    @else
                        <h2 class="text-lg font-medium">Anda tidak memiliki hak akses</h2>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
