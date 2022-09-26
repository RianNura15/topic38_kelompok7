<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function produk()
    {
        return view('admin.produk.index');
    }

    public function create_produk()
    {
        return view('admin.produk.create');
    }

    public function store_produk(Request $request)
    {
        $this->validate($request, [
			'nama_produk' => 'required',
            'merk_produk' => 'required',
            'jenis_produk' => 'required',
            'harga_produk' => 'required',
            'deskripsi_produk' => 'required',
			'gambar' => 'required|image|mimes:jpeg,png,jpg',
		]);
		$file = $request->file('gambar');
 
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'produk';
		$file->move($tujuan_upload,$nama_file);
 
		Produk::create([
			'nama_produk' => $request->nama_produk,
            'merk_produk' => $request->merk_produk,
            'jenis_produk' => $request->jenis_produk,
            'harga_produk' => $request->harga_produk,
            'desc_produk' => $request->desc_produk,
			'gambar' => $nama_file
		]);
    }
}
