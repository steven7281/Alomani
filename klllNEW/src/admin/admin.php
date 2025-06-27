<?php
session_start();

include "../proses/connect.php";

// Kalau belum login
if (!isset($_SESSION['username_alomani'])) {
    header('Location: ../login.php');
    exit();
}

// Kalau bukan level 1
if ($_SESSION['level_alomani'] != 1) {
    echo "Anda tidak memiliki akses ke halaman ini.";
    exit();
}
if (!isset($_SESSION['first_login'])) {
    $_SESSION['first_login'] = true;
} else {
    $_SESSION['first_login'] = false;
}

$query_pesanan = mysqli_query($conn, "SELECT * FROM tb_order");
// Query untuk data user
$query_user = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$_SESSION[username_alomani]'");

// Inisialisasi variabel $result sebagai array kosong
$result = array();

// Query untuk data produk
$query_produk = mysqli_query($conn, "SELECT * FROM tb_produk LEFT JOIN tb_kategori ON tb_kategori.kategori = tb_produk.katagori");
if ($query_produk) {
    while ($record = mysqli_fetch_array($query_produk)) {
        $result[] = $record;
    }
}

$select_kategori = mysqli_query($conn, "SELECT id_kategori,kategori FROM tb_kategori");
$produk = mysqli_query($conn, "SELECT id_produk,nama_barang,stok FROM tb_produk");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Batik Alomani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <!-- Halaman Main -->
    <link rel="stylesheet" href="../assets/css/styles.css">

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="text-center mb-4">
                    <img src="../assets/images/logo.png" alt="Batik Alomani Logo" style="max-width: 150px;">
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#dashboard" onclick="showSection('dashboard')">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a class="nav-link" href="sections/order.php" onclick="showSection('orders')">
                        <i class="fas fa-shopping-cart"></i> Pesanan
                    </a>
                    <a class="nav-link" href="/sections/product.php" onclick="showSection('products')">
                        <i class="fas fa-tshirt"></i> Produk
                    </a>
                    <a class="nav-link" href="#stock" onclick="showSection('stock')">
                        <i class="fas fa-boxes"></i> Stok
                    </a>
                    <a class="nav-link" href="#reports" onclick="showSection('reports')">
                        <i class="fas fa-chart-bar"></i> Laporan
                    </a>
                    <a class="nav-link" href="#settings" onclick="showSection('settings')">
                        <i class="fas fa-cog"></i> Pengaturan
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <div class="dashboard-header">
                    <h2>Selamat Datang, <?php echo $_SESSION['nama_alomani']; ?></h2>
                    <form action="../logout.php" method="post">
                        <button type="submit" class="btn-logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>

                <!-- Dashboard Section -->
                <div id="section-dashboard">
                    <!-- Statistics Cards -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="stat-card">
                                <h3>Rp 15.5M</h3>
                                <p>Total Pendapatan</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-card">
                                <h3>150</h3>
                                <p>Pesanan Baru</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-card">
                                <h3>45</h3>
                                <p>Produk Terjual</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-card">
                                <h3>98%</h3>
                                <p>Kepuasan Pelanggan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sales Chart -->
                    <div class="table-container">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>

                <!-- Include sections from separate files -->
                <?php include 'sections/order.php'; ?>
                <?php include 'sections/product.php'; ?>
                <?php include 'sections/stok.php'; ?>
                <?php include 'sections/reports.php'; ?>
                <?php include 'sections/settings.php'; ?>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <?php include 'livechat.php'; ?>
    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('[id^="section-"]').forEach(section => {
                section.style.display = 'none';
            });
            
            // Show the selected section
            document.getElementById('section-' + sectionId).style.display = 'block';
        }
    </script>
</body>
</html>