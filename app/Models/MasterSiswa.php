<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSiswa extends Model
{
    use HasFactory;
    protected $table = 'master_siswas' ;
    protected $fillable = [
         'nama', 'kelas', 'jurusan','photo'
    ];
    public function contact()
    {
        return $this->hasMany(MasterContact::class);
    } 
    public function project()
    {
        return $this->hasMany(MasterProject::class, 'master_siswa_id');
    } 

    public static function booted() {
        parent::boot();

        self::deleted(function ($model) {
            if (file_exists(storage_path('app/public/' . str_replace('storage/', '', $model->photo)))) {
                unlink(storage_path('app/public/' . str_replace('storage/', '', $model->photo)));
            }
        });
    }
}
