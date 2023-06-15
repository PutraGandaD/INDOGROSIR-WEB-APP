<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory,HasUuids;
    protected $table ='pegawai';

    //
    protected $fillable= [
        'kode_pegawai',
        'nama_pegawai',
        'foto_pegawai',
        'alamat',
        'nomor_hp',
        'divisi_id',
        'shift_id'
    ];

    public function divisi(){
        return $this->belongsTo(Divisi::class,'divisi_id');
    }

    public function shift(){
        return $this->belongsTo(Shift::class,'shift_id');
    }


}
