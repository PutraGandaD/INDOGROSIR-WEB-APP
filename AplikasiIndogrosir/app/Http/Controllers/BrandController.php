<?php

namespace App\Http\Controllers;

use App\Models\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::all();
        return view('brand.index')->with('brand', $brand);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create',Brand::class);

        //dd($request);

        // validasi data
        $validasi = $request->validate([
            'nama_brand' => 'required',
            'logo_brand' => 'required|file|image|max:5000',
        ]);

        //
        $ext = $request->logo_brand->getClientOriginalExtension();
        $new_filename = $validasi['nama_brand'].".".$ext;
        $request->logo_brand->storeAs('public', $new_filename);

        // buat objek dari model Fakultas
        $brand = new Brand();
        $brand ->nama_brand = $validasi['nama_brand'];
        $brand ->logo_brand = $new_filename;
        $brand->save(); // save

        return redirect()->route('brand.index')->with('success', "Data brand ".$validasi['nama_brand']." berhasil disimpan");
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
    public function edit(Brand $brand)
    {
        //
        return view('brand.edit') -> with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $this->authorize('update',$brand);

        // validasi data
        $validasi = $request->validate([
            'nama_brand' => 'required',
            'logo_brand' => 'required|file|image|max:5000',
        ]);

        //
        $ext = $request->logo_brand->getClientOriginalExtension();
        $new_filename = $validasi['nama_brand'].".".$ext;
        $request->logo_brand->storeAs('public', $new_filename);

        // buat objek dari model Fakultas
        $brand ->nama_brand = $validasi['nama_brand'];
        $brand ->logo_brand = $new_filename;
        $brand->save(); // save

        return redirect()->route('brand.index')->with('success', "Data brand ".$validasi['nama_brand']." berhasil diedit");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $this->authorize('delete',$brand);

        //
        $brand -> delete();
        return response("Data berhasil dihapus", 200);
    }
}
