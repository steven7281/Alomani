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
<!-- Pesanan Section -->

<div id="section-orders" style="display:none">
    <div class="table-container">
        <h4>Daftar Pesanan</h4>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?= htmlspecialchars($row['id_order']) ?></th>
                        <th>Pelanggan</th>
                        <th>Produk</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query untuk mengambil data pesanan dengan status pembayaran berhasil
                    $query_orders = mysqli_query($conn, "SELECT o.*, p.nama AS nama_pelanggan 
                                       FROM tb_order o 
                                       JOIN tb_pelanggan p ON o.id_user = p.id_user
                                       WHERE o.status_pembayaran = 'berhasil'
                                       ORDER BY o.tanggal DESC");

                    if (mysqli_num_rows($query_orders) > 0) {
                        while ($order = mysqli_fetch_assoc($query_orders)) {
                            // Tentukan warna badge berdasarkan status pesanan
                            $badge_class = '';
                            switch ($order['status']) {
                                case 'Pending':
                                    $badge_class = 'bg-warning';
                                    break;
                                case 'Diproses':
                                    $badge_class = 'bg-info';
                                    break;
                                case 'Dikirim':
                                    $badge_class = 'bg-primary';
                                    break;
                                case 'Selesai':
                                    $badge_class = 'bg-success';
                                    break;
                                case 'Dibatalkan':
                                    $badge_class = 'bg-danger';
                                    break;
                                default:
                                    $badge_class = 'bg-secondary';
                            }

                            // Tentukan warna badge untuk status pembayaran
                            $payment_badge_class = $order['status_pembayaran'] == 'berhasil' ? 'bg-success' : 'bg-danger';

                            echo '<tr>
                <td>#' . $order['id_order'] . '</td>
                <td>' . htmlspecialchars($order['nama_pelanggan']) . '</td>
                <td>' . date('d/m/Y', strtotime($order['tanggal'])) . '</td>
                <td>Rp ' . number_format($order['total_harga'], 0, ',', '.') . '</td>
                <td><span class="badge ' . $badge_class . '">' . $order['status'] . '</span></td>
                <td><span class="badge ' . $payment_badge_class . '">' . ucfirst($order['status_pembayaran']) . '</span></td>
                <td>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" 
                        data-bs-target="#orderDetail' . $order['id_order'] . '">Detail</button>';

                            // Tombol aksi berdasarkan status pesanan
                            if ($order['status'] == 'Pending') {
                                echo '<button class="btn btn-sm btn-success ms-1" 
                  onclick="processOrder(' . $order['id_order'] . ')">Proses</button>';
                            } elseif ($order['status'] == 'Diproses') {
                                echo '<button class="btn btn-sm btn-primary ms-1" 
                  onclick="shipOrder(' . $order['id_order'] . ')">Kirim</button>';
                            }

                            echo '</td>
            </tr>';

                            // Modal untuk detail pesanan
                            echo '
            <div class="modal fade" id="orderDetail' . $order['id_order'] . '" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Pesanan #' . $order['id_order'] . '</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h6>Informasi Pelanggan</h6>
                                    <p><strong>Nama:</strong> ' . htmlspecialchars($order['nama_pelanggan']) . '<br>
                                    <strong>Telepon:</strong> ' . htmlspecialchars($order['telepon'] ?? '-') . '<br>
                                    <strong>Alamat:</strong> ' . htmlspecialchars($order['alamat'] ?? '-') . '</p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Detail Pesanan</h6>
                                    <p><strong>Tanggal:</strong> ' . date('d/m/Y H:i', strtotime($order['tanggal'])) . '<br>
                                    <strong>Status Pesanan:</strong> <span class="badge ' . $badge_class . '">' . $order['status'] . '</span><br>
                                    <strong>Status Pembayaran:</strong> <span class="badge ' . $payment_badge_class . '">' . ucfirst($order['status_pembayaran']) . '</span><br>
                                    <strong>Total:</strong> Rp ' . number_format($order['total_harga'], 0, ',', '.') . '</p>
                                </div>
                            </div>
                            
                            <h6>Produk Dipesan</h6>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>';

                            // Query untuk detail produk dalam pesanan
                            $query_order_detail = mysqli_query($conn, "SELECT od.*, p.nama_barang 
                                                                     FROM tb_order_detail od
                                                                     JOIN tb_produk p ON od.id_produk = p.id_produk
                                                                     WHERE od.id_order = " . $order['id_order']);

                            while ($detail = mysqli_fetch_assoc($query_order_detail)) {
                                echo '<tr>
                                    <td>' . htmlspecialchars($detail['nama_barang']) . '</td>
                                    <td>Rp ' . number_format($detail['harga'], 0, ',', '.') . '</td>
                                    <td>' . $detail['jumlah'] . '</td>
                                    <td>Rp ' . number_format($detail['harga'] * $detail['jumlah'], 0, ',', '.') . '</td>
                                </tr>';
                            }

                            echo '</tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>';
                        }
                    } else {
                        echo '<tr><td colspan="7" class="text-center">Tidak ada pesanan dengan pembayaran berhasil</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</html>