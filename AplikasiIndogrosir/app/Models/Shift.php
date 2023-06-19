<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory,HasUuids;
    protected $table ='shift';

    protected $fillable = [
        'waktu_shift',
        'jam_kerja',
    ];

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
}

