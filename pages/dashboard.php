<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}
?>

<?php include '../layout/header.php'; ?>
<?php include '../layout/sidebar.php'; ?>

<div class="relative min-h-dvh bg-[url('../img/bg.png')] bg-cover bg-center">
    <div class="absolute inset-0 bg-black/85"></div>
    <div class="relative z-10 ml-64 p-10 text-white">
        <h1 class="text-4xl font-bold">
            Welcome, <?= $_SESSION['username']; ?> 👋
        </h1>
        <p class="mt-4 text-lg">
            Selamat datang di sistem Mona Library
        </p>
    </div>
</div>