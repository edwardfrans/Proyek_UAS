<?php 
// Menggunakan template header yang sudah ada
echo $this->extend('templates/header'); 
?>

<div class="container py-5">
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm text-center">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold"><?= esc($title ?? 'Selamat Datang') ?></h1>
            <p class="fs-4 mt-3">Pusat perlengkapan petualangan outdoor terlengkap dan terpercaya Anda.</p>
            <p class="fs-5">Temukan berbagai macam tenda, tas, sepatu, dan peralatan pendukung lainnya dengan kualitas terbaik untuk menemani setiap petualangan Anda.</p>
            <hr class="my-4">
            <p>Siap untuk memulai petualangan berikutnya?</p>
            
            <a class="btn btn-primary btn-lg" href="<?= site_url('produk') ?>" role="button">
                Jelajahi Produk Kami
            </a>
        </div>
    </div>
</div>

<?php 
// Menggunakan template footer yang sudah ada
echo $this->extend('templates/footer'); 
?>