<div class="card">
    <div class="card-header text-center">
        <h4>List nilai</h4>
    </div>
    <div class="body p-4">
        <a href="<?= site_url('admin/master_nilai/tambah') ?>" class="mb-4 btn btn-sm btn-primary">Tambah</a>
        <!-- <a href="<?= site_url('admin/master_nilai/excel') ?>" class="mb-4 btn btn-sm btn-danger">Print</a> -->
        <table class="table table-sm">
            <tr>
                <th>No.</th>
                <th>Merk laptop</th>
                <th>Harga</th>
                <th>RAM</th>
                <th>Penyimpanan internal</th>
                <th>Processor</th>
                <!-- <th>Baterai</th> -->
                <th>VGA</th>
                <th>Aksi</th>
            </tr>
            <?php $nomor = 0;
            foreach ($data_master_nilai as $k) { ?>
                <tr>
                    <td><?= ++$nomor ?></td>
                    <td><?= $k->merk_laptop ?></td>
                    <td><?= $k->harga ?></td>
                    <td><?= $k->ram ?></td>
                    <td><?= $k->hdd ?></td>
                    <td><?= $k->processor ?></td>
                    <!-- <td><?= $k->baterai ?></td> -->
                    <td><?= $k->vga ?></td>
                    <td>
                        <div class="input-group input-group-sm">
                            <a href="<?= base_url(); ?>admin/master_nilai/ubah/<?= $k->id_subkriteria ?>" class="badge badge-success float-right">ubah</a>
                            <!-- <a href="<?= base_url(); ?>admin/master_subkriteria/detail/<?= $k->id_subkriteria ?>"class="badge badge-primary float-right">detail</a> -->
                            <a href="<?= base_url(); ?>admin/master_nilai/hapus/<?= $k->id_subkriteria ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                        </div>
                    </td>
                </tr>
            <?php
            } ?>
        </table>
        <!-- <ul class="list-group">
        <?php foreach ($data_master_subkriteria as $k) { ?>
            
            <li class="list-group-item">
                <?= $k->nama_subkriteria ?>
    
            <a href="<?= base_url(); ?>admin/master_subkriteria/ubah/<?= $k->id_subkriteria ?>"class="badge badge-success float-right">ubah</a>
            <a href="<?= base_url(); ?>admin/master_subkriteria/detail/<?= $k->id_subkriteria ?>"class="badge badge-primary float-right">detail</a>
            <a href="<?= base_url(); ?>admin/master_subkriteria/hapus/<?= $k->id_subkriteria ?>"class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
            </li>
        <?php
        } ?>
        </ul> -->
        <div class="mt-4"><?= $pagination ?></div>
    </div>
    <div class="footer"></div>
</div>