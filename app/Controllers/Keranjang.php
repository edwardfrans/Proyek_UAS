<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\ProdukModel;

class Keranjang extends BaseController
{
    public function index()
    {
        $model = new KeranjangModel();
        $userId = session()->get('user_id');
        $data['keranjang'] = $model->getKeranjang($userId);
        // Tampilkan halaman keranjang belanja
        return view('keranjang/index', $data);
    }

    public function add()
    {
        $keranjangModel = new KeranjangModel();
        $produkModel = new ProdukModel();
        $userId = session()->get('user_id');
        $produkId = $this->request->getVar('produk_id');
        $jumlah = 1; // Default tambah 1

        $produk = $produkModel->find($produkId);
        
        // Cek apakah produk sudah ada di keranjang user
        $item = $keranjangModel->where(['user_id' => $userId, 'produk_id' => $produkId])->first();

        if ($item) {
            // Jika sudah ada, update jumlahnya
            $newJumlah = $item['jumlah'] + $jumlah;
            $keranjangModel->update($item['id'], [
                'jumlah' => $newJumlah,
                'subtotal' => $produk['harga'] * $newJumlah
            ]);
        } else {
            // Jika belum ada, tambahkan item baru
            $keranjangModel->save([
                'user_id' => $userId,
                'produk_id' => $produkId,
                'jumlah' => $jumlah,
                'subtotal' => $produk['harga'] * $jumlah
            ]);
        }

        return redirect()->to('/keranjang');
    }
}