<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ubah Data Tabungan</h3>
                <p class="text-subtitle text-muted">Halaman Ubah Data Tabungan.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('tabungan')?>">Tabungan</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Ubah Data Tabungan
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
                <h4 class="card-title">Ubah Data Tabungan</h4>
                <a class="btn btn-primary float-end" href="<?= base_url('tabungan') ?>">Kembali</a>
            </div>
            <div class="card-body">
                <form action="<?= base_url('tabungan/update') ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="hidden" name="id_tabungan" value="<?= $tabungan['id_tabungan'] ?>">
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $tabungan['nama_tabungan'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cif" class="form-label">No CIF</label>
                        <input type="text" name="cif" id="cif" class="form-control" value="<?= $tabungan['nomorCIF'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tutup" class="form-label">Tanggal Penutupan</label>
                        <input type="date" name="tutup" id="tutup" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>