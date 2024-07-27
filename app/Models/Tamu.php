<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    protected $table = 'tb_tamu';
    protected $fillable = [
        'id_slug','slug_tamu','nama','nomor_hp'
    ];
    public $timestamps = true;
    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'id_slug','slug');
    }
}
