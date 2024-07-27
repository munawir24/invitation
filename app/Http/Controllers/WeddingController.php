<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Tamu;
use Illuminate\Http\Request;

class WeddingController extends Controller
{
    public function index(){
        return view("wedding.index");
    }

    public function wedding_alia_abdillah($id){
        $data = Tamu::where("slug_tamu", $id)->first();
        $slug = $data->id_slug;
        $pesan = Pesan::where("id_slug",$slug)->latest()->get();
        return view("wedding.alia-abdillah.index", compact("data","slug","pesan"));
    }
}
