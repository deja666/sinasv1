<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Customer</h3>
                <p class="text-subtitle text-muted">Halaman Tambah Data Customer.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('customer')?>">Customer</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tambah Data Customer
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
                <h4 class="card-title">Tambah Data Customer</h4>
                <a class="btn btn-primary float-end" href="<?= base_url('customer') ?>">Kembali</a>
            </div>
            <div class="card-body">
                <form action="<?= base_url('customer/create') ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Debitur</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control" value="<?= $nomorNIP ?>">
                    </div>
                    <div class="mb-3">
                        <label for="lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" value="<?= date('Y-m-d') ?>" name="lahir" id="lahir" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="cif" class="form-label">No CIFs</label>
                        <input type="text" name="cif" id="cif" class="form-control" value="<?= $nomorCIF ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>