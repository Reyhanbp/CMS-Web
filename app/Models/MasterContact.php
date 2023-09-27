<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterContact extends Model
{
    use HasFactory;
    protected $table = 'master_contacts' ;
    protected $fillable = [
        'name','master_siswa_id', 'contact_type_id', 
    ];
    public function mastersiswa()
    {
        return $this->belongsTo(MasterSiswa::class, 'master_siswa_id');
    }
    public function contacttype()
    {
        return $this->belongsTo(ContactType::class, 'contact_type_id');
    }

}
