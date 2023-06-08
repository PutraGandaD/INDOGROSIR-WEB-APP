<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory,HasUuids;
    protected $table ='pegawai';

    public function divisi(){
        return $this->belongsTo(Divisi::class,'divisi_id');
    }

    public function shift(){
        return $this->belongsTo(Shift::class,'shift_id');
    }


}
