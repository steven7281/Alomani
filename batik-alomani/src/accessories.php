<?php include 'component/header.php'; ?>
    <!-- Main Content -->
    <section class="new-product py-5">
        <div class="container" style="font-family: Macondo; color: #814603;">
            <h2 class="text-center mb-4">Accessories</h2>

            <!-- Filter Bar -->
            <div class="filter-bar mb-4">
                <h6>Filter Produk:</h6>
                <select id="productFilter" class="form-select" style="width: 200px;">
                    <option value="all">Semua</option>
                    <option value="aksesoris">Aksesoris</option>
                </select>
            </div>
            <!-- Produk -->
            <div class="row g-4">
                <div class="col-md-3 col-sm-6 product-card" data-category="aksesoris">
                    <a href="detail.php" class="text-dark text-decoration-none"><img src="assets/images/2.png" alt="Product Image" class="img-fluid"></a>
                    <h5 class="mt-2">Anting Batik</h5>
                    <p><span class="product-price">Rp. 50,000</span></p>
                </div>
                <div class="col-md-3 col-sm-6 product-card" data-category="aksesoris">
                    <a href="detail.php" class="text-dark text-decoration-none"><img src="assets/images/2.png" alt="Product Image" class="img-fluid"></a>
                    <h5 class="mt-2">Gelang Batik</h5>
                    <p><span class="product-price">Rp. 60,000</span></p>
                </div>
            </div>
        </div>
    </section>
<?php include 'component/footer.php'; ?>
<script>
    // Filter Produk
    document.getElementById('productFilter').addEventListener('change', function () {
        const selectedCategory = this.value;
        const productCards = document.querySelectorAll('.product-card');
        productCards.forEach(card => {
            if (selectedCategory === 'all' || card.dataset.category === selectedCategory) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>