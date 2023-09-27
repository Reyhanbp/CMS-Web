<?php

namespace App\Http\Controllers;

use App\Models\MasterSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MasterSiswaController extends Controller
{
    public function Index(Request $request)
    {

        $pagination = 5;

        $DataList = MasterSiswa::orderBy('id', 'asc')->paginate($pagination);
        return view('mastersiswa.MasterSiswa', compact('DataList'));
    }
    public function Tambah()
    {
        return view('mastersiswa.TambahMasterSiswa');
    }
    public function Edit($id)
    {
        $mastersiswa = MasterSiswa::find($id);
        return view('mastersiswa.EditMasterSiswa', compact('mastersiswa'));
    }
    public function Update(Request $request, $id)
    {
        $mastersiswa = MasterSiswa::find($id);

        $request->validate([
            'nama' => 'required|string',
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
            'photo' => 'nullable|mimes:jpg,jpeg,png', // Menggunakan nullable agar tidak wajib untuk mengunggah foto baru
        ]);

        // Periksa apakah ada unggahan foto baru
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($mastersiswa->photo) {
                Storage::disk('public')->delete($mastersiswa->photo);
            }

            $file = $request->file('photo');
            $fileName = $request->nama . '.' . $file->getClientOriginalName();

            $image = $file->storeAs('photo', $fileName, 'public');

            // Update data dengan foto baru
            $mastersiswa->update([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
                'photo' => $image
            ]);
        } else {
            // Update data tanpa mengganti foto
            $mastersiswa->update([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
            ]);
        }
        // }

        return redirect()->route('mastersiswa')->with('message', 'Berhasil Memperbarui Data');
    }
    public function Delete($id)
    {
        MasterSiswa::destroy($id);
        return redirect()->route('mastersiswa')->with('message', 'Berhasil Menghapus Data');
    }

    public function send(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:3',
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
            'photo' => 'required|mimes:jpg,jpeg,png',

        ]);
        $file = $request->file('photo');
        $fileName = $request->nama . '.' . $file->getClientOriginalName();

        $image = $file->storeAs('photo', $fileName, 'public');

        MasterSiswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'photo' => $image
        ]);

        return redirect()->route('mastersiswa')->with('message', 'Berhasil Menambahkan Data');

    }

}
