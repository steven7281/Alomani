<!-- Produk Section -->
<div id="section-products" style="display:none">
    <div class="table-container">
        <div class="row">
            <div class="col d-flex justify-content-end">
                <button class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#ModalTambahUser">
                    Tambah Produk</button>
            </div>
        </div>
        <h4>Daftar Produk</h4>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Produk</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($result)): ?>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id_produk']) ?></td>
                                <td>
                                    <div style="width:90px">
                                        <img src="../assets/images/<?php echo $row['foto'] ?>"
                                            class="img-thumbnail" alt="...">
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                                <td><?= htmlspecialchars($row['katagori'] ?? '') ?></td>
                                <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                                <td><?= htmlspecialchars($row['stok']) ?></td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                                            data-bs-target="#ModalEdit<?php echo $row['id_produk'] ?>"><i
                                                class="bi bi-pencil-square">EDIT</i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete<?php echo $row['id_produk'] ?>"><i
                                                class="bi bi-trash">DELETE</i></button>
                                    </div>


                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="ModalDelete<?php echo $row['id_produk'] ?>"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus
                                                        Data User</h1>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" novalidate
                                                        action="../proses/proses_hapus_produk.php"
                                                        method="POST">
                                                        <input type="hidden"
                                                            value="<?php echo $row['id_produk'] ?>"
                                                            name="id_produk">
                                                        <input type="hidden" value="<?php echo $row['foto'] ?>"
                                                            name="foto">
                                                        <div class="col-lg-12">
                                                            Apakah anda ingin menghapus Produk
                                                            <b><?php echo $row['nama_barang'] ?></b>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger"
                                                                name="input_user_validate"
                                                                value="1234">Hapus</button>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal akhir Delete -->
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="ModalEdit<?php echo $row['id_produk'] ?>"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT
                                                        PRODUK</h1>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" novalidate
                                                        action="../proses/proses_edit_produk.php" method="POST"
                                                        enctype="multipart/form-data">
                                                        <input type="hidden"
                                                            value="<?php echo $row['id_produk'] ?>"
                                                            name="id_produk">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="input-group mb-3">
                                                                    <input type="file" class="form-control py-3"
                                                                        id="uploadFoto" placeholder="Your Name"
                                                                        name="foto" required>
                                                                    <label class="input-group-text"
                                                                        for="uploadFoto">Upload Foto
                                                                        Menu</label>
                                                                    <div class="invalid-feedback">
                                                                        Masukan File Foto Menu
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control"
                                                                        id="floatingInput"
                                                                        placeholder="Nama Menu"
                                                                        name="nama_barang" required
                                                                        value="<?php echo $row['nama_barang'] ?>">
                                                                    <label for="floatingInput">Nama
                                                                        Produk</label>
                                                                    <div class="invalid-feedback">
                                                                        Masukan Nama Produk.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control"
                                                                        id="floatingInput"
                                                                        placeholder="keterangan"
                                                                        name="deskripsi"
                                                                        value="<?php echo $row['deskripsi'] ?>">
                                                                    <label
                                                                        for="floatingPassword">deskripsi</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-lg-6">

                                                                <div class="form-floating mb-3">
                                                                    <input type="number" class="form-control"
                                                                        id="floatingInput" placeholder="Harga"
                                                                        name="harga" required
                                                                        value="<?php echo $row['harga'] ?>">
                                                                    <label for="floatingInput">Harga</label>
                                                                    <div class="invalid-feedback">
                                                                        Masukkan harga
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">

                                                                <div class="form-floating mb-3">
                                                                    <input disabled type="number"
                                                                        class="form-control" id="floatingInput"
                                                                        placeholder="Stok" name="stok" required
                                                                        value="<?php echo $row['stok'] ?>"
                                                                        readonly>
                                                                    <label for="floatingInput">Stok</label>
                                                                    <div class="invalid-feedback">
                                                                        Masukkan stok
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                name="input_menu_validate" value="1234">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal akhir Edit -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data produk</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- akhir -->

<!-- modal tambah produk -->
<div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="../proses/proses_input_produk.php"
                    method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control py-3" id="uploadFoto"
                                    placeholder="Your Name" name="foto" required>
                                <label class="input-group-text" for="uploadFoto">Upload Foto
                                    Produk</label>
                                <div class="invalid-feedback">
                                    Masukan File Foto Produk
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="kodeProduk"
                                    placeholder="Kode Produk" name="kode_produk" required value="PK">
                                <label for="kodeProduk">Kode Produk</label>
                                <div class="invalid-feedback">
                                    Masukkan Kode Produk
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Nama Menu" name="nama_barang" required>
                                    <label for="floatingInput">Nama Produk</label>
                                    <div class="invalid-feedback">
                                        Masukan Nama Produk
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="keterangan" name="deskripsi">
                                <label for="floatingPassword">Deskripsi</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example"
                                    name="katagori" required>
                                    <option selected hidden value="">Pilih Kategori Produk</option>
                                    <?php
                                    foreach ($select_kategori as $value) {
                                        echo "<option value=" . $value['id_kategori'] . ">$value[kategori]</option>";
                                    }
                                    ?>
                                </select>
                                <label for="floatingInput">Kategori Produk</label>
                                <div class="invalid-feedback">
                                    Pilih kategori Produk
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput"
                                    placeholder="Harga" name="harga" required>
                                <label for="floatingInput">Harga</label>
                                <div class="invalid-feedback">
                                    Masukkan harga
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput"
                                    placeholder="Stok" name="stok" required>
                                <label for="floatingInput">Stok</label>
                                <div class="invalid-feedback">
                                    Masukkan stok
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="input_menu_validate"
                            value="1234">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- akhir tambah produk -->