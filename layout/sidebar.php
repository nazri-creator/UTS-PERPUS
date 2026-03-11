<!-- SIDEBAR -->
<style>
    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #1e1e2f;
        padding-top: 20px;
    }

    .sidebar .collapse a {
        padding-left: 45px;
        font-size: 13px;
    }

    .sidebar a {
        color: #fff;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 20px;
        text-decoration: none;
        font-size: 14px;
    }

    .sidebar a:hover {
        background-color: #343a40;
    }

    .sidebar i {
        font-size: 16px;
    }

    .content {
        margin-left: 250px;
        margin-top: 60px;
        padding: 20px;
    }

    .sidebar a.active {
        background-color: #343a40;
        color: #fff;
    }
</style>

<div class="sidebar">

    <h4 style="color:white; text-align:center;">KASIR</h4>
    <hr style="color:white;">

    <!-- DASHBOARD -->
    <a href="../../pages/dashboard.php">
        <i class="fi fi-sr-home"></i> Dashboard
    </a>

    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    ?>

    <a data-bs-toggle="collapse" href="#masterMenu">
        <i class="fi fi-sr-apps"></i> Master
    </a>

    <div class="collapse <?= ($currentPage == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'kategori')) ||
                                ($currentPage == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'produk'))
                                ? 'show' : ''; ?>"
        id="masterMenu">

        <a href="/kasir/pages/kategori/index.php"
            class="<?= strpos($_SERVER['REQUEST_URI'], 'kategori') ? 'active' : ''; ?>">
            <i class="fi fi-sr-dot-circle"></i> Kategori
        </a>

        <a href="/kasir/pages/produk/index.php"
            class="<?= strpos($_SERVER['REQUEST_URI'], 'produk') ? 'active' : ''; ?>">
            <i class="fi fi-sr-dot-circle"></i> Produk
        </a>
    </div>

    <!-- TRANSAKSI -->
    <a data-bs-toggle="collapse" href="#transaksiMenu">
        <i class="fi fi-sr-shopping-cart"></i> Transaksi
    </a>
    <div class="collapse <?= ($currentPage == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'penjualan')) ||
                                ($currentPage == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'pembelian'))
                                ? 'show' : ''; ?>"
        id="transaksiMenu">

        <a href="/kasir/pages/penjualan/index.php"
            class="<?= strpos($_SERVER['REQUEST_URI'], 'penjualan') ? 'active' : ''; ?>">
            <i class="fi fi-sr-dot-circle"></i> Penjualan
        </a>

        <a href="/kasir/pages/pembelian/index.php"
            class="<?= strpos($_SERVER['REQUEST_URI'], 'pembelian') ? 'active' : ''; ?>">
            <i class="fi fi-sr-dot-circle"></i> Pembelian
        </a>
    </div>


    <!-- REPORT -->
    <a href="#">
        <i class="fi fi-sr-chart-pie"></i> Report
    </a>

    <!-- LOGOUT -->
    <a href="../logout.php" style="color:#ff4d4d; text-decoration:none;" onclick="return confirm('Yakin mau logout?')">
        <i class="fi fi-sr-sign-out-alt"></i> Logout
    </a>

</div>