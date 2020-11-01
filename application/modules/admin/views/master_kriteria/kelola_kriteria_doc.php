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
    <h2>Kelola_kriteria List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Nama Kriteria</th>
            <th>Atribut Kriteria</th>
            <th>Created At</th>
            <th>Updated At</th>

        </tr><?php
                foreach ($kelola_kriteria_data as $kelola_kriteria) {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $kelola_kriteria->nama_kriteria ?></td>
                <td><?php echo $kelola_kriteria->atribut_kriteria ?></td>
                <td><?php echo $kelola_kriteria->created_at ?></td>
                <td><?php echo $kelola_kriteria->updated_at ?></td>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>