<!doctype html>
<html>

<head>
    <style>
        .word-table {
            border: 1px solid black !important;
            border-collapse: collapse !important;
            width: 100%;
        }

        .word-table tr th,
        .word-table tr td {
            border: 1px solid black !important;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <h2>Kelola_normalisasi List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Id Laptop</th>
            <th>Harga</th>
            <th>Ram</th>
            <th>Hdd</th>
            <th>Processor</th>
            <th>Resolusi</th>
            <th>Baterai</th>
            <th>Vga</th>
            <th>Created At</th>
            <th>Updated At</th>

        </tr><?php
                foreach ($kelola_normalisasi_data as $kelola_normalisasi) {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $kelola_normalisasi->id_laptop ?></td>
                <td><?php echo $kelola_normalisasi->harga ?></td>
                <td><?php echo $kelola_normalisasi->ram ?></td>
                <td><?php echo $kelola_normalisasi->hdd ?></td>
                <td><?php echo $kelola_normalisasi->processor ?></td>
                <td><?php echo $kelola_normalisasi->resolusi ?></td>
                <td><?php echo $kelola_normalisasi->baterai ?></td>
                <td><?php echo $kelola_normalisasi->vga ?></td>
                <td><?php echo $kelola_normalisasi->created_at ?></td>
                <td><?php echo $kelola_normalisasi->updated_at ?></td>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>