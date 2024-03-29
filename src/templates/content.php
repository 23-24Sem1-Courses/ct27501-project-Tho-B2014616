<div class="app__container">
    <div class="grid wide">
        <div class="row sm-gutter app__content">
            <div class="col l-2 m-0 c-0">
                <nav class="caterory">
                    <h3 class="caterory__heading">Danh mục </h3>

                    <ul class="caterory-list">

                        <?php echo $dm?>

                    </ul>
                </nav>
            </div>

            <div class="col l-10 m-12 c-12">
                <div class="home-filter hide-on-mobile-tablet">
                    <form action="" method="post" class="row">
                        <span class="home-filter__label">Sắp xếp theo</span>
                        <button type="submit" name="popular" class="btn home-filter__btn">Phổ biến</button>
                        <button type="submit" name="new" class="btn home-filter__btn btn--primary">Mới nhất</button>
                        <button type="submit" name="hot" class="btn home-filter__btn">Bán chạy</button>

                        <div class="select-input">
                            <span class="select-input__label">Giá</span>
                            <i class="select-input__icon fas fa-angle-down"></i>
                            <!-- List option -->
                            <ul class="select-input__list">
                                <li class="select-input__item">
                                    <button type="submit" name="sort_desc"
                                        class="select-input__link">
                                        Giá cao đến thấp
                                    </button>
                                </li>
                                <li class="select-input__item">
                                    <button type="submit" name="sort"
                                        class="select-input__link">         
                                        Giá thấp đến cao
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>

                <div class="home-product">
                    <div class="row sm-gutter">
                        <?php foreach ($sanPhamHienThi as $item): ?>
                        <div class="col l-2-4 m-4 c-6">
                            <!-- Product item -->
                            <a class="home-product-item" href="#">
                                <div class="home-product-item__img"
                                    style="background-image: url(/../public/assets/img/img_product/<?= htmlspecialchars($item->img)?>.jpg)">
                                </div>
                                <h4 class="home-product-item__name"><?=htmlspecialchars($item->name )?></h4>
                                <div class="home-product-item__price">
                                    <span
                                        class="home-product-item__price-old"><?=htmlspecialchars(number_format($item->old_price,0,",",".")) ?>đ</span>
                                    <span
                                        class="home-product-item__price-current"><?=htmlspecialchars(number_format($item->price,0,",",".") )?>đ</span>
                                </div>
                                <div class="home-product-item__action">
                                    <!-- home-product-item__like--liked -->
                                    <span class="home-product-item__like ">
                                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item__rating">
                                        <i class="home-product-item__star-gold fas fa-star"></i>
                                        <i class="home-product-item__star-gold fas fa-star"></i>
                                        <i class="home-product-item__star-gold fas fa-star"></i>
                                        <i class="home-product-item__star-gold fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="home-product-item__sold"><?=$item->solg ?> Đã bán</span>
                                </div>
                                <div class="home-product-item__origin">
                                    <span class="home-product-item__brand"><?=$item->author?></span>
                                    <span class="home-product-item__origin-name">TP HCM</span>
                                </div>
                                <div class="home-product-item__favourit">
                                    <i class="fa-solid fa-check"></i>
                                    <span>Yêu thích</span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <span class="home-product-item__sale-off-percent">10%</span>
                                    <span class="home-product-item__sale-off-label">GIẢM</span>
                                </div>
                                <div class="home-product-item__cart">
                                    <div class="home-product__search-btn "><i
                                            class="home-product__search-icon  fas fa-search"></i></div>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id" value="<?=$item->id?>">
                                        <input type="hidden" name="name" value="<?=$item->name?>">
                                        <input type="hidden" name="img" value="<?=$item->img?>">
                                        <input type="hidden" name="price" value="<?=$item->price?>">
                                        <input type="hidden" name="soluong" value="1">
                                        <input type="submit" class="home-product-item__cart-order" name="btn-add-cart"
                                            value="Thêm vào giỏ hàng">
                                    </form>
                                </div>

                            </a>
                        </div>
                        <?php endforeach?>
                    </div>
                </div>
                <div>
                   <?php  echo $pagination ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal addToCart -->
<div id="myModal" class="modal__addCart">
    <div class="modal__addCart-content">
        <span class="close">&times;</span>
        <h2 class="modal__addCart-heading">Nhập số lượng</h2>
        <form action="" method="POST" id="addToCartForm">
            <div class="modal__addCart-content-info">
                <input type="hidden" id="modalProductId" name="id"  readonly>
            </div>
            <div class="modal__addCart-content-info">
                <label for="modalProductName">Tên sản phẩm:</label>
                <input type="text" id="modalProductName" name="name"  readonly>
            </div>
            <div class="modal__addCart-content-info">
                <input type="hidden" id="modalProductImg" name="img"  readonly>
            </div>
            <div class="modal__addCart-content-info">
                <label for="modalProductPrice">Giá:</label>
                <input type="text" id="modalProductPrice" name="price"  readonly>
            </div>
            <div class="modal__addCart-content-info-qnt">
                <label for="modalQuantity">Số lượng:</label>
                <input type="number" id="modalQuantity" name="soluong" value="1" min="1" class="input-qnt" required>
            </div>
            <input type="submit" class="btn btn-primary modal__addCart-btn" name="btn-add-cart" value="Thêm vào giỏ hàng">
        </form>
    </div>
</div>

<style>
    #myModal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
    width: 300px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.modal-content {
    text-align: center;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

input[type="number"] {
    width: 60px;
    padding: 8px;
}

</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Hiển thị modal khi ấn vào nút "Thêm vào giỏ hàng"
    document.querySelectorAll(".home-product-item__cart-order").forEach(function (btn) {
        btn.addEventListener("click", function (event) {
            event.preventDefault();
            document.getElementById("myModal").style.display = "block";
        });
    });

    // Đóng modal khi ấn vào nút đóng hoặc nút "×"
    document.querySelector(".close").addEventListener("click", function () {
        document.getElementById("myModal").style.display = "none";
    });

    // Đóng modal khi click bên ngoài modal
    window.addEventListener("click", function (event) {
        if (event.target == document.getElementById("myModal")) {
            document.getElementById("myModal").style.display = "none";
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    // Hiển thị modal khi ấn vào nút "Thêm vào giỏ hàng"
    document.querySelectorAll(".home-product-item__cart-order").forEach(function (btn) {
        btn.addEventListener("click", function (event) {
            event.preventDefault();

            // Lấy giá trị từ các thẻ input
            var productId = this.parentElement.querySelector('input[name="id"]').value;
            var productName = this.parentElement.querySelector('input[name="name"]').value;
            var productImg = this.parentElement.querySelector('input[name="img"]').value;
            var productPrice = this.parentElement.querySelector('input[name="price"]').value;

            // Hiển thị giá trị trong modal
            document.getElementById("modalProductId").value = productId;
            document.getElementById("modalProductName").value = productName;
            document.getElementById("modalProductImg").value = productImg;
            document.getElementById("modalProductPrice").value = productPrice;

            document.getElementById("myModal").style.display = "block";
        });
    });

    // Các đoạn mã khác giữ nguyên
});

</script>

