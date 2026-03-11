<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("location: ../index.php");
    exit;
}
?>

<!doctype html>
<html>

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- CDN TAILWINDCSS -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<!-- CDN FLATICON -->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>

<!-- CDN FONT -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gravitas+One&display=swap" rel="stylesheet">

<style>

.sidebar{
    width:250px;
    height:100vh;
    position:fixed;
    top:0;
    left:0;

    background:rgba(0,0,0,0.7);
    backdrop-filter:blur(5px);

    padding-top:20px;
    z-index:20;
}

.sidebar a{
    color:white;
    display:flex;
    align-items:center;
    gap:10px;
    padding:12px 20px;
    font-size:14px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#374151;
}

.sidebar .collapse a{
    padding-left:45px;
    font-size:13px;
}

.sidebar i{
    font-size:16px;
}

.sidebar a.active{
    background:#374151;
}

.content{
    margin-left:250px;
    margin-top:60px;
    padding:20px;
}

</style>

</head>

<body>

<!-- Background -->
<div class="relative min-h-dvh flex items-center justify-center bg-[url('../img/bg.png')] bg-cover bg-center">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/85"></div>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h4 class="text-white text-center text-xl font-bold">Mona Library</h4>
        <hr class="border-gray-600 my-3">

        <!-- DASHBOARD -->
        <a href="../../pages/dashboard.php">
            <i class="fi fi-sr-home"></i> Dashboard
        </a>

        <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
        ?>


        <!-- REPORT -->
        <a href="#">
            <i class="fi fi-sr-chart-pie"></i> Report
        </a>

        <!-- LOGOUT -->
        <a href="../logout.php" class="text-red-400" onclick="return confirm('Yakin mau logout?')">
            <i class="fi fi-sr-sign-out-alt"></i> Logout
        </a>

    </div>

    <!-- CONTENT -->
    <div class="content relative z-10">
        <div class="flex items-center justify-center text-4xl font-bold text-white">
            Welcome, <?= $_SESSION['username']; ?> 🙌
        </div>
    </div>

</div>

</body>
</html>