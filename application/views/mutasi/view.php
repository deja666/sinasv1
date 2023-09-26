<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Mutasi</h3>
                <p class="text-subtitle text-muted">Halaman Data Mutasi.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('mutasi')?>">Mutasi</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Data Mutasi
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
                <h4 class="card-title">Data Mutasi</h4>
                <form method="get" action="<?= site_url('mutasi') ?>"class="mb-2">
                <label for="norek">No Rekening:</label>
                    <select name="norek" id="norek" class="form-control">
                        <option value="">Semua No Rekening</option>
                        <?php foreach ($listNomorRekening as $rekening) : ?>
                            <option value="<?= $rekening ?>"><?= $rekening ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-icon icon-left btn-success mb-4 neu-brutalism">Filter</button>
                        </form>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tanggal Transaksi</th>
                                <th>Jenis</th>
                                <th>Nominal</th>
                                <th>Debet / Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($hasil as $data) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data['tgl_transaksi'] ?></td>
                                    <td><?= $data['jenis'] ?></td>
                                    <td>Rp.<?= $data['nominal'] ?></td>
                                    <td><?= $data['debet_kredit'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>