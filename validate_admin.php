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
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $con->real_escape_string(validate($_POST['email']));
        $password = validate($_POST['password']);

        if (empty($email) || empty($password)) {
            header("Location: login_admin.php?error=All fields must be filled");
            exit();
        } else {
            $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['id'] = $row['id']; // Ensure lastName is set appropriately
                header("Location: home_admin.php");
                exit();
            } else {
                header("Location: login_admin.php?error=Incorrect Name or password");
                exit();
            }
        }
    } else {
        header("Location: login_admin.php");
        exit();
    }
} else {
    header("Location: login_admin.php");
    exit();
}
?>
