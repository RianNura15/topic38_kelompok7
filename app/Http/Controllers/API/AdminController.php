<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\Produk;

class AdminController extends Controller
{
    public function produk()
    {
        $data = Produk::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success',$data);
        }else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function add_produk(Request $request)
    {
        try {
            $request->validate([
                'nama_produk' => 'required',
                'merk_produk' => 'required',
                'jenis_produk' => 'required',
                'harga_produk' => 'required',
                'desc_produk' => 'required',
            ]);

            $produk = Produk::create([
                'nama_produk' => $request->nama_produk,
                'merk_produk' => $request->merk_produk,
                'jenis_produk' => $request->jenis_produk,
                'harga_produk' => $request->harga_produk,
                'desc_produk' => $request->desc_produk,
            ]);

            $data = Produk::where('id_produk', '=', $produk->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            }else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function show_produk($id)
    {
        $data = Produk::where('id_produk', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        }else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function update_produk(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_produk' => 'required',
                'merk_produk' => 'required',
                'jenis_produk' => 'required',
                'harga_produk' => 'required',
                'desc_produk' => 'required',
            ]);

            $produk = Produk::where('id_produk', '=', $id)->update([
                'nama_produk' => $request->nama_produk,
                'merk_produk' => $request->merk_produk,
                'jenis_produk' => $request->jenis_produk,
                'harga_produk' => $request->harga_produk,
                'desc_produk' => $request->desc_produk,
            ]);

            if ($produk) {
                return ApiFormatter::createApi(200, 'Success', $produk);
            }else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function delete_produk($id)
    {
        $produk = Produk::where('id_produk', '=', $id)->delete();

        if ($produk) {
            return ApiFormatter::createApi(200, 'Success Delete Data');
        }else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
