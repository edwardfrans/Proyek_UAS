<?= $this->extend('templates/header') ?>

<div class="container">
    <h2 class="mb-4">Riwayat Transaksi Anda</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Tanggal</th>
                            <th class="text-end">Total Harga</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($riwayat)): ?>
                            <?php foreach($riwayat as $trx): ?>
                            <tr>
                                <td><strong>TRX-<?= $trx['id'] ?></strong></td>
                                <td><?= date('d M Y, H:i', strtotime($trx['tanggal_transaksi'])) ?></td>
                                <td class="text-end">Rp <?= number_format($trx['total_harga'], 0, ',', '.') ?></td>
                                <td class="text-center">
                                    <span class="badge bg-success"><?= ucfirst($trx['status_pembayaran']) ?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-4">Anda belum memiliki riwayat transaksi.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->extend('templates/footer') ?>