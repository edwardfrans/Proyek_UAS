<?php

namespace App\Controllers;

class Home extends BaseController
{
    /**
     * Menampilkan halaman selamat datang (landing page).
     */
    public function index()
    {
        $data = [
            'title' => 'Selamat Datang di OutdoorKu'
        ];
        
        // Memuat view bernama 'home.php' dan mengirimkan data 'title'
        return view('home', $data);
    }
}