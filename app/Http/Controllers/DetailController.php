<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DetailController extends Controller
{
    public function index($id)
    {
        $data = Transaction::where('trasaction_code', $id)->get();
        return view('detail', compact('data'));
    }
}
