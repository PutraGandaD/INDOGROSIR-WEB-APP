<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status'=> true,
            'message'=> 'Success Get Brand',
            'data'=> Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_brand' => 'required',
            'logo_brand' => 'required|file|image|max:5000'
        ]);

        $ext = $request->logo_brand->getClientOriginalExtension();
        $new_filename = $validasi['nama_brand'].".".$ext;
        $request->logo_brand->storeAs('public', $new_filename);

        $brand = new Brand();
        $brand ->nama_brand = $validasi['nama_brand'];
        $brand ->logo_brand = $new_filename;
        $brand->save(); // save

        return response()->json([
            'status' => true,
            'message' => 'Data Brand Berhasil Ditambah'
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
        $validasi = $request->validate([
            'nama_brand' => 'required',
            'logo_brand' => 'required|file|image|max:5000'
        ]);

        $brand = Brand::find($id);
        $ext = $request->logo_brand->getClientOriginalExtension();
        $new_filename = $validasi['nama_brand'].".".$ext;
        $request->logo_brand->storeAs('public', $new_filename);

        $brand->update($validasi); // save

        return response()->json([
            'status' => true,
            'message' => 'Data Brand Berhasil Diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand -> delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Brand Berhasil Didelete'
        ]);
    }
}
