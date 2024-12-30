<?php

require 'konek.php';

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    

    // Check if the connection is established
    if (isset($con)) {
        // Use prepared statements to prevent SQL injection
        $query = $con->prepare("INSERT INTO admin (nama, email, password) VALUES (?, ?, ?)");
        $query->bind_param("sss", $nama, $email, $password); // 'i' for integer

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
  <form action="register_admin.php" method="post" autocomplete="off">
    <h1>Register here</h1>
    
    
    <label for="nama">nama</label>
    <input type="text" name="nama" required>

    <label for="email">email</label>
    <input type="text" name="email" required>

    <label for="password">password</label>
    <input type="text" name="password" required>

    <button type="submit" name="submit">Submit</button>

    <tr>
    <a href="register.php">register citizen</a> 
    <a href="login_admin.php">login admin</a> 

    </tr>
</body>
</html>