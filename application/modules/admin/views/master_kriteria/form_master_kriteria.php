<div class="card m-4" style="flex:1">
    <div class="card-body">
        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group" style="margin-bottom:50px">
                <label for="nama_kriteria">Nama kriteria <?= form_error('nama_kriteria') ?></label>
                <input autocomplete="off" type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" style="width:100% !important" value="<?= $nama_kriteria ?>">
            </div>
            <!-- <div class="form-group" style="margin-bottom:50px">
                <label for="atribut_kriteria">Atribut kriteria <?= form_error('atribut_kriteria') ?></label>
                <input autocomplete="off" type="text" class="form-control" name="atribut_kriteria" id="atribut_kriteria"style="width:100% !important" value="<?= $atribut_kriteria ?>">
            </div> -->


            <div class="form-group" style="margin-bottom:50px">
                <!-- <label for="merk">Merk <?= form_error('merk') ?></label> -->
                <label for="atribut_kriteria">Atribut kriteria <?= form_error('atribut_kriteria') ?></label>
                <select class="form-control" name="atribut_kriteria" id="atribut_kriteria" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $merk == 1 ? 'selected' : '' ?>>Cost</option>
                    <option value="2" <?= $merk == 2 ? 'selected' : '' ?>>Banefit</option>
                    <!-- <option value="3" <?= $merk == 3 ? 'selected' : '' ?>>Asus</option>
                    <option value="4" <?= $merk == 4 ? 'selected' : '' ?>>Dell</option>
                    <option value="5" <?= $merk == 5 ? 'selected' : '' ?>>MSI</option>
                    <option value="6" <?= $merk == 6 ? 'selected' : '' ?>>Lenovo</option>
                    <option value="7" <?= $merk == 7 ? 'selected' : '' ?>>Acer</option>
                    <option value="8" <?= $merk == 8 ? 'selected' : '' ?>>Samsung</option> -->
                </select>
            </div>


            <button type="submit" class="btn btn-sm btn-primary"><?= $button ?></button>
        </form>
    </div>