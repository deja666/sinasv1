<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Transaksi</h3>
                <p class="text-subtitle text-muted">Halaman Data Transaksi.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('transaksi')?>">Transaksi</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Data Transaksi
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <?php if ($this->session->flashdata('berhasil')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('berhasil'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Transaksi</h4>
                <a class="btn btn-primary float-end" href="<?= base_url('transaksi/add') ?>">Tambah Data Transaksi</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis Transaksi</th>
                                <th>No Rekening</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nominal</th>
                                <th>Debet / Kredit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($transaksi as $data) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data['jenis'] ?></td>
                                    <td><?= $data['nomor_rek'] ?></td>
                                    <td><?= $data['tgl_transaksi'] ?></td>
                                    <td>Rp.<?= $data['nominal'] ?></td>
                                    <td><?= $data['debet_kredit'] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="<?= base_url('transaksi/edit/') . $data['id_transaksi'] ?>">Ubah</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>