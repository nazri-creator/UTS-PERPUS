<?php
session_start();
include '../../config/database.php';
if(!isset($_SESSION['login'])){
    header("Location: ../../index.php");
    exit;
}

// Ambil semua kategori unik dari tabel buku
$kategori = mysqli_query($conn, "
    SELECT DISTINCT jenis_koleksi
    FROM buku
    WHERE jenis_koleksi IS NOT NULL AND jenis_koleksi != ''
    ORDER BY jenis_koleksi ASC
");

// Proses simpan buku baru
if(isset($_POST['simpan'])){
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $jenis = $_POST['jenis_koleksi'];
    $media = $_POST['media'];
    $tahun = $_POST['tahun'];
    $status = $_POST['status'];

    mysqli_query($conn, "
        INSERT INTO buku (id_buku, judul, pengarang, penerbit, jenis_koleksi, media, tahun, status)
        VALUES ('$id_buku','$judul','$pengarang','$penerbit','$jenis','$media','$tahun','$status')
    ") or die(mysqli_error($conn));

    header("Location: index.php");
    exit;
}
?>
<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>

<div class="relative min-h-dvh bg-[url('../../img/bg.png')] bg-cover bg-center">
    <div class="absolute inset-0 bg-black/85"></div>
    <div class="relative z-10 ml-64 p-10 text-white max-w-lg">

        <h1 class="text-3xl font-bold mb-6">Tambah Buku</h1>

        <form method="POST" class="bg-white/10 backdrop-blur-md p-6 rounded-xl space-y-4">

            <input type="text" name="id_buku" placeholder="ID Buku" class="w-full p-2 rounded bg-white/20 text-white" required>
            <input type="text" name="judul" placeholder="Judul Buku" class="w-full p-2 rounded bg-white/20 text-white" required>
            <input type="text" name="pengarang" placeholder="Pengarang" class="w-full p-2 rounded bg-white/20 text-white" required>
            <input type="text" name="penerbit" placeholder="Penerbit" class="w-full p-2 rounded bg-white/20 text-white" required>

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

            <input type="text" name="media" placeholder="Media" class="w-full p-2 rounded bg-white/20 text-white">
            <input type="number" name="tahun" placeholder="Tahun" class="w-full p-2 rounded bg-white/20 text-white">

            <select name="status" class="w-full p-2 rounded bg-white/20 text-white">
                <option value="tersedia" class="text-black">Tersedia</option>
                <option value="dipinjam" class="text-black  ">Dipinjam</option>
            </select>

            <div class="flex gap-2 mt-4">
                <a href="index.php" class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded w-full text-center">Batal</a>
                <button name="simpan" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded w-full text-white transition">Simpan</button>
            </div>
        </form>
    </div>
</div>