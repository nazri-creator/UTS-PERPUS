<?php
if (!isset($_SESSION['login'])) {
    header("Location: ../../index.php");
    exit;
}
?>

<div class="fixed top-0 left-0 h-screen w-64 bg-gray-900 text-white shadow-lg flex flex-col justify-between z-20">

    <div class="p-6 text-center font-bold text-2xl border-b border-gray-700">
        Mona Library
    </div>
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

        <a href="/perpus/pages/dashboard.php"
            class="block px-4 py-2 rounded hover:bg-gray-800 transition">
            Dashboard
        </a>

        <a href="/perpus/pages/buku/index.php"
            class="block px-4 py-2 rounded hover:bg-gray-800 transition">
            Buku
        </a>

        <a href="/perpus/pages/kategori/index.php"
            class="block px-4 py-2 rounded hover:bg-gray-800 transition">
            Kategori
        </a>

    </nav>

    <div class="p-4 border-t border-gray-700">
        <a href="/perpus/pages/logout.php"
            onclick="return confirm('Apakah yakin ingin logout?')"
            class="flex items-center justify-center bg-red-600 hover:bg-red-700 px-4 py-2 rounded transition">
            Logout
        </a>
    </div>
</div>