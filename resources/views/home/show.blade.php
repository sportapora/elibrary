@extends('layouts.main', ['title' => $book->judul])

@section('content')
    <x-session-alert/>

    <div class="flex flex-col lg:flex-row gap-10">
        <div class="w-full lg:w-3/4">
            <div class="flex flex-col mt-10 gap-6">
                <h1 class="text-3xl text-[#00065C] font-extrabold">Detail Buku</h1>
                <div class="flex flex-row gap-8">
                    <img src="{{asset('storage/' . $book->sampul_buku)}}" alt="{{$book->judul}}" class="w-[200px]">
                    <div class="flex flex-col">
                        <h1 class="text-2xl text-[#00065C] mb-4 font-bold">{{$book->judul}}</h1>
                        <div class="flex flex-row items-center gap-2">
                            <img src="{{asset('img/icons/star.png')}}" alt="Star">
                            <p class="font-bold">{{ round($rating, 1)}}/5</p>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="text-xl font-extrabold text-[#00065C] my-4">Deskripsi Buku</h2>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-900">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tbody>
                    <tr class="odd:bg-[#D9D9D9] even:bg-[#FFFFFF] border-b">
                        <th scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">
                            Judul
                        </th>
                        <td class="px-6 py-4">
                        {{$book->judul}}
                    </tr>
                    <tr class="odd:bg-[#D9D9D9] even:bg-[#FFFFFF] border-b">
                        <th scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">
                            Penulis
                        </th>
                        <td class="px-6 py-4">
                            {{$book->penulis}}
                        </td>
                    </tr>
                    <tr class="odd:bg-[#D9D9D9] even:bg-[#FFFFFF] border-b">
                        <th scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">
                            Penerbit
                        </th>
                        <td class="px-6 py-4">
                            {{$book->penerbit}}
                        </td>
                    </tr>
                    <tr class="odd:bg-[#D9D9D9] even:bg-[#FFFFFF] border-b">
                        <th scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">
                            Tahun Terbit
                        </th>
                        <td class="px-6 py-4">
                            {{$book->tahunTerbit}}
                        </td>
                    </tr>
                    <tr class="odd:bg-[#D9D9D9] even:bg-[#FFFFFF] border-b">
                        <th scope="row" class="px-6 py-4 font-semibold whitespace-nowrap">
                            Uraian
                        </th>
                        <td class="px-6 py-4">
                            {{$book->ringkasan}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex flex-col md:flex-row gap-0 md:gap-3">
                @auth
                    <a href="{{route('collections.store', $book)}}"
                       onclick="event.preventDefault(); document.querySelector('#store-collection').submit();"
                       class="text-white bg-secondary hover:bg-secondary/75 focus:ring-4 focus:ring-secondary/25 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">
                        Tambahkan ke Koleksi
                    </a>
                    <form action="{{route('collections.store', $book)}}" method="post" class="hidden"
                          id="store-collection">@csrf</form>
                    <a href=""
                       class="text-white bg-blue-700 hover:bg-blue-800/75 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">
                        Pinjam Buku Ini
                    </a>
                @else
                    <h3 class="text-lg font-medium mt-2">Silakan login untuk meminjam & menambahkan ke favorit</h3>
                @endauth
            </div>

            <hr class="my-10">

            <h3 class="text-2xl font-bold text-[#00065C] uppercase">Ulasan</h3>

            <div class="border-2 border-[#879EA6] p-4 space-y-4 mt-2">
                @forelse($reviews as $review)
                    <div class="w-full border-2 border-[#879EA6] p-4 flex flex-row gap-4 items-center">
                        <img src="{{asset('img/icons/user.png')}}" alt="User" class="w-10">
                        <div class="flex flex-col gap-2">
                            <div class="flex flex-row mb-3">
                                @for($i = 0; $i < $review->rating; $i++)
                                    <img src="{{asset('img/icons/star.png')}}" alt="Star" class="w-4">
                                @endfor
                            </div>
                            <div>
                                <p class="font-semibold mb-2">{{$review->user->namaLengkap}}</p>
                                <p>{{$review->ulasan}}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="text-lg font-medium text-center">Tidak ada ulasan terbaru</h3>
                @endforelse
            </div>
        </div>

        <div class="w-full lg:w-1/4 mt-0 lg:mt-40">
            <div>
                <h2 class="text-2xl font-semibold">Ulasan Buku</h2>
                @auth
                    @role('Peminjam')
                    <form action="{{route('review.store', $book)}}" method="post" class="mt-4">
                        @csrf
                        <div class="mb-3">
                            <x-input-label for="name" :value="__('Name')"/>
                            <x-text-input :placeholder="auth()->user()->namaLengkap" id="name"
                                          class="block mt-1 w-full bg-gray-200"
                                          readonly
                                          type="text"
                                          name="name" :value="auth()->user()->namaLengkap"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email')"/>
                            <x-text-input placeholder="Email" readonly id="email" class="block mt-1 w-full bg-gray-200"
                                          type="text"
                                          name="email" :value="auth()->user()->email ?? old('email')"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>
                        <div class="mb-3">
                            <x-input-label for="rating" :value="__('Rating')"/>
                            <x-text-input placeholder="1-5" d="rating" class="block mt-1 w-full bg-gray-200"
                                          type="number"
                                          name="rating" :value="auth()->user()->rating ?? old('rating')"/>
                            <x-input-error :messages="$errors->get('rating')" class="mt-2"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="ulasan" :value="__('Ulasan')"/>
                            <textarea name="ulasan" id="ulasan" rows="10"
                                      class="bg-gray-200 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                            <x-input-error :messages="$errors->get('ulasan')" class="mt-2"/>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit" class="bg-primary font-bold text-gray-100 rounded-3xl px-6 py-2">Send
                                Message
                            </button>
                        </div>
                    </form>
                @else
                    <h3 class="text-xl font-medium mt-2">Anda tidak memiliki hak akses</h3>
                    @endrole
                    @else
                        <h3 class="text-lg font-medium mt-2">Silakan login untuk memberi ulasan</h3>
                    @endauth
            </div>
        </div>
    </div>
@endsection
