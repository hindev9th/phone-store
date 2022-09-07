<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Trang chủ</a></li>
                <li><a href="">Tài khoản</a></li>
                <li class="active">Đơn hàng</li>
            </ul>
        </div>
    </div>
</div>

<div class="wishlist-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(count($data) > 0) { ?>
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">STT</th>
                                    <th class="li-product-thumbnail">Hình ảnh</th>
                                    <th class="cart-product-name">Tên sản phẩm</th>
                                    <th class="cart-product-name">Loại</th>
                                    <th class="cart-product-name">Màu</th>
                                    <th class="li-product-price">Giá</th>
                                    <th class="li-product-price">Thành tiền</th>
                                    <th class="li-product-stock-status">Tình trạng</th>
                                    <th class="li-product-add-cart">Yêu cầu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt =0;
                                foreach ($data as $value) {  $stt++;
                                     $tinh_trang = $this->Model->fetchOne("select * from dh_tinh_trang where id = '".$value['id_tinh_trang']."'");
                                    $product_data = $this->Model->fetchOne("select * from sp_view where id_loai = '".$value['id_loai']."'");
                                    ?>
                                <tr>
                                    <td><?= $stt ?></td>
                                    <td class="li-product-thumbnail"><a href="?ctrl=Product&masp=<?=$value['ma_sp']?>&loai=<?=$value['loai']?>&mau=<?=$value['mau']?>"><img
                                                src="public/Upload/Products/<?=$product_data['anh']?>" alt="" width="100px"></a></td>
                                    <td class="li-product-name"><a href="#"><?=isset($value['ten_sp']) ? $value['ten_sp'] : ''?></a></td>
                                    <td><?=isset($value['loai']) ? $value['loai'] : ''?></td>
                                    <td><?=isset($value['mau']) ? $value['mau'] : ''?></td>
                                    <td class="li-product-price"><span class="amount"><?=isset($value['gia']) ? $value['gia'] : ''?></span></td>
                                    <td class="li-product-price"><span class="amount"><?=isset($value['thanh_tien']) ? $value['thanh_tien'] : ''?></span></td>
                                    <td class="li-product-stock-status"><span class="in-stock"><?= isset($tinh_trang['mo_ta']) ? $tinh_trang['mo_ta'] : ''?></span>
                                    </td>
                                    <td class="li-product-add-cart"><a href="#">Hủy đơn</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php }
                else{ ?>
                    <h3 class="text-secondary">Bạn chưa có đơn hàng nào cả!</h3>
                    <a href="?" class="text-warning">Hãy mua sắm ngay bây giờ nào >></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>