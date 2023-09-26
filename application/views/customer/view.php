<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Customer</h3>
                <p class="text-subtitle text-muted">Halaman Data Customer.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('user')?>">Customer</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Data Customer
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
                <h4 class="card-title">Data Customer</h4>
                <a class="btn btn-primary float-end" href="<?= base_url('customer/add') ?>">Tambah Data Customer</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Customer</th>
                                <th>NIP</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No CIF</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($customer as $data) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data['nama_customer'] ?></td>
                                    <td><?= $data['nip'] ?></td>
                                    <td><?= $data['tgl_lahir'] ?></td>
                                    <td><?= $data['jk'] ?></td>
                                    <td><?= $data['alamat'] ?></td>
                                    <td><?= $data['nomorCIF'] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="<?= base_url('customer/edit/') . $data['id_customer'] ?>">Ubah</a>
                                        <a class="btn btn-danger btn-sm" href="<?= base_url('customer/delete/') . $data['id_customer'] ?>" onclick="return confirm('Yakin mau hapus data <?= $data['nama_customer'] ?>?');">Hapus</a>
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