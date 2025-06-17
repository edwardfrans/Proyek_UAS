<?= $this->include('templates/header') ?>

<div class="container">
    <h2 class="mb-4">Riwayat Transaksi Anda</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID Transaksi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col" class="text-end">Total Harga</th>
                            <th scope="col" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($riwayat)): ?>
                            <?php foreach($riwayat as $trx): ?>
                            <tr>
                                <td><strong>TRX-<?= $trx['id'] ?></strong></td>
                                <td><?= date('d M Y, H:i', strtotime($trx['tanggal_transaksi'])) ?></td>
                                <td class="text-end">Rp <?= number_format($trx['total_harga'], 0, ',', '.') ?></td>
                                <td class="text-center">
                                    <span class="badge bg-success rounded-pill"><?= ucfirst($trx['status_pembayaran']) ?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <p class="fs-5 text-muted">Anda belum memiliki riwayat transaksi.</p>
                                    <a href="<?= site_url('produk') ?>" class="btn btn-primary">Mulai Belanja</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->include('templates/footer') ?>