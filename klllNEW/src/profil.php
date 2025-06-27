<?php
include "proses/connect.php";
session_start();
if (empty($_SESSION['id_alomani'] ?? null)) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['id_alomani'];
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$user_id'");
$user = mysqli_fetch_assoc($query);

$query_orders = mysqli_query($conn, "SELECT * FROM tb_order WHERE id_user = '$user_id' AND status_pembayaran = 'Berhasil' ORDER BY id_order DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Batik Alomani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/profile-style.css">
</head>
<body>
    <?php include "component/header.php"; ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="proses/proses_ubah_profil.php" method="POST" enctype="multipart/form-data" class="form-profile">
                    <div class="card shadow profile-card">
                        <div class="profile-header position-relative">
                            <div class="profile-avatar-wrapper position-absolute top-100 start-50 translate-middle">
                                <img src="assets/images/<?= $user['foto'] ?? 'avatar.png' ?>" class="profile-pic" id="previewFoto">
                                <label for="foto" class="profile-foto-btn">
                                    <i class="fas fa-camera"></i>
                                </label>
                                <input type="file" name="foto" id="foto" class="d-none" accept="image/*">
                            </div>
                        </div>
                        <div class="card-body profile-card-body">
                            <div class="text-center">
                                <h4 class="mb-0"><?= htmlspecialchars($user['nama'] ?? '') ?></h4>
                                <small class="text-muted"><?= htmlspecialchars($user['username'] ?? '') ?></small>
                            </div>
                            <ul class="nav nav-pills justify-content-center my-5" id="profileTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="profile-tab" data-bs-toggle="pill" 
                                            data-bs-target="#profile" type="button" role="tab">
                                        <i class="fas fa-user me-2"></i>Ubah Profile
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="orders-tab" data-bs-toggle="pill" 
                                            data-bs-target="#orders" type="button" role="tab">
                                        <i class="fas fa-shopping-bag me-2"></i>Pesanan Saya
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="profileTabsContent">
                                <!-- Profile Tab -->
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <?php if (isset($_GET['error'])): ?>
                                        <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
                                    <?php endif; ?>
                                    <?php if (isset($_GET['success'])): ?>
                                        <div class="alert alert-success"><?= htmlspecialchars($_GET['success']) ?></div>
                                    <?php endif; ?>
                                   
                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($user['nama'] ?? '') ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Username (Email)</label>
                                        <input type="email" class="form-control" name="username" value="<?= htmlspecialchars($user['username'] ?? '') ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nomor HP</label>
                                        <input type="text" class="form-control" name="nohp" value="<?= htmlspecialchars($user['nohp'] ?? '') ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3"><?= htmlspecialchars($user['alamat'] ?? '') ?></textarea>
                                    </div>
                                    <hr class="my-4">
                                    <h5>Ganti Password</h5>
                                    <div class="mb-3">
                                        <label class="form-label">Password Saat Ini</label>
                                        <input type="password" class="form-control" name="current_password">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password Baru</label>
                                        <input type="password" class="form-control" name="new_password">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="confirm_password">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </div>
                                <!-- Pesanan Saya -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <h5 class="mb-4">Riwayat Pesanan</h5>
                                    <?php if (mysqli_num_rows($query_orders) > 0): ?>
                                        <?php while ($order = mysqli_fetch_assoc($query_orders)): ?>
                                            <div class="order-card">
                                                <div class="order-header">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <strong>Order #<?= $order['id_order'] ?></strong><br>
                                                            <small class="text-muted">
                                                                <?= $order['provinsi'] ?>, <?= $order['kota'] ?>, <?= $order['kecamatan'] ?>, <?= $order['kelurahan'] ?>, <?= $order['kode_pos'] ?><br>
                                                                <?= htmlspecialchars($order['alamat']) ?>
                                                            </small>
                                                        </div>
                                                        <div class="text-end">
                                                            <div class="fw-bold">Rp <?= number_format($order['grand_total'], 0, ',', '.') ?></div>
                                                            <?php
                                                            $status_class = $order['status_pembayaran'] == 'Berhasil' ? 'bg-success' : 'bg-warning';
                                                            ?>
                                                            <span class="badge <?= $status_class ?> status-badge">
                                                                <?= $order['status_pembayaran'] ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="order-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h6>Info Penerima</h6>
                                                            <p class="mb-1"><strong>Nama:</strong> <?= htmlspecialchars($order['nama']) ?></p>
                                                            <p class="mb-1"><strong>No HP:</strong> <?= htmlspecialchars($order['nohp']) ?></p>
                                                            <p class="mb-1"><strong>Alamat:</strong> <?= htmlspecialchars($order['alamat']) ?></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6>Detail Produk Pesanan</h6>
                                                            <?php
                                                            $query_cart_items = mysqli_query($conn, "SELECT k.*, p.nama_barang, p.harga, p.foto, k.ukuran FROM tb_keranjang k JOIN tb_produk p ON k.nama_barang = p.id_produk WHERE k.id_user = '$user_id' AND k.status = 1");
                                                            if (mysqli_num_rows($query_cart_items) > 0):
                                                            ?>
                                                            <div class="table-responsive">
                                                                <table class="table table-sm">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Produk</th>
                                                                            <th>Ukuran</th>
                                                                            <th>Harga</th>
                                                                            <th>Qty</th>
                                                                            <th>Subtotal</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php while ($item = mysqli_fetch_assoc($query_cart_items)): ?>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    <img src="assets/images/<?= $item['foto'] ?>" class="me-2 order-product-img">
                                                                                    <?= htmlspecialchars($item['nama_barang']) ?>
                                                                                </div>
                                                                            </td>
                                                                            <td><?= htmlspecialchars($item['ukuran']) ?></td>
                                                                            <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                                                                            <td><?= $item['jumlah'] ?></td>
                                                                            <td>Rp <?= number_format($item['harga'] * $item['jumlah'], 0, ',', '.') ?></td>
                                                                        </tr>
                                                                        <?php endwhile; ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <?php else: ?>
                                                                <div class="text-muted">Tidak ada produk pada pesanan ini.</div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <div class="text-center py-5 empty-state">
                                            <i class="fas fa-shopping-bag fa-3x mb-3"></i>
                                            <h5>Belum ada pesanan</h5>
                                            <p>Anda belum memiliki riwayat pesanan yang sudah dibayar.</p>
                                            <a href="index.php" class="btn btn-primary">Mulai Belanja</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('foto').onchange = function (evt) {
            const [file] = this.files
            if (file) {
                document.getElementById('previewFoto').src = URL.createObjectURL(file)
            }
        }
    </script>
</body>
</html>