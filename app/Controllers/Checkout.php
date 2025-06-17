<?php namespace App\Controllers;

use App\Models\RiwayatModel;
use App\Models\DetailRiwayatModel;

class Checkout extends BaseController
{
    public function index()
    {
        $cart = session()->get('cart');
        $userId = session()->get('user_id');

        if (empty($cart) || !$userId) {
            return redirect()->to('/keranjang');
        }

        $db = \Config\Database::connect();
        $riwayatModel = new RiwayatModel();
        $detailModel = new DetailRiwayatModel();

        $totalHarga = 0;
        foreach ($cart as $item) {
            $totalHarga += $item['harga'] * $item['jumlah'];
        }
        
        $db->transStart();
        
        $riwayatId = $riwayatModel->insert([
            'user_id'       => $userId,
            'total_harga'   => $totalHarga,
        ]);
        
        foreach ($cart as $item) {
            $detailModel->insert([
                'riwayat_id' => $riwayatId,
                'produk_id'  => $item['id'],
                'jumlah'     => $item['jumlah'],
                'subtotal'   => $item['harga'] * $item['jumlah'],
            ]);
        }
        
        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            session()->setFlashdata('error', 'Gagal memproses transaksi.');
            return redirect()->to('/keranjang');
        }

        session()->remove('cart');
        
        return view('checkout/index', ['transaksi_id' => $riwayatId]);
    }
}