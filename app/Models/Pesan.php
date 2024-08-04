<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $table = 'tb_kirim_pesan';
    protected $fillable = [
        'id_slug','nama','pesan','absen'
    ];
    public $timestamps = true;

    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'id_slug','slug');
    }
}
