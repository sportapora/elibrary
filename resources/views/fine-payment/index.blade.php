@extends('layouts.main', ['title' => 'Peminjaman'])

@section('content')
    <x-session-alert/>

    <div class="flex flex-col-reverse lg:flex-row mt-6 gap-12">
        <div class="w-full lg:w-3/4 space-y-6">
            <div class="border-2 border-[#879EA6] p-6 space-y-4 mt-2">
                <div class="w-full bg-[#EF0202]/50 rounded-xl py-3 px-10">
                    <p class="font-bold">Maaf, sepertinya ada kesalahan saat anda melakukan transaksi</p>
                    <p>Transaksi gagal</p>
                </div>
                <div class="grid grid-cols-2 text-[#00065C]">
                    <div class="font-light space-y-3">
                        <p>No.transaksi</p>
                        <p>Waktu transaksi</p>
                    </div>
                    <div class="font-bold space-y-3">
                        <p>#P172827535985421</p>
                        <p>03 Agustus 2024 - 22:30</p>
                    </div>
                </div>
            </div>
            <div class="border-2 border-[#879EA6] p-6 space-y-4 mt-2">
                <h2 class="text-2xl font-bold text-[#00065C]">Detail Buku</h2>
                <div class="grid grid-cols-2">
                    <div class="font-light space-y-3">
                        <p>Kategori Buku</p>
                        <p>Nama Buku</p>
                        <p>Jumlah pinjam buku</p>
                    </div>
                    <div class="font-light space-y-3">
                        <p>Komik</p>
                        <p class="text-[#00065C]">Hii miiko!</p>
                        <p>3</p>
                    </div>
                </div>
            </div>
            <div class="border-2 border-[#879EA6] p-6 space-y-4 mt-2">
                <h2 class="text-2xl font-bold text-[#00065C]">Detail Pembayaran</h2>
                <div class="grid grid-cols-2">
                    <div class="font-light">
                        <p class="mb-10">Status pembayaran</p>
                        <p>Metode pembayaran</p>
                    </div>
                    <div class="font-light mb-10">
                        <div class="border-2 rounded-3xl text-center border-[#33F214] p-2 uppercase w-[145px] mb-5">
                            <p class="font-extrabold text-[#399F29] uppercase">Sudah dibayar</p>
                        </div>
                        <img src="{{asset('img/icons/dana.png')}}" alt="Dana">
                    </div>
                </div>
                <hr class="border-[#000000]/50">
                <div class="grid grid-cols-2">
                    <div class="font-light">
                        <p class="mb-10">Total transaksi</p>
                    </div>
                    <div class="font-light">
                        <p>Rp70.000</p>
                    </div>
                </div>
                <hr class="border-[#000000]/50">
                <div class="grid grid-cols-2">
                    <div class="font-light">
                        <p class="mb-10">Total pembayaran</p>
                    </div>
                    <div class="font-bold">
                        <p>Rp70.000</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/4 float-end hidden md:block mt-10 lg:mt-60">
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
@endsection
