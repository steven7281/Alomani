<?php include 'component/header.php'; ?>

    <style>
        .product-title {
            font-size: 24px;
            font-weight: bold;
        }
        .product-price {
            font-size: 20px;
            color: #814603;
        }
        .product-detail {
            font-size: 14px;
            color: #555;
        }
        .btn-buy {
            background-color: #814603;
            color: white;
            border: none;
        }
        .btn-cart {
            background-color: #d3d3d3;
            color: #814603;
            border: none;
        }
        .thumbnail-images img {
            width: 100%;
            margin-bottom: 10px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border 0.3s ease;
        }
        .thumbnail-images img:hover {
            border: 2px solid #814603;
        }
        .main-image img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .divider {
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
        @media (max-width: 768px) {
            .product-title {
                font-size: 20px;
            }
            .product-price {
                font-size: 18px;
            }
            .product-detail {
                font-size: 12px;
            }
            .btn-buy, .btn-cart {
                font-size: 14px;
            }
            .quantity button {
                font-size: 12px;
                padding: 5px;
            }
            .quantity input {
                width: 40px;
            }
        }
        .detail-modern-box {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            max-width: 950px;
            margin: 40px auto 32px auto;
            padding: 36px 32px 28px 32px;
        }
        .detail-modern-title {
            font-weight: bold;
            font-size: 2rem;
            margin-bottom: 10px;
            letter-spacing: 1px;
            color: #814603;
        }
        .detail-modern-price {
            font-size: 1.3rem;
            color: #814603;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .detail-modern-divider {
            border-top: 1.5px solid #eee;
            margin: 18px 0;
        }
        .detail-modern-img-main {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
            margin-bottom: 12px;
            transition: 0.2s;
        }
        .detail-modern-thumbs img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 8px;
            border: 2px solid #eee;
            cursor: pointer;
            transition: border 0.2s, transform 0.2s;
        }
        .detail-modern-thumbs img.active, .detail-modern-thumbs img:hover {
            border: 2px solid #814603;
            transform: scale(1.08);
        }
        .detail-modern-size-btn {
            margin-right: 8px;
            margin-bottom: 4px;
            border-radius: 6px;
            border: 1.5px solid #814603;
            background: #fff;
            color: #814603;
            font-weight: 500;
            padding: 6px 18px;
            transition: background 0.2s, color 0.2s;
        }
        .detail-modern-size-btn.active, .detail-modern-size-btn:hover {
            background: #814603;
            color: #fff;
        }
        .detail-modern-qty-row {
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 1.2rem;
            margin-bottom: 0;
        }
        .detail-modern-qty-btn {
            background: #f3f0e9;
            border: none;
            font-size: 1.3rem;
            font-weight: bold;
            color: #814603;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            transition: background 0.2s;
            box-shadow: 0 1px 4px rgba(0,0,0,0.05);
        }
        .detail-modern-qty-btn:hover {
            background: #ffd700;
            color: #222;
        }
        .detail-modern-buy-btn {
            background: #814603;
            color: #fff;
            font-weight: bold;
            font-size: 1.1rem;
            border: none;
            border-radius: 8px;
            width: 100%;
            padding: 14px 0;
            margin-bottom: 10px;
            letter-spacing: 1px;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        .detail-modern-buy-btn:hover {
            background: #663702;
        }
        .detail-modern-cart-btn {
            background: #f3f0e9;
            color: #814603;
            font-weight: bold;
            font-size: 1.1rem;
            border: none;
            border-radius: 8px;
            width: 100%;
            padding: 14px 0;
            letter-spacing: 1px;
            transition: background 0.2s;
        }
        .detail-modern-cart-btn:hover {
            background: #e0e0e0;
        }
        @media (max-width: 900px) {
            .detail-modern-box { padding: 18px 4px 12px 4px; }
            .detail-modern-title { font-size: 1.3rem; }
        }
    </style>
</head>
<body>


    <!-- Product Detail Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Thumbnail Images -->
                <div class="col-md-1 col-3 thumbnail-images">
                    <img src="assets/images/4.png" alt="Thumbnail 1" class="img-fluid">
                    <img src="assets/images/4.png" alt="Thumbnail 2" class="img-fluid">
                    <img src="assets/images/4.png" alt="Thumbnail 3" class="img-fluid">
                    <img src="assets/images/4.png" alt="Thumbnail 4" class="img-fluid">
                </div>

                <!-- Main Product Image -->
                <div class="col-md-4 col-9 main-image">
                    <img src="assets/images/4.png" alt="Main Product" class="img-fluid">
                </div>

                <!-- Product Info -->
                <div class="col-md-6 col-12 mt-4 mt-md-0">
                    <h1 class="product-title">ANNIE ANNIE BLUE</h1>
                    <p class="product-price">Rp. 300,000</p>
                    <div class="divider"></div>
                    <div class="mb-3">
                        <h6>Size</h6>
                        <button class="btn btn-outline-dark btn-sm">S</button>
                        <button class="btn btn-outline-dark btn-sm">M</button>
                        <button class="btn btn-outline-dark btn-sm">L</button>
                        <button class="btn btn-outline-dark btn-sm">XL</button>
                    </div>
                    <div class="mb-3">
                        <h6>Detail</h6>
                        <p class="product-detail">
                            Material: Batik cap garut<br>
                            Pelapis: Tanpa tricot<br>
                            Bukaan: Belakang dengan kancing<br>
                            Tinggi dan berat badan model: 167 cm / 51 kg
                        </p>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <button class="btn btn-outline-dark" onclick="decreaseQuantity('productQuantity')">-</button>
                        <input type="text" id="productQuantity" value="1" class="form-control text-center mx-2" style="width: 50px;" min="1" oninput="validateInput(this)">
                        <button class="btn btn-outline-dark" onclick="increaseQuantity('productQuantity')">+</button>
                    </div>
                    <div class="d-flex flex-column flex-md-row gap-3">
                        <button class="detail-modern-buy-btn w-100" onclick="window.location.href='keranjang.php'">BUY NOW</button>
                        <button class="detail-modern-cart-btn w-100">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- You May Also Like Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4" style="color: #814603;">YOU MAY ALSO LIKE</h2>
            <div class="row justify-content-center">
                <!-- Product Card -->
                <div class="col-md-3 col-6 mb-4">
                    <div class="card border-0">
                        <div class="position-relative">
                            <span class="badge bg-danger position-absolute" style="top: 10px; left: 10px;">SALE</span>
                            <img src="assets/images/7.png" class="card-img-top" alt="Product 1">
                        </div>
                        <div class="card-body text-center">
                            <h6 class="card-title">Quatro Garut Blue</h6>
                            <p>Rp. 400,000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="card border-0">
                        <div class="position-relative">
                            <span class="badge bg-danger position-absolute" style="top: 10px; left: 10px;">SALE</span>
                            <img src="assets/images/7.png" class="card-img-top" alt="Product 2">
                        </div>
                        <div class="card-body text-center">
                            <h6 class="card-title">Quatro Garut Blue</h6> 
                            <p>Rp. 400,000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="card border-0">
                        <div class="position-relative">
                            <span class="badge bg-danger position-absolute" style="top: 10px; left: 10px;">SALE</span>
                            <img src="assets/images/7.png" class="card-img-top" alt="Product 3">
                        </div>
                        <div class="card-body text-center">
                            <h6 class="card-title">Quatro Garut Blue</h6>
                            <p>Rp. 400,000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
<?php include 'component/footer.php'; ?>
<script>
    function increaseQuantity(inputId) {
        const input = document.getElementById(inputId);
        let currentValue = parseInt(input.value);
        if (!isNaN(currentValue)) {
            input.value = currentValue + 1;
        }
    }

    function decreaseQuantity(inputId) {
        const input = document.getElementById(inputId);
        let currentValue = parseInt(input.value);
        if (!isNaN(currentValue) && currentValue > 1) {
            input.value = currentValue - 1;
        }
    }

    function validateInput(input) {
        if (input.value < 1) {
            input.value = 1;
        }
    }

    // Check login status when page loads
    document.addEventListener('DOMContentLoaded', function() {
        checkLoginStatus();
    });

    function checkLoginStatus() {
        const isLoggedIn = localStorage.getItem('isLoggedIn');
        const username = localStorage.getItem('username');
        
        const loginBtn = document.querySelector('.login-btn');
        const registerBtn = document.querySelector('.register-btn');
        const logoutBtn = document.querySelector('.logout-btn');
        const userIcon = document.querySelector('.user-icon');
        const userInfo = document.querySelector('.user-info');
        
        if (isLoggedIn === 'true') {
            loginBtn.style.display = 'none';
            registerBtn.style.display = 'none';
            logoutBtn.style.display = 'block';
            userIcon.style.display = 'block';
            userInfo.style.display = 'block';
            userInfo.textContent = username;
        } else {
            loginBtn.style.display = 'block';
            registerBtn.style.display = 'block';
            logoutBtn.style.display = 'none';
            userIcon.style.display = 'none';
            userInfo.style.display = 'none';
        }
    }

    function logout() {
        localStorage.removeItem('isLoggedIn');
        localStorage.removeItem('username');
        window.location.href = 'index.php';
    }
</script>
</body>
</html>