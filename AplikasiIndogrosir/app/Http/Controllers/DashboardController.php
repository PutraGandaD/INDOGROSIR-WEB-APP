<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\KontainerBarang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public  function index(){
        $data['brand'] = Brand::all();
        $data['kontainerbarang'] = KontainerBarang::all();
        $data['produk'] = Produk::all();
        $data['produkbrand'] = DB::select('SELECT b.nama_brand as name, COUNT(*) as jumlah
                                            FROM produk p
                                            JOIN brand b ON p.brand_id = b.id
                                            GROUP by name');
        return view('dashboard', $data);
    }
}
