<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeUndangan;

class TipeUndanganController extends Controller
{
    public function index()
    {
        $no = 1 ;
        $data = TipeUndangan::all();
        return view("tipe.index", ['data' => $data,'no'=> $no]);
    }
    public function store(Request $request){
        TipeUndangan::create($request->all());
        alert()->success('Berhasil','Data Berhasil Ditambahkan');
        return redirect()->route('tipe-undangan');
    }
    public function edit($id){
        $data = TipeUndangan::find($id);
        return view('tipe.edit', ['data'=> $data]);
    }
    public function update(Request $request, $id){
        $data = TipeUndangan::find($id);
        $data->update($request->all());
        toast('success','Data Berhasil Diperbarui');
        return redirect()->route('tipe-undangan');
    }
    public function destroy($id){
        TipeUndangan::find($id)->delete();
        alert()->success('Berhasil','Data Berhasil Dihapus');
        return redirect()->route('tipe-undangan');
    }

}
