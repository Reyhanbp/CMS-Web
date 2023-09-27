<?php

namespace App\Http\Controllers;

use App\Models\ContactType;
use Illuminate\Http\Request;

class ContactTypeController extends Controller
{
    public function IndexType(){
        $DataList = ContactType::all(); 
        return view('contact.IndexContactType', compact('DataList'));
    }  
    public function TambahType(){
        return view('contact.TambahContactType');
    }  

    public function sendtype(Request $request) {
        ContactType::create($request->all());
        return redirect() -> route('contact_type');
            
    }
}
