<!-- Page Heading -->
<div class="row">
    <div class="col-lg">
        <h1 class="page-header">
            Sản Phẩm
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-ellipsis-h"></i> Sản Phẩm/Thêm
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xs">
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm sản phẩm</div>
            <div class="container">
                <div class="panel-body">
                    <form action="index.php?ctrl=products/Add&act=save<?= isset($data['id']) ? '&id=' . $data['id'] : '' ?>"
                          method="post" enctype="multipart/form-data">
                        <div class="row" style="margin-bottom:25px;">
                            <p class="alert alert-warning">Có dấu (*) là bắt buộc phải điền!</p>
                            <span>Mã sản phẩm*</span>
                            <input type="text" name="ma_sp" minlength="3" placeholder="Mã sản phẩm*" require required
                                   value="<?= isset($data['ma_sp']) ? $data['ma_sp'] : '' ?>" class="form-control"
                                   style="margin-bottom:10px;">
                            <span>Tên sản phẩm*</span>
                            <input type="text" name="ten_sp" minlength="3" placeholder="Tên sản phâm*" require required
                                   value="<?= isset($data['ten_sp']) ? $data['ten_sp'] : '' ?>" class="form-control"
                                   style="margin-bottom:10px;">
                            <span>Danh mục*</span>
                            <select name="danh_muc" class="form-control" style="margin-bottom:10px;">
                                <option value="1">Chọn một danh mục</option>
                                <?php foreach ($data_dm as $values) { ?>
                                    <option value="<?php echo $values['id'] ?>" <?= isset($data['id']) && $data['id_dm'] == $values['id'] ? 'selected' : '' ?> > <?php echo $values['ten_dm'] ?> </option>
                                <?php } ?>
                            </select>
                            <span>Thương hiệu*</span>
                            <select name="thuong_hieu" class="form-control" style="margin-bottom:10px;">
                                <option value=""></option>
                                <?php foreach ($data_th as $val) { ?>
                                    <option value="<?php echo $val['ma_th'] ?>" <?= isset($data['id']) && $data['id_th'] == $val['id'] ? 'selected' : '' ?> > <?php echo $val['ten_th'] ?> </option>
                                <?php } ?>
                            </select>
                            <span Mô tả ngắn sản phẩm</span>
                            <textarea name="mo_ta_ngan" require class="form-control" style="width:100%;  height:100px;"
                                      placeholder="Mô tả"></textarea>
                        </div>

                        <h4 style="border-bottom: 1px solid rgba(0,0,0,0.1)">Mô tả sản phẩm</h4>
                        <div class="row">
                            <textarea name="mo_ta" id="mo_ta" require class="form-control"
                                      style="width:100%;  height:100px;" placeholder="Mô tả"></textarea>
                        </div>
                        <h4 style="border-bottom: 1px solid rgba(0,0,0,0.1)">Images</h4>
                        <div class="row" id="box-img">
                            <div class="col-md-2">
                                <input type="file" name="images[]" require style="width:100%;  height:100px;"/>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid rgba(0,0,0,0.1)">
                            <div class="col-md-6">
                                <h4 class="text-secondary">Loại</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <span class="btn btn-primary" id="btn-them">Thêm loại</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Loại</span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>Mã màu</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span>Tên màu</span>
                                    </div>
                                    <div class="col-md-2">
                                        <span>Số lượng</span>
                                    </div>
                                    <div class="col-md-3">
                                        <span>Giá tiền</span>
                                    </div>
                                    <div class="col-md-1">
                                        <span>Xóa</span>
                                    </div>
                                </div>
                                <div id="box-loai">
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-3">
                                            <input type="text" name="loai[]" value="" class="form-control">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="color" name="ma_mau[]" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="ten_mau[]" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="so_luong[]" required class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" name="gia[]" required class="form-control">
                                        </div>
                                        <div class="col-md-1">
                                            <span class="btn text-danger btn-xoa-loai" value="123456789"><i class="fa fa-minus-square"
                                                                                          aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    <script>
                                        $('.btn-xoa-loai').click(function () {
                                            var id_val = $(this).attr('value');
                                            $.ajax({
                                                url:"?ctrl=products/Add&act=delete&id="+id_val

                                            });
                                            // $(this).closest('.row').remove();
                                        });
                                    </script>
                                </div>
                                <?php if (isset($data_loai)) {
                                foreach ($data_loai

                                         as $value){ ?>
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-3">
                                            <input type="text" name="loai[]" value="<?= $value['loai'] ?>"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="color" name="ma_mau[]" value="<?= $value['ma_mau'] ?>"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="ten_mau[]" value="<?= $value['ten_mau'] ?>"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="so_luong[]" value="<?= $value['so_luong'] ?>"
                                                   required class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" name="gia[]" value="<?= $value['gia'] ?>" required
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-1 btn-xoa-loai" value="<?= $value['id'] ?>">
                                            <span class="btn text-danger"><i class="fa fa-minus-square"
                                                                             aria-hidden="true"></i></span>
                                        </div>
                                    </div>

                                <?php } ?>
                                    <script>
                                        $('.btn-xoa-loai').click(function () {
                                            var id = $(this).attr('value');
                                            $.ajax({
                                                url:"?ctrl=products/Add"
                                            });
                                            $(this).closest('.row').remove();
                                        });
                                    </script>
                                <?php } ?>
                            </div>
                        </div>

                        <input type="submit" value="Lưu" class="btn btn-primary form-control" style="margin-top:10px;">

                    </form>
                </div>
            </div>

        </div>
    </div>


    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        var loai = $('#box-loai').html();
        $('#btn-them').click(function () {
            $('#box-loai').append(loai);
        });


        ClassicEditor
            .create(document.querySelector('#mo_ta'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });


    </script>
</div>