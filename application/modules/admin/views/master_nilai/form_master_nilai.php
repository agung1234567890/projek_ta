<div class="card m-4" style="flex:1">
    <div class="card-body">
        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">




            <div class="form-group" style="margin-bottom:50px">
                <label for="id_laptop">Merk <?= form_error('merk_laptop') ?></label>
                <select class="form-control" name="merk_laptop" id="merk" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <?php foreach ($data_laptop as $k) { ?>
                        <option value="<?= $k->id_laptop ?>" <?= $merk == $k->id_laptop ? 'selected' : '' ?>><?= $k->merk ?></option>
                    <?php
                    } ?>
                </select>
            </div>

            <!-- <div class="form-group" style="margin-bottom:50px">
                <label for="nama_subkriteria">Nama subkriteria <?= form_error('nama_subkriteria') ?></label>
                <input autocomplete="off" type="text" class="form-control" name="nama_subkriteria" id="nama_subkriteria" style="width:100% !important" value="<?= $nama_subkriteria ?>">
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="nilai">Nilai subkriteria <?= form_error('nilai') ?></label>
                <input autocomplete="off" type="text" class="form-control" name="nilai" id="nilai" style="width:100% !important" value="<?= $nilai ?>">
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="keterangan">Keterangan subkriteria <?= form_error('keterangan') ?></label>
                <input autocomplete="off" type="text" class="form-control" name="keterangan" id="keterangan" style="width:100% !important" value="<?= $keterangan ?>">
            </div> -->

            <!-- <div class="form-group" style="margin-bottom:50px">
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
            </div> -->
            <div class="form-group" style="margin-bottom:50px">
                <label for="harga">Harga <?= form_error('harga') ?></label>
                <input type="text" name="harga" id="harga" class="form-control" value="<?= $harga ?>">
                <!-- <select class="form-control" name="harga" id="harga" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $harga == 1 ? 'selected' : '' ?>>
                        <3jt </option> <option value="2" <?= $harga == 2 ? 'selected' : '' ?>> 3jt - 6jt
                    </option>
                    <option value="3" <?= $harga == 3 ? 'selected' : '' ?>> 6jt - 9jt </option>
                    <option value="4" <?= $harga == 4 ? 'selected' : '' ?>> 9jt - 12jt</option>
                    <option value="5" <?= $harga == 5 ? 'selected' : '' ?>> >12jt</option>
                </select> -->
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="ram">RAM <?= form_error('ram') ?></label>
                <!-- <input type="text" name="ram" id="ram" class="form-control" value="<?= $ram ?>"> -->
                <select class="form-control" name="ram" id="ram" style="width:100% !important">
                    <option value="">- Pilih -</option> -->
                    <!-- <option value="1" <?= $ram == 1 ? 'selected' : '' ?>>
                    <2GB </option> <option value="2" <?= $ram == 2 ? 'selected' : '' ?>> 2GB - 64GB
                    </option>  -->
                    <option value="1" <?= $ram == 1 ? 'selected' : '' ?>> 2GB </option>
                    <option value="2" <?= $ram == 2 ? 'selected' : '' ?>> 4GB </option>
                    <option value="3" <?= $ram == 3 ? 'selected' : '' ?>> 8GB </option>
                    <option value="4" <?= $ram == 4 ? 'selected' : '' ?>> 16GB </option>
                    <option value="5" <?= $ram == 5 ? 'selected' : '' ?>> 32GB </option>
                    <option value="6" <?= $ram == 6 ? 'selected' : '' ?>> 64GB </option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="hdd">Penyimpanan internal <?= form_error('hdd') ?></label>
                <!-- <input type="text" name="hdd" id="hdd" class="form-control" value="<?= $hdd ?>"> -->
                <select class="form-control" name="hdd" id="hdd" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $hdd == 1 ? 'selected' : '' ?>> HDD 128GB </option>
                    <option value="2" <?= $hdd == 2 ? 'selected' : '' ?>> HDD 256GB </option>
                    <option value="3" <?= $hdd == 3 ? 'selected' : '' ?>> HDD 512GB </option>
                    <option value="4" <?= $hdd == 4 ? 'selected' : '' ?>> HDD 1TB </option>
                    <option value="5" <?= $hdd == 5 ? 'selected' : '' ?>> SSD 128GB </option>
                    <option value="6" <?= $hdd == 6 ? 'selected' : '' ?>> SSD 256GB </option>
                    <option value="7" <?= $hdd == 7 ? 'selected' : '' ?>> SSD 512GB </option>
                    <option value="8" <?= $hdd == 8 ? 'selected' : '' ?>> SSD 1TB </option>
                    <option value="8" <?= $hdd == 9 ? 'selected' : '' ?>> HDD 1TB + SSD 128GB </option>vv
                    <option value="8" <?= $hdd == 10 ? 'selected' : '' ?>> HDD 1TB + SSD 256GB </option>
                    <option value="8" <?= $hdd == 11 ? 'selected' : '' ?>> HDD 1TB + SSD 512GB </option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom:50px">
                <label for="processor">Processor <?= form_error('processor') ?></label>
                <!-- <input type="text" name="processor" id="processor" class="form-control" value="<?= $processor ?>"> -->
                <select class="form-control" name="processor" id="processor" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $processor == 1 ? 'selected' : '' ?>> amd A4-9120 </option>
                    <option value="2" <?= $processor == 2 ? 'selected' : '' ?>> amd A4-9125 DC </option>
                    <option value="3" <?= $processor == 3 ? 'selected' : '' ?>> amd A9-9425 </option>
                    <option value="4" <?= $processor == 4 ? 'selected' : '' ?>> amd Athlon 3020U </option>
                    <option value="5" <?= $processor == 5 ? 'selected' : '' ?>> amd Athlon 3050U </option>
                    <option value="6" <?= $processor == 6 ? 'selected' : '' ?>> amd Athlon 3150U </option>
                    <option value="7" <?= $processor == 7 ? 'selected' : '' ?>> amd E2-7015U </option>
                    <option value="8" <?= $processor == 8 ? 'selected' : '' ?>> amd Ryzen 3-3250U </option>
                    <option value="9" <?= $processor == 9 ? 'selected' : '' ?>> amd Ryzen 3-4300U </option>
                    <option value="10" <?= $processor == 10 ? 'selected' : '' ?>> amd Ryzen 5-3500U </option>
                    <option value="11" <?= $processor == 11 ? 'selected' : '' ?>> amd Ryzen 5-3550H </option>
                    <option value="12" <?= $processor == 12 ? 'selected' : '' ?>> amd Ryzen 5-4500U </option>
                    <option value="13" <?= $processor == 13 ? 'selected' : '' ?>> amd Ryzen 5-4600H </option>
                    <option value="14" <?= $processor == 14 ? 'selected' : '' ?>> amd Ryzen 7-4700H </option>
                    <option value="15" <?= $processor == 15 ? 'selected' : '' ?>> amd Ryzen 7-4800H </option>
                    <option value="16" <?= $processor == 16 ? 'selected' : '' ?>> amd Ryzen 7-4800U </option>


                    <option value="1" <?= $processor == 1 ? 'selected' : '' ?>> intel dual core n4000 </option>
                    <option value="2" <?= $processor == 2 ? 'selected' : '' ?>> intel dual core n4020 </option>
                    <option value="3" <?= $processor == 3 ? 'selected' : '' ?>> intel quad core n4120 </option>
                    <option value="4" <?= $processor == 4 ? 'selected' : '' ?>> core i3-8130u </option>
                    <option value="5" <?= $processor == 5 ? 'selected' : '' ?>> core i3-8265u </option>
                    <option value="6" <?= $processor == 6 ? 'selected' : '' ?>> core i3-1005G1 </option>
                    <option value="7" <?= $processor == 7 ? 'selected' : '' ?>> core i3-10110u </option>
                    <option value="9" <?= $processor == 9 ? 'selected' : '' ?>> core i5-8265U </option>
                    <option value="8" <?= $processor == 8 ? 'selected' : '' ?>> core i5-9300H </option>
                    <option value="10" <?= $processor == 10 ? 'selected' : '' ?>> core i5-1035G1 </option>
                    <option value="11" <?= $processor == 11 ? 'selected' : '' ?>> core i5-10300H </option>
                    <option value="12" <?= $processor == 12 ? 'selected' : '' ?>> core i5-10210u </option>
                    <option value="13" <?= $processor == 13 ? 'selected' : '' ?>> core i7-8550U </option>
                    <option value="14" <?= $processor == 14 ? 'selected' : '' ?>> core i7-9750HF </option>
                    <option value="15" <?= $processor == 15 ? 'selected' : '' ?>> core i7-10510u </option>
                    <option value="16" <?= $processor == 16 ? 'selected' : '' ?>> core i7-1065G7 </option>
                    <option value="17" <?= $processor == 17 ? 'selected' : '' ?>> core i7-10750H </option>
                    <option value="18" <?= $processor == 18 ? 'selected' : '' ?>> core i7-10875H </option>
                </select>
            </div>
            <!-- <div class="form-group" style="margin-bottom:50px">
                <label for="baterai">Baterai <?= form_error('baterai') ?></label>
                <input type="text" name="baterai" id="baterai" class="form-control" value="<?= $baterai ?>">
                <select class="form-control" name="baterai" id="baterai" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $baterai == 1 ? 'selected' : '' ?>><20Wh </option> 
                    <option value="2" <?= $baterai == 2 ? 'selected' : '' ?>> 20Wh - 40Wh
                    </option>
                    <option value="3" <?= $baterai == 3 ? 'selected' : '' ?>> 40Wh - 60Wh </option>
                    <option value="4" <?= $baterai == 4 ? 'selected' : '' ?>> >60Wh </option>
                </select>
            </div> -->
            <!-- <div class="form-group" style="margin-bottom:50px">
                <label for="operating_system">Operating system <?= form_error('operating_system') ?></label>
                <input type="text" name="os" id="os" class="form-control" value="<?= $os ?>">
                <select class="form-control" name="os" id="os" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $os == 1 ? 'selected' : '' ?>> Windows </option>
                    <option value="2" <?= $os == 2 ? 'selected' : '' ?>> OSX </option>
                    <option value="3" <?= $os == 3 ? 'selected' : '' ?>> Linux </option>
                    <option value="4" <?= $os == 4 ? 'selected' : '' ?>> UNIX </option>
                    <option value="5" <?= $os == 5 ? 'selected' : '' ?>> DOS </option>
                </select>
            </div> -->
            <div class="form-group" style="margin-bottom:50px">
                <label for="vga">VGA <?= form_error('vga') ?></label>
                <!-- <input type="text" name="vga" id="vga" class="form-control" value="<?= $vga ?>"> -->
                <select class="form-control" name="vga" id="vga" style="width:100% !important">
                    <option value="">- Pilih -</option>
                    <option value="1" <?= $vga == 1 ? 'selected' : '' ?>> Intel Standart </option>
                    <option value="2" <?= $vga == 2 ? 'selected' : '' ?>> AMD Standart </option>
                    <option value="3" <?= $vga == 3 ? 'selected' : '' ?>> NVDIA geforce mx110-2GB</option>
                    <option value="4" <?= $vga == 4 ? 'selected' : '' ?>> NVDIA geforce mx250-2GB</option>
                    <option value="5" <?= $vga == 5 ? 'selected' : '' ?>> NVDIA geforce mx330-2GB</option>
                    <option value="6" <?= $vga == 6 ? 'selected' : '' ?>> NVDIA geforce mx350-2GB</option>
                    <option value="7" <?= $vga == 7 ? 'selected' : '' ?>> NVDIA geforce gtx1650-4GB DDR6</option>

                </select>
            </div>



            <button type="submit" class="btn btn-sm btn-primary"><?= $button ?></button>
        </form>
    </div>