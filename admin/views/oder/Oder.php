<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-shopping-cart"></i> Đơn hàng/Danh sách đơn hàng
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-2">
        <select name="" id="" class="form-control" onchange="location = this.value;">
            <option value="index.php?ctrl=oder/Oder&act=select&sl=25" <?php echo isset($_GET['sl']) && $_GET['sl'] == 25 ? 'selected="selected"' : "" ?>>Hiển thị 25</option>
            <option value="index.php?ctrl=oder/Oder&act=select&sl=50" <?php echo isset($_GET['sl']) && $_GET['sl'] == 50 ? 'selected="selected"' : "" ?>>Hiển thị 50</option>
            <option value="index.php?ctrl=oder/Oder&act=select&sl=100" <?php echo isset($_GET['sl']) && $_GET['sl'] == 100 ? 'selected="selected"' : "" ?>>Hiển thị 100</option>
        </select>
    </div>
    <div class="col-xs-6"></div>
    <div class="col-xs-4">
        <form action="index.php?ctrl=oder/Oder&act=search" style="margin-bottom:10px;" method="post">
          <div class="input-group">
            <input type="text" name="search" id="input_search" class="form-control" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>
    </div>
</div>
<div class="row">
        <div class="col-xs">
        
            <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách đơn hàng</div>
                    <Div class="panel-body text-center">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>STT</td>
                                    <td>Mã đơn hàng</td>
                                    <td>Mã sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Màu</td>
                                    <td>Số lượng</td>
                                    <td>Thành tiền</td>
                                    <td>Thanh toán</td>
                                    <td>Thời gian đặt</td>
                                    <td width="200px">Tình trạng</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $stt=0;
                                    foreach ($data as $value) { 
                                        $stt++;
                                ?>
                                <tr>
                                    <td width="40px"><?php echo $stt ?></td>
                                    <td>
                                        <a href="index.php?ctrl=oder/Info&act=edit&id=<?= $value['id'] ?>" >
                                            <?php echo $value['ma_dh'] ?>
                                        </a>
                                    </td>
                                    <td><?php echo $value['ma_sp'] ?></td>
                                    <td><?php echo $value['ten_sp'] ?></td>
                                    <td><?php echo $value['mau'] ?></td>
                                    <td><?php echo $value['so_luong'] ?></td>
                                    <td><?php echo currency_format($value['gia']) ?></td>
                                    <td><?php echo currency_format($value['thanh_tien']) ?></td>
                                    <td><?php echo $value['thoi_gian_dh'] ?></td>
                                    <td>
                                        <select name="Tinh_Trang" class="form-control" onchange="location = this.value;">
                                            <?php foreach($dataTT as $val){ ?>
                                                <option value="index.php?ctrl=oder/Oder&act=do_edit&id=<?php echo $value['id'] ?>&id_tt=<?php echo $val['id'] ?>" <?php echo $value['id_tinh_trang']==$val['id'] ? 'selected=selected' : '' ?> >
                                                <?php echo $val['mo_ta'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="index.php?ctrl=oder/Info&act=edit&id=<?= $value['id'] ?>" class="btn btn-info">
                                            Xem thêm
                                        </a>
                                    </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </Div>
            </div>
        </div>