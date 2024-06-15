<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industri;

class AdminIndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Industri::all();
        return view('admin.industri.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.industri.create');
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

        Industri::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
            'legalitas_perizinan' => $request->legalitas_perizinan,
        ]);

        return redirect()->route('industri.index')->with('success', 'Industri created successfully!');
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
        return view('admin.industri.edit', [
            'data' => Industri::find($id),
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

        $data = Industri::find($id);

        $data->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
            'legalitas_perizinan' => $request->legalitas_perizinan,
        ]);

        return redirect()->route('industri.index')->with('success', 'Industri updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Industri::find($id);

        $data->delete();

        return redirect()->route('industri.index')->with('success', 'Industri deleted successfully!');
    }
}
