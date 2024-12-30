<?php

$con = mysqli_connect("localhost:3306","root","","passport");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
echo "Database connected!";}

?>