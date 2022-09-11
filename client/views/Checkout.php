<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="?">Trang chủ</a></li>
                <li class="active">Thanh toán</li>
            </ul>
        </div>
    </div>
</div>
<?php if(isset($_SESSION['gio_hang']) && count($_SESSION['gio_hang']) > 0) { ?>
<form action="?ctrl=Checkout&" method="post">
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">

                    <div class="checkbox-form">
                        <h3>Thông tin giao hàng</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Mã đơn hàng <span class="required">*</span></label>
                                    <input placeholder="" name="ma_dh" readonly value="<?php echo date(" YmdHis") ?>" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Họ và tên <span class="required">*</span></label>
                                    <input placeholder="abc..." name="ho_ten" required value="<?php echo $data['ho_ten'] ?>" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ <span class="required">*</span></label>
                                    <input name="dia_chi" placeholder="Địa chỉ nhận hàng..." required value="<?php echo $data['dia_chi'] ?>"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input name="sdt" type="text" value="<?php echo $data['sdt'] ?>" required placeholder="099...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Yêu cầu khác <span class="required">*</span></label>
                                    <textarea name="yeu_cau" placeholder="Yêu cầu khác (không bắt buộc)"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>Đơn hàng của bạn</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Sản phẩm</th>
                                        <th class="cart-product-total">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sum = 0;
                                    if(isset($_SESSION['gio_hang'])){
                                        foreach($_SESSION['gio_hang'] as $id_sp => $sl){ 
                                            $data_sp = $this->Model->fetchOne("select * from sp_view where id_loai = '$id_sp'");
                                            $total_new = $data_sp['gia_giam'];
                                            $total_old = $data_sp['gia'];
                                            $percent = round($total_old / ($total_old + $total_new) * 100);?>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">
                                            <?php echo $data_sp['ten_sp']."-".$data_sp['loai']."-".$data_sp['ten_mau'] ?>
                                            <strong class="product-quantity"> ×
                                                <?php echo $sl ?>
                                            </strong>
                                        </td>
                                        <td class="cart-product-total"><span class="amount">
                                                <?php echo currency_format(($total_new > 0 ? $total_new : $total_old) * $sl) ?>
                                            </span></td>
                                    </tr>
                                    <?php $sum +=($total_new > 0 ? $total_new : $total_old) * $sl; } ?>
                                    <?php } ?>

                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Thành tiền</th>
                                        <td><span class="amount">
                                                <?php echo currency_format($sum) ?>
                                            </span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng thành tiền</th>
                                        <td><strong><span class="amount">
                                                    <?php echo currency_format($sum) ?>
                                                </span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 class="panel-title">
                                                <a class="" data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    Thanh toán khi nhận hàng
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Thực hiện thanh toán của bạn khi đơn hàng được giao đến tay bạn.</p>
                                            </div>
                                            <div class="order-button-payment">
                                                <input value="Thanh toán khi nhận hàng" name="TToff" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php }
else{ ?>
        <div class="container mt-2 mb-2">
            <h3 class="text-secondary">Bạn chưa có đơn hàng nào cả !</h3>
            <a href="?" class="text-warning">Hãy đi mua sắm ngay thôi >></a>
        </div>
<?php }?>
