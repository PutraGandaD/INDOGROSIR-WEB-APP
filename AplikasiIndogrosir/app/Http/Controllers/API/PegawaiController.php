<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status'=> true,
            'message'=> 'Success Get Pegawai',
            'data'=> Pegawai::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'foto_pegawai'=>'required|file|image|max:5000',
            'kode_pegawai'=>'required',
            'nama_pegawai'=>'required',
            'divisi_id'=>'required',
            'shift_id'=>'required',
            'alamat'=>'required',
            'nomor_hp'=>'required'
        ]);

        $ext = $request->foto_pegawai->getClientOriginalExtension();
        $new_filename = $validate['kode_pegawai'].".".$ext;
        $request->foto_pegawai->storeAs('public',$new_filename);

        $pegawai = new Pegawai();
        $pegawai ->foto_pegawai =$new_filename;
        $pegawai ->kode_pegawai = $validate['kode_pegawai'];
        $pegawai ->nama_pegawai = $validate['nama_pegawai'];
        $pegawai -> divisi_id = $validate['divisi_id'];
        $pegawai -> shift_id =$validate['shift_id'];
        $pegawai -> alamat = $validate['alamat'];
        $pegawai -> nomor_hp= $validate['nomor_hp'];
        $pegawai -> save();

        return response()-> json([
            'status'=>true,
            'message'=>'Data Pegawai Berhasil Ditambah'
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
            'foto_pegawai'=>'required|file|image|max:5000',
            'nama_pegawai'=>'required',
            'divisi_id'=>'required',
            'shift_id'=>'required',
            'alamat'=>'required',
            'nomor_hp'=>'required'
        ]);

        $pegawai = Pegawai::find($id);
        $ext = $request->foto_pegawai->getClientOriginalExtension();
        $new_filename = $pegawai->kode_pegawai.".".$ext;
        $request->foto_pegawai->storeAs('public',$new_filename);
        $pegawai ->foto_pegawai =$new_filename;
        $pegawai -> update($validate);

        return response()->json([
            'status' => true,
            'message'=>'Data Pegawai Berhasil Di ubah'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();

        return response()->json([
            'status'=> true,
            'message'=>'Data Pegawai Berhasil Dihapus'
        ]);
    }
}
