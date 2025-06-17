<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\ProdukModel;

class Transaksi extends BaseController
{
    // Ini adalah fungsi pembayaran
    public function checkout()
    {
        $db = \Config\Database::connect();
        $userId = session()->get('user_id');

        $keranjangModel = new KeranjangModel();
        $transaksiModel = new TransaksiModel();
        $detailModel = new DetailTransaksiModel();
        $produkModel = new ProdukModel();

        $keranjang = $keranjangModel->where('user_id', $userId)->findAll();
        if (empty($keranjang)) {
            return redirect()->to('/keranjang')->with('error', 'Keranjang belanja kosong!');
        }

        $totalHarga = array_sum(array_column($keranjang, 'subtotal'));
        
        $db->transStart(); // Mulai transaction

        // 1. Simpan ke tabel transaksi
        $transaksiModel->save([
            'user_id' => $userId,
            'total_harga' => $totalHarga,
            'status_pembayaran' => 'success' // Anggap pembayaran langsung sukses
        ]);
        $transaksiId = $transaksiModel->getInsertID();

        // 2. Pindahkan item dari keranjang ke detail_transaksi
        foreach ($keranjang as $item) {
            $produk = $produkModel->find($item['produk_id']);
            $detailModel->save([
                'transaksi_id' => $transaksiId,
                'produk_id' => $item['produk_id'],
                'jumlah' => $item['jumlah'],
                'harga_saat_transaksi' => $produk['harga']
            ]);

            // 3. Kurangi stok produk
            $newStok = $produk['stok'] - $item['jumlah'];
            $produkModel->update($item['produk_id'], ['stok' => $newStok]);
        }

        // 4. Kosongkan keranjang user
        $keranjangModel->where('user_id', $userId)->delete();

        $db->transComplete(); // Selesaikan transaction

        // Tampilkan halaman sukses
        return view('transaksi/sukses');
    }

    // Ini adalah fungsi untuk melihat riwayat
    public function riwayat()
    {
        $model = new TransaksiModel();
        $userId = session()->get('user_id');
        $data['riwayat'] = $model->where('user_id', $userId)
                                  ->orderBy('tanggal_transaksi', 'DESC')
                                  ->findAll();
                                  
        // Tampilkan halaman riwayat transaksi
        return view('transaksi/riwayat', $data);
    }
}