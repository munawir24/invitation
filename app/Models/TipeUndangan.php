<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeUndangan extends Model
{
    use HasFactory;

    protected $table = 'tb_tipe_undangan';
    protected $fillable = [
        'nama'
    ];
    public $timestamps = true;

    public function pesanan(){
        return $this->hasMany(Pesanan::class, 'nama','tipe');
    }
}
