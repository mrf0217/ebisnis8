<?php

require 'konek.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $sub_layanan_2_id = $_POST['sub_layanan_2_id'];
    $bayar = $_POST['bayar'];
    $last_update = date("Y-m-d H:i:s");
    $gambar = null;

    // Handling the image upload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = file_get_contents($_FILES['gambar']['tmp_name']);
    }

    $stmt = $con->prepare("INSERT INTO sub_layanan_3 (sub_layanan_2_id, bayar, cetak, last_update ) VALUES (?, ?, ?, ? )");
    $stmt->bind_param("iiss",  $sub_layanan_2_id,  $bayar, $gambar, $last_update, );

    if ($stmt->execute()) {
        echo "Record added successfully!";
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
    <title>Citizen Input</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
         <input type="hidden" name="sub_layanan_2_id" value="1">
        <label for="bayar">Amount:</label>
        <input type="number" name="bayar" id="bayar" required>
        <br><br>
        <label for="gambar">Picture:</label>
        <input type="file" name="gambar" id="gambar" required>
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
    <a href="home_citizen.php">home citizen</a> 
</body>
</html>
