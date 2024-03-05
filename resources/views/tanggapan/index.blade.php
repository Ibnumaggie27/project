@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white py-4 px-9 mb-5 rounded-lg flex justify-between items-center">
    <div class="">
        <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">{{ $title }}</h1>
        <p class="textDashboard text-base font-normal text-secondary">Semua tanggapan yang sudah diberikan</p>
    </div>
    @can('petugas')
    <div class="layoutBtnPengaduan">
        <a href="/pengaduan/belum" class="btnPengaduan text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center text-decoration-none">Beri Tanggapan</a>
    </div>
    @endcan
</div>

<div class="card">
    <div class="card-header bg-white py-3">
        <div class="col-md-6 py-2">
            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Search">
                <button type="button" id="searchButton" class="btn btn-submit border">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="w-full rounded-lg bg-white divide-y divide-gray overflow-x-auto">
            <table id="informasiTable" class="table table-bordered">
                <thead class="themeColor text-center align-middle">
                    <tr class="text-black">
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4">No</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Isi Laporan</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Tanggapan</th>
                        @cannot('petugas')
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Ditanggapi Oleh</th>
                        @endcannot
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Tanggal Ditanggapi</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4 text-center">Status</th>
                        <th colspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4 text-center">Aksi</th>
                    </tr>
                    <tr>
                        <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 text-center">Lihat</th>
                        <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody class=" text-center">
                    @foreach ($tanggapan as $item)
                    <tr class="text-center align-middle">
                        <td class="textTable px-4 py-4 text-secondary">{{ $loop->iteration }}</td>
                        <td class="textTable px-4 py-4 text-secondary">{{ substr($item->pengaduan->isi_laporan,0,30) . '...' }}</td>
                        <td class="textTable px-4 py-4 text-secondary">{{ substr($item->tanggapan,0,40) . '...' }}</td>
                        @can('admin')
                        @if ($item->petugas)
                        <td class="textTable px-4 py-4">
                            <a class="openDetail text-danger cursor-pointer" data-nama="{{ $item->petugas->nama }}" data-username="{{ $item->petugas->username }}" data-telepon="{{ $item->petugas->telepon }}" data-level="{{ $item->petugas->level }}">
                                {{ $item->petugas->nama }}
                            </a>
                        </td>
                        @else
                        <td class="textTable px-4 py-4 text-secondary">-</td>
                        @endif
                        @endcan
                        <td class="textTable px-4 py-4 text-secondary">{{ date('d F Y', strtotime($item->created_at)) }}</td>
                        <td class="textTable px-4 py-4 text-center">
                            @if ($item->status == 'proses')
                            <span class="textTable text-dark text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-warning ">
                                Proses
                            </span>
                            @endif

                            @if ($item->status == '0')
                            <span class="textTable text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-orange ">
                                Menunggu
                            </span>
                            @endif

                            @if ($item->status == 'selesai')
                            <span class="textTable text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-success ">
                                Selesai
                            </span>
                            @endif
                        </td>
                        <td class="textTable px-4 py-4">
                            <a href="/pengaduan/{{ $item->pengaduan->id }}" class="text-primary"><i class="bx bxs-comment-dots text-lg"></i></a>
                        </td>
                        <td class="textTable px-4 py-4">
                            @can('petugas')
                            <button class="text-danger text-center" onclick="deleteConfirmation('{{$url}}',' {{$item->id}}', '{{ addslashes($item->namaLengkap) }}' )">
                                <i class="bx bxs-trash" style="margin-left:10px;"></i>
                            </button>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#searchButton').on('click', function() {
                        var searchValue = $('#searchInput').val();

                        $.ajax({
                            url: '/data/tanggapan/search',
                            method: 'GET',
                            data: {
                                search: searchValue
                            },
                            success: function(response) {
                                // Bersihkan isi tabel sebelum menambahkan hasil pencarian
                                $('#informasiTable tbody').empty();

                                // Tambahkan baris baru berdasarkan hasil pencarian
                                $.each(response, function(index, item) {
                                    var newRow = '<tr>' +
                                        '<td class="textTable px-2 py-4 text-secondary align-middle">' + item.id + '</td>';

                                    // Tambahkan kolom isi laporan
                                    newRow += '<td class="textTable px-2 py-4 text-secondary align-middle">' + item.tanggapan.isi_laporan + '...' + '</td>';

                                    newRow += '<td class="textTable px-2 py-4 text-secondary align-middle">' + item.tanggapan + '...' + '</td>';

                                    // Tambahkan status surat sesuai dengan kondisi
                                    newRow += '<td class="textTable px-2 py-4 text-secondary align-middle">';
                                    if (item.status == 'proses') {
                                        newRow += '<span class="textTable text-dark text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-warning">Pending</span>';
                                    } else if (item.status == 'verifikasi') {
                                        newRow += '<span class="textTable text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-orange">sudah Terverifikasi</span>';
                                    } else if (item.status == '0') {
                                        newRow += '<span class="textTable text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-orange">Sedang Diproses</span>';
                                    } else if (item.status == 'selesai') {
                                        newRow += '<span class="textTable text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-success">Ditolak</span>';
                                    }
                                    newRow += '</td>';

                                    newRow += '<td class="textTable px-4 py-4 ">' +
                                        '<a href="/pengaduan/' + item.id + '" class="text-primary"><i class="bx bxs-comment-dots text-lg"></i></a>' +
                                        '</td>';

                                    @can('petugas')
                                    newRow += '<td class="align-middle textTable px-4 py-4">';
                                    if (item.status == 'beres') {
                                        newRow += '<button class="text-danger text-center" onclick="deleteConfirmation(\'{{ $url }}\', \'' + item.id + '\', \'' + item.namaLengkap + '\' )">' +
                                    }
                                    newRow += '</td>';
                                    @endcan

                                    newRow += '</tr>';

                                    $('#informasiTable tbody').append(newRow);
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
</div>
@endsection