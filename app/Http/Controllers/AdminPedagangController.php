<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedagang;

class AdminPedagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pedagang::all();
        return view('admin.pedagang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pedagang.create');
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

        Pedagang::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
            'legalitas_perizinan' => $request->legalitas_perizinan,
        ]);

        return redirect()->route('pedagang.index')->with('success', 'Pedagang created successfully!');
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
        return view('admin.pedagang.edit', [
            'data' => Pedagang::find($id),
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

        $data = Pedagang::find($id);

        $data->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
            'legalitas_perizinan' => $request->legalitas_perizinan,
        ]);

        return redirect()->route('pedagang.index')->with('success', 'Pedagang updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pedagang::find($id);

        $data->delete();

        return redirect()->route('pedagang.index')->with('success', 'Pedagang deleted successfully!');
    }
}
