<style>
    .nice-select {
        width: 100% !important
    }
</style>
<div style="flex: 1;">
    <div class="alert alert-success" style="flex: 1;">
        <b>*Masukkan presentase bobot kepentingan untuk setiap kriteria</b><br>
        presentase bobot yang diisi harus angka dari 0 sampai 100. Jumlah presentase bobot harus = 100
    </div>
    <?php if ($this->session->flashdata('eror')) { ?>
        <div class="alert alert-danger">
            <?php
            print_r($this->session->flashdata('eror'));
            ?>
        </div>
    <?php } ?>
    <div class="d-flex">
        <div class="card m-4" style="flex:2;">
            <div class="card-header text-left">Masukkan Bobot</div>
            <div class="card-body">
                <form action="" method="POST">
                    <!-- <div class="form-group" style="margin-bottom:50px">
                        <label for="merk">Harga <?= form_error('harga') ?></label>
                        <select class="form-control" name="harga" id="harga" style="width:100% !important">
                            <option value="">- Pilih -</option>
                            <option value="20" <?= $harga == 20 ? 'selected' : '' ?>>0 - 2.000.000</option>
                            <option value="40" <?= $harga == 40 ? 'selected' : '' ?>>2.000.000 - 4.000.000</option>
                            <option value="60" <?= $harga == 60 ? 'selected' : '' ?>>4.000.000 - 6.000.000</option>
                            <option value="80" <?= $harga == 80 ? 'selected' : '' ?>>6.000.000 - 8.000.000</option>
                            <option value="100" <?= $harga == 100 ? 'selected' : '' ?>>8.000.000 - 10.000.000</option>
                            <option value="100" <?= $harga == 100 ? 'selected' : '' ?>>>10.000.000</option>
                            <!-- <option value="7" <?= $merk == 7 ? 'selected' : '' ?>>8.000.000 - 8.000.000</option>
                            <option value="8" <?= $merk == 8 ? 'selected' : '' ?>>9.000.000 - 2.000.000</option> -->
                    <!-- </select>
                    </div> -->
                    <!-- <div class="form-group" style="margin-bottom:50px">
                        <label for="merk">RAM <?= form_error('merk') ?></label>
                        <select class="form-control" name="merk" id="merk" style="width:100% !important">
                            <option value="">- Pilih -</option>
                            <option value="20" <?= $merk == 20 ? 'selected' : '' ?>>2 GB</option>
                            <option value="40" <?= $merk == 40 ? 'selected' : '' ?>>4 GB</option>
                            <option value="60" <?= $merk == 60 ? 'selected' : '' ?>>6 GB</option>
                            <option value="80" <?= $merk == 80 ? 'selected' : '' ?>>8 GB</option>
                            <option value="100" <?= $merk == 100 ? 'selected' : '' ?>>16 GB</option>
                            <option value="100" <?= $merk == 100 ? 'selected' : '' ?>>>16 GB</option>
                            <!-- <option value="7" <?= $merk == 7 ? 'selected' : '' ?>>8.000.000 - 8.000.000</option>
                            <option value="8" <?= $merk == 8 ? 'selected' : '' ?>>9.000.000 - 2.000.000</option> -->
                    <!-- </select>
                    </div> --> --> -->
                    <!-- <div class="form-group" style="margin-bottom:50px">
                        <label for="merk">Penyimpanan Internal <?= form_error('merk') ?></label>
                        <select class="form-control" name="merk" id="merk" style="width:100% !important">
                            <option value="">- Pilih -</option>
                            <option value="1" <?= $merk == 20 ? 'selected' : '' ?>>0 - 2.000.000</option>
                            <option value="2" <?= $merk == 40 ? 'selected' : '' ?>>2.000.000 - 4.000.000</option>
                            <option value="3" <?= $merk == 60 ? 'selected' : '' ?>>4.000.000 - 6.000.000</option>
                            <option value="4" <?= $merk == 80 ? 'selected' : '' ?>>6.000.000 - 8.000.000</option>
                            <option value="5" <?= $merk == 100 ? 'selected' : '' ?>>8.000.000 - 10.000.000</option>
                            <option value="6" <?= $merk == 100 ? 'selected' : '' ?>>>10.000.000</option>
                            <!-- <option value="7" <?= $merk == 7 ? 'selected' : '' ?>>8.000.000 - 8.000.000</option>
                            <option value="8" <?= $merk == 8 ? 'selected' : '' ?>>9.000.000 - 2.000.000</option> -->
                    <!-- </select>
                    </div> --> -->
                    <!-- <div class="form-group" style="margin-bottom:50px">
                        <label for="merk">Harga <?= form_error('merk') ?></label>
                        <select class="form-control" name="merk" id="merk" style="width:100% !important">
                            <option value="">- Pilih -</option>
                            <option value="1" <?= $merk == 20 ? 'selected' : '' ?>>0 - 2.000.000</option>
                            <option value="2" <?= $merk == 40 ? 'selected' : '' ?>>2.000.000 - 4.000.000</option>
                            <option value="3" <?= $merk == 60 ? 'selected' : '' ?>>4.000.000 - 6.000.000</option>
                            <option value="4" <?= $merk == 80 ? 'selected' : '' ?>>6.000.000 - 8.000.000</option>
                            <option value="5" <?= $merk == 100 ? 'selected' : '' ?>>8.000.000 - 10.000.000</option>
                            <option value="6" <?= $merk == 100 ? 'selected' : '' ?>>>10.000.000</option>
                            <!-- <option value="7" <?= $merk == 7 ? 'selected' : '' ?>>8.000.000 - 8.000.000</option>
                            <option value="8" <?= $merk == 8 ? 'selected' : '' ?>>9.000.000 - 2.000.000</option> -->
                    <!-- </select>
                    </div> --> -->
                    <!-- <div class="form-group" style="margin-bottom:50px">
                        <label for="merk">Harga <?= form_error('merk') ?></label>
                        <select class="form-control" name="merk" id="merk" style="width:100% !important">
                            <option value="">- Pilih -</option>
                            <option value="1" <?= $merk == 20 ? 'selected' : '' ?>>0 - 2.000.000</option>
                            <option value="2" <?= $merk == 40 ? 'selected' : '' ?>>2.000.000 - 4.000.000</option>
                            <option value="3" <?= $merk == 60 ? 'selected' : '' ?>>4.000.000 - 6.000.000</option>
                            <option value="4" <?= $merk == 80 ? 'selected' : '' ?>>6.000.000 - 8.000.000</option>
                            <option value="5" <?= $merk == 100 ? 'selected' : '' ?>>8.000.000 - 10.000.000</option>
                            <option value="6" <?= $merk == 100 ? 'selected' : '' ?>>>10.000.000</option>
                            <!-- <option value="7" <?= $merk == 7 ? 'selected' : '' ?>>8.000.000 - 8.000.000</option>
                            <option value="8" <?= $merk == 8 ? 'selected' : '' ?>>9.000.000 - 2.000.000</option> -->
                    <!-- </select>
                    </div> --> -->
                    <div class="form-group">
                        <label for="harga">Harga <br> (*presentase)</label>
                        <input type="text" onkeyup="isi()" value="<?= $this->input->post('harga') ?>" class="form-control" name="harga" id="harga" style="width:100% !important">
                    </div>
                    <div class="form-group">
                        <label for="ram">Ram <br> (*presentase)</label>
                        <input type="text" onkeyup="isi()" value="<?= $this->input->post('ram') ?>" class="form-control" name="ram" id="ram" style="width:100% !important">
                    </div>
                    <div class="form-group">
                        <label for="hdd">Penyimpanan internal<br> (*presentase)</label>
                        <input type="text" onkeyup="isi()" value="<?= $this->input->post('hdd') ?>" class="form-control" name="hdd" id="hdd" style="width:100% !important">
                    </div>
                    <div class="form-group">
                        <label for="processor">Processor <br> (*presentase)</label>
                        <input type="text" onkeyup="isi()" value="<?= $this->input->post('processor') ?>" class="form-control" name="processor" id="processor" style="width:100% !important">
                    </div>
                    <!-- <div class="form-group">
                        <label for="resolusi">Resolusi</label>
                        <input type="text" onkeyup="isi()" value="<?= $this->input->post('resolusi') ?>" class="form-control" name="resolusi" id="resolusi" style="width:100% !important">
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="baterai">Baterai</label>
                        <input type="text" onkeyup="isi()" value="<?= $this->input->post('baterai') ?>" class="form-control" name="baterai" id="baterai" style="width:100% !important">
                    </div> -->
                    <div class="form-group">
                        <label for="vga">VGA Card <br> (*presentase)</label>
                        <input type="text" onkeyup="isi()" value="<?= $this->input->post('vga') ?>" class="form-control" name="vga" id="vga" style="width:100% !important">
                    </div>
                    <span id="notif" style="color: red;font-size: 12px;">*Jumlah Keseluruhan Harus = 100.</span><br>
                    <button disabled type="submit" id="tombol" class="btn btn-sm btn-primary">PROSES</button>
                </form>
                <script>
                    isi();

                    function isi() {
                        var harga = Math.abs(document.getElementById("harga").value);
                        var ram = Math.abs(document.getElementById("ram").value);
                        var hdd = Math.abs(document.getElementById("hdd").value);
                        var processor = Math.abs(document.getElementById("processor").value);
                        // var resolusi = Math.abs(document.getElementById("resolusi").value);
                        // var baterai = Math.abs(document.getElementById("baterai").value);
                        var vga = Math.abs(document.getElementById("vga").value);
                        var jumlah = harga + ram + hdd + processor + vga;
                        console.log(jumlah);
                        if (jumlah == 100) {
                            document.getElementById("tombol").disabled = false;
                            document.getElementById("notif").style.display = 'none';
                        } else {
                            document.getElementById("tombol").disabled = true;
                            document.getElementById("notif").style.display = 'block';
                        }

                    }
                </script>
            </div>
        </div>
        <div class="card m-4" style="flex:4;">
            <div class="card-header">Tabel Hasil</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <th>Ranking</th>
                        <th style="width: 18%;">Foto</th>
                        <th>Laptop</th>
                        <th>Spesifikasi</th>
                        <th>Nilai</th>
                    </tr>
                    <?php $nomor = 1;
                    $cek = 0;
                    $limit = 1;
                    foreach ($data_rekomendasi as $k) {
                        if (!empty($cek)) {
                            if ($cek == $k['nilai']) {
                                $cek = $k['nilai'];
                                // echo "ada";
                            } else {
                                $nomor++;
                                $cek = $k['nilai'];
                            }
                        } else {
                            $cek = $k['nilai'];
                        }
                        $laptop = $this->db->where('id_laptop', $k['id_laptop'])->get('laptop')->row();
                    ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td>
                                <img src="<?= site_url("assets/foto/$laptop->gambar") ?>" class="img-thumbnail">
                            </td>
                            <td><?= $laptop->merk ?></td>
                            <td><?= $laptop->spesifikasi ?></td>
                            <td><?= $k['nilai'] ?></td>
                        </tr>

                    <?php
                        if ($limit >= 10) { //h
                            break; //h
                        } else {
                            $limit++;
                        } //h
                    } ?>
                </table>
            </div>
            <div class="card-footer">
                <a href="<?= site_url('user/rekomendasi_laptop') ?>" class="btn btn-primary">Cari lagi ?</a>
            </div>
        </div>
    </div>
</div>