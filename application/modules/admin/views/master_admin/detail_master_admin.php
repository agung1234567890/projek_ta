<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img src="<?= site_url("assets/foto/$foto") ?>" alt="" class="img img-thubnail img-lg" />
            </div>
            <div class="col-md">
                <table class="table table-sm">
                    <tr>
                        <th>Nama Admin</th>
                        <td><?= $nama_admin ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?= $username ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <a href="<?= site_url('admin/master_admin') ?>" class="badge badge-danger">Back</a>

        <a href="<?= base_url(); ?>admin/master_admin/ubah/<?= $this->session->userdata('id_admin') ?>" class="badge badge-success">ubah</a>
    </div>
    <div class="footer"></div>
</div>