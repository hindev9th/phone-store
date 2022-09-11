<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="?">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ul>
        </div>
    </div>
</div>
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="?ctrl=Cart&act=update" method="post">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="li-product-remove">Xóa</th>
                                <th class="li-product-thumbnail">Hình ảnh</th>
                                <th class="cart-product-name">Tên sản phẩm</th>
                                <th class="cart-product-name">Loại</th>
                                <th class="cart-product-name">Màu sắc</th>
                                <th class="li-product-price">Giá</th>
                                <th class="li-product-quantity">Số lượng</th>
                                <th class="li-product-subtotal">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $tong = 0;
                            if (isset($_SESSION['gio_hang']))
                                foreach ($_SESSION['gio_hang'] as $id_sp => $sl) {
                                    $data_gh = $this->Model->fetchOne("select * from sp_view where id_loai = '$id_sp'");
                                    $total_new = $data_gh['gia_giam'];
                                    $total_old = $data_gh['gia'];
                                    $percent = round($total_old / ($total_old + $total_new) * 100); ?>
                                    <input type="hidden" name="idSP[]" value="<?php echo $id_sp ?>">
                                    <tr>
                                        <td class="li-product-remove"><a
                                                    href="?ctrl=Cart&dm=gio_hang&act=delete<?php echo '&id=' . $id_sp ?>"><i
                                                        class="fa fa-times"></i></a>
                                        </td>
                                        <td class="li-product-thumbnail"><a
                                                    href="?ctrl=Product<?php echo '&id=' . $id_sp ?>"><img
                                                        src="public/Upload/Products/<?php echo $data_gh['anh'] ?>"
                                                        alt="Li's Product Image" width="150px"></a></td>
                                        <td class="li-product-name"><a
                                                    href="?ctrl=Product<?php echo '&id=' . $id_sp ?>"><?php echo $data_gh['ten_sp'] ?></a>
                                        </td>
                                        <td class="li-product-name"><a><?php echo $data_gh['loai'] ?></a></td>
                                        <td class="li-product-name">
                                            <div class="border rounded m-auto"
                                                 style="height: 30px;width: 30px;background:<?php echo $data_gh['ma_mau'] ?>;"></div>
                                            <span><?php echo $data_gh['ten_mau'] ?></span>
                                        </td>
                                        <td class="li-product-price"><span
                                                    class="amount"><?php echo currency_format(($total_new > 0 ? $total_new : $total_old)) ?></span>
                                        </td>
                                        <td class="quantity">
                                            <label>Số lượng</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" name="so_luong[]"
                                                       value="<?php echo $sl ?>" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span
                                                    class="amount"><?php echo currency_format(($total_new > 0 ? $total_new : $total_old) * $sl) ?></span>
                                        </td>
                                    </tr>
                                    <?php $tong += ($total_new > 0 ? $total_new : $total_old) * $sl;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Cập nhật" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Tổng giỏ hàng</h2>
                                <ul>
                                    <li>Tổng <span><?php echo currency_format($tong) ?></span></li>
                                </ul>
                                <a href="?ctrl=Checkout">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>