<x-app-layout>
    <x-slot name="title">Books</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Modal toggle -->
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-6"
                            type="button">
                        Tambah Data Buku
                    </button>

                    <!-- Main modal -->
                    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Tambah Data Buku Baru
                                    </h3>
                                    <button type="button"
                                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="authentication-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <form class="space-y-4" method="post" action="{{route('books.store')}}">
                                        @csrf
                                        <div>
                                            <x-input-label for="sampul_buku" :value="__('Sampul Buku')"/>

                                            <x-text-input id="sampul_buku" class="block mt-1 w-full"
                                                          type="file"
                                                          name="sampul_buku"/>

                                            <x-input-error :messages="$errors->get('sampul_buku')" class="mt-2"/>
                                        </div>

                                        <div>
                                            <x-input-label for="judul" :value="__('Judul Buku')"/>

                                            <x-text-input id="judul" class="block mt-1 w-full"
                                                          type="text"
                                                          name="judul"/>

                                            <x-input-error :messages="$errors->get('judul')" class="mt-2"/>
                                        </div>

                                        <div>
                                            <x-input-label for="penulis" :value="__('Penulis Buku')"/>

                                            <x-text-input id="penulis" class="block mt-1 w-full"
                                                          type="text"
                                                          name="penulis"/>

                                            <x-input-error :messages="$errors->get('penulis')" class="mt-2"/>
                                        </div>
                                        <div>
                                            <x-input-label for="penerbit" :value="__('Penerbit Buku')"/>

                                            <x-text-input id="penerbit" class="block mt-1 w-full"
                                                          type="text"
                                                          name="penerbit"/>

                                            <x-input-error :messages="$errors->get('penerbit')" class="mt-2"/>
                                        </div>
                                        <div>
                                            <x-input-label for="tahunTerbit" :value="__('Tahun Terbit Buku')"/>

                                            <x-text-input id="tahunTerbit" class="block mt-1 w-full"
                                                          type="number"
                                                          name="tahunTerbit"/>

                                            <x-input-error :messages="$errors->get('tahunTerbit')" class="mt-2"/>
                                        </div>

                                        <div class="flex justify-center mt-8">
                                            <x-primary-button>
                                                {{ __('Submit') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-md text-white uppercase bg-[#F15A24]">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Sampul Buku
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Judul
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Penulis
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Penerbit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tahun Terbit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                @forelse($books as $book)
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <img src="{{asset('storage/' . $book->sampul_buku)}}" alt="">
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$book->judul}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$book->penulis}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$book->penerbit}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$book->tahunTerbit}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col md:flex-row gap-3">
                                            <a href="{{route('books.edit', $book)}}"
                                               class="text-white bg-yellow-400 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="lucide lucide-pencil">
                                                    <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                                    <path d="m15 5 4 4"/>
                                                </svg>
                                            </a>
                                            <a href="{{route('books.delete', $book)}}"
                                               onclick="event.preventDefault(); document.querySelector('#delete').submit()">

                                            </a>
                                            <form action="{{route('books.destroy', $book)}}" method="post" id="delete"
                                                  class="hidden">@csrf</form>
                                        </div>
                                    </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <h2 class="text-center text-2xl font-bold">Tidak ada buku terbaru...</h2>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
