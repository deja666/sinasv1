<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Tabungan</h3>
                <p class="text-subtitle text-muted">Halaman Data Tabungan.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('tabungan')?>">Tabungan</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Data Tabungan
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
                <h4 class="card-title">Data Tabungan</h4>
                <a class="btn btn-primary float-end" href="<?= base_url('tabungan/add') ?>">Tambah Data Tabungan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Tabungan</th>
                                <th>No Rekening</th>
                                <th>No CIF</th>
                                <th>Tanggal Pembukaan</th>
                                <th>Tanggal Penutupan</th>
                                <th>Saldo Terakhir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($tabungan as $data) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data['nama_tabungan'] ?></td>
                                    <td><?= $data['nomor_rek'] ?></td>
                                    <td><?= $data['nomorCIF'] ?></td>
                                    <td><?= $data['tgl_pembukaan'] ?></td>
                                    <td><?= $data['tgl_penutupan'] ?></td>
                                    <td>Rp.<?= $data['saldo_terakhir'] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="<?= base_url('tabungan/edit/') . $data['id_tabungan'] ?>">Ubah</a>
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