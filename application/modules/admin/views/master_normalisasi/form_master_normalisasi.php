<div class="card m-4" style="flex:1">
    <div class="card-body">
        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group" style="margin-bottom:50px">
                <label for="id_laptop">Laptop <?= form_error('id_laptop') ?></label>
                <select class="form-control" name="id_laptop" id="id_laptop" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <?php foreach ($data_laptop as $k) { ?>
                        <option value="<?= $k->id_laptop ?>" <?= $id_laptop == $k->id_laptop ? 'selected' : '' ?>><?= $k->merk ?></option>
                    <?php
                    } ?>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="merk">Merk <?= form_error('merk') ?></label>
                <select class="form-control" name="merk" id="merk" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $merk == 1 ? 'selected' : '' ?>>HP</option>
                    <option value="2" <?= $merk == 2 ? 'selected' : '' ?>>Macbook</option>
                    <option value="3" <?= $merk == 3 ? 'selected' : '' ?>>Asus</option>
                    <option value="4" <?= $merk == 4 ? 'selected' : '' ?>>Dell</option>
                    <option value="5" <?= $merk == 5 ? 'selected' : '' ?>>MSI</option>
                    <option value="6" <?= $merk == 6 ? 'selected' : '' ?>>Lenovo</option>
                    <option value="7" <?= $merk == 7 ? 'selected' : '' ?>>Acer</option>
                    <option value="8" <?= $merk == 8 ? 'selected' : '' ?>>Samsung</option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="harga">Harga <?= form_error('harga') ?></label>
                <select class="form-control" name="harga" id="harga" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $harga == 1 ? 'selected' : '' ?>>
                        <3jt </option> <option value="2" <?= $harga == 2 ? 'selected' : '' ?>> 3jt - 8jt
                    </option>
                    <option value="3" <?= $harga == 3 ? 'selected' : '' ?>> 8jt - 13jt </option>
                    <option value="4" <?= $harga == 4 ? 'selected' : '' ?>> >13jt </option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="ram">RAM <?= form_error('ram') ?></label>
                <select class="form-control" name="ram" id="ram" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $ram == 1 ? 'selected' : '' ?>>
                        <2GB </option> <option value="2" <?= $ram == 2 ? 'selected' : '' ?>> 2GB - 4GB
                    </option>
                    <option value="3" <?= $ram == 3 ? 'selected' : '' ?>> 4GB - 8GB </option>
                    <option value="4" <?= $ram == 4 ? 'selected' : '' ?>> >8GB </option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="hdd">HDD <?= form_error('hdd') ?></label>
                <select class="form-control" name="hdd" id="hdd" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $hdd == 1 ? 'selected' : '' ?>>
                        <250GB </option> <option value="2" <?= $hdd == 2 ? 'selected' : '' ?>> 250GB - 500GB
                    </option>
                    <option value="3" <?= $hdd == 3 ? 'selected' : '' ?>> 500GB - 1TB </option>
                    <option value="4" <?= $hdd == 4 ? 'selected' : '' ?>> 1GB - 2TB </option>
                    <option value="5" <?= $hdd == 5 ? 'selected' : '' ?>> >2TB </option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="processor">Processor <?= form_error('processor') ?></label>
                <select class="form-control" name="processor" id="processor" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $processor == 1 ? 'selected' : '' ?>> Intel </option>
                    <option value="2" <?= $processor == 1 ? 'selected' : '' ?>> AMD </option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="resolusi">Resolusi <?= form_error('resolusi') ?></label>
                <select class="form-control" name="resolusi" id="resolusi" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $resousi == 1 ? 'selected' : '' ?>> 144p </option>
                    <option value="2" <?= $resousi == 2 ? 'selected' : '' ?>> 360p </option>
                    <option value="3" <?= $resousi == 3 ? 'selected' : '' ?>> 480p </option>
                    <option value="4" <?= $resousi == 4 ? 'selected' : '' ?>> 720p </option>
                    <option value="5" <?= $resousi == 5 ? 'selected' : '' ?>> 1080p </option>
                    <option value="6" <?= $resousi == 6 ? 'selected' : '' ?>> >1080p </option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="baterai">Baterai <?= form_error('baterai') ?></label>
                <select class="form-control" name="baterai" id="baterai" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $baterai == 1 ? 'selected' : '' ?>>
                        <20Wh </option> <option value="2" <?= $baterai == 2 ? 'selected' : '' ?>> 20Wh - 40Wh
                    </option>
                    <option value="3" <?= $baterai == 3 ? 'selected' : '' ?>> 40Wh - 60Wh </option>
                    <option value="4" <?= $baterai == 4 ? 'selected' : '' ?>> >60Wh </option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="operating_system">Operating system <?= form_error('operating_system') ?></label>
                <select class="form-control" name="operating_system" id="operating_system" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $operating_system == 1 ? 'selected' : '' ?>> Windows </option>
                    <option value="2" <?= $operating_system == 2 ? 'selected' : '' ?>> OSX </option>
                    <option value="3" <?= $operating_system == 3 ? 'selected' : '' ?>> Linux </option>
                    <option value="4" <?= $operating_system == 4 ? 'selected' : '' ?>> UNIX </option>
                    <option value="5" <?= $operating_system == 5 ? 'selected' : '' ?>> DOS </option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="vga">VGA <?= form_error('vga') ?></label>
                <select class="form-control" name="vga" id="vga" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $vga == 1 ? 'selected' : '' ?>> NVDIA </option>
                    <option value="2" <?= $vga == 2 ? 'selected' : '' ?>> Radeon </option>
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><?= $button ?></button>
        </form>
    </div>
</div>