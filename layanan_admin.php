<?php

require 'konek.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $serah = $_POST['serah'];
    $verifikasi = $_POST['verifikasi'];
    $status = $_POST['status'];

    $stmt = $con->prepare("UPDATE sub_layanan_3 SET serah = ?, verifikasi = ?, status = ? WHERE id = ?");
    $stmt->bind_param("sssi", $serah, $verifikasi, $status, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Display the table
$result = $con->query("SELECT * FROM sub_layanan_3");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Input</title>
</head>
<body>
    <form method="post">
        <label for="id">Record ID:</label>
        <input type="number" name="id" id="id" required>
        <br><br>
        <label for="serah">Serah:</label>
        <input type="radio" name="serah" value="s" required> Sudah
        <input type="radio" name="serah" value="b" required> Belum
        <br><br>
        <label for="verifikasi">Verifikasi:</label>
        <input type="radio" name="verifikasi" value="s" required> Sudah
        <input type="radio" name="verifikasi" value="b" required> Belum
        <br><br>
        <label for="status">Status:</label>
        <input type="radio" name="status" value="s" required> Sudah
        <input type="radio" name="status" value="b" required> Belum
        <br><br>
        <button type="submit">Submit</button>
    </form>

    <h2>Table Output</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Bayar</th>
            <th>Gambar</th>
            <th>Serah</th>
            <th>Verifikasi</th>
            <th>Status</th>
            <th>Last Update</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['bayar'] ?></td>
                <td><?= $row['cetak'] ? '<img src="data:image/jpeg;base64,' . base64_encode($row['cetak']) . '" width="100"/>' : 'No Image' ?></td>
                <td><?= $row['serah'] ?></td>
                <td><?= $row['verifikasi'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['last_update'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <body>
<a href="home_admin.php">home admin</a> 
</body>
</body>
</html>