@extends('layouts.main', ['title' => 'Koleksi Saya'])

@section('content')
    <div class="py-6 px-3 bg-[#D9D9D9]/50">
        <ul class="flex flex-col lg:flex-row gap-6">
            <li class="{{request()->url() == '/collections?category=novel'  ? 'bg-[#00065C] text-white' : 'bg-transparent text-gray-900 hover:bg-[#00065c] hover:text-white'}} ease-in-out transition-all duration-100 px-12 py-2 rounded-3xl">
                <a href="/collections?category=novel">Novel</a>
            </li>
            <li class="{{request()->url() == '/collections?category=bukuilmiah'  ? 'bg-[#00065C] text-white' : 'bg-transparent text-gray-900 hover:bg-[#00065c] hover:text-white'}} ease-in-out transition-all duration-100 px-12 py-2 rounded-3xl">
                <a href="/collections?category=bukuilmiah">Buku Ilmiah</a>
            </li>
            <li class="{{request()->url() == '/collections?category=komik'  ? 'bg-[#00065C] text-white' : 'bg-transparent text-gray-900 hover:bg-[#00065c] hover:text-white'}} ease-in-out transition-all duration-100 px-12 py-2 rounded-3xl">
                <a href="/collections?category=komik">Komik</a>
            </li>
            <li class="{{request()->url() == '/collections?category=majalah'  ? 'bg-[#00065C] text-white' : 'bg-transparent text-gray-900 hover:bg-[#00065c] hover:text-white'}} ease-in-out transition-all duration-100 px-12 py-2 rounded-3xl">
                <a href="/collections?category=majalah">Majalah</a>
            </li>
        </ul>

        <h1 class="bg-[#00065C] w-1/4 px-12 py-2 rounded-xl mt-4 text-white font-bold text-xl uppercase">Koleksi
            Saya</h1>
    </div>

    <div class="mt-10">
        <h2 class="text-lg">{{count($books)}} hasil</h2>

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
                            <p>{{substr($book->ringkasan, 0, 200) . '...'}}</p>

                            <div class="grid grid-cols-2 mt-4 gap-3">
                                <div class="flex items-center">
                                    <img src="{{asset('img/icons/penulis.png')}}" alt="Penulis">
                                    <p class="ms-2.5">
                                        {{$book->penulis}}
                                    </p>
                                </div>
                                <div class="flex items-center">
                                    <img src="{{asset('img/icons/category.png')}}" alt="Category">
                                    <p class="ms-2.5">
                                        {{$book->category->namaKategori}}
                                    </p>
                                </div>
                                <div class="flex items-center">
                                    <img src="{{asset('img/icons/tahunTerbit.png')}}" alt="Tahun Terbit">
                                    <p class="ms-2.5">
                                        {{$book->tahunTerbit}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            @empty
                <h2 class="text-2xl font-medium mt-6">Tidak ada buku terbaru...</h2>
            @endforelse
        </div>
    </div>
@endsection
