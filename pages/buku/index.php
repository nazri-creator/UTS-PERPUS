<?php
session_start();
include '../../config/database.php';
if (!isset($_SESSION['login'])) {
    header("Location: ../../index.php");
    exit;
}


$data = mysqli_query($conn, "SELECT * FROM buku ORDER BY id DESC");
?>

<?php include '../../layout/header.php'; ?>
<?php include '../../layout/sidebar.php'; ?>

<div class="relative min-h-dvh bg-[url('../../img/bg.png')] bg-cover bg-center">
    <div class="absolute inset-0 bg-black/85"></div>

    <div class="relative z-10 ml-64 p-10 text-white">
        <h1 class="text-3xl font-bold mb-6">Manajemen Buku</h1>

        <a href="tambah.php" class="bg-green-600 px-4 py-2 rounded mb-6 inline-block hover:bg-green-700 transition">Tambah Buku</a>

        <div class="bg-white/10 backdrop-blur-md rounded-xl overflow-x-auto shadow-lg">
            <table class="w-full table-auto text-left">
                <thead class="bg-black/40 text-white">
                    <tr>
                        <th class="p-4 w-12 text-center">No</th>
                        <th class="p-4 w-48">ID Buku</th>
                        <th class="p-4 w-72">Judul</th>
                        <th class="p-4 w-64">Pengarang</th>
                        <th class="p-4 w-64">Penerbit</th>
                        <th class="p-4 w-48">Kategori</th>
                        <th class="p-4 w-32">Media</th>
                        <th class="p-4 w-32 text-center">Tahun</th>
                        <th class="p-4 w-40 text-center">Status</th>
                        <th class="p-4 w-48 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $ada_buku = false;
                    while ($row = mysqli_fetch_assoc($data)) {
                        if ($row['judul'] == '' || $row['penerbit'] == '' || $row['pengarang'] == '') continue;
                        $ada_buku = true;
                    ?>
                        <tr class="border-t border-white/20 hover:bg-white/10 transition">
                            <td class="p-4 text-center"><?= $no++ ?></td>
                            <td class="p-4"><?= $row['id_buku'] ?></td>
                            <td class="p-4"><?= $row['judul'] ?></td>
                            <td class="p-4"><?= $row['pengarang'] ?></td>
                            <td class="p-4"><?= $row['penerbit'] ?></td>
                            <td class="p-4"><?= $row['jenis_koleksi'] ?></td>
                            <td class="p-4"><?= $row['media'] ?></td>
                            <td class="p-4 text-center"><?= $row['tahun'] ?></td>
                            <td class="p-4 text-center"><?= ucfirst($row['status']) ?></td>
                            <td class="p-4 text-center flex justify-center gap-2">
                                <a href="edit.php?id=<?= $row['id'] ?>" class="bg-yellow-500 px-3 py-1 rounded hover:bg-yellow-600 transition">Edit</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus buku ini?')" class="bg-red-600 px-3 py-1 rounded hover:bg-red-700 transition">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if (!$ada_buku) { ?>
                        <tr>
                            <td colspan="10" class="p-4 text-center text-white">Belum ada buku.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>