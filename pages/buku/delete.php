<?php
session_start();
include '../../config/database.php';
if(!isset($_SESSION['login'])){ header("Location: ../../index.php"); exit; }

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM buku WHERE id='$id'");
header("Location: index.php");
exit;
?>