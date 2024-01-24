@extends('layouts.main', ['title' => 'Peminjaman'])

@section('content')
    <x-session-alert/>

    <div class="flex flex-row mt-6 gap-6">
        {{--        @if($reservations->count() > 0)--}}
        <div class="w-3/4 grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{--                @foreach($reservations as $reservation)--}}
            {{--                    <div--}}
            {{--                        class="w-full rounded-2xl bg-none hover:bg-[#D9D9D9] group ease-in-out transition-all duration-150 p-4">--}}
            {{--                        <a href="{{route('home.detail', $reservation->book)}}"--}}
            {{--                           class="flex flex-col justify-center items-center">--}}
            {{--                            <img src="{{asset('storage/' . $reservation->book->sampul_buku)}}"--}}
            {{--                                 alt="{{$reservation->book->judul}}"--}}
            {{--                                 class="w-[200px] mb-6">--}}
            {{--                            <h1 class="text-2xl font-bold mb-3">{{$reservation->book->judul}}</h1>--}}
            {{--                            <div--}}
            {{--                                class="bg-[#6B9DBA]/50 w-full shadow-md shadow-gray-400 group-hover:bg-[#6B9DBA] ease-in-out transition-all duration-150 p-5 rounded-2xl">--}}
            {{--                                <p>{{substr($reservation->book->ringkasan, 0, 200) . '...'}}</p>--}}

            {{--                                <div class="flex flex-col mt-4 gap-3">--}}
            {{--                                    <div class="flex items-center">--}}
            {{--                                        <img src="{{asset('img/icons/penulis.png')}}" alt="Penulis">--}}
            {{--                                        <p class="ms-2.5">--}}
            {{--                                            {{$reservation->book->penulis}}--}}
            {{--                                        </p>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="flex items-center">--}}
            {{--                                        <img src="{{asset('img/icons/tahunTerbit.png')}}" alt="Tahun Terbit">--}}
            {{--                                        <p class="ms-2.5">--}}
            {{--                                            {{$reservation->book->tahunTerbit}}--}}
            {{--                                        </p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </a>--}}
            {{--                    </div>--}}
            {{--                @endforeach--}}

            <div
                class="w-full rounded-2xl bg-none hover:bg-[#D9D9D9] group ease-in-out transition-all duration-150 p-4">
                <a href=""
                   class="flex flex-col justify-center items-center">
                    <img src="{{asset('img/buku-ilmiah/biologi.jpg')}}"
                         alt="Biologi"
                         class="w-full lg:w-[135px] mb-6">
                    <h1 class="text-xl text-center font-bold mb-3">Cerdas Belajar Biologi</h1>
                    <div
                        class="bg-[#6B9DBA]/50 w-full shadow-md shadow-gray-400 group-hover:bg-[#6B9DBA] ease-in-out transition-all duration-150 p-5 rounded-2xl">
                        <p>...</p>

                        <div class="flex flex-col mt-4 gap-3">
                            <div class="flex items-center">
                                <img src="{{asset('img/icons/penulis.png')}}" alt="Penulis">
                                <p class="ms-2.5">
                                    Tere Liye
                                </p>
                            </div>
                            <div class="flex items-center">
                                <img src="{{asset('img/icons/tahunTerbit.png')}}" alt="Tahun Terbit">
                                <p class="ms-2.5">
                                    2017
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div
                class="w-full rounded-2xl bg-none hover:bg-[#D9D9D9] group ease-in-out transition-all duration-150 p-4">
                <a href=""
                   class="flex flex-col justify-center items-center">
                    <img src="{{asset('img/buku-ilmiah/biologi.jpg')}}"
                         alt="Biologi"
                         class="w-[135px] mb-6">
                    <h1 class="text-xl text-center font-bold mb-3">Cerdas Belajar Biologi</h1>
                    <div
                        class="bg-[#6B9DBA]/50 w-full shadow-md shadow-gray-400 group-hover:bg-[#6B9DBA] ease-in-out transition-all duration-150 p-5 rounded-2xl">
                        <p>...</p>

                        <div class="flex flex-col mt-4 gap-3">
                            <div class="flex items-center">
                                <img src="{{asset('img/icons/penulis.png')}}" alt="Penulis">
                                <p class="ms-2.5">
                                    Tere Liye
                                </p>
                            </div>
                            <div class="flex items-center">
                                <img src="{{asset('img/icons/tahunTerbit.png')}}" alt="Tahun Terbit">
                                <p class="ms-2.5">
                                    2017
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div
                class="w-full rounded-2xl bg-none hover:bg-[#D9D9D9] group ease-in-out transition-all duration-150 p-4">
                <a href=""
                   class="flex flex-col justify-center items-center">
                    <img src="{{asset('img/buku-ilmiah/biologi.jpg')}}"
                         alt="Biologi"
                         class="w-[135px] mb-6">
                    <h1 class="text-xl text-center font-bold mb-3">Cerdas Belajar Biologi</h1>
                    <div
                        class="bg-[#6B9DBA]/50 w-full shadow-md shadow-gray-400 group-hover:bg-[#6B9DBA] ease-in-out transition-all duration-150 p-5 rounded-2xl">
                        <p>...</p>

                        <div class="flex flex-col mt-4 gap-3">
                            <div class="flex items-center">
                                <img src="{{asset('img/icons/penulis.png')}}" alt="Penulis">
                                <p class="ms-2.5">
                                    Tere Liye
                                </p>
                            </div>
                            <div class="flex items-center">
                                <img src="{{asset('img/icons/tahunTerbit.png')}}" alt="Tahun Terbit">
                                <p class="ms-2.5">
                                    2017
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        {{--        @else--}}
        {{--            <div class="w-3/4">--}}
        {{--                <h2 class="text-2xl font-medium mt-6 text-center">Tidak ada buku terbaru...</h2>--}}
        {{--            </div>--}}
        {{--        @endif--}}

        <div class="w-1/4 float-end hidden md:block mt-32">
            <div class="w-full border-2 border-gray-400 flex items-center justify-center p-3 gap-3">
                <img src="{{asset('img/icons/denda-aman.jpg')}}" alt="Transaksi Aman" class="w-16 h-16">
                <p class="font-bold">Transaksi denda ini dijamin aman</p>
                <img src="{{asset('img/icons/warning.png')}}" alt="Warning">
            </div>
            <div class="w-full border-2 border-gray-400 flex items-center justify-center p-3 gap-3 mt-6">
                <h3 class="text-lg text-center font-bold text-[#00065C]">Catatan</h3>
            </div>
        </div>
    </div>

    <div class="flex justify-center items-center mt-20">
        <form action="">
            <input type="hidden" name="loadMore">
            <button type="submit" class="bg-[#00065C] text-white font-bold px-4 py-2 rounded-lg">Lihat Lebih Banyak
            </button>
        </form>
    </div>
@endsection
