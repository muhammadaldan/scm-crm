<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petani;

class AdminPetaniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Petani::all();
        return view('admin.petani.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.petani.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'alamat' => 'required',
        ]);

        Petani::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('petani.index')->with('success', 'Petani created successfully!');
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
        return view('admin.petani.edit', [
            'data' => Petani::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'alamat' => 'required',
        ]);

        $data = Petani::find($id);

        $data->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('petani.index')->with('success', 'Petani updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Petani::find($id);

        $data->delete();

        return redirect()->route('petani.index')->with('success', 'Petani deleted successfully!');
    }
}
