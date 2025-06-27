<!-- Stok Section -->
<div id="section-stock" style="display:none">
    <div class="table-container">
        <h4>Manajemen Stok</h4>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Stok Tersedia</th>
                        <th>Stok Minimum</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($result)): ?>
                        <?php foreach ($result as $row): ?>
                            <?php
                            $stok = (int) ($row['stok'] ?? 0);
                            $status_class = '';
                            $status_text = '';

                            if ($stok < 5) {
                                $status_class = 'danger';
                                $status_text = 'Hampir Habis';
                            } elseif ($stok >= 5 && $stok < 10) {
                                $status_class = 'warning';
                                $status_text = 'Menengah';
                            } elseif ($stok >= 10 && $stok < 15) {
                                $status_class = 'info';
                                $status_text = 'Cukup';
                            } else {
                                $status_class = 'success';
                                $status_text = 'Aman';
                            }
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($row['kode_produk'] ?? '') ?></td>
                                <td><?= htmlspecialchars($row['nama_barang'] ?? '') ?></td>
                                <td><?= $stok ?></td>
                                <td>10</td>
                                <td><span class="badge bg-<?= $status_class ?>"><?= $status_text ?></span></td>
                                <td>
                                    <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal"
                                        data-bs-target="#ModalStok"
                                        data-kode="<?= htmlspecialchars($row['kode_produk'] ?? '') ?>"
                                        data-nama="<?= htmlspecialchars($row['nama_barang'] ?? '') ?>"
                                        data-stok="<?= htmlspecialchars($row['stok'] ?? 0) ?>"
                                        data-id="<?= htmlspecialchars($row['id_produk'] ?? '') ?>">
                                        Tambah
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Tidak ada data stok</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- akhir stok -->

<!-- Modal Tambah Stok (Single Modal) -->
<div class="modal fade" id="ModalStok" tabindex="-1" aria-labelledby="ModalStokLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="ModalStokLabel">Tambah Stok Produk</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="formTambahStok" class="needs-validation" novalidate
                action="../proses/proses_tambah_stok.php" method="POST">
                <div class="modal-body">
                    <!-- Input Kode Produk (read-only) -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="kodeProduk" name="id_produk"
                            value="<?php echo htmlspecialchars($row['id_produk'] ?? ''); ?>" readonly>
                        <label for="kodeProduk">Kode Produk</label>
                    </div>

                    <!-- Input Nama Produk (read-only, optional) -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="namaProduk" name="nama_barang"
                            value="<?php echo htmlspecialchars($row['nama_barang'] ?? ''); ?>" readonly>
                        <label for="namaProduk">Nama Produk</label>
                    </div>

                    <!-- Input Stok Saat Ini (read-only, optional) -->
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="stokSekarang"
                            value="<?php echo htmlspecialchars($row['stok'] ?? 0); ?>" readonly>
                        <label for="stokSekarang">Stok Saat Ini</label>
                    </div>

                    <!-- Input Tambah Stok -->
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="jumlahStok" name="stok" min="1"
                            required>
                        <label for="jumlahStok">Jumlah Stok Tambahan</label>
                        <div class="invalid-feedback">
                            Harap masukkan jumlah stok yang valid (minimal 1)
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="input_stok_validate"
                        value="1234">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- akhir modal stok -->