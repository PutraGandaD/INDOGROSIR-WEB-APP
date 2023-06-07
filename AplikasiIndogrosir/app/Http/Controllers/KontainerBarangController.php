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
        $kontainerBarang = KontainerBarang::all();
        return view('kontainerBarang.index')->with('kontainerBarang', $kontainerBarang);
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
        $kontainerBarang = new KontainerBarang();
        $kontainerBarang -> nama_kontainer = $validasi['nama_kontainer'];
        $kontainerBarang -> save();

        return redirect()->route('kontainerBarang.index')->with('success', "Data kontainer barang ".$validasi['nama_kontainer']." berhasil disimpan");
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
