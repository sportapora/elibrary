@extends('layouts.main', ['title' => 'Beranda'])

@section('content')
    <x-session-alert/>

    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('img/carousel/carousel1.jpg')}}"
                     class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('img/carousel/carousel_2.png')}}"
                     class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
        <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
        </button>
        <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
        <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
        </button>
    </div>

    <div class="flex justify-center">
        <form class="w-1/2" action="{{route('home')}}" id="search">
            <div class="flex">
                <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your
                    Email</label>
                <button id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 text-primary z-10 inline-flex items-center py-2.5 px-4 text-sm font-bold text-center bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                        type="button">KATEGORI
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="dropdown"
                     class="z-[99] hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        <input type="hidden" id="category" name="category">
                        @forelse($categories as $category)
                            <li>
                                <button type="button"
                                        onclick="document.querySelector('#category').value = '{{$category->id}}'; document.querySelector('#search').submit()"
                                        class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    {{$category->namaKategori}}
                                </button>
                            </li>
                        @empty
                            <li>
                                <button type="button"
                                        class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Tidak ada kategori buku
                                </button>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="relative w-full">
                    <input type="text" id="search"
                           name="search"
                           value="{{old('search')}}"
                           class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                           placeholder="Judul buku, cari buku" required>
                    <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-secondary rounded-e-lg border border-secondary hover:bg-secondary/75 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <h1 class="text-center font-bold text-4xl text-primary uppercase mt-10">Buku Terbaru</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mt-6">
        @forelse($books as $book)
            <div
                    class="w-full rounded-2xl bg-none hover:bg-[#D9D9D9] group ease-in-out transition-all duration-150 p-4">
                <a href="{{route('home.detail', $book)}}" class="flex flex-col justify-center items-center">
                    <img src="{{asset('storage/' . $book->sampul_buku)}}" alt="{{$book->judul}}"
                         class="w-[200px] mb-6">
                    <h1 class="text-2xl font-bold mb-3">{{$book->judul}}</h1>
                    <div
                            class="bg-[#6B9DBA]/50 group-hover:bg-[#6B9DBA] ease-in-out transition-all duration-150 p-5 rounded-2xl">
                        <p>{{ substr($book->ringkasan, 0, 150) . "..."}}</p>
                    </div>
                </a>
            </div>

        @empty
            <h2 class="text-2xl font-medium mt-6">Tidak ada buku terbaru...</h2>
        @endforelse
    </div>
@endsection
