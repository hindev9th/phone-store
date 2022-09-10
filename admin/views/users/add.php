<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Người dùng
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i> Người dùng/Thông tin
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form action="?ctrl=users/Account&atc=save&id=<?= $data['id'] ?? '' ?>" method="post"
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-md"></div>
                <div class="col-md d-flex justify-content-center">
                    <div class="image-upload border rounded">
                        <label for="file-input">
                            <img id="previewImg"
                                 src="../public/Upload/Avatar/<?= $data['anh'] ?? 'pr/avt-pr.jpg' ?>"
                                 class=" previewImg" width="150px" height="150px" alt="ảnh avatar"/>
                        </label>
                        <input type="hidden" name="anh"
                               value="<?= $data['anh'] ?? 'pr/avt-pr.jpg' ?>">
                        <input id="file-input" name="img_avt" type="file" onchange="loadFile(event)"
                               style="display: none;"/>
                    </div>
                </div>
                <div class="col-md"></div>
            </div>
            <h4 class="title text-secondary border-bottom mt-3" style="margin-top: 15px;">Thông tin cơ bản</h4>
            <div class="row mt-2">
                <div class="col-md">
                    <span>Họ tên</span>
                    <input type="text" name="ho_ten" value="<?= $data['ho_ten'] ?? '' ?>" class="form-control mb-2">
                    <span>Giới tính</span>
                    <select name="gioi_tinh" class="form-control mb-2">
                        <option value="Nam" <?= isset($data['gioi_tinh']) && $data['gioi_tinh'] == 'Nam' ? 'selected' : '' ?>>
                            Nam
                        </option>
                        <option value="Nữ" <?= isset($data['gioi_tinh']) && $data['gioi_tinh'] == 'Nữ' ? 'selected' : '' ?>>
                            Nữ
                        </option>
                        <option value="Khác" <?= isset($data['gioi_tinh']) && $data['gioi_tinh'] == 'Khác' ? 'selected' : '' ?>>
                            Khác
                        </option>
                    </select>
                </div>
                <div class="col-md">
                    <span>Năm sinh</span>
                    <input type="date" name="ngay_sinh" class="form-control" value="<?= $data['ngay_sinh'] ?? '' ?>">
                </div>
            </div>
            <h4 class="title text-secondary border-bottom mt-3" style="margin-top: 20px;">Thông tin nâng cao</h4>
            <div class="row">
                <div class="col-md">
                    <span>Số điện thoại</span>
                    <input type="number" name="sdt" class="form-control mb-2" value="<?= $data['sdt'] ?? '' ?>">
                    <span>Email</span>
                    <input type="text" name="email" readonly class="form-control mb-2"
                           value="<?= $data['email'] ?? '' ?>">
                    <span>Địa chỉ</span>
                    <input type="text" name="dia_chi" value="<?= $data['dia_chi'] ?? '' ?>" class="form-control">
                    <span>Mật khẩu mới</span>
                    <input type="text" name="password" required class="form-control mb-2">
                    <span>Nhập lại mật khẩu</span>
                    <input type="text" name="password" required class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2" style="margin-top: 20px;">Lưu</button>
        </form>
    </div>
</div>

<script>
    var loadFile = function (event) {
        var output = document.getElementById('previewImg');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>