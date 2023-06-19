<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status'=> true,
            'message'=> 'Success Get Shift',
            'data'=> Shift::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->authorize('create',Shift::class);

        $validate = $request->validate([
            'waktu_shift' => 'required',
            'jam_kerja' => 'required'

        ]);

        //create object from models Shift
        $shift = new Shift();
        $shift -> waktu_shift = $validate['waktu_shift'];
        $shift -> jam_kerja = $validate['jam_kerja'];

        $shift -> save();

        return response()->json([
            'status' => true,
            'message' => 'Data Shift Berhasil Di Tambah'
        ]);
    }

    public function update(Request $request, string $id)
    {
        // $this->authorize('update',$shift);

        $validate = $request->validate([
            'jam_kerja' => 'string'
        ]);

        //create object from models Shift
        $shift = Shift::find($id);
        $shift -> update($validate);

        return response()->json([
            'status' => true,
            'message' => 'Data Shift berhasil diubah',
        ]);
    }

}
