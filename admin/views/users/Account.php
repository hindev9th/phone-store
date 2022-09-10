<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Người dùng
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i> Người dùng/Danh sách quản trị
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-2">
        <select name="" id="" class="form-control" onchange="location = this.value;">
            <option value="index.php?ctrl=users/Account&act=select&sl=25" <?= isset($_GET['sl']) && $_GET['sl'] == 25 ? 'selected="selected"' : "" ?> >Hiển thị 25</option>
            <option value="index.php?ctrl=users/Account&act=select&sl=50" <?= isset($_GET['sl']) && $_GET['sl'] == 50 ? 'selected="selected"' : "" ?> >Hiển thị 50</option>
            <option value="index.php?ctrl=users/Account&act=select&sl=100" <?= isset($_GET['sl']) && $_GET['sl'] == 100 ? 'selected="selected"' : "" ?> >Hiển thị 100</option>
        </select>
    </div>
    <div class="col-xs-6"></div>
    <div class="col-xs-4">
        <form action="index.php?ctrl=users/Account&act=search" style="margin-bottom:10px;" method="post">
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
    <div class="col-xs-12">
    
        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách tài khoản</div>
            <Div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td width="40px">STT</td>
                        <td width="50px">Anh</td>
                        <td width="150px">Họ và Tên</td>
                        <td >Giới tính</td>
                        <td>Email</td>
                        <td>Username</td>
                        <td width="100px">
                            <a href="index.php?ctrl=users/Account&atc=add"
                               class="btn btn-primary btn-sm" style="width: 100%;">Thêm</a>
                        </td>
                    </tr>
                    <?php
                        $stt=0;
                        foreach ($data as $value) { 
                            $stt++;
                    ?>
                    <tr>
                        <td style="text-align:center;"><?= $stt ?></td>
                        <td><img src="../public/Uplaod/Avatar/<?= $value['anh'] ?>" alt=""></td>
                        <td><?= $value['ho_ten'] ?></td>
                        <td><?= $value['gioi_tinh'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['username'] ?></td>
                        <td>
                            <a href="index.php?ctrl=users/Account&act=edit&id=<?= $value['id'] ?>" class="btn btn-sm btn-success" style="width: 100%;">Xem</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </Div>
        </div>
    </div>

    <script>
        $(document).ready(() => {
            $("input[type=text]").keyup(onFormUpdate);
            $("input[type=password]").keyup(onFormUpdate);
            $("input[type=password]").change(onFormUpdate);
        })

        function onFormUpdate() {
            const registerUsername = $("#UserName").val();
            const registerPassword = $("#Password").val();
            const acceptedTnC = $("#re_Password").val();

            if (registerUsername && registerPassword && acceptedTnC) {
                $("#Them").removeAttr("disabled");
            } else {
                $("#Them").attr("disabled", "disabled");
            }
        }

    </script>
</div>