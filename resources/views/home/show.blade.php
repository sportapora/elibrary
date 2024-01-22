@extends('layouts.main', ['title' => $book->judul])

@section('content')
    <x-session-alert/>

    <div class="flex flex-col items-center mt-10 gap-6">
        <img src="{{asset('storage/' . $book->sampul_buku)}}" alt="{{$book->judul}}" class="w-[200px]">
        <h1 class="text-3xl font-bold">{{$book->judul}}</h1>
    </div>

    <div class="grid grid-cols-2 mt-10">
        <div class="space-y-2">
            <p>Category</p>
            <p>Penulis</p>
            <p>Penerbit</p>
            <p>Tahun Terbit</p>
            <p>Ringkasan</p>
        </div>
        <div class="font-medium space-y-2">
            <p>: {{$book->category->namaKategori}}</p>
            <p>: {{$book->penulis}}</p>
            <p>: {{$book->penerbit}}</p>
            <p>: {{$book->tahunTerbit}}</p>
            <p>: <span class="hidden lg:inline">{{$book->ringkasan}}</span></p>
        </div>
    </div>
    <p class="block lg:hidden">{{$book->ringkasan}}</p>

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
                    <x-text-input placeholder="1-5" d="rating" class="block mt-1 w-full bg-gray-200" type="number"
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
@endsection
