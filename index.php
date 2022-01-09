<?php
    $conn = mysqli_connect("localhost","root","","phpdasar");
    $result = mysqli_query($conn, "SELECT * FROM karyawan");
    // $kyn = mysqli_fetch_array($result);
    // var_dump($kyn);

    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM karyawan WHERE id = $id");

        return mysqli_affected_rows($conn); 
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Praktikum 9</title>
  </head>
  <body>
    <h1>Data Karyawan</h1>

    <a href="tambah.php">Add Data</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Position</th>
            <th>Status</th>
        </tr>

        <?php $i = 1; ?>
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="hapus.php?id= <?= $row["id"]; ?>">Hapus</a>
            </td>
            <td><?= $row["name"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["address"]; ?></td>
            <td><?= $row["gender"]; ?></td>
            <td><?= $row["position"]; ?></td>
            <td><?= $row["status"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endwhile; ?>
    </table>    
  </body>
</html>