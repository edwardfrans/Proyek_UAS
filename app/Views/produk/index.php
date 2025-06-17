<?= $this->extend('templates/header') ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Produk Outdoor Kami</h2>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php foreach($produk as $p): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="<?= base_url('images/' . htmlspecialchars($p['gambar'], ENT_QUOTES, 'UTF-8')) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['nama_produk'], ENT_QUOTES, 'UTF-8') ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($p['nama_produk'], ENT_QUOTES, 'UTF-8') ?></h5>
                        <p class="card-text text-muted">Stok: <?= $p['stok'] ?></p>
                        <h6 class="card-subtitle mb-2 fw-bold">Rp <?= number_format($p['harga'], 0, ',', '.') ?></h6>
                        
                        <form action="<?= site_url('keranjang/tambah') ?>" method="post" class="mt-auto">
                            <?= csrf_field() ?>
                            <input type="hidden" name="produk_id" value="<?= $p['id'] ?>">
                            <button type="submit" class="btn btn-primary w-100">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->extend('templates/footer') ?>