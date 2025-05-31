<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Batik Alomani'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/nav-styles.css">
</head>
<body>
<header>
    <!-- Top Header -->
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-lg-2 col-md-3 col-12 logo-container">
                    <a href="index.php">
                        <img src="assets/images/logo.png" alt="Batik Alomani Logo" class="img-fluid">
                    </a>
                </div>
                <!-- Search Bar -->
                <div class="col-lg-7 col-md-5 col-12">
                    <div class="search-container">
                        <input type="text" placeholder="Search">
                        <button type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- Navigation Icons -->
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="nav-icons">
                        <a href="index.php">
                            <i class="fas fa-home"></i>
                        </a>
                        <a href="keranjang.php">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <a href="admin-dashboard.php" class="btn btn-masuk">ADMIN</a>
                                <a href="logout.php" class="btn btn-masuk">LOGOUT</a>
                            <?php else: ?>
                                <a href="logout.php" class="btn btn-masuk">LOGOUT</a>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="login.php" class="btn btn-masuk">MASUK</a>
                            <a href="register.php" class="btn btn-daftar">DAFTAR</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Navigation -->
    <nav class="main-nav">
        <div class="container">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="new.php">NEW Product</a></li>
                <li class="nav-item"><a class="nav-link" href="pria.php">Baju Pria</a></li>
                <li class="nav-item"><a class="nav-link" href="wanita.php">Baju Wanita</a></li>
                <li class="nav-item"><a class="nav-link" href="anak.php">Baju Anak</a></li>
                <li class="nav-item"><a class="nav-link" href="accessories.php">Accessories</a></li>
                <li class="nav-item"><a class="nav-link" href="dress.php">Dress</a></li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <li class="nav-item"><a class="nav-link" href="admin-dashboard.php">Dashboard Admin</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>