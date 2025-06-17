<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    public function index()
    {
        $model = new ProdukModel();
        $data['produk'] = $model->findAll();
        // Tampilkan halaman daftar produk
        return view('produk/index', $data);
    }
}