<?= $this->extend('templates/header') ?>

<div class="container">
    <h2 class="mb-4">Keranjang Belanja Anda</h2>

    <?php if(!empty($keranjang)): ?>
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col" class="text-end">Harga</th>
                            <th scope="col" class="text-center">Jumlah</th>
                            <th scope="col" class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach($keranjang as $item): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url('images/' . htmlspecialchars($item['gambar'], ENT_QUOTES, 'UTF-8')) ?>" alt="<?= htmlspecialchars($item['nama_produk'], ENT_QUOTES, 'UTF-8') ?>" style="width: 50px; height: 50px; object-fit: cover; margin-right: 15px;">
                                    <span><?= htmlspecialchars($item['nama_produk'], ENT_QUOTES, 'UTF-8') ?></span>
                                </div>
                            </td>
                            <td class="text-end">Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                            <td class="text-center"><?= $item['jumlah'] ?></td>
                            <td class="text-end">Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                        </tr>
                        <?php $total += $item['subtotal']; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="table-light">
                            <th colspan="3" class="text-end fs-5">Total</th>
                            <th class="text-end fs-5">Rp <?= number_format($total, 0, ',', '.') ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-4">
        <form action="<?= site_url('checkout') ?>" method="post">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-success btn-lg">Bayar Sekarang</button>
        </form>
    </div>

    <?php else: ?>
    <div class="text-center py-5">
        <p class="fs-4">Keranjang Anda kosong.</p>
        <a href="<?= site_url('produk') ?>" class="btn btn-primary">Mulai Belanja</a>
    </div>
    <?php endif; ?>

</div>

<?= $this->extend('templates/footer') ?>