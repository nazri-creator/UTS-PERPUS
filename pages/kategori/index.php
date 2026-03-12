<?php
session_start();
include '../../config/database.php';

if (!isset($_SESSION['login'])) {
  header("Location: ../../index.php");
  exit;
}

$data = mysqli_query($conn, "
SELECT DISTINCT jenis_koleksi 
FROM buku
WHERE jenis_koleksi!=''
");
?>

<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>

<div class="relative min-h-dvh bg-[url('../../img/bg.png')] bg-cover bg-center">

  <div class="absolute inset-0 bg-black/80"></div>

  <div class="relative z-10 ml-64 p-10 text-white">

    <h1 class="text-3xl font-bold mb-6">
      Manajemen Kategori
    </h1>

    <div class="flex justify-between items-center mb-6">
      <a href="tambah.php"
        class="bg-green-600 px-4 py-2 rounded hover:bg-green-700 transition">
        Tambah Kategori
      </a>
    </div>

    <div class="bg-white/10 backdrop-blur-md rounded-xl overflow-hidden shadow-lg">
      <table class="w-full table-auto text-left">
        <thead class="bg-black/40 text-white">
          <tr>
            <th class="p-4 w-16 text-center">No</th>
            <th class="p-4">Nama Kategori</th>
            <th class="p-4 w-48 text-center">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $no = 1;
          while ($row = mysqli_fetch_assoc($data)) {
          ?>
            <tr class="border-t border-white/20 hover:bg-white/10 transition">
              <td class="p-4 text-center align-middle"><?= $no++ ?></td>
              <td class="p-4 align-middle break-words"><?= $row['jenis_koleksi'] ?></td>
              <td class="p-4 text-center flex justify-center gap-2">
                <a href="edit.php?jenis=<?= $row['jenis_koleksi'] ?>"
                  class="bg-yellow-500 px-3 py-1 rounded hover:bg-yellow-600 transition">
                  Edit
                </a>
                <a href="delete.php?jenis=<?= $row['jenis_koleksi'] ?>"
                  onclick="return confirm('Yakin ingin menghapus kategori ini beserta semua bukunya?')"
                  class="bg-red-600 px-3 py-1 rounded hover:bg-red-700 transition">
                  Delete
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>