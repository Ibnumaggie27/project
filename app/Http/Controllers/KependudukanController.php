<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\penduduk;
use App\Imports\pendudukImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel; // Tambahkan use statement untuk model Kependudukan

class KependudukanController extends Controller
{
    public function index()
    {
        $penduduk = penduduk::all();
        return view('data.kependudukan', compact('penduduk'));
    }

    public function Kependudukan()
    {

        return view('kelola_data_masyarakat.kependudukan', [
            'penduduk'  => penduduk::paginate(25),
            'title' => 'Data Kependudukan',
            'page'  => 'kependudukan',
            'url' => "Kependudukan",
            //'users' => User::where('level', 'masyarakat')->get()
        ]);
    }
    public function DetailsKependudukan($id)
    {
        $penduduk = penduduk::find($id);

        if ($penduduk) {
            return view('kelola_data_masyarakat.detail', [
                'penduduk'  => $penduduk,
                'title' => 'Data Kependudukan',
            ]);
        } else {
            return redirect()->back()->with('error', 'Penduduk not found');
        }
    }

    public function search(Request $request)
    {
        // Retrieve the search query from the request
        $search = $request->input('search');

        // Perform the search query
        $penduduk = Penduduk::where('namaLengkap', 'LIKE', '%' . $search . '%')
            ->orWhere('noKK', 'LIKE', '%' . $search . '%')
            ->orWhere('NIK', 'LIKE', '%' . $search . '%')
            ->orWhere('jk', 'LIKE', '%' . $search . '%')
            ->get();

        // Return the filtered data as JSON response
        return response()->json($penduduk);
    }

    public function input()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input Kependudukan',
            'page'  => 'input',
            //'users' => User::where('level', 'masyarakat')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'noKK' => 'required',
            'namaLengkap' => 'required',
            'NIK' => 'required',
            'jk' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenisPekerjaan' => 'required',
            'goldar' => 'required',
            'statusPerkawinan' => 'required',
            'tanggalPerkawinan' => 'required',
            'statusHubungan' => 'required',
            'kewarganegaraan' => 'required',
            'noPaspor' => 'required',
            'noKitap' => 'required',
            'namaAyah' => 'required',
            'namaIbu' => 'required',
            'namaKepalaKeluarga' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kodePos' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'tanggalDikeluarkan' => 'required',
            'tipePenduduk' => 'required',
            'statusNik' => 'required',
        ]);

        penduduk::create($validated);
        return redirect('data/kependudukan')->with('berhasil', 'Berhasil menambahkan petugas!');
    }

    public function import(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('pendudukData', $namafile);

        Excel::import(new pendudukImport, \public_path('/pendudukdata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy($id)
    {
        if (Penduduk::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }
}
