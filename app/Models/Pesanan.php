<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'tb_pesanan';
    protected $fillable = [
        'slug','nama','tipe'
    ];
    public $timestamps = true;

    public function tipe(){
        return $this->belongsTo(TipeUndangan::class, 'tipe','nama');
    }
    public function pesan(){
        return $this->hasMany(Pesan::class, 'slug','id_slug');
    }
    public function tamu(){
        return $this->hasMany(Tamu::class, 'slug','id_slug');
    }
}
