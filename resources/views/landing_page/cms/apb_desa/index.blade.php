@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-3" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data APB Desa</h1>
            <a href="{{ route('cms.apb.create', ['type' => 'pengeluaran']) }}" class="btn btn-sm btn-primary shadow-sm mt-3 mt-md-0 mt-lg-0"><i
                    class="fas fa-plus-circle"></i>
                Tambah Kegiatan</a>
            <a href="{{ route('cms.apb.create', ['type' => 'apb']) }}" class="btn btn-sm btn-primary shadow-sm mt-3 mt-md-0 mt-lg-0"><i
                    class="fas fa-plus-circle"></i>
                Tambah APB Desa</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data APB Desa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($apb_desas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }} - Tahun {{ $item->tahun }}</td>
                                    <td>
                                        @if ($item->gambar)
                                            <img src="{{ asset($item->gambar) }}" width="200" alt="">
                                        @else
                                            <p>-</p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <div class="pr-2">
                                                <a href="{{ route('cms.apb.edit', $item->id) }}"
                                                    class="btn btn-info btn-sm me-3">View</a>
                                            </div>
                                            <div class="pr-2">
                                                <a href="{{ route('cms.apb.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm me-3">Edit</a>
                                            </div>
                                            <form action="{{ route('cms.apb.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-style')
    <link href="{{ url('') }}/cms/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@push('addon-script')
    <!-- Page level plugins -->
    <script src="{{ url('') }}/cms/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}/cms/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('') }}/cms/js/demo/datatables-demo.js"></script>
@endpush
