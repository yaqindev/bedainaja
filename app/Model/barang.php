<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table    = 'barang';
    protected $fillable = ['id_karyawan', 'nama_barang', 'harga', 'jenis', 'keuntungan', 'stok'];
}
