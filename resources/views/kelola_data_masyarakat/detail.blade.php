<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('img/icon.png') }}" rel="shortcut" type="image/png">

    <link rel="stylesheet" href="{{ asset('css/landing-page/index.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Optional: Add Bootstrap Icons for icon support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">

    <title>@yield('title', 'Desa Palasari') | Website Resmi desa Palasari</title>

</head>

<body style="background-image: linear-gradient(to bottom, #4facfe 0%, #00f2fe 100%);">
    <div id="modalKependudukan" class=" fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] lg:w-[40vw] bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg " style="width:75%;">
        <h1 class="text-2xl font-semibold text-dark text-center mb-4">Data Detail Penduduk</h1>
        <div class="dialog-body-edit mb-4">
            <form id="formDetailKependudukan" action="" method="POST" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    ">
                @csrf
                @method('PATCH')
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">No Kartu Keluarga</label>
                    <input id="username" type="text" name="username" class="mt-1 px-3 py-2 @error('No KK') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="user.name" value="{{ $penduduk->noKK }}" />
                    @error('No KK')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK</label>
                    <input id="nama" type="text" name="nama" class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="John Doe" value="{{ $penduduk->NIK }}" />
                    @error('nama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ $penduduk->namaLengkap }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full mb-6">
                    <label class="tracking-wide after:content-['*'] after:ml-0.5 after:text-danger mb-1" for="grid-state">Jenis Kelamin</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 @error('level') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="level">
                            <option selected>{{ $penduduk->jk }}</option>
                            <option value="LAKI-LAKI">LAKI-LAKI</option>
                            <option value="PEREMPUAN">PEREMPUAN</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </div>
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ $penduduk->tempatLahir }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ $penduduk->tanggalLahir }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ $penduduk->agama }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pendidikan</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ $penduduk->pendidikan }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Pekerjaan</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ $penduduk->jenisPekerjaan }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Golongan Darah</label>
                    
                    @if($penduduk->goldar == NULL)
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Belum ada" value="" />
                    @elseif($penduduk->goldar != NULL)
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ $penduduk->goldar }}" />
                    @endif

                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Perkawinan</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Perkawinan</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Hubungan</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kewarganegaraan</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">No Pasport</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">No Kitap</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">RT</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">RW</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal di Keluarkan</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tipe Penduduk</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status NIK</label>
                    <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                    @error('telepon')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
        </div>
        </form>

        <div class="flex justify-content-end gap-3">
            <button id="closeDialogKependudukan" class="text-white bg-secondary focus:outline-none font-medium rounded-lg text-sm px-3 py-2.5 text-center" onclick="redirectToPreviousPage()">
                Kembali
            </button>
            <button type="submit" class=" text-black gap-x-8 themeColor focus:outline-none font-medium rounded-lg text-sm px-3 py-2.5 text-center">Edit</button>

            <script>
                function redirectToPreviousPage() {
                    window.location.href = document.referrer;
                }
            </script>

        </div>
    </div>
</body>