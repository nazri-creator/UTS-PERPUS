<?php
session_start();
include '../../config/database.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../../index.php");
    exit;
}

if (isset($_POST['simpan'])) {

    $kategori = $_POST['jenis_koleksi'];

    mysqli_query($conn, "
INSERT INTO buku (jenis_koleksi)
VALUES ('$kategori')
");

    header("Location: index.php");
    exit;
}
?>

<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>

<div class="relative min-h-dvh bg-[url('../../img/bg.png')] bg-cover bg-center">
    <div class="absolute inset-0 bg-black/85"></div>
    <div class="relative z-10 ml-64 p-10 text-white">
        <h1 class="text-3xl font-bold mb-6">
            Tambah Kategori
        </h1>
        <form method="POST"
            class="bg-white/10 backdrop-blur-md p-6 rounded-xl w-[420px] space-y-4">
            <div>
                <label class="block mb-1">
                    Nama Kategori
                </label>
                <input
                    type="text"
                    name="jenis_koleksi"
                    required
                    class="w-full p-2 rounded bg-white/20 text-white" />
            </div>
            <button
                name="simpan"
                class="bg-green-600 px-4 py-2 rounded hover:bg-green-700">
                Simpan
            </button>
        </form>
    </div>
</div>