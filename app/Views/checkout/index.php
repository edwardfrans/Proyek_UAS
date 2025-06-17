<?= $this->extend('templates/header') ?>

<div class="text-center py-5">
    <h1 class="display-4">✅ Pembayaran Berhasil!</h1>
    <p class="lead">Terima kasih telah berbelanja di OutdoorKu.</p>
    <p>Nomor transaksi Anda adalah <strong>#<?= $transaksi_id ?></strong>.</p>
    <hr>
    <p>
        Ingin melihat riwayat belanja Anda?
    </p>
    <a class="btn btn-primary" href="<?= site_url('riwayat') ?>">Lihat Riwayat Transaksi</a>
</div>

<?= $this->extend('templates/footer') ?>