<?php

require 'konek.php';

if (isset($_POST["submit"])) {
    $negara_id = $_POST["negara_id"];
    $nama = $_POST["nama"];
    $date_of_birth = $_POST["date_of_birth"];
    $perkerjaan = $_POST["pekerjaan"];
    $ibu_kandung = $_POST["ibu_kandung"];
    $date_of_birth_sql = date("Y-m-d H:i:s", strtotime($date_of_birth));
    

    // Check if the connection is established
    if (isset($con)) {
        // Use prepared statements to prevent SQL injection
        $query = $con->prepare("INSERT INTO citizen (negara_id, nama, date_of_birth, pekerjaan, ibu_kandung) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("issss", $negara_id, $nama, $date_of_birth_sql, $perkerjaan, $ibu_kandung); // 'i' for integer

        if ($query->execute()) {
            echo "<script> alert('Data inserted successfully'); </script>";
        } else {
            echo "<script> alert('Error: " . $query->error . "'); </script>";
        }
    } else {
        echo "<script> alert('Database connection failed'); </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrasi</title>
</head>
<body>
<div class="container" id="container">

<div class="form-container register-container">
  <form action="register.php" method="post" autocomplete="off">
    <h1>Register here</h1>
    
    
    <input type="hidden" name="negara_id" value="62">

    <label for="nama">nama</label>
    <input type="text" name="nama" required>

    <label for="date_of_birth">date_of_birth</label>
    <input type="datetime-local" name="date_of_birth" required>

    <label for="perkerjaan">perkerjaan</label>
    <input type="text" name="pekerjaan" required>

    <label for="ibu_kandung">ibu_kandung</label>
    <input type="text" name="ibu_kandung" required>

    <button type="submit" name="submit">Submit</button>

    <tr>
        <a href="register_admin.php">admin</a> 
        <a href="login.php">login citizen</a> 
    </tr>
</body>
</html>