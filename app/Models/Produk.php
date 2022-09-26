<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table="produks";
    protected $fill=[
        "nama_produk",
        "merk_produk",
        "jenis_produk",
        "harga_produk",
        "desc_produk"
    ];
}
