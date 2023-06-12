<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $keyword = $request->query('search');
        // if($keyword){
        //     $divisi = Divisi::where('nama', 'LIKE', '%'.$keyword.'%')-> paginate(10);
        // }else{
        //     $divisi = Divisi::paginate(10);
        // }
        //
        $divisi = Divisi::all();
        return view('divisi.index')->with('divisi',$divisi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('divisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_divisi' => 'required',
            'bagian_divisi' => 'required'
        ]);

        //create object from models divisi
        $divisi = new Divisi();
        $divisi -> nama_divisi = $validate['nama_divisi'];
        $divisi -> bagian_divisi = $validate['bagian_divisi'];
        $divisi -> save();

        return redirect()-> route('divisi.index') -> with('success', 'Data Divisi '.$validate['nama_divisi'].'has been saved!');

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
    public function destroy(Divisi $divisi)

    {
        $divisi -> delete();
        return response("divisi(s) berhasil di delete",200);
        // return redirect()->route('divisi.index')-> with('success','data berhasil dihapus');
    }
}
