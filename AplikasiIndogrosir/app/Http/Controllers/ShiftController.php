<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $shift = Shift::all();
        return view('shift.index')->with('shift',$shift);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('shift.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'waktu_shift' => 'required',
            'jam_kerja' => 'required'

        ]);

        //create object from models Shift
        $shift = new Shift();
        $shift -> waktu_shift = $validate['waktu_shift'];
        $shift -> jam_kerja = $validate['jam_kerja'];

        $shift -> save();

        return redirect()-> route('shift.index') -> with('success', 'Data Shift : '.$validate['waktu_shift'].' has been saved!');

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
