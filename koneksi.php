<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "smasharena_db";

try {
    $koneksi = @mysqli_connect($host, $user, $pass, $db);
} catch (Exception $e) {
    $koneksi = false;
}
?>