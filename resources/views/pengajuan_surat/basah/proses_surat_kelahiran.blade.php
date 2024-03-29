@extends('templates/dashboard')
@section('content')
    @php
        $surat = json_decode($pengajuan_surat->surat);
    @endphp
    <div class="bg-white py-6 px-9 mb-5 rounded-lg">
        <form action="{{ route('pengajuan_surat.updatebasah', $pengajuan_surat->id) }}" target="blank" method="POST"
            class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
            @csrf
            @method('PUT')
 <h1 class="text-2xl my-8">Form Pengisian Surat Keterangan Kelahiran</h1>
            <div class="flex flex-col lg:flex-row gap-5 justify-center">
                <div
                    class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                ">
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Surat</label>
                        <small class="text-secondary">Contoh penulisan : 474.3 / 016 / I / 2022</small>
                        <input type="text" name="nomor_surat"
                            class="mt-1 px-3 py-2 @error('nomor_surat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Masukkan Nomor Surat" value="{{ $nomor_surat }}" required />
                        @error('nomor_surat')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kades</label>
                        <input type="text" name="nama_kades"
                            class="mt-1 px-3 py-2 @error('nama_kades') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nama Kades" value="{{ old('nama_kades') }}" required />
                        @error('nama_kades')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jabatan Kades</label>
                        <input type="text" name="jabatan_kades"
                            class="mt-1 px-3 py-2 @error('jabatan_kades') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Jabatan Kades" value="{{ old('jabatan_kades') }}" required />
                        @error('jabatan_kades')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div
                    class="w-full
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">

                </div>
            </div>


           
            <h2 class="text-[20px] mb-10">Informasi Anak</h2>
            <div class="flex flex-col lg:flex-row gap-5 justify-center">
                <input type="hidden" value="kelahiran" name="jenis_surat">
                <div
                    class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Hari Kelahiran</label>
                        <input type="text" name="hari"
                            class="mt-1 px-3 py-2 @error('hari') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Hari" value="{{ old('hari', $surat->hari) }}" />
                        @error('hari')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Kelahiran</label>
                        <input type="text" name="tanggal"
                            class="mt-1 px-3 py-2 @error('tanggal') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Tanggal" value="{{ old('tanggal', $surat->tanggal) }}" />
                        @error('tanggal')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Kelahiran</label>
                        <input type="text" name="tempat_lahir"
                            class="mt-1 px-3 py-2 @error('tempat_lahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Tempat Kelahiran" value="{{ old('tempat_lahir', $surat->tempat_lahir) }}" />
                        @error('tempat_lahir')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>


                </div>
                <div
                    class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Anak Ke</label>
                        <input type="text" name="anak_ke"
                            class="mt-1 px-3 py-2 @error('anak_ke') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Anak Ke" value="{{ old('anak_ke', $surat->anak_ke) }}" />
                        @error('anak_ke')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Anak</label>
                        <input type="text" name="nama_anak"
                            class="mt-1 px-3 py-2 @error('nama_anak') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nama Anak" value="{{ old('nama_anak', $surat->nama_anak) }}" />
                        @error('nama_anak')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kelamin</label>
                        <div class="relative">
                            <select
                                class="appearance-none px-3 py-2 @error('kelamin') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                                id="grid-state" name="kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki" {{ $surat->kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki
                                </option>
                                <option value="perempuan" {{ $surat->kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <i class='bx bx-chevron-down text-xl'></i>
                            </div>
                        </div>
                        @error('kelamin')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <br>
            <br>

            <h2 class="text-[20px] mb-10">Informasi Orang Tua</h2>
            <div class="flex flex-col lg:flex-row gap-5 justify-center">
                <div
                    class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm
                ">
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                        <input type="text" name="nama_ibu"
                            class="mt-1 px-3 py-2 @error('nama_ibu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nama Ibu" value="{{ old('nama_ibu', $surat->nama_ibu) }}" />
                        @error('nama_ibu')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Umur</label>
                        <input type="text" name="umur"
                            class="mt-1 px-3 py-2 @error('umur') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Umur" value="{{ old('umur', $surat->umur) }}" />
                        @error('umur')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                        <input type="text" name="agama"
                            class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Agama" value="{{ old('agama', $surat->agama) }}" />
                        @error('agama')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div
                    class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm
                ">
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                        <input type="text" name="nama_ayah"
                            class="mt-1 px-3 py-2 @error('nama_ayah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nama ayah" value="{{ old('nama_ayah', $surat->nama_ayah) }}" />
                        @error('nama_ayah')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Umur</label>
                        <input type="text" name="umur_ayah"
                            class="mt-1 px-3 py-2 @error('umur_ayah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Umur" value="{{ old('umur_ayah', $surat->umur_ayah) }}" />
                        @error('umur_ayah')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                        <input type="text" name="agama_ayah"
                            class="mt-1 px-3 py-2 @error('agama_ayah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Agama" value="{{ old('agama_ayah', $surat->agama_ayah) }}" />
                        @error('agama_ayah')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pekerjaan Ayah</label>
                        <input type="text" name="pekerjaan_ayah"
                            class="mt-1 px-3 py-2 @error('pekerjaan_ayah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Pekerjaan ayah" value="{{ old('pekerjaan_ayah', $surat->pekerjaan_ayah) }}" />
                        @error('pekerjaan_ayah')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Warga Negara</label>
                        <input type="text" name="kewarganegaraan"
                            class="mt-1 px-3 py-2 @error('kewarganegaraan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Warga Negara" value="{{ old('wargkewarganegaraananegara', $surat->kewarganegaraan) }}" />
                        @error('kewarganegaraan')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                        <input type="text" name="alamat"
                            class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Alamat" value="{{ old('alamat', $surat->alamat) }}" />
                        @error('alamat')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <br>
            <br>
            <h2 class="text-[20px] mb-10">Informasi Pelapor</h2>
            <div class="flex flex-col lg:flex-row gap-5 justify-center">
                <div
                    class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm
                ">
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama pelapor</label>
                        <input type="text" name="nama_pelapor"
                            class="mt-1 px-3 py-2 @error('nama_pelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nama pelapor" value="{{ old('nama_pelapor', $surat->nama_pelapor) }}" />
                        @error('nama_pelapor')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Hubungan Pelapor dengan
                            anak</label>
                        <input type="text" name="hub_pelapor_anak"
                            class="mt-1 px-3 py-2 @error('hub_pelapor_anak') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Hubungan pelapor dengan anak"
                            value="{{ old('hub_pelapor_anak', $surat->hub_pelapor_anak) }}" />
                        @error('hub_pelapor_anak')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="w-full ">

                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
            </div>
        </form>
    </div>
@endsection
