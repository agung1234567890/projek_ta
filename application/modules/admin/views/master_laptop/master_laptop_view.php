<div class="card">
    <div class="card-header text-center">
        <h4>List laptop</h4>
    </div>
    <div class="body p-4">
        <div class="row">
            <div class="col-md">
                <a href="<?= site_url('admin/master_laptop/tambah') ?>" class="mb-4 btn btn-sm btn-primary">Tambah</a>
                <a href="<?= site_url('admin/master_laptop/excel') ?>" class="mb-4 btn btn-sm btn-danger">Export Excel</a>
                <a href="<?= site_url('admin/master_laptop/cetak_pdf') ?>" class="mb-4 btn btn-sm btn-success">Print PDF</a>
            </div>
            <div class="col-md">
                <form action="" class="w-50">
                    <div class="input-group input-group-sm">
                        <input type="text" name="q" id="q" class="form-control form-control-sm">
                        <button type="submit" class="btn btn-sm btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <ul class="list-group">
            <?php foreach ($data_master_laptop as $k) { ?>

                <li class="list-group-item">
                    <?= $k->merk ?>

                    <a href="<?= base_url(); ?>admin/master_laptop/ubah/<?= $k->id_laptop ?>" class="badge badge-success float-right">ubah</a>
                    <a href="<?= base_url(); ?>admin/master_laptop/detail/<?= $k->id_laptop ?>" class="badge badge-primary float-right">detail</a>
                    <a href="<?= base_url(); ?>admin/master_laptop/hapus/<?= $k->id_laptop ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                </li>
            <?php
            } ?>
        </ul>
        <div class="mt-4"><?= $pagination ?></div>
    </div>
    <div class="footer"></div>
</div>