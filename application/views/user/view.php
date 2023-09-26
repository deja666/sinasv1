<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Teller</h3>
                <p class="text-subtitle text-muted">Halaman Data Teller.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('user')?>">Teller</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Data Teller
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
                <h4 class="card-title">Data Teller</h4>
                <a class="btn btn-primary float-end" href="<?= base_url('user/add') ?>">Tambah Data Teller</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($user as $data) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data['name'] ?></td>
                                    <td><?= $data['username'] ?></td>
                                    <td><?= $data['role'] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="<?= base_url('user/edit/') . $data['id'] ?>">Ubah</a>
                                        <a class="btn btn-danger btn-sm" href="<?= base_url('user/delete/') . $data['id'] ?>" onclick="return confirm('Yakin mau hapus data <?= $data['name'] ?>?');">Hapus</a>
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