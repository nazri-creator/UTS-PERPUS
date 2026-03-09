<?php
    $conn = mysqli_connect("localhost", "root", "", "perpus_nazri");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>