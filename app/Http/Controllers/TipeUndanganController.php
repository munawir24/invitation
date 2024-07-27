<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeUndangan;

class TipeUndanganController extends Controller
{
    public function index()
    {
        $data = TipeUndangan::all();
        return view("tipe.index", ['data' => $data]);
    }

}
