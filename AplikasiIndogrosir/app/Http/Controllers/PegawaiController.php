<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Pegawai;
use App\Models\Shift;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pegawai = Pegawai::all();
        return view('pegawai.index')->with('pegawai',$pegawai);

    }



    public function create()
    {
        $divisi = Divisi::orderBy('nama_divisi','ASC')->get();
        $shift = Shift::orderBy('waktu_shift','ASC')->get();

        return view('pegawai.create') ->with('divisi',$divisi) ->with('shift',$shift);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode_pegawai'=>'required',
            'nama_pegawai'=>'required',
            'foto_pegawai'=>'required',
            'alamat'=>'required',
            'nomor_hp'


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
