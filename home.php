<?php
require 'konek.php';
session_start();

echo $_SESSION['nama'];


// if (isset($_SESSION['id']) && isset($_SESSION['lastName'])) {
//     $id = $_SESSION['id'];
// } else {
//     header("Location: login.php");
//     exit();
// }
?>

<body>
<a href="layanan_citizen.php">layanan citizen</a> 
</body>

