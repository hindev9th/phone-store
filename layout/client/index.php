<!doctype html>
<html class="no-js" lang="zxx">



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DAT-G mobie</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="public/client/image/menu/flag-icon/icon"
        href="public/client/images/menu/flag-icon/icon.png">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="public/client/css/material-design-iconic-font.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/client/css/font-awesome.min.css">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="public/client/css/fontawesome-stars.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="public/client/css/meanmenu.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="public/client/css/owl.carousel.min.css">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="public/client/css/slick.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="public/client/css/animate.css">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="public/client/css/jquery-ui.min.css">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="public/client/css/venobox.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="public/client/css/nice-select.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="public/client/css/magnific-popup.css">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="public/client/css/bootstrap.min.css">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="public/client/css/helper.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="public/client/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="public/client/css/responsive.css">
    <!-- Modernizr js -->
    <script src="public/client/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="public/client/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="public/client/js/jquery.validate.min.js"></script>

</head>

<body>
    <div class="container-fluid" id="box-loading">
        <div class="box-loading-sub">
            <div class="vbox-preloader"><div class="sk-wave"><div class="sk-rect sk-rect1" style="background-color: rgb(203, 154, 0);"></div><div class="sk-rect sk-rect2" style="background-color: rgb(203, 154, 0);"></div><div class="sk-rect sk-rect3" style="background-color: rgb(203, 154, 0);"></div><div class="sk-rect sk-rect4" style="background-color: rgb(203, 154, 0);"></div><div class="sk-rect sk-rect5" style="background-color: rgb(203, 154, 0);"></div></div></div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#box-loading').hide();
        });
    </script>
    <div class="body-wrapper">
        <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 10px; bottom: 15px;" id="box-toast">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" style="opacity: 1">
                <div class="toast-header">
                    <img src="..." class="rounded mr-2" alt="...">
                    <strong class="mr-auto">Bootstrap</strong>
                    <small>11 mins ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" id="btn-toast-close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body" >

                </div>
            </div>
        </div>
        <script>$('#box-toast').hide()</script>
        <!-- header -->
        <header>

            <div class="header-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-4">
                            <div class="header-top-left">
                                <ul class="phone-wrap">
                                    <li><span>Số điện thoại liên hệ:</span><a href="#"> 0865198651 </a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8">
                            <div class="header-top-right">
                                <ul class="ht-menu">
                                    <?php if(isset($_SESSION['customer'])){ ?>
                                    <li>
                                        <div class="ht-setting-trigger"><span><i class="fa fa-user"
                                                    aria-hidden="true"></i>
                                                <?= $_SESSION['customer']['ho_ten']  ?>
                                            </span></div>
                                        <div class="setting ht-setting">
                                            <ul class="ht-setting-list">
                                                <li><a href="?ctrl=Users&atc=account">Tài khoản</a></li>
                                                <li><a href="?ctrl=Users&atc=order">Đơn hàng</a></li>
                                                <li><a href="?act=logout">Đăng xuất</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php }else{ ?>
                                    <li>
                                        <a href="?ctrl=Login_register">Đăng ký</a>
                                    </li>

                                    <li>
                                        <a href="?ctrl=Login_register">Đăng Nhập</a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="logo pb-sm-30 pb-xs-30">
                                <a href="?">
                                    <img src="public/client/images/menu/logo/logo1.png" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">

                            <form action="?ctrl=Product_List&act=search" class="hm-searchbox" method="get">
                                <input type="hidden" name="ctrl" value="Product_List">
                                <input type="hidden" name="act" value="search">
                                <input type="text" placeholder="Tìm kiếm ..." name="name">
                                <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>

                            <?php $tong=0; ?>
                            <div class="header-middle-right">
                                <ul class="hm-menu">
                                    <li class="hm-wishlist">
                                        <a href="?ctrl=Wishlist">
                                            <span class="cart-item-count wishlist-item-count">
                                                <?php echo isset($yeu_thich) ? $yeu_thich : 0 ?>
                                            </span>
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                    </li>
                                    <li class="hm-minicart">

                                        <span></span>
                                        <div class="minicart">
                                            <ul class="minicart-product-list">
                                                <?php 
                                               if(isset($_SESSION['gio_hang']))
                                                foreach($_SESSION['gio_hang'] as $id_sp => $sl){ 
                                                    $data_gh = $this->Model->fetchOne("select * from sp_view where id_loai = '$id_sp'");?>
                                                <li>
                                                    <a href="?ctrl=Product<?php echo '&id='.$id_sp ?>" class="minicart-product-image">
                                                        <img src="public/Upload/Products/<?php echo $data_gh['anh'] ?>"
                                                            alt="cart products">
                                                    </a>
                                                    <div class="minicart-product-details">
                                                        <h6><a href="?ctrl=Product<?php echo '&id='.$id_sp ?>">
                                                                <?php echo $data_gh['ten_sp'] ?>
                                                            </a></h6>
                                                        <span>
                                                            <?php echo currency_format($data_gh['gia'])." x ".$sl ?>
                                                        </span>
                                                    </div>
                                                    <a href="?act=delete&dm=gio_hang<?php echo '&id='.$id_sp ?>"
                                                        class="close" title="Remove">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </li>

                                                <?php $tong += $data_gh['gia']*$sl; } ?>
                                            </ul>
                                            <p class="minicart-total">Tổng: <span>
                                                    <?php echo currency_format($tong) ?>
                                                </span></p>
                                            <div class="minicart-button">
                                                <a href="?ctrl=Cart"
                                                    class="li-button li-button-fullwidth li-button-dark">
                                                    <span>Xem giỏ hàng</span>
                                                </a>
                                                <a href="?ctrl=Checkout" class="li-button li-button-fullwidth">
                                                    <span>Thanh toán</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="hm-minicart-trigger">
                                            <span class="cart-item-count">
                                                    <?php echo isset($_SESSION['gio_hang']) ? count($_SESSION['gio_hang']) : 0 ?>
                                                </span>
                                            <span class="item-icon"></span>
                                            <span class="item-text">
                                                <?php echo currency_format($tong) ?>

                                            </span>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="hb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="?">Trang chủ</a></li>

                                        <li class="dropdown-holder"><a href="?ctrl=Product_List">Danh mục</a>
                                            <ul class="hb-dropdown">
                                                <?php foreach($data_dmm as $val_dm){ ?>
                                                <li><a
                                                        href="?ctrl=Product_List&act=sp&dm=<?php echo $val_dm['id'] ?>">
                                                        <?php echo $val_dm['ten_dm'] ?>
                                                    </a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li><a href="?ctrl=Contact">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                <div class="container">
                    <div class="row">
                        <div class="mobile-menu">
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <?php if (file_exists($ctrl)){
            include $ctrl;
        }
        
        ?>


        <!-- footer -->
        <div class="footer">

            <div class="footer-static-top">
                <div class="container">

                    <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                        <div class="row">


                        </div>
                    </div>

                </div>
            </div>

            <div class="footer-static-middle">
                <div class="container">
                    <div class="footer-logo-wrap pt-50 pb-35">
                        <div class="row">
                            <!-- Begin Footer Logo Area -->
                            <div class="col-lg-4 col-md-6">
                                <div class="footer-logo">
                                    <img src="public/client/images/menu/logo/logo1.png" alt="Footer Logo">
                                    <p class="info">
                                        Thương hiệu triệu niềm tin!
                                    </p>
                                </div>
                                <ul class="des">
                                    <li>
                                        <span>Địa chỉ: </span> Phù lộc,Phù chẩn,Từ sơn,Bắc ninh
                                    </li>
                                    <li>
                                        <span>Phone: </span>
                                        <a href="#">0865198651</a>
                                    </li>
                                    <li>
                                        <span>Email: </span>
                                        <a href="mailto://nguyenhien080900@gmail.com">nguyenhien080900@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Footer Logo Area End Here -->
                            <!-- Begin Footer Block Area -->
                            <div class="col-lg-2 col-md-3 col-sm-6">
                                <div class="footer-block">
                                    <h3 class="footer-block-title">Sản phẩm</h3>
                                    <ul>
                                        <li><a href="?">Sản phẩm mới</a></li>
                                        <li><a href="?">Sản phẩm nổi bật</a></li>
                                        <li><a href="?">Sản phẩm bán chạy</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-3 col-sm-6">
                                <div class="footer-block">
                                    <h3 class="footer-block-title">Về chúng tôi</h3>
                                    <ul>
                                        <li><a href="?ctrl=Contact">Liên hệ</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="footer-block">
                                    <h3 class="footer-block-title">Bản đồ</h3>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m20!1m8!1m3!1d573.7500129699481!2d105.97601823179608!3d21.096306544311247!3m2!1i1024!2i768!4f13.1!4m9!3e2!4m3!3m2!1d21.096202599999998!2d105.9757147!4m3!3m2!1d21.096202599999998!2d105.9757145!5e1!3m2!1svi!2sus!4v1658038826017!5m2!1svi!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-static-bottom pt-55 pb-55">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="copyright text-center pt-25">
                                <span><a href="" target="_blank"></a></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>


    <!-- Body Wrapper End Here -->
    <!-- jQuery-V1.12.4 -->
    <script src="public/client/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Popper js -->
    <script src="public/client/js/vendor/popper.min.js"></script>
    <!-- Bootstrap V4.1.3 Fremwork js -->
    <script src="public/client/js/bootstrap.min.js"></script>
    <!-- Ajax Mail js -->
    <script src="public/client/js/ajax-mail.js"></script>
    <!-- Meanmenu js -->
    <script src="public/client/js/jquery.meanmenu.min.js"></script>
    <!-- Wow.min js -->
    <script src="public/client/js/wow.min.js"></script>
    <!-- Slick Carousel js -->
    <script src="public/client/js/slick.min.js"></script>
    <!-- Owl Carousel-2 js -->
    <script src="public/client/js/owl.carousel.min.js"></script>
    <!-- Magnific popup js -->
    <script src="public/client/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope js -->
    <script src="public/client/js/isotope.pkgd.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="public/client/js/imagesloaded.pkgd.min.js"></script>
    <!-- Mixitup js -->
    <script src="public/client/js/jquery.mixitup.min.js"></script>
    <!-- Countdown -->
    <script src="public/client/js/jquery.countdown.min.js"></script>
    <!-- Counterup -->
    <script src="public/client/js/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script src="public/client/js/waypoints.min.js"></script>
    <!-- Barrating -->
    <script src="public/client/js/jquery.barrating.min.js"></script>
    <!-- Jquery-ui -->
    <script src="public/client/js/jquery-ui.min.js"></script>
    <!-- Venobox -->
    <script src="public/client/js/venobox.min.js"></script>
    <!-- Nice Select js -->
    <script src="public/client/js/jquery.nice-select.min.js"></script>
    <!-- ScrollUp js -->
    <script src="public/client/js/scrollUp.min.js"></script>
    <!-- Main/Activator js -->
    <script src="public/client/js/main.js"></script>
</body>

<!-- index30:23-->

</html>