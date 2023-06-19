<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status'=> true,
            'message'=> 'Success Get Divisi',
            'data'=> Divisi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'nama_divisi' => 'required',
            'bagian_divisi' => 'required'
        ]);

        //create object from models divisi
        $divisi = new Divisi();
        $divisi -> nama_divisi = $validate['nama_divisi'];
        $divisi -> bagian_divisi = $validate['bagian_divisi'];
        $divisi -> save();

        return response()-> json([
            'status'=> true,
            'message'=> 'Data Divisi Berhasil di tambah'
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
        $validate = $request->validate([
            'nama_divisi' => 'required',
            'bagian_divisi' => 'required'
        ]);

        $divisi = Divisi::find($id);
        $divisi -> update($validate);

        return response()->json([
            'status' => true,
            'message' => 'Data Divisi berhasil diubah',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $divisi = Divisi::find($id);
        $divisi->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Divisi berhasil dihapus',
        ]);
    }
}
