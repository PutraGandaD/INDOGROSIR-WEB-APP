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
    public function index(Request $request)
    {
        $keyword = $request->query('search');
        if($keyword){
            $pegawai = Pegawai::where('nama_pegawai','LIKE','%'.$keyword.'%')->paginate(2);
        }else{
            $pegawai = Pegawai::paginate(2);
        }

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
        return redirect()->route('pegawai.index')->with('success','Data Pegawai '.$validate['nama_pegawai'].' Berhasil di Simpan!');

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
    public function edit(Pegawai $pegawai)
    {
        $divisi =Divisi::orderBy('nama_divisi','ASC')->get();
        $shift = Shift::orderBy('waktu_shift','ASC')->get();

        return view('pegawai.edit')
        ->with('pegawai',$pegawai)
        ->with('divisi',$divisi)
        ->with('shift',$shift);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $validate = $request->validate([
            'foto_pegawai' => 'required|file|image|max:5000',
            'nama_pegawai'=>'required',
            'divisi_id'=>'required',
            'shift_id'=>'required',
            'alamat'=>'required',
            'nomor_hp'=>'required'
        ]);

        $ext = $request->foto_pegawai->getClientOriginalExtension();
        $new_filename = $pegawai->kode_pegawai.".".$ext;
        $request->foto_pegawai->storeAs('public',$new_filename);

        $pegawai ->foto_pegawai =$new_filename;
        $pegawai ->nama_pegawai = $validate['nama_pegawai'];
        $pegawai -> divisi_id = $validate['divisi_id'];
        $pegawai -> shift_id =$validate['shift_id'];
        $pegawai -> alamat = $validate['alamat'];
        $pegawai -> nomor_hp= $validate['nomor_hp'];


        $pegawai -> save();
        return redirect()->route('pegawai.index')->with('success','Data Pegawai '.$validate['nama_pegawai'].' Berhasil di Simpan!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        //
        $pegawai -> delete();
        return response ("Pegawai berhasil di delete",200);

    }
}
