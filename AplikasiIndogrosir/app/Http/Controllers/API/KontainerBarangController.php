<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KontainerBarang;
use Illuminate\Http\Request;

class KontainerBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status'=> true,
            'message'=> 'Success Get Kontainer',
            'data'=> KontainerBarang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data
        $validasi = $request->validate([
            'nama_kontainer' => 'required',
        ]);

        // buat objek dari model Kontainer Barang
        $kontainerbarang = new KontainerBarang();
        $kontainerbarang -> nama_kontainer = $validasi['nama_kontainer'];
        $kontainerbarang -> save();

        return response()->json([
            'status' => true,
            'message' => 'Data Kontainer Barang Berhasil Ditambah'
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
            'nama_kontainer' => 'required'
        ]);

        $kontainerbarang = KontainerBarang::find($id);
        $kontainerbarang->update($validasi);

        return response()->json([
            'status' => true,
            'message' => 'Data Kontainer Barang Berhasil Diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kontainerbarang = KontainerBarang::find($id);
        $kontainerbarang -> delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Kontainer Barang Berhasil Didelete'
        ]);
    }
}
