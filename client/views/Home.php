<!-- Slider -->
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Slider Area -->
            <div class="col-lg-12 col-md-12">
                <div class="slider-area">
                    <div class="slider-active owl-carousel">
                        <?php foreach ($slider as $val_slider) { ?>
                            <?php if ($val_slider['vi_tri'] == 0) { ?>
                                <a href="<?= $val_slider['url'] ?>">
                                    <div class="single-slide align-center-left  animation-style-01 ">
                                        <img src="public/Upload/Slider/<?php echo $val_slider['anh'] ?>" alt="">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- sản phẩm nổi bật -->
<section class="product-area  pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Sản phẩm nổi bật</span>
                    </h2>
                    <ul class="li-sub-category-list">
                        <li class="active"><a href="?ctrl=Product_List&act=spnb">Xem thêm</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        <?php foreach ($data_noi_bat as $val_nb) {
                            $check_DM = $this->Model->fetchOne("select * from danh_muc where id = '" . $val_nb['id_dm'] . "'"); ?>
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="?ctrl=Product<?php echo '&id=' . $val_nb['id_loai'] ?>">
                                            <img src="public/Upload/Products/<?php echo $val_nb['anh'] ?>"
                                                 alt="Li's Product Image">
                                        </a>

                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="?ctrl=category&id=<?php echo $check_DM['id'] ?>"><?php echo $check_DM['ten_dm'] ?></a>
                                                </h5>
                                                <div class="rating-box">
                                                    <div class="comment-review">
                                                        <ul class="rating">
                                                            <li <?php echo $val_nb['diem_danh_gia'] >= 1 ? '' : 'class="no-star"' ?> >
                                                                <i class="fa fa-star-o"></i></li>
                                                            <li <?php echo $val_nb['diem_danh_gia'] >= 2 ? '' : 'class="no-star"' ?> >
                                                                <i class="fa fa-star-o"></i></li>
                                                            <li <?php echo $val_nb['diem_danh_gia'] >= 3 ? '' : 'class="no-star"' ?> >
                                                                <i class="fa fa-star-o"></i></li>
                                                            <li <?php echo $val_nb['diem_danh_gia'] >= 4 ? '' : 'class="no-star"' ?> >
                                                                <i class="fa fa-star-o"></i></li>
                                                            <li <?php echo $val_nb['diem_danh_gia'] >= 5 ? '' : 'class="no-star"' ?> >
                                                                <i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4><a class="product_name"
                                                   href="?ctrl=Product<?php echo '&id=' . $val_nb['id_loai'] ?>"><?php echo $val_nb['ten_sp'] . " - " . $val_nb['loai'] ?></a>
                                            </h4>
                                            <div class="price-box">

                                                <span class="new-price"><?php echo currency_format($val_nb['gia']) ?></span>
                                            </div>

                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a
                                                            href="?act=add&dm=gio_hang<?php echo '&id=' . $val_nb['id_loai'] ?>">Thêm
                                                        vào giỏ</a></li>
                                                <li><a class="links-details"
                                                       href="?act=add&dm=yeu_thich&id=<?php echo $val_nb['id_loai'] ?>"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>


<!-- sản phẩm mới -->
<section class="product-area  pt-60 pb-45">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Sản phẩm mới</span>
                    </h2>
                </div>

                <div class="row">
                    <div class="product-active owl-carousel">
                        <?php foreach ($data_sp_moi as $val_new) {
                            $check_DM = $this->Model->fetchOne("select * from danh_muc where id = '" . $val_new['id_dm'] . "'"); ?>
                            <div class="col-lg-12">
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="?ctrl=product<?php echo '&id=' . $val_new['id_loai'] ?>">
                                            <img src="public/Upload/Products/<?php echo $val_new['anh'] ?>"
                                                 alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">Mới</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="?ctrl=category&id=<?php echo $check_DM['id'] ?>"><?php echo $check_DM['ten_dm'] ?></a>
                                                </h5>
                                                <div class="rating-box">
                                                    <div class="comment-review">
                                                        <ul class="rating">
                                                            <li <?php echo $val_new['diem_danh_gia'] >= 1 ? '' : 'class="no-star"' ?> >
                                                                <i class="fa fa-star-o"></i></li>
                                                            <li <?php echo $val_new['diem_danh_gia'] >= 2 ? '' : 'class="no-star"' ?> >
                                                                <i class="fa fa-star-o"></i></li>
                                                            <li <?php echo $val_new['diem_danh_gia'] >= 3 ? '' : 'class="no-star"' ?> >
                                                                <i class="fa fa-star-o"></i></li>
                                                            <li <?php echo $val_new['diem_danh_gia'] >= 4 ? '' : 'class="no-star"' ?> >
                                                                <i class="fa fa-star-o"></i></li>
                                                            <li <?php echo $val_new['diem_danh_gia'] >= 5 ? '' : 'class="no-star"' ?> >
                                                                <i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4><a class="product_name"
                                                   href="?ctrl=product<?php echo '&id=' . $val_new['id_loai'] ?>"><?php echo $val_new['ten_sp'] . " - " . $val_new['loai'] ?></a>
                                            </h4>

                                            <div class="price-box">
                                                <span class="new-price"><?php echo currency_format($val_new['gia']) ?></span>
                                            </div>

                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a
                                                            href="?act=add&dm=gio_hang<?php echo '&id=' . $val_new['id_loai'] ?>">Thêm
                                                        vào giỏ</a></li>
                                                <li><a class="links-details"
                                                       href="?act=add&dm=yeu_thich&id=<?php echo $val_new['id_loai'] ?>"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- banner -->
<div class="li-static-banner">
    <div class="container">
        <div class="row">
            <?php $c = 0;
            foreach ($slider as $value) {
                if ($value['vi_tri'] > 0) {
                    $c++; ?>
                    <div class="col-lg-4 col-md-4 text-center">
                        <div class="single-banner">
                            <a href="<?= $value['url'] ?>">
                                <img src="public/Upload/Slider/<?= $value['anh'] ?>" alt="Li's Static Banner">
                            </a>
                        </div>
                    </div>
                    <?php if ($c >= 3) break;
                } ?>
            <?php } ?>
        </div>
    </div>
</div>

<?php foreach ($data_dm as $val_danh_muc) {
    $getData = $this->Model->fetch("select * from sp_view where id_dm = '" . $val_danh_muc['id'] . "'group by ma_sp ");
    if (count($getData) > 0) {
        ?>
        <section class="product-area  pt-60 pb-45">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span><?= $val_danh_muc['ten_dm'] ?></span>
                            </h2>
                        </div>

                        <div class="row">
                            <div class="product-active owl-carousel">
                                <?php foreach ($getData as $val_sp) { ?>
                                    <div class="col-lg-12">
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="?ctrl=product<?php echo '&id=' . $val_sp['id_loai'] ?>">
                                                    <img src="public/Upload/Products/<?php echo $val_sp['anh'] ?>"
                                                         alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">Mới</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="?ctrl=category&id=<?php echo $val_danh_muc['id'] ?>"><?php echo $val_danh_muc['ten_dm'] ?></a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <div class="comment-review">
                                                                <ul class="rating">
                                                                    <li <?php echo $val_sp['diem_danh_gia'] >= 1 ? '' : 'class="no-star"' ?> >
                                                                        <i class="fa fa-star-o"></i></li>
                                                                    <li <?php echo $val_sp['diem_danh_gia'] >= 2 ? '' : 'class="no-star"' ?> >
                                                                        <i class="fa fa-star-o"></i></li>
                                                                    <li <?php echo $val_sp['diem_danh_gia'] >= 3 ? '' : 'class="no-star"' ?> >
                                                                        <i class="fa fa-star-o"></i></li>
                                                                    <li <?php echo $val_sp['diem_danh_gia'] >= 4 ? '' : 'class="no-star"' ?> >
                                                                        <i class="fa fa-star-o"></i></li>
                                                                    <li <?php echo $val_sp['diem_danh_gia'] >= 5 ? '' : 'class="no-star"' ?> >
                                                                        <i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name"
                                                           href="?ctrl=product<?php echo '&id=' . $val_sp['id_loai'] ?>"><?php echo $val_new['ten_sp'] . " - " . $val_new['loai'] ?></a>
                                                    </h4>

                                                    <div class="price-box">
                                                        <span class="new-price"><?php echo currency_format($val_sp['gia']) ?></span>
                                                    </div>

                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a
                                                                    href="?act=add&dm=gio_hang<?php echo '&id=' . $val_sp['id_loai'] ?>">Thêm
                                                                vào giỏ</a></li>
                                                        <li><a class="links-details"
                                                               href="?act=add&dm=yeu_thich&id=<?php echo $val_sp['id_loai'] ?>"><i
                                                                        class="fa fa-heart-o"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>
        

    
        
        

        
