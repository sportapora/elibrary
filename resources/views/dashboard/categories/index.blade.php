<x-app-layout>
    <x-slot name="title">Categories</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-session-alert />
                    <!-- Modal toggle -->
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-6"
                            type="button">
                        Tambah Data Kategori
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
                                        Tambah Data Kategori Baru
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
                                    <form class="space-y-4" method="post" action="{{route('categories.store')}}">
                                        @csrf
                                        <div>
                                            <x-input-label for="namaKategori" :value="__('Nama Kategori')"/>

                                            <x-text-input id="namaKategori" class="block mt-1 w-full"
                                                          type="text"
                                                          name="namaKategori"/>

                                            <x-input-error :messages="$errors->get('namaKategori')" class="mt-2"/>
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
                                    class="text-md text-white uppercase bg-secondary">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Kategori
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                @forelse($categories as $category)
                                    <td class="px-6 py-4">
                                        {{$category->namaKategori}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col md:flex-row gap-3">
                                            <button data-modal-target="edit-modal-{{$category->id}}" data-modal-toggle="edit-modal-{{$category->id}}"
                                                    class="block text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 text-center mb-6"
                                                    type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="lucide lucide-pencil">
                                                    <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                                    <path d="m15 5 4 4"/>
                                                </svg>
                                            </button>
                                            <!-- Main modal -->
                                            <div id="edit-modal-{{$category->id}}" tabindex="-1" aria-hidden="true"
                                                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div
                                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                Edit Data Kategori
                                                            </h3>
                                                            <button type="button"
                                                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                    data-modal-hide="authentication-modal">
                                                                <svg class="w-3 h-3" aria-hidden="true"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                          stroke-linejoin="round"
                                                                          stroke-width="2"
                                                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-4 md:p-5">
                                                            <form class="space-y-4" method="post"
                                                                  action="{{route('categories.update', $category)}}">
                                                                @csrf
                                                                @method('put')
                                                                <div>
                                                                    <x-input-label for="namaKategori"
                                                                                   :value="__('Nama Kategori')"/>

                                                                    <x-text-input id="namaKategori"
                                                                                  class="block mt-1 w-full"
                                                                                  type="text"
                                                                                  value="{{old('category', $category->namaKategori)}}"
                                                                                  name="namaKategori"/>

                                                                    <x-input-error
                                                                            :messages="$errors->get('namaKategori')"
                                                                            class="mt-2"/>
                                                                </div>

                                                                <div class="flex justify-center mt-8">
                                                                    <x-primary-button>
                                                                        {{ __('Update') }}
                                                                    </x-primary-button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{route('categories.destroy', $category)}}"
                                               class="block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center mb-6"
                                               onclick="event.preventDefault(); document.querySelector('#delete').submit()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
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
                                            <form action="{{route('categories.destroy', $category)}}" method="post"
                                                  id="delete"
                                                  class="hidden">@csrf @method('delete')</form>
                                        </div>
                                    </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="2">
                                        <h2 class="text-center text-2xl font-bold">Tidak ada kategori terbaru...</h2>
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
