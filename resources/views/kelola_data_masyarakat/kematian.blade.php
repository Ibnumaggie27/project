@extends('templates/dashboard')

<div class="mx-auto w-full mt-24 px-10 lg:px-4">
    <div class="bg-white py-2 mb-5 rounded-lg">
        <div class="row d-flex align-items-center">
            <div class="col-8">
                <h1 class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Kematian Penduduk Desa Palasari</h1>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="row d-block">
                    <a href="/data/input-kematian" class="text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;">Tambah Data</a>
                    <a href="#" class="text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Import Data
                    </a>

                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/data/import" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="file" name="file" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 my-5 mx-0">
        <table class="table table-bordered border ">
            <thead class="themeColor text-white">
                <tr>
                    <th rowspan="2" class="text-center align-middle font-table">No</th>
                    <th rowspan="2" class="text-center align-middle font-table">No KK</th>
                    <th rowspan="2" class="text-center align-middle font-table">NIK</th>
                    <th rowspan="2" class="text-center align-middle font-table">Nama</th>
                    <th rowspan="2" class="text-center align-middle font-table">Jenis Kelamin</th>
                    <th colspan="2" class="text-center align-middle font-table">Kelahiran</th>
                    <th colspan="2" class="text-center align-middle font-table">Kematian</th>
                    <th colspan="2" class="text-center align-middle font-table">Aksi</th>
                </tr>
                <tr>
                    <th class="text-center align-middle font-table">Tempat</th>
                    <th class="text-center align-middle font-table">Tanggal</th>
                    <th class="text-center align-middle font-table">Tempat</th>
                    <th class="text-center align-middle font-table">Tanggal</th>
                    <th class="text-center align-middle font-table">Detail</th>
                    <th class="text-center align-middle font-table">Hapus</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row, replace with your actual data -->

                <!-- Add more rows as needed -->
            </tbody>
        </table>




    </div>
</div>

</div>