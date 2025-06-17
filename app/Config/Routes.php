<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login'); // Jadikan halaman produk sebagai halaman utama

// Rute untuk Autentikasi
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::processLogin');
$routes->get('logout', 'Auth::logout');

// Rute untuk Produk
$routes->get('produk', 'Produk::index');

// Rute untuk Keranjang
$routes->get('keranjang', 'Keranjang::index');
$routes->post('keranjang/tambah', 'Keranjang::add');

// Rute untuk Pembayaran dan Riwayat
$routes->post('checkout', 'Transaksi::checkout');
$routes->get('riwayat', 'Transaksi::riwayat');