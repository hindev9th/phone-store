<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Slider
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-fw fa-sliders"></i> Slider
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-2">
        <select name="" id="" class="form-control" onchange="location = this.value;">
            <option value="index.php?ctrl=slider/Slider&act=select&sl=25" <?php echo isset($_GET['sl']) && $_GET['sl'] == 25 ? 'selected="selected"' : "" ?> >Hiển thị 25</option>
            <option value="index.php?ctrl=slider/Slider&act=select&sl=50" <?php echo isset($_GET['sl']) && $_GET['sl'] == 50 ? 'selected="selected"' : "" ?> >Hiển thị 50</option>
            <option value="index.php?ctrl=slider/Slider&act=select&sl=100" <?php echo isset($_GET['sl']) && $_GET['sl'] == 100 ? 'selected="selected"' : "" ?> >Hiển thị 100</option>
        </select>
    </div>
    <div class="col-xs-6"></div>
    <div class="col-xs-4">
        <form action="index.php?ctrl=slider/Slider&act=search" style="margin-bottom:10px;" method="post">
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
        <div class="col-xs-8">
        
            <div class="panel panel-primary">
                    <div class="panel-heading">Thông tin slider</div>
                    <Div class="panel-body text-center">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>STT</td>
                                <td width="200px">Ảnh</td>
                                <td >Đường dẫn</td>
                                <td>Tiêu đề</td>
                                <td>Mô tả</td>
                                <td>Vị trí</td>
                                <td width="100px">Tình trạng</td>
                            </tr>
                            <?php
                                $stt=0;
                                foreach ($data as $value) { 
                                    $stt++;
                                    
                            ?>
                            <tr>
                                <td width="40px"><?php echo $stt ?></td>
                                <td><img src="../public/Upload/Slider/<?php echo $value['anh'] ?>" alt="" width="200px"></td>
                                <td><?php echo $value['url'] ?></td>
                                <td><?php echo $value['tieu_de'] ?></td>
                                <td><?php echo $value['mo_ta'] ?></td>
                                <td>
                                    <select name="vi_tri" class="form-control" onchange="location = this.value;">
                                        <option value="index.php?ctrl=slider/Slider&act=do_edit&id=<?php echo $value['id'] ?>&vt=0" <?php echo $value['vi_tri']==0 ? 'selected=selected' : '' ?> >Đầu trang</option>
                                        <option value="index.php?ctrl=slider/Slider&act=do_edit&id=<?php echo $value['id'] ?>&vt=1" <?php echo $value['vi_tri']==1 ? 'selected=selected' : '' ?> >Giữa trang</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="tinh_trang" class="form-control" onchange="location = this.value;">
                                        <option value="index.php?ctrl=slider/Slider&act=do_edit&id=<?php echo $value['id'] ?>&tt=0" <?php echo $value['tinh_trang']==0 ? 'selected=selected' : '' ?> >Bật</option>
                                        <option value="index.php?ctrl=slider/Slider&act=do_edit&id=<?php echo $value['id'] ?>&tt=1" <?php echo $value['tinh_trang']==1 ? 'selected=selected' : '' ?> >Tắt</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="index.php?ctrl=slider/Slider&act=edit&id=<?php echo $value['id'] ?>" class="btn btn-success btn-sm">Sửa</a>
                                    <a href="index.php?ctrl=slider/Slider&act=delete&id=<?php echo $value['id'] ?>" class="btn btn-sm btn-warning">Xóa</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </Div>
            </div>
        </div>
    <!-- Sua -->
    
                           
    <div class="col-xs-4">
    <?php if(isset($_GET['act']) && $_GET['act'] == "edit") { ?>   
        <div class="panel panel-primary">
            <div class="panel-heading">Sửa Slider</div>
            <div class="panel-body">
                <form action="index.php?ctrl=slider/Slider&act=do_edit&id=<?= $e_data['id'] ?>" method="post" enctype="multipart/form-data">
                    <img src="../public/Upload/Slider/<?php echo $e_data['anh'] ?>" alt="" id="output" class="output" width="500px">
                    <input type="file" name="Image" accept="image/*" onchange="loadFile(event)" style="margin-top:10px;">
                    <input type="text" name="url" placeholder="Đường dẫn" value="<?php echo $e_data['url'] ?>" require class="form-control" style="margin-top:10px;">
                    <input type="text" name="tieu_de" placeholder="Tiêu đề" value="<?php echo $e_data['tieu_de'] ?>" require class="form-control" style="margin-top:10px;">
                    <input type="text" name="mo_ta" placeholder="Mô tả" value="<?php echo $e_data['mo_ta'] ?>" require class="form-control" style="margin-top:10px;">
                    <select name="vi_tri" class="form-control" style="margin-top:10px;">
                        <option value="0" <?php echo $e_data['vi_tri']==0 ? 'selected=selected' : '' ?> >Đầu trang</option>
                        <option value="1" <?php echo $e_data['vi_tri']==1 ? 'selected=selected' : '' ?> >Giữa trang</option>
                    </select>
                    <select name="tinh_trang" class="form-control" style="margin-top:10px;">
                        <option value="0" <?php echo $e_data['tinh_trang']==0 ? 'selected=selected' : '' ?> >Bật</option>
                        <option value="1" <?php echo $e_data['tinh_trang']==1 ? 'selected=selected' : '' ?> >Tắt</option>
                    </select>
                    <input type="submit" value="Sửa" class="btn btn-primary" style="margin-top:10px;">
                    <a href="index.php?ctrl=slider/Slider" class="btn btn-primary" style="margin-top:10px;">Thoát</a>
                </form>
            </div>
        </div>
    <?php } ?>
    <!-- Them -->
    
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm Slider</div>
            <div class="panel-body">
                <form action="index.php?ctrl=slider/Slider&act=add" method="post" enctype="multipart/form-data">
                    <img src="" alt="" id="output" class="output" width="500px">
                    <input type="file" name="Image" accept="image/*" onchange="loadFile(event)" style="margin-top:10px;">
                    <input type="text" name="url" placeholder="Đường dẫn"  require class="form-control" style="margin-top:10px;">
                    <input type="text" name="tieu_de" placeholder="Tiêu đề" require class="form-control" style="margin-top:10px;">
                    <input type="text" name="mo_ta" placeholder="Mô tả"   class="form-control" style="margin-top:10px;">
                    <select name="vi_tri" class="form-control" style="margin-top:10px;">
                        <option value="0" >Đầu trang</option>
                        <option value="1" >Giữa trang</option>
                    </select>
                    <select name="tinh_trang" class="form-control" style="margin-top:10px;">
                        <option value="0" >Bật</option>
                        <option value="1" >Tắt</option>
                    </select>
                    <input type="submit" value="Thêm" class="btn btn-primary" style="margin-top:10px;">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
    
    
</script>