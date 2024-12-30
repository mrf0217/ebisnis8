<?php
session_start();
include("konek.php");

// Function to validate and sanitize input
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nama']) && isset($_POST['ibu_kandung'])) {
        $nama = $con->real_escape_string(validate($_POST['nama']));
        $ibu_kandung = validate($_POST['ibu_kandung']);

        if (empty($nama) || empty($ibu_kandung)) {
            header("Location: login.php?error=All fields must be filled");
            exit();
        } else {
            $sql = "SELECT * FROM citizen WHERE nama='$nama' AND ibu_kandung='$ibu_kandung'";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['id'] = $row['id']; // Ensure lastName is set appropriately
                header("Location: home.php");
                exit();
            } else {
                header("Location: login.php?error=Incorrect Name or password");
                exit();
            }
        }
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
