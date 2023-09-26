<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Tabungan</h3>
                <p class="text-subtitle text-muted">Halaman Tambah Data Tabungan.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('tabungan')?>">Tabungan</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tambah Data Tabungan
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
                <h4 class="card-title">Tambah Data Tabungan</h4>
                <a class="btn btn-primary float-end" href="<?= base_url('tabungan') ?>">Kembali</a>
            </div>
            <div class="card-body">
                <form action="<?= base_url('tabungan/create') ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Tabungan</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="rekening" class="form-label">No Rekening</label>
                        <input type="text" name="rekening" id="rekening" class="form-control" value="<?= $nomorREK ?>">
                    </div>
                    <div class="mb-3">
                    <label for="buka" class="form-label">No CIF</label>
                    <select name="cif" id="cif" class="form-select">
                    <?php foreach ($cifs as $cif) : ?>
            <?php
         
                list($nomorCIF, $namaCustomer) = explode(' A.N ', $cif->full_name);
            ?>
            <option value="<?= $nomorCIF ?>"><?= $cif->full_name ?></option>
        <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label for="buka" class="form-label">Tanggal Pembukaan</label>
                        <input type="text" name="buka" id="buka" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="saldo" class="form-label">Saldo</label>
                        <input type="text" name="saldo" id="saldo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>