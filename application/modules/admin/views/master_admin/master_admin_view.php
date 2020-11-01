<div class="card">
    <div class="card-header text-center">
        <h4>List Admin</h4>
    </div>
    <div class="body p-4">
        <a href="<?= site_url('admin/master_admin/tambah') ?>" class="mb-4 btn btn-sm btn-primary">Tambah</a>
        <ul class="list-group">
            <?php foreach ($data_master_admin as $k) { ?>

                <li class="list-group-item">
                    <?= $k->nama_admin ?>

                    <a href="<?= base_url(); ?>admin/master_admin/ubah/<?= $k->id_admin ?>" class="badge badge-success float-right">ubah</a>
                    <a href="<?= base_url(); ?>admin/master_admin/detail/<?= $k->id_admin ?>" class="badge badge-primary float-right">detail</a>
                    <a href="<?= base_url(); ?>admin/master_admin/hapus/<?= $k->id_admin ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                </li>
            <?php
            } ?>
        </ul>
        <div class="mt-4"><?= $pagination ?></div>
    </div>
    <div class="footer"></div>
</div>