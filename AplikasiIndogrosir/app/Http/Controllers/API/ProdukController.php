<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status'=> true,
            'message'=> 'Success Get Produk',
            'data'=> Produk::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        $produk = new Produk();
        $produk ->nama_produk = $validasi['nama_produk'];
        $produk ->brand_id = $validasi['brand_id'];
        $produk ->foto_produk = $new_filename;
        $produk ->kontainer_id = $validasi['kontainer_id'];
        $produk ->harga_produk =  $validasi['harga_produk'];
        $produk ->stok_produk =  $validasi['stok_produk'];
        $produk->save(); // save

        return response()->json([
            'status' => true,
            'message' => 'Data Produk Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validasi data
        $validasi = $request->validate([
            'nama_produk' => 'required',
            'brand_id' => 'required',
            'foto_produk' => 'required|file|image|max:5000',
            'kontainer_id' => 'required',
            'harga_produk' => 'required',
            'stok_produk' => 'required'
        ]);

        $produk = Produk::find($id);
        $ext = $request->foto_produk->getClientOriginalExtension();
        $new_filename = $validasi['nama_produk'].".".$ext;
        $request->foto_produk->storeAs('public', $new_filename);
        $produk->update($validasi); // save

        return response()->json([
            'status' => true,
            'message' => 'Data Produk Berhasil Diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::find($id);
        $produk -> delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Produk Berhasil Didelete'
        ]);
    }
}
