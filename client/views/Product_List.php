<?php 
    $act = isset($_GET['act']) ? "&act=".$_GET['act'] : "";
    $nm = isset($_GET['name']) ? "&name=".$_GET['name'] : "";
    $dm = isset($_GET['dm']) ? "&dm=".$_GET['dm'] : "";
    $th = isset($_GET['th']) ? "&th=".$_GET['th'] : "";
    $act_str = $act.$nm.$dm.$th; 
?>
<div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="?">Trang chủ</a></li>
                        <li class="active"><a href="?ctrl=Product_List">Danh sách sản phẩm</a></li>
                        <?php echo isset($_GET['act']) && $_GET['act'] != null ? '<li class="active">'.$act_name.'</li>' : '' ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="content-wraper pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-1 order-lg-2">

                        <div class="shop-top-bar mt-30">
                            <div class="shop-bar-inner">
                                <div class="product-view-mode">
                                    <!-- shop-item-filter-list start -->
                                    <ul class="nav shop-item-filter-list" role="tablist">
                                        <li class="active" role="presentation"><a aria-selected="true"
                                                class="active show" data-toggle="tab" role="tab"
                                                aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a>
                                        </li>
                                        <li role="presentation"><a data-toggle="tab" role="tab"
                                                aria-controls="list-view" href="#list-view"><i
                                                    class="fa fa-th-list"></i></a></li>
                                    </ul>

                                </div>
                                <div class="toolbar-amount">

                                </div>
                            </div>

                            <div class="product-select-box">
                                <div class="product-short">
                                    <p>Sắp xếp:</p>
                                    <select class="nice-select" onchange="location = this.value;">
                                        <option value="?ctrl=Product_List<?php echo empty($act_str) ? "" : $act_str ?>" <?php echo isset($_GET['order']) ? '' : 'selected="selected"' ?>>Nổi bật</option>
                                        <option value="?ctrl=Product_List<?php echo empty($act_str) ? "" : $act_str ?>&order=az" <?php echo isset($_GET['order']) && $_GET['order'] == "az" ? 'selected="selected"' : '' ?> >Theo tên (A - Z)</option>
                                        <option value="?ctrl=Product_List<?php echo empty($act_str) ? "" : $act_str ?>&order=za" <?php echo isset($_GET['order']) && $_GET['order'] == "za" ? 'selected="selected"' : '' ?> >Theo tên (Z - A)</option>
                                        <option value="?ctrl=Product_List<?php echo empty($act_str) ? "" : $act_str ?>&order=gial" <?php echo isset($_GET['order']) && $_GET['order'] == "gial" ? 'selected="selected"' : '' ?> >Giá (Thấp &gt; Cao)</option>
                                        <option value="?ctrl=Product_List<?php echo empty($act_str) ? "" : $act_str ?>&order=giah" <?php echo isset($_GET['order']) && $_GET['order'] == "giah" ? 'selected="selected"' : '' ?> >Giá (Cao &gt; Thấp)</option>
                                        <option value="?ctrl=Product_List<?php echo empty($act_str) ? "" : $act_str ?>&order=rate" <?php echo isset($_GET['order']) && $_GET['order'] == "rate" ? 'selected="selected"' : '' ?> >Đánh giá</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        
                        <div class="shop-products-wrapper">
                            <div class="tab-content">
                                <div id="grid-view" class="tab-pane fade product-list-view active show" role="tabpanel">
                                    <div class="product-area shop-product-area">
                                        <div class="row">
                                            <?php foreach($data as $values){ 
                                                $dm = $this->Model->fetchOne("select * from danh_muc where id = '".$values['id_dm']."'");?>
                                            <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="?ctrl=Product<?php echo'&id='.$values['id_loai'] ?>">
                                                            <img src="public/Upload/Products/<?php echo $values['anh'] ?>"
                                                                alt="Li's Product Image">
                                                        </a>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">
                                                                    <a href="?ctrl=Product_List&act=sp&dm=<?php echo $dm['id'] ?>"><?php echo $dm['ten_dm'] ?></a>
                                                                </h5>
                                                                <div class="rating-box">
                                                                    <ul class="rating">
                                                                        
                                                                        <li <?php echo $values['diem_danh_gia'] >=1 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                        <li <?php echo $values['diem_danh_gia'] >=2 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                        <li <?php echo $values['diem_danh_gia'] >=3 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                        <li <?php echo $values['diem_danh_gia'] >=4 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i>
                                                                        </li>
                                                                        <li <?php echo $values['diem_danh_gia'] >=5 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h4><a class="product_name"
                                                                    href="?ctrl=Product<?php echo '&id='.$values['id_loai'] ?>"><?php echo $values['ten_sp'] ?></a>
                                                            </h4>
                                                            <div class="price-box">
                                                                <span class="new-price"><?php echo currency_format($values['gia']) ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="add-actions">
                                                            <ul class="add-actions-link">
                                                                <li class="add-cart active"><a
                                                                        href="?ctrl=Product_List&act=add&dm=gio_hang<?php echo '&id='.$values['id_loai'] ?>">Thêm vào giỏ</a></li>
                                                                <li><a class="links-details" href="?ctrl=Product_List&act=add&dm=yeu_thich&id=<?php echo $values['id_loai'] ?>"><i
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
                                <div id="list-view" class="tab-pane fade " role="tabpanel">
                                    <div class="row">
                                        <div class="col">
                                            <?php foreach($data as $values){ 
                                                $dm = $this->Model->fetchOne("select* from danh_muc where id = '".$values['id_dm']."'");?>
                                            <div class="row product-layout-list">
                                                <div class="col-lg-3 col-md-5 ">
                                                    <div class="product-image">
                                                        <a href="?ctrl=Product<?php echo '&id='.$values['id_loai'] ?>">
                                                            <img src="public/Upload/Products/<?php echo $values['anh'] ?>"
                                                                alt="Li's Product Image">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-7">
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">
                                                                    <a href="?ctrl=Product_List&act=sp&dm=<?php echo $dm['id'] ?>"><?php echo $dm['ten_dm'] ?></a>
                                                                </h5>
                                                                <div class="rating-box">
                                                                    <ul class="rating">
                                                                        <li <?php echo $values['diem_danh_gia'] >=1 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                        <li <?php echo $values['diem_danh_gia'] >=2 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                        <li <?php echo $values['diem_danh_gia'] >=3 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i></li>
                                                                        <li <?php echo $values['diem_danh_gia'] >=4 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i>
                                                                        </li>
                                                                        <li <?php echo $values['diem_danh_gia'] >=5 ? '' : 'class="no-star"' ?> ><i class="fa fa-star-o"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h4><a class="product_name"
                                                                    href="?ctrl=Product<?php echo '&id='.$values['id_loai'] ?>"><?php echo $values['ten_sp'] ?></a></h4>
                                                            <div class="price-box">
                                                                <div class="price-box">
                                                                    <span class="new-price"><?php echo currency_format($values['gia']) ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-desc">
                                                                <p>
                                                                    <span class="short-text"><?= $values['mo_ta_ngan'] ?>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="shop-add-action mb-xs-30">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart"><a href="?ctrl=Product_List&act=add&dm=gio_hang&dm=gio_hang<?php echo '&id='.$values['id_loai'] ?>">Thêm vào giỏ</a></li>
                                                            <li class="wishlist"><a href="?ctrl=Product_List&act=add&dm=gio_hang&dm=yeu_thich&id=<?php echo $values['id_loai'] ?>"><i
                                                                        class="fa fa-heart-o"></i>Thêm vào yêu thích</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="paginatoin-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <ul class="pagination-box">
                                                
                                                <?php if($pg > 1  ) {?>
                                                    <li>
                                                        <a href="?ctrl=Product_List<?php echo (empty($act_str) ? '' : $act_str).'&pg='.($pg > 0 ? $pg-=1 : $pg )?>" class="Previous"> Trước <i class="fa fa-chevron-left"></i></a>
                                                    </li>
                                                <?php } ?>

                                                <?php $count_dt = ceil(count($data_nb)/$nb_item); $stt=1;
                                                    $i=1; if(isset($_GET['pg']) && $_GET['pg'] > 1){ $i = $_GET['pg']-1; }
                                                    while ( $i <= $count_dt) { ?>
                                                        <li <?php echo isset($_GET['pg']) ? ($_GET['pg'] == $i ? 'class="active"' : '') : ($pg == $i ? 'class="active"' : '') ?> >
                                                            <a href="?ctrl=Product_List<?php echo (empty($act_str) ? '' : $act_str).'&pg='.$i ?>">
                                                                <?php echo $i ?>
                                                            </a>
                                                        </li>
                                                        
                                                <?php if($stt >= 3)break; $i++; $stt++; } ?>

                                                <?php if($pg < $count_dt-1 ) {?>
                                                    <li>
                                                        <a href="?ctrl=Product_List<?php echo (empty($act_str) ? '' : $act_str).'&pg='.($pg < $count_dt ? (isset($_GET['pg']) ? $_GET['pg'] +=1 : $pg+=1 ) : $pg) ?>" class="Next">
                                                            Tiếp 
                                                            <i class="fa fa-chevron-right"></i>
                                                        </a>
                                                    </li>
                                                <?php }  ?>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop-products-wrapper end -->
                    </div>
                    <div class="col-lg-3 order-2 order-lg-1">
                        <!--sidebar-categores-box start  -->
                        <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                            <div class="sidebar-title">
                                <h2>Danh mục</h2>
                            </div>
                            <!-- category-sub-menu start -->
                            <div class="category-sub-menu">
                                <ul>
                                    <?php foreach($data_dm as $val_dm){
                                        $data_th = $this->Model->fetch("select * from thuong_hieu where id_dm='".$val_dm['id']."'");?>
                                    <li class="has-sub"><a href="?ctrl=Product_List&act=sp&dm=<?php echo $val_dm['id'] ?>"><?php echo $val_dm['ten_dm'] ?></a>
                                        <ul>
                                            <?php foreach($data_th as $val_th){ ?>
                                            <li><a href="?ctrl=Product_List&act=sp&dm=<?php echo $val_dm['id'] ?>&th=<?php echo $val_th['id'] ?>" > <?php echo $val_th['ten_th'] ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- category-sub-menu end -->
                        </div>

                    </div>
                </div>
            </div>
        </div>

