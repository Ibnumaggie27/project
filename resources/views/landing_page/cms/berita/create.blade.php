@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Berita</h1>
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

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6>Buat Berita</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('cms.berita.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <input type="text" name="judul" value="{{ old('judul') }}" class="form-control"
                                id="judul" placeholder="Masukkan Judul Berita">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Thumbnail</label>
                            <input type="file" name="gambar" class="form-control" id="gambar"
                                placeholder="Masukkan Thumnail Berita">
                        </div>
                        <div class="mb-3">
                            <label for="tipe" class="form-label">Jenis Berita</label>
                            <select class="form-control" id="tipe" name="tipe">
                                <option value="">Masukkan Jenis Berita</option>
                                <option value="Berita" selected>Berita</option>
                                <option value="Pengumuman">Pengumuman</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editor" class="form-label">Deskripsi Berita</label>
                            <textarea name="deskripsi" id="editor" rows="10">
                                {{ old('deskripsi') }}
                            </textarea>
                        </div>
                        <div class="mt-5 mb-3">
                            <button class="btn btn-primary">Upload Berita</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('addon-style')
    <style>
        .ck-editor__editable {
            min-height: 350px !important;
        }
    </style>
@endpush

@push('addon-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    {{-- <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script> --}}

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {

                ckfinder: {
                    uploadUrl: '{{ route('cms.ckeditor.upload') . '?_token=' . csrf_token() }}'
                },

                // make add custom css in table
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableProperties',
                        'tableCellProperties'
                    ]
                },
            })
            .then((result) => {
                console.log(result);
            }).catch((err) => {
                console.log(err);
            });
    </script>
@endpush
