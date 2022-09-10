<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Người dùng
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i> Người dùng/Danh sách khách hàng
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-2">
        <select name="" id="" class="form-control" onchange="location = this.value;">
            <option value="index.php?ctrl=users/Customer&act=select&sl=25" <?= isset($_GET['sl']) && $_GET['sl'] == 25 ? 'selected="selected"' : "" ?> >
                Hiển thị 25
            </option>
            <option value="index.php?ctrl=users/Customer&act=select&sl=50" <?= isset($_GET['sl']) && $_GET['sl'] == 50 ? 'selected="selected"' : "" ?> >
                Hiển thị 50
            </option>
            <option value="index.php?ctrl=users/Customer&act=select&sl=100" <?= isset($_GET['sl']) && $_GET['sl'] == 100 ? 'selected="selected"' : "" ?> >
                Hiển thị 100
            </option>
        </select>
    </div>
    <div class="col-xs-6"></div>
    <div class="col-xs-4">
        <form action="index.php?ctrl=users/Customer&act=search" style="margin-bottom:10px;" method="post">
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
            <div class="panel-heading">Thông tin tài khoản</div>
            <Div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td width="40px">STT</td>
                        <td width="40px">Ảnh</td>
                        <td>Họ và tên</td>
                        <td>Giới tính</td>
                        <td>Ngày Sinh</td>
                        <td>Số ĐT</td>
                        <td>Email</td>
                        <td width="55px">
                            <a href="index.php?ctrl=users/Customer&act=add"
                               class="btn btn-primary btn-sm" style="width: 100%;">Thêm</a>
                        </td>
                    </tr>
                    <?php
                    $stt = 0;
                    foreach ($data as $value) {
                        $stt++;
                        ?>
                        <tr>
                            <td width="40px"><?= $stt ?></td>
                            <td><img src="../public/Upload/Avatar/<?= $value['anh'] ?>" class="img-responsive" alt="avt"
                                     width="100px"></td>
                            <td><?= $value['ho_ten'] ?></td>
                            <td><?= $value['gioi_tinh'] ?></td>
                            <td><?= $value['ngay_sinh'] ?></td>
                            <td><?= $value['sdt'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td>
                                <a href="index.php?ctrl=users/Customer&act=edit&id=<?= $value['id'] ?>"
                                   class="btn btn-success btn-sm" style="width: 100%;">Xem</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </Div>
        </div>
    </div>

    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</div>