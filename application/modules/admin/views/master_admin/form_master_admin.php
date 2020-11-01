<div class="card m-4" style="flex:1">
    <div class="card-body">
        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group" style="margin-bottom:50px">
                <label for="nama_admin">Nama Admin <?= form_error('nama_admin') ?></label>
                <input autocomplete="off" type="text" class="form-control" name="nama_admin" id="nama_admin" style="width:100% !important" value="<?= $nama_admin ?>">
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="username">Username <?= form_error('username') ?></label>
                <input autocomplete="off" type="text" class="form-control" name="username" id="username" style="width:100% !important" value="<?= $username ?>">
            </div>
            <div class="form-group" style="margin-bottom:50px">

                <label for="password">Password <?= form_error('pasword') ?></label>
                <?php if ($button == 'Ubah') { ?>
                    <br><span style="color: red;">*Kosongkan bila tidak ingin mengubah password</span>
                <?php } ?>
                <input autocomplete="off" type="password" class="form-control" name="password" id="password" style="width:100% !important" value="<?= $password ?>">
            </div>
            <?php if ($button == 'Ubah') { ?>
                <div class="form-group" style="margin-bottom:50px">
                    <label for="foto">Foto</label><br>
                    <img src="<?= site_url('assets/foto/' . $foto) ?>" class="img img-lg elevation-2"><br><br><br><br><br>
                    <button type="button" class="btn btn-sm btn-default" id="ganti_foto" onClick="myFunction()">Ganti</button>
                    <input style="display:none" autocomplete="off" type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="foto" id="foto" style="width:100% !important" value="<?= $foto ?>">

                    <script>
                        function myFunction() {
                            var x = document.getElementById("foto");
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
                    <label for="foto">Foto</label>
                    <input autocomplete="off" type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" name="foto" id="foto" style="width:100% !important" value="<?= $foto ?>">
                </div>
            <?php
            } ?>
            <button type="submit" class="btn btn-sm btn-primary"><?= $button ?></button>
        </form>
    </div>