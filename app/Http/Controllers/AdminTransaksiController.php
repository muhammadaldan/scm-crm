<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::distinct('transaction_code')->get()->groupBy('transaction_code')->first();

        return view('admin.transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.transaksi.create');
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

        Transaction::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaction created successfully!');
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
        return view('admin.transaksi.edit', [
            'data' => Transaction::find($id),
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

        $data = Transaction::find($id);

        $data->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaction updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Transaction::find($id);

        $data->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaction deleted successfully!');
    }
}
