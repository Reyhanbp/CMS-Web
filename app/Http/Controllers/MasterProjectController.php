<?php

namespace App\Http\Controllers;

use App\Models\ContactType;
use App\Models\MasterProject;
use App\Models\MasterSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MasterProjectController extends Controller
{
    public function Index()
    {
        $datas = MasterSiswa::all('id', 'nama');
        return view('project.IndexProject', compact('datas'));
    }
    public function show($id)
    {
        $datas = MasterSiswa::find($id)->project()->get();
        return view('project.ShowProject', compact('datas'));

    }
    public function Tambah($id)
    {
        $data = MasterSiswa::find($id);
        return view('project.TambahProject', compact('data'));
    }
    public function send(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|min:3',
            'project_date' => 'required',
            'photo' => 'required|image',
        ]);

        $file = $request->file('photo');
        $fileName = $request->project_name . '.' . $file->getClientOriginalName();

        $image = $file->storeAs('photo', $fileName, 'public');

        MasterProject::create([
            'project_name' => $request->project_name,
            'project_date' => $request->project_date,
            'master_siswa_id' => $request->master_siswa_id,
            'photo' => $image,
        ]);

        return redirect()->route('masterproject')->with('message', 'Berhasil Menambahkan Data');

    }
    public function Edit($id)
    {
        $DataListSiswa = MasterSiswa::all();
        $data = MasterProject::find($id);
        return view('project.editProject', compact('data', 'DataListSiswa'));
    }
    public function Update(Request $request, $id)
    {
        $mastersiswa = MasterProject::find($id);

        $request->validate([
            'project_name' => 'required|min:3',
            'project_date' => 'required|date',
            'master_siswa_id' => 'required|integer',
            'photo' => 'nullable|image',
        ]);

        // Periksa apakah ada unggahan foto baru
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($mastersiswa->photo) {
                Storage::disk('public')->delete($mastersiswa->photo);
            }

            $file = $request->file('photo');
            $fileName = $request->project_name . '.' . $file->getClientOriginalName();

            $image = $file->storeAs('photo', $fileName, 'public');

            // Update data dengan foto baru
            $mastersiswa->update([
                'project_name' => $request->project_name,
                'project_date' => $request->project_date,
                'master_siswa_id' => $request->master_siswa_id,
                'photo' => $image
            ]);
        } else {
            // Update data tanpa mengganti foto
            $mastersiswa->update([
                'project_name' => $request->project_name,
                'project_date' => $request->project_date,
                'master_siswa_id' => $request->master_siswa_id,
            ]);
        }
        return redirect()->route('masterproject')->with('message', 'Berhasil Menambahkan Data');
    }
    public function Delete($id)
    {
        MasterProject::destroy($id);
        return redirect()->route('masterproject')->with('message', 'Berhasil Menghapus Data');
    }
}
