<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="?">Trang chủ</a></li>
                <li class="active">Sản phẩm</li>
            </ul>
        </div>
    </div>
</div>
<?php if (isset($_GET['id'])) { ?>
    <div class="content-wraper">
        <div class="container">
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-navigation-1">
                            <div class="lg-image">
                                <a class="popup-img venobox vbox-item"
                                   href="public/Upload/Products/<?php echo $data['anh'] ?>" data-gall="myGallery">
                                    <img src="public/Upload/Products/<?php echo $data['anh'] ?>" alt="product image">
                                </a>
                            </div>
                            <?php foreach ($data_img as $val_anh) {
                                if ($val_anh['anh'] != null) { ?>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item"
                                           href="public/Upload/Products/<?php echo $val_anh['anh'] ?>"
                                           data-gall="myGallery">
                                            <img src="public/Upload/Products/<?php echo $val_anh['anh'] ?>"
                                                 alt="product image">
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>

                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            <div class="sm-image"><img src="public/Upload/Products/<?php echo $data['anh'] ?>"
                                                       alt="product image thumb"></div>

                            <?php foreach ($data_img as $val_anh) {
                                if ($val_anh['anh'] != null) { ?>
                                    <div class="sm-image"><img
                                                src="public/Upload/Products/<?php echo $val_anh['anh'] ?>"
                                                alt="product image thumb"></div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            <h2>
                                <?php echo $data['ten_sp'] . "-" . $data['loai'] . "-" . $data['ten_mau'] ?>
                            </h2>
                            <span class="product-details-ref">Mã sản phẩm:
                            <?php echo $data['ma_sp'] ?>
                        </span>
                            <div class="comment-review">
                                <ul class="rating">
                                    <li <?php echo $data['diem_danh_gia'] >= 1 ? '' : 'class="no-star"' ?> ><i
                                                class="fa fa-star-o"></i></li>
                                    <li <?php echo $data['diem_danh_gia'] >= 2 ? '' : 'class="no-star"' ?> ><i
                                                class="fa fa-star-o"></i></li>
                                    <li <?php echo $data['diem_danh_gia'] >= 3 ? '' : 'class="no-star"' ?> ><i
                                                class="fa fa-star-o"></i></li>
                                    <li <?php echo $data['diem_danh_gia'] >= 4 ? '' : 'class="no-star"' ?> ><i
                                                class="fa fa-star-o"></i></li>
                                    <li <?php echo $data['diem_danh_gia'] >= 5 ? '' : 'class="no-star"' ?> ><i
                                                class="fa fa-star-o"></i></li>
                                </ul>
                            </div>
                            <div class="price-box pt-20">
                            <span class="new-price new-price-2">
                                <?php echo currency_format($data['gia']) ?>
                            </span>
                            </div>
                            <div class="product-desc">
                                <p>
                                    <span><?= $data['mo_ta_ngan'] ?></span>
                                </p>
                            </div>
                            <div class="product-variants">
                                <span>Loại</span>
                                <div class="produt-variants-size mb-2">
                                    <div class="produt-variants-size">
                                        <?php foreach ($data_loai as $val_l) { ?>
                                            <a href="?ctrl=Product<?= '&id=' . $val_l['id_loai'] ?>"
                                               class="btn  <?= $val_l['loai'] == $data['loai'] ? 'btn-warning' : 'btn-outline-dark' ?>">
                                                <?= $val_l['loai'] ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>

                                <span>Màu sắc</span>
                                <div class="produt-variants-size">
                                    <?php foreach ($data_mau as $val_m) { ?>
                                        <a href="?ctrl=Product<?= '&id=' . $val_m['id_loai'] ?>"
                                           class="btn  <?= $val_m['ma_mau'] == $data['ma_mau'] ? 'btn-warning' : 'btn-outline-dark' ?>">
                                            <?= $val_m['ten_mau'] ?>
                                        </a>
                                    <?php } ?>
                                </div>


                            </div>
                            <div class="single-add-to-cart">
                                <form action="?ctrl=Cart&act=add&dm=gio_hang<?php echo '&id=' . $id ?>"
                                      method="post" class="cart-quantity">
                                    <div class="quantity">
                                        <label>Số lượng</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" name="so_luong" value="1" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <button class="add-to-cart" <?= $data['so_luong'] > 0 ? '' : 'disabled' ?>
                                            type="submit">
                                        <?php echo $data['so_luong'] > 0 ? "Thêm vào giỏ" : 'Hết hàng' ?>
                                    </button>
                                </form>
                            </div>

                            <div class="product-additional-info pt-25">
                                <a class="wishlist-btn" href="?ctrl=Product&act=add&dm=yeu_thich&id=<?= $id ?>"><i
                                            class="fa fa-heart-o"></i>Thêm vào
                                    yêu thích</a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-area pt-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                            <li><a class="active" data-toggle="tab" href="#description"><span>Giới thiệu</span></a>
                            </li>
                            <li><a data-toggle="tab" href="#product-details"><span>Khác</span></a></li>
                            <li><a data-toggle="tab" href="#reviews"><span>Đánh giá</span></a></li>
                        </ul>
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                </div>
            </div>
            <div class="tab-content">
                <div id="description" class="tab-pane active show" role="tabpanel">
                    <div class="product-description">
                    <span>
                        <?php echo $data['mo_ta'] ?>
                    </span>
                    </div>
                </div>
                <div id="product-details" class="tab-pane" role="tabpanel">
                    <div class="product-details-manufacturer">
                    <span>
                        <?php echo $data['mo_ta_ngan'] ?>
                    </span></p>
                    </div>
                </div>
                <div id="reviews" class="tab-pane" role="tabpanel">
                    <div class="product-reviews">
                        <div class="product-details-comment-block">
                            <?php foreach ($data_dg as $value) { ?>

                                <div class="comment-details">
                                    <div class="comment-author-infos ">
                                        <em>
                                            <?php echo $value['thoi_gian'] ?>
                                        </em>
                                    </div>
                                    <h4 class="title-block">
                                        <?php echo $value['ho_ten'] ?>
                                    </h4>
                                    <ul class="rating">
                                        <li <?php echo $value['diem_danh_gia'] >= 1 ? '' : 'class="no-star"' ?> ><i
                                                    class="fa fa-star-o"></i></li>
                                        <li <?php echo $value['diem_danh_gia'] >= 2 ? '' : 'class="no-star"' ?> ><i
                                                    class="fa fa-star-o"></i></li>
                                        <li <?php echo $value['diem_danh_gia'] >= 3 ? '' : 'class="no-star"' ?> ><i
                                                    class="fa fa-star-o"></i></li>
                                        <li <?php echo $value['diem_danh_gia'] >= 4 ? '' : 'class="no-star"' ?> ><i
                                                    class="fa fa-star-o"></i></li>
                                        <li <?php echo $value['diem_danh_gia'] >= 5 ? '' : 'class="no-star"' ?> ><i
                                                    class="fa fa-star-o"></i></li>
                                    </ul>
                                    <p>
                                        <?php echo $value['noi_dung'] ?>
                                    </p>
                                </div>
                            <?php } ?>
                            <div class="review-btn">
                                <a class="review-links" href="#" data-toggle="modal" id="viet_dg"
                                   data-target="#mymodal">
                                    Viết đánh giá!
                                </a>
                            </div>
                            <!-- Begin Quick View | Modal Area -->
                            <div class="modal fade modal-wrapper" id="mymodal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h3 class="review-page-title">Đánh giá</h3>
                                            <div class="modal-inner-area row">
                                                <div class="col-lg-6">
                                                    <div class="li-review-product">
                                                        <img src="public/Upload/Products/<?php echo $data['anh'] ?>"
                                                             width="150px" alt="Li's Product">
                                                        <div class="li-review-product-desc">
                                                            <p class="li-product-name">
                                                                <?php echo $data['ten_sp'] ?>
                                                            </p>
                                                            <p>
                                                                <span><?= $data['mo_ta_ngan'] ?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="li-review-content">
                                                        <!-- Begin Feedback Area -->
                                                        <div class="feedback-area">
                                                            <div class="feedback">
                                                                <h3 class="feedback-title">Phản hồi với chúng tôi</h3>
                                                                <form
                                                                        action="?ctrl=Product&act=dg&id=<?php echo $data['id_loai'] ?>"
                                                                        method="post">
                                                                    <p class="your-opinion">
                                                                        <label>Điểm đánh giá của bạn</label>
                                                                        <span>
                                                                        <select class="star-rating" name="rate">
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </span>
                                                                    </p>
                                                                    <input type="hidden" name="id_sp"
                                                                           value="<?= $data['id'] ?>">
                                                                    <input type="hidden" name="id_user"
                                                                           value="<?= $data_user ?? 0 ?>">
                                                                    <p class="feedback-form">
                                                                        <label for="feedback">Đánh giá của bạn</label>
                                                                        <textarea id="feedback" name="comment" cols="45"
                                                                                  rows="8"
                                                                                  aria-required="true"></textarea>
                                                                    </p>
                                                                    <div class="feedback-input">
                                                                        <div class="feedback-btn pb-15">

                                                                            <a href="#" class="close"
                                                                               data-dismiss="modal"
                                                                               aria-label="Close">Thoát</a>

                                                                            <input type="submit" value="Đánh giá">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- Feedback Area End Here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Quick View | Modal Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script type="text/javascript">
    $('#viet_dg').click(function () {
        var usr = <?= isset(['customer']['id']) ? $_SESSION['customer']['id'] : 0 ?>
        if (usr > 0) {

        } else {
            location.href = "?ctrl=Login_register";
        }
    });
</script>
