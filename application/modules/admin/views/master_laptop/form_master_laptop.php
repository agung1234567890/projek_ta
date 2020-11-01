<div class="card m-4" style="flex:1">
    <div class="card-body">
        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group" style="margin-bottom:50px">
                <label for="merk_laptop">Merk Laptop <?= form_error('merk_laptop') ?></label>
                <input autocomplete="off" type="text" class="form-control" name="merk_laptop" id="merk_laptop"style="width:100% !important" value="<?= $merk_laptop ?>">
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="harga_laptop">Harga Laptop <?= form_error('harga_laptop') ?></label>
                <input autocomplete="off" type="text" class="form-control" name="harga_laptop" id="harga_laptop"style="width:100% !important" value="<?= $harga_laptop ?>">
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="spesifikasi_laptop">Spesifikasi Laptop <?= form_error('spesifikasi_laptop') ?></label>
                <textarea autocomplete="off" class="form-control" name="spesifikasi_laptop" id="spesifikasi_laptop"style="width:100% !important"><?= $spesifikasi_laptop ?></textarea>
            </div>
            <?php if ($button == 'Ubah') { ?>
                <div class="form-group" style="margin-bottom:50px">
                        <label for="gambar">Gambar</label><br>
                        <img src="<?= site_url('assets/foto/' . $gambar) ?>" class="img img-lg elevation-2"><br><br><br><br><br>
                        <button type="button" class="btn btn-sm btn-default" onClick="myFunction()">Ganti</button>
                    <input style="display:none" autocomplete="off" type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="gambar" id="gambar"style="width:100% !important" value="<?= $gambar ?>">

                    <script>
                        function myFunction() {
                            var x = document.getElementById("gambar");
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                        } 
                    </script>
                </div>
            <?php 
        } else { ?>
            <div class="form-group" style="margin-bottom:50px">
                <label for="gambar">Gambar</label>
                <input autocomplete="off" type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="gambar" id="gambar"style="width:100% !important" value="<?= $gambar ?>">
            </div>
            <?php 
        } ?>
            <button type="submit" class="btn btn-sm btn-primary"><?= $button ?></button>
        </form>
    </div>