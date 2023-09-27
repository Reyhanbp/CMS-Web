<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProject extends Model
{
    use HasFactory;

    protected $table = 'master_projects' ;
    protected $fillable = [
         'master_siswa_id','project_name', 'project_date', 'photo'
    ];
    public function mastersiswa()
    {
        return $this->belongsTo(MasterSiswa::class, 'master_siswa_id');
    }
    public static function booted()
    {
        parent::boot();

        self::deleted(function ($model) {
            if (file_exists(storage_path('app/public/' . str_replace('storage/', '', $model->photo)))) {
                unlink(storage_path('app/public/' . str_replace('storage/', '', $model->photo)));
            }
        });
    }
}
