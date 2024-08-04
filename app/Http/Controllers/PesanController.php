<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Models\Pesanan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $no = 1;
        $pesanan = Pesanan::where("status", "=",1)->first();
        $get_aktif = $request->input("order") == null ? $pesanan->slug : $request->input("order");

        $order = Pesanan::all() ;
        $data = Auth::user()->role == "USER" ? Pesan::where('id_slug', Auth::user()->id_slug)->latest()->get() : Pesan::where('id_slug', $get_aktif)->latest()->get();
        return view("message.index", compact("data","no","order","get_aktif"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesan = Pesan::create($request->all());
        alert()->success("Berhasil","Pesan Anda Berhasil Dikirim");
        return redirect()->back();
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
        $data = Pesan::find($id);
        $data->delete();
        alert()->success("Berhasil","Pesan Berhasil Dihapus");
        return redirect()->back();
    }
}
