<?php

session_start();
include '../../config/database.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../../index.php");
    exit;
}

if (!isset($_GET['jenis'])) {
    header("Location: index.php");
    exit;
}

$jenis = $_GET['jenis'];
mysqli_query($conn, "DELETE FROM buku WHERE jenis_koleksi='$jenis'") or die(mysqli_error($conn));

header("Location: index.php");
exit;
?>