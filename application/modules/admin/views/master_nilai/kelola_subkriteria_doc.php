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
    <h2>Kelola_subkriteria List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Id Laptop</th>
            <th>Harga</th>
            <th>Ram</th>
            <th>Hdd</th>
            <th>Processor</th>
            <th>Vga</th>
            <th>Created At</th>
            <th>Updated At</th>

        </tr><?php
                foreach ($kelola_subkriteria_data as $kelola_subkriteria) {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $kelola_subkriteria->id_laptop ?></td>
                <td><?php echo $kelola_subkriteria->harga ?></td>
                <td><?php echo $kelola_subkriteria->ram ?></td>
                <td><?php echo $kelola_subkriteria->hdd ?></td>
                <td><?php echo $kelola_subkriteria->processor ?></td>
                <td><?php echo $kelola_subkriteria->vga ?></td>
                <td><?php echo $kelola_subkriteria->created_at ?></td>
                <td><?php echo $kelola_subkriteria->updated_at ?></td>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>