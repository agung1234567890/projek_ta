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
    <h2>Laptop List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Merk</th>
            <th>Jenis</th>
            <th>Spesifikasi</th>
            <th>Gambar</th>
            <th>Created At</th>
            <th>Updated At</th>

        </tr><?php
                foreach ($laptop_data as $laptop) {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $laptop->merk ?></td>
                <td><?php echo $laptop->jenis ?></td>
                <td><?php echo $laptop->spesifikasi ?></td>
                <td><?php echo $laptop->gambar ?></td>
                <td><?php echo $laptop->created_at ?></td>
                <td><?php echo $laptop->updated_at ?></td>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>