<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Trang chủ</a></li>
                <li><a href="#">Tài khoản</a></li>
                <li class="active">Tài khoản của tôi</li>
            </ul>
        </div>
    </div>
</div>

<style>
    .image-upload {
        width: 150px;
        height: 150px;
    }

    .btn-update {
        background: #fed700;
        color: #242424;
        transition: all 0.5s ease-in-out;
    }

    .btn-update:hover {
        background: #242424;
        color: #fff;
        transition: all 0.5s ease-in-out;
    }
</style>
<div class="wishlist-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="?ctrl=Users&atc=update&id=<?= $data['id'] ?? '' ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md"></div>
                        <div class="col-md d-flex justify-content-center">
                            <div class="image-upload border rounded ">
                                <label for="file-input">
                                    <img id="previewImg"
                                         src="../public/Upload/Avatar/<?= $data['anh'] ?? 'pr/avt-pr.jpg' ?>"
                                         class=" previewImg" width="150px" height="150px" alt="ảnh avatar" />
                                </label>
                                <input type="hidden" name="anh"
                                       value="<?= $data['anh'] ?? 'pr/avt-pr.jpg' ?>">
                                <input id="file-input" name="img_avt" type="file" onchange="loadFile(event)"
                                       style="display: none;" />
                            </div>
                        </div>
                        <div class="col-md"></div>
                    </div>
                    <h4 class="title text-secondary border-bottom mt-3">Thông tin cơ bản</h4>
                    <div class="row mt-2">
                        <div class="col-md">
                            <span>Họ tên</span>
                            <input type="text" name="ho_ten" value="<?= $data['ho_ten'] ?? '' ?>" class="form-control mb-2">
                            <span>Địa chỉ nhận hàng</span>
                            <input type="text" name="dia_chi" value="<?=  $data['dia_chi'] ?? '' ?>" class="form-control">
                        </div>
                        <div class="col-md">
                            <span>Giới tính</span>
                            <select name="gioi_tinh" class="form-control mb-2">
                                <option value="Nam" <?= isset($data['gioi_tinh']) && $data['gioi_tinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                                <option value="Nữ" <?= isset($data['gioi_tinh']) && $data['gioi_tinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                                <option value="Khác" <?= isset($data['gioi_tinh']) && $data['gioi_tinh'] == 'Khác' ? 'selected' : '' ?>>Khác</option>
                            </select>
                            <span>Năm sinh</span>
                            <input type="date" name="ngay_sinh" class="form-control" value="<?=  $data['ngay_sinh'] ?? '' ?>">
                        </div>
                    </div>
                    <h4 class="title text-secondary border-bottom mt-3">Thông tin nâng cao</h4>
                    <div class="row">
                        <div class="col-md">
                            <span>Số điện thoại</span>
                            <input type="number" name="sdt" class="form-control mb-2" value="<?=  $data['sdt'] ?? '' ?>">
                            <span>Email</span>
                            <input type="text" name="email" readonly class="form-control mb-2" value="<?=  $data['email'] ?? '' ?>">
                            <span>Mật khẩu mới</span>
                            <input type="text" name="password" required class="form-control mb-2">
                            <span>Nhập lại mật khẩu</span>
                            <input type="text" name="password" required class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-update mt-2">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('previewImg');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>