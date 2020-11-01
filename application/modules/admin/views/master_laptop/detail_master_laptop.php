<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img
                    src="<?= site_url("assets/foto/$gambar") ?>"
                    alt=""
                    class="img img-thubnail img-lg"
                />
            </div>
            <div class="col-md">
                <table class="table table-sm">
                    <tr>
                        <th>Merk Laptop</th>
                        <td><?= $merk_laptop ?></td>
                    </tr>
                    <tr>
                        <th>Harga Laptop</th>
                        <td><?= $harga_laptop ?></td>
                    </tr>
                    <tr>
                        <th>Spesifikasi Laptop</th>
                        <td><?= $spesifikasi_laptop ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <a href="<?= site_url('admin/master_laptop') ?>" class="btn btn-sm btn-danger">Back</a>
    </div>
    <div class="footer"></div>
</div>
