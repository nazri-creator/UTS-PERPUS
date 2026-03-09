<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="content">
        <div class="flex items-center justify-center text-4xl font-bold ">
        Welcome, <?= $_SESSION['username']; ?>🙌
        </div>
    </div>
    
</body>
</html>
