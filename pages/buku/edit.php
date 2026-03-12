<?php
session_start();
include '../../config/database.php';
if (!isset($_SESSION['login'])) {
    header("Location: ../../index.php");
    exit;
}

$id = $_GET['id'];

// Ambil data buku yang ingin diedit
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM buku WHERE id='$id'"));

// Ambil kategori hanya dari buku lengkap
$kategori = mysqli_query($conn, "
SELECT DISTINCT jenis_koleksi
FROM buku
WHERE judul IS NOT NULL AND judul != ''
  AND penerbit IS NOT NULL AND penerbit != ''
  AND pengarang IS NOT NULL AND pengarang != ''
  AND jenis_koleksi IS NOT NULL AND jenis_koleksi != ''
");

// Proses update
if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $jenis = $_POST['jenis_koleksi'];
    $media = $_POST['media'];
    $tahun = $_POST['tahun'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE buku SET 
        judul='$judul',
        pengarang='$pengarang',
        penerbit='$penerbit',
        jenis_koleksi='$jenis',
        media='$media',
        tahun='$tahun',
        status='$status'
    WHERE id='$id'") or die(mysqli_error($conn));

    header("Location: index.php");
    exit;
}
?>

<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>

<div class="relative min-h-dvh bg-[url('../../img/bg.png')] bg-cover bg-center">
    <div class="absolute inset-0 bg-black/85"></div>

    <div class="relative z-10 ml-64 p-10 text-white max-w-xl">
        <h1 class="text-3xl font-bold mb-6">Edit Buku</h1>

        <form method="POST" class="bg-white/10 backdrop-blur-md rounded-xl p-6 flex flex-col gap-4">
            <label>Judul
                <input type="text" name="judul" value="<?= $row['judul'] ?>" class="w-full p-2 rounded bg-white/20 text-white" required>
            </label>

            <label>Pengarang
                <input type="text" name="pengarang" value="<?= $row['pengarang'] ?>" class="w-full p-2 rounded bg-white/20 text-white" required>
            </label>

            <label>Penerbit
                <input type="text" name="penerbit" value="<?= $row['penerbit'] ?>" class="w-full p-2 rounded bg-white/20 text-white" required>
            </label>

            <label>Kategori
                <select name="jenis_koleksi" class="w-full p-2 rounded bg-white/20 text-white" required>
                    <option value="" class="text-black">-- Pilih Kategori --</option>

                    <?php 
                    if(mysqli_num_rows($kategori) == 0){
                        echo "<option value='' class='text-black'>Belum ada kategori</option>";
                    } else {
                        while($k = mysqli_fetch_assoc($kategori)){ ?>
                            <option value="<?= htmlspecialchars($k['jenis_koleksi']) ?>" class="text-black">
                                <?= htmlspecialchars($k['jenis_koleksi']) ?>
                            </option>
                    <?php } } ?>
                </select>
            </label>

            <label>Media
                <input type="text" name="media" value="<?= $row['media'] ?>" class="w-full p-2 rounded bg-white/20 text-white">
            </label>

            <label>Tahun
                <input type="number" name="tahun" value="<?= $row['tahun'] ?>" class="w-full p-2 rounded bg-white/20 text-white">
            </label>

            <label>Status
                <select name="status" class="w-full p-2 rounded bg-white/20 text-white">
                    <option value="tersedia" <?= $row['status'] == 'tersedia' ? 'selected' : '' ?> class="text-black">Tersedia</option>
                    <option value="dipinjam" <?= $row['status'] == 'dipinjam' ? 'selected' : '' ?> class="text-black">Dipinjam</option>
                </select>
            </label>
            <button type="submit" name="update" class="bg-green-600 px-4 py-2 rounded hover:bg-green-700 transition mt-4">Update</button>
        </form>
    </div>
</div>