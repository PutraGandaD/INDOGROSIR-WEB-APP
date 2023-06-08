<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'produk';

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function kontainerbarang(){
        return $this->belongsTo(KontainerBarang::class,'kontainer_id');
    }
}
