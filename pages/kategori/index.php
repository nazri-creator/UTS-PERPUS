<?php
session_start();
include '../../config/database.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../../login.php");
    exit;
}

if(isset($_POST['simpan'])){
    $nama = $_POST['nama_kategori'];
    
    mysqli_query($conn, "INSERT INTO kategori (kategori) VALUES ('$nama')");
    header("Location: index.php");
    exit;
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM KATEGORI WHERE id='$id'");
    header("Location: index.php");
    exit; 

}
?>

<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CDN TAILWINDCSS -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <!-- CDN FALTICON -->
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>

  <!-- CDN FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gravitas+One&display=swap" rel="stylesheet">
</head>

<body>

  <!-- Container dan Background -->
  <div class="relative flex min-h-dvh items-center justify-center 
  bg-[url('img/bg.png')] bg-cover bg-center">

    <!-- Overlay gelap -->
    <div class="absolute inset-0 bg-black/70"></div>

    <!-- Wrapper -->
    <div class="z-10 flex flex-col items-center">


    
    </div>
  </div>
</body>
</html>
