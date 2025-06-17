<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'total_harga', 'status_pembayaran', 'tanggal_transaksi'];
}