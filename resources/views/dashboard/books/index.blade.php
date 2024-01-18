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
                    <x-session-alert/>
                    <!-- Modal toggle -->
                    <button data-modal-target="create-modal" data-modal-toggle="create-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-6"
                            type="button">
                        Tambah Data Buku
                    </button>

                    <!-- Main modal -->
                    <div id="create-modal" tabindex="-1" aria-hidden="true"
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
                                    <form class="space-y-4" method="post" action="{{route('books.store')}}"
                                          enctype="multipart/form-data">
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
                                                          value="{{old('judul')}}"
                                                          name="judul"/>

                                            <x-input-error :messages="$errors->get('judul')" class="mt-2"/>
                                        </div>
                                        <div>
                                            <x-input-label for="penulis" :value="__('Penulis Buku')"/>

                                            <x-text-input id="penulis" class="block mt-1 w-full"
                                                          type="text"
                                                          value="{{old('penulis')}}"
                                                          name="penulis"/>

                                            <x-input-error :messages="$errors->get('penulis')" class="mt-2"/>
                                        </div>
                                        <div>
                                            <x-input-label for="penerbit" :value="__('Penerbit Buku')"/>

                                            <x-text-input id="penerbit" class="block mt-1 w-full"
                                                          type="text"
                                                          value="{{old('penerbit')}}"
                                                          name="penerbit"/>

                                            <x-input-error :messages="$errors->get('penerbit')" class="mt-2"/>
                                        </div>
                                        <div>
                                            <x-input-label for="ringkasan" :value="__('Ringkasan')"/>
                                            <textarea name="ringkasan" id="ringkasan" rows="15"
                                                      class="border-gray-300 w-full focus:border-indigo-500 text-primary focus:ring-indigo-500 rounded-md shadow-sm">{{old('ringkasan')}}</textarea>
                                            <x-input-error :messages="$errors->get('ringkasan')" class="mt-2"/>
                                        </div>
                                        <div>
                                            <x-input-label for="tahunTerbit" :value="__('Tahun Terbit Buku')"/>

                                            <x-text-input id="tahunTerbit" class="block mt-1 w-full"
                                                          type="number"
                                                          value="{{old('tahunTerbit')}}"
                                                          name="tahunTerbit"/>

                                            <x-input-error :messages="$errors->get('tahunTerbit')" class="mt-2"/>
                                        </div>
                                        <div>
                                            <x-input-label for="category_id" :value="__('Kategori Buku')"/>
                                            <select id="category_id" name="category_id"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                @forelse($categories as $category)
                                                    <option
                                                        value="{{$category->id}}">{{$category->namaKategori}}</option>
                                                @empty
                                                    <option disabled></option>
                                                @endforelse
                                            </select>
                                            <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                                        </div>

                                        <div class="flex justify-center mt-10">
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
                                        <img src="{{asset('storage/' . $book->sampul_buku)}}" alt="{{$book->judul}}"
                                             class="w-[150px]">
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
                                        <div class="flex flex-col md:flex-row gap-4">
                                            <a href="{{route('books.show', $book)}}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="lucide lucide-eye">
                                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                                    <circle cx="12" cy="12" r="3"/>
                                                </svg>
                                            </a>

                                            <button type="button"
                                                    data-modal-target="edit-modal-{{$book->id}}"
                                                    data-modal-toggle="edit-modal-{{$book->id}}"
                                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="lucide lucide-pencil">
                                                    <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                                    <path d="m15 5 4 4"/>
                                                </svg>
                                            </button>

                                            <div id="edit-modal-{{$book->id}}" tabindex="-1" aria-hidden="true"
                                                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                Edit Data Buku
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
                                                                  action="{{route('books.update', $book)}}"
                                                                  enctype="multipart/form-data">
                                                                @csrf
                                                                @method('put')
                                                                <div>
                                                                    <x-input-label for="sampul_buku"
                                                                                   :value="__('Sampul Buku')"/>

                                                                    <x-text-input id="sampul_buku"
                                                                                  class="block mt-1 w-full"
                                                                                  type="file"
                                                                                  name="sampul_buku"/>

                                                                    <x-input-error
                                                                        :messages="$errors->get('sampul_buku')"
                                                                        class="mt-2"/>
                                                                </div>
                                                                <div>
                                                                    <x-input-label for="judul"
                                                                                   :value="__('Judul Buku')"/>

                                                                    <x-text-input id="judul" class="block mt-1 w-full"
                                                                                  type="text"
                                                                                  value="{{old('judul', $book->judul)}}"
                                                                                  name="judul"/>

                                                                    <x-input-error :messages="$errors->get('judul')"
                                                                                   class="mt-2"/>
                                                                </div>
                                                                <div>
                                                                    <x-input-label for="penulis"
                                                                                   :value="__('Penulis Buku')"/>

                                                                    <x-text-input id="penulis" class="block mt-1 w-full"
                                                                                  type="text"
                                                                                  value="{{old('penulis', $book->penulis)}}"
                                                                                  name="penulis"/>

                                                                    <x-input-error :messages="$errors->get('penulis')"
                                                                                   class="mt-2"/>
                                                                </div>
                                                                <div>
                                                                    <x-input-label for="penerbit"
                                                                                   :value="__('Penerbit Buku')"/>

                                                                    <x-text-input id="penerbit"
                                                                                  class="block mt-1 w-full"
                                                                                  type="text"
                                                                                  value="{{old('penerbit',$book->penerbit)}}"
                                                                                  name="penerbit"/>

                                                                    <x-input-error :messages="$errors->get('penerbit')"
                                                                                   class="mt-2"/>
                                                                </div>
                                                                <div>
                                                                    <x-input-label for="tahunTerbit"
                                                                                   :value="__('Tahun Terbit Buku')"/>

                                                                    <x-text-input id="tahunTerbit"
                                                                                  class="block mt-1 w-full"
                                                                                  type="number"
                                                                                  value="{{old('tahunTerbit',$book->tahunTerbit)}}"
                                                                                  name="tahunTerbit"/>

                                                                    <x-input-error
                                                                        :messages="$errors->get('tahunTerbit')"
                                                                        class="mt-2"/>
                                                                </div>
                                                                <div>
                                                                    <x-input-label for="category_id"
                                                                                   :value="__('Kategori Buku')"/>
                                                                    <select id="category_id" name="category_id"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                                        @forelse($categories as $category)
                                                                            <option
                                                                                value="{{$category->id}}" @selected($category->id === $book->category_id)>{{$category->namaKategori}}</option>
                                                                        @empty
                                                                            <option disabled></option>
                                                                        @endforelse
                                                                    </select>
                                                                    <x-input-error
                                                                        :messages="$errors->get('category_id')"
                                                                        class="mt-2"/>
                                                                </div>

                                                                <div class="flex justify-center mt-10">
                                                                    <x-primary-button>
                                                                        {{ __('Submit') }}
                                                                    </x-primary-button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{route('books.destroy', $book)}}"
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
                                            <form action="{{route('books.destroy', $book)}}" method="post" id="delete"
                                                  class="hidden">@csrf @method('delete')</form>
                                        </div>
                                    </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <h2 class="text-center text-2xl font-bold">Tidak ada buku terbaru...</h2>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{$books->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
