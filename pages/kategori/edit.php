<?php
session_start();
include '../../config/database.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../../index.php");
    exit;
}

$old_jenis = $_GET['jenis'] ?? '';
if ($old_jenis == '') {
    header("Location: index.php");
    exit;
}

$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM buku WHERE jenis_koleksi='$old_jenis' LIMIT 1"));


if(isset($_POST['update'])){
    $new_jenis = $_POST['jenis_koleksi'];

    mysqli_query($conn, "
        UPDATE buku 
        SET jenis_koleksi='$new_jenis'
        WHERE jenis_koleksi='$old_jenis'
    ") or die(mysqli_error($conn));

    header("Location: index.php");
    exit;
}
?>

<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>

<div class="relative min-h-dvh bg-[url('../../img/bg.png')] bg-cover bg-center">
    <div class="absolute inset-0 bg-black/80"></div>

    <div class="relative z-10 ml-64 p-10 text-white max-w-md">
        <h1 class="text-3xl font-bold mb-6">Edit Kategori</h1>

        <form method="POST" class="bg-white/10 backdrop-blur-md rounded-xl p-6 flex flex-col gap-4">
            <label class="flex flex-col gap-1">
                Nama Kategori
                <input type="text" name="jenis_koleksi" value="<?= htmlspecialchars($row['jenis_koleksi']) ?>" class="w-full p-2 rounded bg-white/20 text-white" required>
            </label>

            <div class="flex justify-between gap-2 mt-4">
                <a href="index.php" class="bg-gray-500 px-4 py-2 rounded hover:bg-gray-600 transition text-center w-full">Batal</a>
                <button type="submit" name="update" class="bg-green-600 px-4 py-2 rounded hover:bg-green-700 transition w-full">Update</button>
            </div>
        </form>
    </div>
</div>