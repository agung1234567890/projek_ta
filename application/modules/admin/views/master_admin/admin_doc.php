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
    <h2>Admin List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Nama Admin</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Foto</th>
            <th>Created At</th>
            <th>Updated At</th>

        </tr><?php
                foreach ($admin_data as $admin) {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $admin->nama_admin ?></td>
                <td><?php echo $admin->email ?></td>
                <td><?php echo $admin->username ?></td>
                <td><?php echo $admin->password ?></td>
                <td><?php echo $admin->foto ?></td>
                <td><?php echo $admin->created_at ?></td>
                <td><?php echo $admin->updated_at ?></td>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>