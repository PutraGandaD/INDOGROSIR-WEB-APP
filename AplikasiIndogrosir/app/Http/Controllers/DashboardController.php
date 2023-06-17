<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Divisi;
use App\Models\KontainerBarang;
use App\Models\Pegawai;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public  function index(){
        //PIE CHART PEGAWAI
        $data['brand'] = Brand::all();
        $data['kontainerbarang'] = KontainerBarang::all();
        $data['produk'] = Produk::all();
        $data['produkbrand'] = DB::select('SELECT b.nama_brand as name, COUNT(*) as jumlah
                                            FROM produk p
                                            JOIN brand b ON p.brand_id = b.id
                                            GROUP by name');

        //BAR CHART PEGAWAI
        $data['pegawai'] = Pegawai::all();
        $data['divisi'] = Divisi::all();
        $data['pegawaidivisi']=
        DB::select('SELECT d.nama_divisi, COUNT(*)as jumlah
        FROM pegawai p
        join divisi d ON p.divisi_id = d.id
        GROUP BY d.nama_divisi');


        return view('dashboard', $data);
    }
}
