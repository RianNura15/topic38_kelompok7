<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function landingpage()
    {
        return view('user.landingpage');
    }

    public function view_produk()
    {
        return view('user.produk.index');
    }
}
