<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    use HasFactory;
    protected $table = 'contact_types' ;
    protected $fillable = [
         'type_name', 
    ];
    public function contact()
    {
        return $this->hasMany(MasterContact::class, 'contact_type_id');
    } 
}
