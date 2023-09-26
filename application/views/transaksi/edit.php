<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ubah Data Transaksi</h3>
                <p class="text-subtitle text-muted">Halaman Ubah Data Transaksi.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('transaksi')?>">Transaksi</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Ubah Data Transaksi
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <?php if ($this->session->flashdata('gagal')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('gagal'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ubah Data Transaksi</h4>
                <a class="btn btn-primary float-end" href="<?= base_url('transaksi') ?>">Kembali</a>
            </div>
            <div class="card-body">
                <form action="<?= base_url('transaksi/update') ?>" method="post">
                    <div class="mb-3">
                    <label for="jenis" class="form-label">Nomor Rekening</label>
                    <input type="text" name="nomor_rek" class="form-control" value="<?= $transaksi['nomor_rek'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal Transaksi</label>
                    <input type="text" name="nomor_rek" class="form-control" value="Rp.<?= $transaksi['nominal'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi'] ?>">
                        <label for="jenis" class="form-label">Jenis Transaksi</label>
                        <select name="jenis" id="jenis" class="form-select" value="<?= $transaksi['jenis'] ?>">
                            <option value="Setoran Tunai">Setoran Tunai</option>
                            <option value="Penarikan Tunai">Penarikan Tunai</option>
                            <option value="Transfer Dana">Transfer Dana</option>
                            <option value="Transfer Antar Bank">Transfer Antar Bank</option>
                            <option value="dll">dll</option>
                        </select>
                    </div>
                    <div class="mb-3">
                    <label for="dk" class="form-label">Debet / Kredit</label>
                        <select name="dk" id="dk" class="form-select" value="<?= $transaksi['debet_kredit'] ?>">
                            <option value="Debet">Debet</option>
                            <option value="Kredit">Kredit</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>