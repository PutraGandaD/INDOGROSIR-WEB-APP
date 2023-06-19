<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory,HasUuids;
    protected $table ='divisi';

    //allow mass assignment API
    protected $fillable = [
        'nama_divisi',
        'bagian_divisi',
    ];

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }

}
