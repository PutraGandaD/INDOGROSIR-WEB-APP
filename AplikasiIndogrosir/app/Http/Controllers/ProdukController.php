<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\KontainerBarang;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('search');
        if($keyword){
            $produk = Produk::where('nama_produk','LIKE','%'.$keyword.'%')->paginate(2);
        }else{
            $produk = Produk::paginate(2); //ubah angko/ halaman
        }
        // $produk = Produk::all();
        return view('produk.index')->with('produk', $produk);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = Brand::orderBy('nama_brand', 'ASC')->get();
        $kontainerbarang = KontainerBarang::orderBy('nama_kontainer', 'ASC')->get();
        return view('produk.create') -> with('brand', $brand) -> with('kontainerbarang', $kontainerbarang);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        // dd($request->nama_dekan);

        // validasi data
        $validasi = $request->validate([
            'nama_produk' => 'required',
            'brand_id' => 'required',
            'foto_produk' => 'required|file|image|max:5000',
            'kontainer_id' => 'required',
            'harga_produk' => 'required',
            'stok_produk' => 'required'
        ]);
        // dd($validasi);

        //
        $ext = $request->foto_produk->getClientOriginalExtension();
        $new_filename = $validasi['nama_produk'].".".$ext;
        $request->foto_produk->storeAs('public', $new_filename);

        // buat objek dari model Fakultas
        $produk = new Produk();
        $produk ->nama_produk = $validasi['nama_produk'];
        $produk ->brand_id = $validasi['brand_id'];
        $produk ->foto_produk = $new_filename;
        $produk ->kontainer_id = $validasi['kontainer_id'];
        $produk ->harga_produk =  $validasi['harga_produk'];
        $produk ->stok_produk =  $validasi['stok_produk'];
        $produk->save(); // save
        return redirect()->route('produk.index')->with('success', "Data produk ".$validasi['nama_produk']." berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $brand = Brand::orderBy('nama_brand', 'ASC')->get();
        $kontainerbarang = KontainerBarang::orderBy('nama_kontainer', 'ASC')->get();
        return view('produk.edit') -> with('produk', $produk) -> with('brand', $brand) -> with('kontainerbarang', $kontainerbarang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //validation
        $validasi = $request->validate([
            'nama_produk' => 'required',
            'brand_id' => 'required',
            'foto_produk' => 'required|file|image|max:5000',
            'kontainer_id' => 'required',
            'harga_produk' => 'required',
            'stok_produk' => 'required'
        ]);

        //
        $ext = $request->foto_produk->getClientOriginalExtension();
        $new_filename = $validasi['nama_produk'].".".$ext;
        $request->foto_produk->storeAs('public', $new_filename);

        $produk ->nama_produk = $validasi['nama_produk'];
        $produk ->brand_id = $validasi['brand_id'];
        $produk ->foto_produk = $new_filename;
        $produk ->kontainer_id = $validasi['kontainer_id'];
        $produk ->harga_produk =  $validasi['harga_produk'];
        $produk ->stok_produk =  $validasi['stok_produk'];

        $produk->save(); // save
        return redirect()->route('produk.index')->with('success', "Data produk ".$validasi['nama_produk']." berhasil diedit");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk -> delete();
        return response("Data berhasil dihapus", 200);
    }
}
