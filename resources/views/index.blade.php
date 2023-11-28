@extends('templates/dashboard')
@section('content')
    <div class="bg-white py-4 px-9 mb-5 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl font-bold mb-2 headDash">Selamat datang, 
                <span class="capitalize"><b class="text-black">{{ auth()->user()->nama }}!</b></span>
            </h1>
            <p class="text-base font-normal text-secondary">Buat proses pengaduan jadi lebih mudah dengan aplikasi!</p>
        </div>
        @can('masyarakat')
            <a href="/pengaduan/create" class="text-black text-decoration-none focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center themeColor" >Buat Pengaduan</a>
        @endcan
    </div>
    <div class="bg-white py-6 px-9 rounded-lg">
        <ol class="items-center flex  rounded-md">
            <li class="relative mb-6 lg:mb-0">
                <div class="flex items-center">
                    <div class="flex z-10 justify-center items-center w-8 h-8 rounded-full bg-primary shrink-0">
                        <i class="bx bxs-edit text-white"></i>
                    </div>
                </div>
                @can('masyarakat')
                    <div class="mt-3 sm:pr-8">
                        <h3 class="text-lg font-semibold text-dark">Tulis Laporan</h3>
                        <p class="text-base font-normal text-secondary">Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
                    </div>
                @endcan
                @canany(['petugas', 'admin'])
                    <div class="mt-3 sm:pr-8">
                        <h3 class="text-lg font-semibold text-dark">Total Laporan</h3>
                        <p class="text-base font-normal text-secondary">Total seluruh laporan yang masuk :</p>
                        <p class="text-2xl font-bold text-black">{{ $total_laporan }}</p>
                    </div>
                @endcanany
            </li>
            <i class="bx bxs-chevron-right-circle text-primary text-xl hidden lg:inline-block lg:mr-16"></i>
            <li class="relative mb-6 lg:mb-0">
                <div class="flex items-center">
                    <div class="flex z-10 justify-center items-center w-8 h-8 rounded-full bg-primary shrink-0">
                        <i class="bx bx-check-double text-white"></i>
                    </div>
                </div>
                @can('masyarakat')
                    <div class="mt-3 sm:pr-8">
                        <h3 class="text-lg font-semibold text-dark">Proses Verifikasi</h3>
                        <p class="text-base font-normal text-secondary">Secepat mungkin laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang</p>
                    </div>
                @endcan
                @canany(['petugas', 'admin'])
                    <div class="mt-3 sm:pr-8">
                        <h3 class="text-lg font-semibold text-dark">Laporan Selesai</h3>
                        <p class="text-base font-normal text-secondary">Total laporan yang selesai diproses :</p>
                        <p class="text-2xl font-bold text-black">{{ $laporan_selesai }}</p>
                    </div>
                @endcanany
            </li>
            <i class="bx bxs-chevron-right-circle text-primary text-xl hidden lg:inline-block lg:mr-16"></i>
            <li class="relative mb-6 lg:mb-0">
                <div class="flex items-center">
                    <div class="flex z-10 justify-center items-center w-8 h-8 rounded-full bg-primary shrink-0">
                        <i class="bx bxs-hard-hat text-white"></i>
                    </div>
                </div>
                @can('masyarakat')
                    <div class="mt-3 sm:pr-8">
                        <h3 class="text-lg font-semibold text-dark">Proses Tindak Lanjut</h3>
                        <p class="text-base font-normal text-secondary">Petugas akan menanggapi laporan yang Anda berikan</p>
                    </div>
                @endcan
                @canany(['petugas', 'admin'])
                    <div class="mt-3 sm:pr-8">
                        <h3 class="text-lg font-semibold text-dark">Total Tanggapan</h3>
                        <p class="text-base font-normal text-secondary">Total tanggapan yang diberikan :</p>
                        <p class="text-2xl font-bold text-black">{{ $total_tanggapan }}</p>
                    </div>
                @endcanany
            </li>
        </ol>
    </div>
@endsection
