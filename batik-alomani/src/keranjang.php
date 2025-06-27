<?php
$pageTitle = 'Keranjang - Batik Alomani';
include 'component/header.php';
?>
<style>
.cart-modern-box {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.08);
    max-width: 900px;
    margin: 40px auto 32px auto;
    padding: 36px 32px 28px 32px;
}
.cart-modern-title {
    font-weight: bold;
    font-size: 1.4rem;
    margin-bottom: 18px;
    letter-spacing: 1px;
    color: #814603;
}
.cart-modern-product-list {
    margin-bottom: 24px;
}
.cart-modern-product-item {
    display: flex;
    align-items: center;
    gap: 24px;
    padding: 18px 0;
    border-bottom: 1px solid #eee;
}
.cart-modern-product-item:last-child {
    border-bottom: none;
}
.cart-modern-img {
    width: 90px;
    height: 90px;
    object-fit: cover;
    border-radius: 12px;
    background: #f3f0e9;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
}
.cart-modern-info {
    flex: 1;
    font-family: 'Lato', sans-serif;
}
.cart-modern-name {
    font-size: 1.1rem;
    font-weight: bold;
    margin-bottom: 8px;
    letter-spacing: 1px;
    color: #222;
}
.cart-modern-qty-row {
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: 1.2rem;
    margin-bottom: 0;
}
.cart-modern-qty-btn {
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
.cart-modern-qty-btn:hover {
    background: #ffd700;
    color: #222;
}
.cart-modern-price {
    font-size: 1.1rem;
    font-weight: bold;
    color: #814603;
    min-width: 110px;
    text-align: right;
}
.cart-modern-summary {
    margin-top: 32px;
    border-top: 1.5px solid #eee;
    padding-top: 18px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.cart-modern-summary-row {
    display: flex;
    justify-content: space-between;
    font-size: 1.1rem;
}
.cart-modern-summary-row.total {
    font-size: 1.2rem;
    font-weight: bold;
    color: #814603;
}
.cart-modern-btn-main {
    background: #814603;
    color: #fff;
    font-weight: bold;
    font-size: 1.1rem;
    border: none;
    border-radius: 8px;
    width: 100%;
    padding: 14px 0;
    margin-top: 18px;
    letter-spacing: 1px;
    transition: background 0.2s;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
}
.cart-modern-btn-main:hover {
    background: #663702;
}
.cart-modern-btn-secondary {
    background: #f3f0e9;
    color: #814603;
    font-weight: bold;
    font-size: 1.1rem;
    border: none;
    border-radius: 8px;
    width: 100%;
    padding: 14px 0;
    margin-top: 10px;
    letter-spacing: 1px;
    transition: background 0.2s;
}
.cart-modern-btn-secondary:hover {
    background: #e0e0e0;
}
@media (max-width: 600px) {
    .cart-modern-box { padding: 18px 4px 12px 4px; }
    .cart-modern-product-item { flex-direction: column; align-items: flex-start; gap: 10px; }
    .cart-modern-img { width: 70px; height: 70px; }
    .cart-modern-summary { padding-top: 10px; }
}
</style>
<div class="cart-modern-box">
    <div class="cart-modern-title">Keranjang Belanja</div>
    <div class="cart-modern-product-list">
        <div class="cart-modern-product-item">
            <img src="assets/images/4.png" class="cart-modern-img" alt="ANNIE ANNIE BLUE">
            <div class="cart-modern-info">
                <div class="cart-modern-name">ANNIE ANNIE BLUE</div>
                <div class="cart-modern-qty-row">
                    <button class="cart-modern-qty-btn" onclick="decreaseQuantity('quantity1')">-</button>
                    <span id="quantity1">2</span>
                    <button class="cart-modern-qty-btn" onclick="increaseQuantity('quantity1')">+</button>
                </div>
            </div>
            <div class="cart-modern-price">Rp300.000</div>
        </div>
        <div class="cart-modern-product-item">
            <img src="assets/images/4.png" class="cart-modern-img" alt="ANNIE ANNIE BLUE">
            <div class="cart-modern-info">
                <div class="cart-modern-name">ANNIE ANNIE BLUE</div>
                <div class="cart-modern-qty-row">
                    <button class="cart-modern-qty-btn" onclick="decreaseQuantity('quantity2')">-</button>
                    <span id="quantity2">2</span>
                    <button class="cart-modern-qty-btn" onclick="increaseQuantity('quantity2')">+</button>
                </div>
            </div>
            <div class="cart-modern-price">Rp300.000</div>
        </div>
    </div>
    <div class="cart-modern-summary">
        <div class="cart-modern-summary-row">
            <span>Subtotal</span>
            <span>Rp600.000</span>
        </div>
        <div class="cart-modern-summary-row total">
            <span>Total</span>
            <span>Rp600.000</span>
        </div>
    </div>
    <button class="cart-modern-btn-main" onclick="window.location.href='bayar.php'">CHECK OUT</button>
    <button class="cart-modern-btn-secondary" onclick="window.location.href='new.php'">LANJUT BELANJA</button>
</div>
<script>
function increaseQuantity(id) {
    const el = document.getElementById(id);
    let val = parseInt(el.textContent);
    if (!isNaN(val)) el.textContent = val + 1;
}
function decreaseQuantity(id) {
    const el = document.getElementById(id);
    let val = parseInt(el.textContent);
    if (!isNaN(val) && val > 1) el.textContent = val - 1;
}
</script>
<?php include 'component/footer.php'; ?>