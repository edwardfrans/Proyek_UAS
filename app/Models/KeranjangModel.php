<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table            = 'keranjang';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'produk_id', 'jumlah', 'subtotal'];

    public function getKeranjang($userId)
    {
        return $this->select('keranjang.id, produk.nama_produk, produk.harga, produk.gambar, keranjang.jumlah, keranjang.subtotal')
            ->join('produk', 'produk.id = keranjang.produk_id')
            ->where('keranjang.user_id', $userId)
            ->findAll();
    }
}