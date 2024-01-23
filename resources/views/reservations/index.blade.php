@extends('layouts.main', ['title' => 'Peminjaman'])

@section('content')
    <x-session-alert/>

    <div class="flex flex-row">
        @if($reservations->count() > 0)
            <div class="w-3/4 grid grid-cols-4 gap-8">
                @foreach($reservations as $reservation)
                    <div
                        class="w-full rounded-2xl bg-none hover:bg-[#D9D9D9] group ease-in-out transition-all duration-150 p-4">
                        <a href="{{route('home.detail', $reservation->book)}}"
                           class="flex flex-col justify-center items-center">
                            <img src="{{asset('storage/' . $reservation->book->sampul_buku)}}"
                                 alt="{{$reservation->book->judul}}"
                                 class="w-[200px] mb-6">
                            <h1 class="text-2xl font-bold mb-3">{{$reservation->book->judul}}</h1>
                            <div
                                class="bg-[#6B9DBA]/50 shadow-md shadow-gray-400 group-hover:bg-[#6B9DBA] ease-in-out transition-all duration-150 p-5 rounded-2xl">
                                <p>{{substr($reservation->book->ringkasan, 0, 200) . '...'}}</p>

                                <div class="flex flex-col mt-4 gap-3">
                                    <div class="flex items-center">
                                        <img src="{{asset('img/icons/penulis.png')}}" alt="Penulis">
                                        <p class="ms-2.5">
                                            {{$reservation->book->penulis}}
                                        </p>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="{{asset('img/icons/tahunTerbit.png')}}" alt="Tahun Terbit">
                                        <p class="ms-2.5">
                                            {{$reservation->book->tahunTerbit}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center mt-20">
                <form action="" method="post" class="w-full">
                    <input type="hidden" name="loadMore">
                    <button type="submit" class="bg-[#00065C] text-white font-bold px-4 py-2 rounded-lg">Lihat Lebih Banyak</button>
                </form>
            </div>
        @else
            <div class="w-3/4">
                <h2 class="text-2xl font-medium mt-6 text-center">Tidak ada buku terbaru...</h2>
            </div>
        @endif

        <aside class="w-1/4 float-end hidden md:block mt-32">
            <div class="w-full border-2 border-gray-400 flex items-center justify-center p-3 gap-3">
                <p class="font-bold">Transaksi denda ini dijamin aman</p>
                <img src="{{asset('img/icons/warning.png')}}" alt="Warning">
            </div>
            <div class="w-full border-2 border-gray-400 flex items-center justify-center p-3 gap-3 mt-6">
                <h3 class="text-lg font-bold text-[#00065C]">Catatan</h3>
            </div>
        </aside>
    </div>
@endsection
