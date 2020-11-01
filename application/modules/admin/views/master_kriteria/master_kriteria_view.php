<div class="card">
    <div class="card-header text-center">
        <h4>List kriteria</h4>
    </div>
    <div class="body p-4">
        <!-- <a href="<?= site_url('admin/master_kriteria/tambah') ?>" class="mb-4 btn btn-sm btn-primary">Tambah</a>
        <a href="<?= site_url('admin/master_kriteria/excel') ?>" class="mb-4 btn btn-sm btn-danger">Print</a> -->
        <table class="table table-sm">
            <tr>
                <th>No.</th>
                <th>Nama kriteria</th>
                <th>Atribut kriteria</th>
                <!-- <th>Aksi</th> -->
            </tr>
            <?php $nomor = 0;
            foreach ($data_master_kriteria as $k) { ?>
                <tr>
                    <td><?= ++$nomor ?></td>
                    <td><?= $k->nama_kriteria ?></td>
                    <td><?= $k->atribut_kriteria == 1 ? 'Cost' : 'Benefit' ?></td>
                    <td>
                        <div class="input-group input-group-sm">
                            <!-- <a href="<?= base_url(); ?>admin/master_kriteria/ubah/<?= $k->id_kriteria ?>" class="badge badge-success float-right">ubah</a> -->
                            <!-- <a href="<?= base_url(); ?>admin/master_kriteria/detail/<?= $k->id_kriteria ?>"class="badge badge-primary float-right">detail</a> -->
                            <!-- <a href="<?= base_url(); ?>admin/master_kriteria/hapus/<?= $k->id_kriteria ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a> -->
                        </div>
                    </td>
                </tr>
            <?php
            } ?>
        </table>
        <!-- <ul class="list-group">
        <?php foreach ($data_master_kriteria as $k) { ?>
            
            <li class="list-group-item">
                <?= $k->nama_kriteria ?>
    
            <a href="<?= base_url(); ?>admin/master_kriteria/ubah/<?= $k->id_kriteria ?>"class="badge badge-success float-right">ubah</a>
            <a href="<?= base_url(); ?>admin/master_kriteria/detail/<?= $k->id_kriteria ?>"class="badge badge-primary float-right">detail</a>
            <a href="<?= base_url(); ?>admin/master_kriteria/hapus/<?= $k->id_kriteria ?>"class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
            </li>
        <?php
        } ?>
        </ul> -->
        <div class="mt-4"><?= $pagination ?></div>
    </div>
    <div class="footer"></div>
</div>