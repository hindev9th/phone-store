<style>
    .row{
        padding: 15px;
        margin: 5px;
        border: 1px solid #f2f2f2;
    }
</style>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-shopping-cart"></i> Đơn hàng/Thông tin đơn hàng
            </li>
        </ol>
    </div>
</div>

<?php if (isset($data)) { ?>
    <div class="row">
        <div class="col-md-6">
            <h4>Thông tin khách hàng</h4>
            <div class="row">
                <div class="col-md-6">
                    <span>Họ tên khách hàng</span>
                </div>
                <div class="col-md-6">
                    <span><?= $data['ho_ten'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span>Số điện thoại</span>
                </div>
                <div class="col-md-6">
                    <span><?= $data['sdt'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span>Địa chỉ</span>
                </div>
                <div class="col-md-6">
                    <span><?= $data['dia_chi'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span>Yêu cầu khác</span>
                </div>
                <div class="col-md-6">
                    <span><?= $data['yeu_cau'] ?></span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <h4>Thông tin đơn hàng</h4>
            <div class="row">
                <div class="col-md-6">
                    <span>Mã đơn hàng</span>
                </div>
                <div class="col-md-6">
                    <span><?= $data['ma_dh'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span>Thời gian đặt</span>
                </div>
                <div class="col-md-6">
                    <span><?= $data['thoi_gian_dh'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span>Mã sản phẩm</span>
                </div>
                <div class="col-md-6">
                    <span><?= $data['ma_sp'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span>Tên sản phẩm</span>
                </div>
                <div class="col-md-6">
                    <span><?= $data['ten_sp'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span>Loại</span>
                </div>
                <div class="col-md-6">
                    <span><?= $data['loai'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span>Màu sắc</span>
                </div>
                <div class="col-md-6">
                    <span><?= $data['mau'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span>Số lượng</span>
                </div>
                <div class="col-md-6">
                    <span><?= $data['so_luong'] ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span>Giá sản phẩm</span>
                </div>
                <div class="col-md-6">
                    <span><?= currency_format($data['gia']) ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <span>Thành tiền</span>
                </div>
                <div class="col-md-6">
                    <span><?= currency_format($data['thanh_tien']) ?></span>
                </div>
            </div>
        </div>
    </div>


    <span>Tình trạng đơn hàng</span>
    <select name="Tinh_Trang" class="form-control" onchange="location = this.value;">
        <?php foreach ($dataTT as $val) { ?>
            <option value="index.php?ctrl=oder/Info&act=do_edit&id=<?php echo $data['id'] ?>&id_tt=<?php echo $val['id'] ?>" <?php echo $data['id_tinh_trang'] == $val['id'] ? 'selected=selected' : '' ?> >
                <?php echo $val['mo_ta'] ?>
            </option>
        <?php } ?>
    </select>
<?php } ?>