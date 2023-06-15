<?php

namespace App\Http\Controllers;

use App\Models\KontainerBarang;
use Illuminate\Http\Request;

class KontainerBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kontainerbarang = KontainerBarang::all();
        return view('kontainerbarang.index')->with('kontainerbarang', $kontainerbarang);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kontainerBarang.create');
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

        return redirect()->route('kontainerbarang.index')->with('success', "Data kontainer barang ".$validasi['nama_kontainer']." berhasil disimpan");
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
    public function edit(KontainerBarang $kontainerbarang)
    {
        return view('kontainerbarang.edit') -> with('kontainerbarang', $kontainerbarang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KontainerBarang $kontainerbarang)
    {
                // validasi data
                $validasi = $request->validate([
                    'nama_kontainer' => 'required',
                ]);

                $kontainerbarang -> nama_kontainer = $validasi['nama_kontainer'];
                $kontainerbarang -> save();

                return redirect()->route('kontainerbarang.index')->with('success', "Data Kontainer barang ".$validasi['nama_kontainer']." berhasil diedit.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KontainerBarang $kontainerbarang)
    {
        $kontainerbarang -> delete();
        return response("Data berhasil dihapus", 200);
    }
}
