<div class="grid wide cart__session">
    <div class="row ">
        <div class="col l-12 c-12 m-12">
            <div class="cart__header">
                <h1 class="cart__heading">Shopping Cart</h1>
                <ul class="cart__navbar">
                    <li class="cart__navbar-item"><a class="cart__navbar-item-link" href="index.php"> Home</a></li>
                    <li class="cart__navbar-item">Cart</li>
                </ul>
            </div>

        </div>
    </div>
    <!--  Cart content-->

    <div class="row">
        <!--Cart section start-->
        <div class=" col l-12 c-12 m-12">
            <div class=" cart__content">
                <!-- Cart Table -->
                <div class="cart__content-table">
                    <?php 
                        // Kiểm tra xem giỏ hàng có sản phẩm không
                        if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                    ?>
                    <table class="cart__table ">
                        <thead class="cart__table-thead">
                            <tr>
                                <th class="cart__table-thumbnail">Image</th>
                                <th class="cart__table-title">Product</th>
                                <th class="cart__table-price">Price</th>
                                <th class="cart__table-quantity">Quantity</th>
                                <th class="cart__table-subtotal">Total</th>
                                <th class="cart__table-remove">Remove</th>
                            </tr>
                            <hr class="cart__table-thead-hr">
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
                                    $i=0;
                                    foreach ($_SESSION['giohang'] as $item) {
                                        extract($item);
                                        $tt=$price*$soluong;
                                        $linkdel ="index.php?pg=delcart&ind=".$i;
                                        echo '<tr class="cart__table-thead-tr">
                                                <td class="cart__table-thumbnail"><a href="#"><img
                                                    src="../assets/img/img_product/'.$img.'.jpg" alt="Product"></a>
                                                </td>
                                                <td class="cart__table-title"><a href="#">'.$name.'</a></td>
                                                <td class="cart__table-price"><span>'.number_format($price,0,",",".").'đ</span></td>
                                                <td class="cart__table-quantity">
                                                    <div class="cart__table-qty">
                                                        <button class="minus-btn qtybtn" onclick="decreaseQuantity(this)">-</button>
                                                        <input class="amount-input quantity" type="number" value="'.$soluong.'" min="1">
                                                        <button class="plus-btn qtybtn" onclick="increaseQuantity(this)">+</button>
                                                    </div>
                                                </td>
                                                <td class="cart__table-subtotal"><span>'.number_format($tt,0,",",".").'đ</span></td>
                                                <td class="cart__table-remove"><a href="'.$linkdel.'"><i class="fa-regular fa-trash-can"></i></a>
                                                </td>
                                            </tr>';
                                            $i++;                              

                                    }
                                   
                                }  
                                
                                

                            ?>

                        </tbody>
                        <tfoot>
                            <tr class="cart__footer">
                                <td colspan="4" class="cart__footer-title">
                                    <h4 style="line-height: 45px;">Tổng:</h4>
                                </td>
                                <td class="cart__footer-sum-value text-center">
                                    <h4 style="line-height: 45px;">0đ</h4>
                                </td>
                                <td class="text-center cart__footer-checkout">
                                    <div class="cart__footer-summary">
                                        <a class="cart__checkout-btn" href="#">Checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <?php 
                        } else {
                            echo '<h1 class="text-center" style="color:red">Giỏ hàng đang trống!</h1>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <!--Cart section end-->
    </div>
</div>
<script>
    function decreaseQuantity(button) {
        var input = button.nextElementSibling;
        var currentValue = parseInt(input.value);

        if (currentValue > 1) {
            input.value = currentValue - 1;
            updateCartItem(input);
        }
    }

    function increaseQuantity(button) {
        var input = button.previousElementSibling;
        var currentValue = parseInt(input.value);

        input.value = currentValue + 1;
        updateCartItem(input);
    }

    function updateCartItem(input) {
        var row = input.closest('.cart__table-thead-tr');
        var price = parseFloat(row.querySelector('.cart__table-price span').innerText.replace('đ', '').replace('.', '').replace(',', '.'));
        var quantity = parseInt(input.value);

        var subtotal = price * quantity;

        // Format the subtotal with the desired currency format
        var formattedSubtotal = formatCurrency(subtotal);

        // Update the subtotal in the table
        row.querySelector('.cart__table-subtotal span').innerText = formattedSubtotal;

        // Update the total sum
        updateTotalSum();
    }

    function updateTotalSum() {
        var totalSum = 0;

        // Get all subtotals and sum them up
        var subtotals = document.querySelectorAll('.cart__table-subtotal span');
        subtotals.forEach(function (subtotal) {
            totalSum += parseFloat(subtotal.innerText.replace('đ', '').replace('.', '').replace(',', '.'));
        });

        // Format the total sum with the desired currency format
        var formattedTotalSum = formatCurrency(totalSum);

        // Update the total sum in the footer
        document.querySelector('.cart__footer-sum-value h4').innerText = formattedTotalSum;
    }

    // Function to format currency
    function formatCurrency(amount) {
        return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Get all quantity input elements
        var quantityInputs = document.querySelectorAll('.quantity');

        // Attach event listeners to each quantity input
        quantityInputs.forEach(function (input) {
            input.addEventListener('change', function () {
                updateCartItem(input);
            });
        });

        // Update the total sum when the page loads
        updateTotalSum();
    });
</script>


<?php include_once "../model/footer.php"?>
