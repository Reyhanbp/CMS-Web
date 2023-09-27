<?php

namespace App\Http\Controllers;

use App\Models\ContactType;
use App\Models\MasterContact;
use App\Models\MasterSiswa;
use Illuminate\Http\Request;

class MasterContactController extends Controller
{
   public function Index(){
        $DataList = MasterContact::all();
        return view('contact.IndexContact', compact('DataList'));
    }
    public function Tambah(){
        $DataListSiswa = MasterSiswa::all();
        $DataListContact = ContactType::all();
        return view('contact.TambahContact', compact('DataListSiswa','DataListContact'));
    }

    public function send(Request $request) {
       $request->validate([
            'name' => 'required',
            'contact_type_id' => 'required|integer',
            'master_siswa_id' => 'required|integer',


        ]);
        $data = ContactType::where('id', $request['contact_type_id']);
        $data1 = MasterSiswa::where('id', $request['master_siswa_id']);
        MasterContact::create([
            'name' => $request['name'],
            'contact_type_id' => $request['contact_type_id'],
            'master_siswa_id' => $request['master_siswa_id'],
        ]);


        return redirect() -> route('mastercontact')->with('message', 'Berhasil Menambahkan Data');

    }

}
