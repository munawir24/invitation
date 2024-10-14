<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;
use App\Models\Pesanan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TamuController extends Controller
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
        $data = Auth::user()->role == "USER" ? Tamu::where('id_slug', Auth::user()->id_slug)->latest()->get() : Tamu::where('id_slug', $get_aktif)->latest()->get();
        return view("tamu.index", compact("data","no","order","get_aktif"));
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
        $nama_tamu = $request->input("nama");
        $data = new Tamu();
        $data->id_slug = $request->id_slug;
        $data->nama = $nama_tamu;
        $data->slug_tamu = Str::slug($nama_tamu, '-');
        $data->nomor_hp = $request->nomor_hp;
        $data->id_ig = $request->id_ig;
        $data->save();
        alert()->success('Berhasil','Data Berhasil Disimpan');
        return redirect('tamu');
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
        $data = Tamu::find($id);
        return view('tamu.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Tamu::find($id);
        $data->update($request->all());
        toast('Data Berhasil Diperbarui','success');
        return redirect('tamu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Tamu::find($id);
        $data->delete();
        alert()->success('Berhasil','Data Berhasil Dihapus');
        return redirect('tamu');
    }
}
