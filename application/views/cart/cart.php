

<!-- Page Content -->
<!-- Single Starts Here -->
<div class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h1>Cart</h1>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-slider">
                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="<?= base_url() ?>assets/images/big-01.jpg" />
                            </li>
                            <!-- items mirrored twice, total of 12 -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <?php
                $total = 0;
                foreach ($cart_items as $index => $item) {
                    $subtotal = $item['book']['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>
                    <div class="right-content">
                        <h4><?= $item['book']['title'] ?></h4>
                        <h6>Rp <?= number_format($item['book']['price'], 2, ',', '.') ?></h6>
                        <form action="" method="get">
                            <label for="quantity-<?= $index ?>">Quantity:</label>
                            <div class="input-group mb-3" style="max-width: 150px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="button-minus-<?= $index ?>">-</button>
                                </div>
                                <input name="quantity" type="number" class="form-control quantity-text" id="quantity-<?= $index ?>"
                                    onfocus="if(this.value == '1') { this.value = ''; }"
                                    onBlur="if(this.value == '') { this.value = '1';}"
                                    value="<?= $item['quantity'] ?>" min="1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-plus-<?= $index ?>">+</button>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-danger" value="Remove">
                        </form>
                        <div class="down-content">
                            <h6>Subtotal: Rp <span id="subtotal-<?= $index ?>"><?= number_format($subtotal, 2, ',', '.') ?></span></h6>
                        </div>
                    </div>
                    <hr>
                <?php } ?>
                <div class="right-content float-right">
                    <h4>Total: Rp <span id="total-price"><?= number_format($total, 2, ',', '.') ?></span></h4>
                    <button class="btn btn-success mt-3" id="checkout-button">Check Out</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Page Ends Here -->

<script>
    <?php foreach ($cart_items as $index => $item) { ?>
        document.getElementById('button-minus-<?= $index ?>').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity-<?= $index ?>');
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateSubtotal(<?= $index ?>, <?= $item['book']['price'] ?>);
                updateTotalPrice();
            }
        });

        document.getElementById('button-plus-<?= $index ?>').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity-<?= $index ?>');
            var currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            updateSubtotal(<?= $index ?>, <?= $item['book']['price'] ?>);
            updateTotalPrice();
        });

        document.getElementById('quantity-<?= $index ?>').addEventListener('input', function() {
            updateSubtotal(<?= $index ?>, <?= $item['book']['price'] ?>);
            updateTotalPrice();
        });

        function updateSubtotal(index, price) {
            var quantity = parseInt(document.getElementById('quantity-' + index).value);
            var subtotal = quantity * price;
            document.getElementById('subtotal-' + index).innerText = subtotal.toLocaleString('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }
    <?php } ?>

    function updateTotalPrice() {
        var total = 0;
        <?php foreach ($cart_items as $index => $item) { ?>
            var subtotal = parseInt(document.getElementById('subtotal-<?= $index ?>').innerText.replace(/\./g, '').replace(',', '.'));
            total += subtotal;
        <?php } ?>
        document.getElementById('total-price').innerText = total.toLocaleString('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }
</script>