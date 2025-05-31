<?php include 'component/header.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Batik Alomani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/nav-styles.css">
    <style>
        body {
            font-family: 'Lexend Mega', sans-serif;
        }

        body {
            font-family: 'Lexend Mega', sans-serif;
        }

        .breadcrumb {
            font-size: 14px;
            margin: 20px 0;
            text-align: center;
            color: #999;
        }

        .form-section {
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 10px;
        }

        .form-section input,
        .form-section textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            background-color: #d6d6d6;
        }

        .cart-summary {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
        }

        .cart-summary h2 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .product-image img {
            width: 80px;
            height: auto;
            border-radius: 5px;
        }

        .product-details {
            flex: 1;
            margin-left: 15px;
        }

        .product-details p {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
        }

        .quantity {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .quantity button {
            background-color: #814603;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .quantity span {
            font-size: 16px;
            font-weight: bold;
        }

        .price {
            font-size: 16px;
            font-weight: bold;
            color: #814603;
            text-align: right;
        }

        .shipping-options {
            margin-top: 20px;
        }

        .shipping-options label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #d6d6d6;
            border-radius: 5px;
            cursor: pointer;
        }

        .shipping-options input {
            margin-right: 10px;
        }

        .total {
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .btn-payment {
            background-color: #814603;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <main class="container">
        <div class="breadcrumb">
            <a href="keranjang.php" class="text-dark text-decoration-none">Keranjang</a> →
            <span style="color: red;">Pembayaran</span> →
            <span>Selesai</span>
        </div>

        <div class="row">
            <!-- Form Section -->
            <div class="col-md-6 form-section">
                <input type="text" placeholder="Masukkan Nama">
                <input type="number" placeholder="No. Telepon">
                <input type="text" placeholder="Provinsi">
                <input type="text" placeholder="Kota">
                <input type="text" placeholder="Kecamatan">
                <input type="text" placeholder="Kelurahan">
                <input type="number" placeholder="Kode Pos">
                <textarea placeholder="Alamat" rows="3"></textarea>
            </div>

            <!-- Cart Summary -->
            <div class="col-md-6 cart-summary">
                <h2>Pesanan Anda</h2>

                <!-- Item 1 -->
                <div class="cart-item">
                    <div class="product-image">
                        <img src="assets/images/1.png" alt="Annie Annie Blue">
                    </div>
                    <div class="product-details">
                        <p>BATIK ALOMANI BLUE XXL</p>
                        <div class="quantity">
                            <span>Item : 2</span>

                        </div>
                    </div>
                    <div class="price">
                        <p>Rp300.000</p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="cart-item">
                    <div class="product-image">
                        <img src="assets/images/2.png" alt="Batik Alomani Red">
                    </div>
                    <div class="product-details">
                        <p>BATIK ALOMANI RED XXL </p>
                        <div class="quantity">
                            <span>Item : 1</span>
                        </div>
                    </div>
                    <div class="price">
                        <p>Rp250.000</p>
                    </div>
                </div>

                <div class="subtotal">
                    <p>Subtotal</p>
                    <p>Rp550.000</p>
                </div>

                <div class="shipping-options">
                    <h6>PILIH JASA KIRIM</h6>
                    <label>
                        <input type="radio" name="shipping" checked> Reguler
                        <span>Rp9.000</span>
                    </label>
                    <label>
                        <input type="radio" name="shipping"> Instan
                        <span>Rp20.000</span>
                    </label>
                    <label>
                        <input type="radio" name="shipping"> Next Day
                        <span>Rp18.000</span>
                    </label>
                </div>

                <div class="total">
                    <p>TOTAL</p>
                    <p>Rp559.000</p>
                </div>

                <button class="btn-payment" onclick="window.location.href='last.php'">PILIH PEMBAYARAN</button>
            </div>
        </div>
    </main>
<?php include 'component/footer.php'; ?>
</body>

</html>