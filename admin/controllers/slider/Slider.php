<?php
    class Slider extends Controller{
        public function __construct()
        {
            parent:: __construct();
            $act = isset($_GET['act']) ? $_GET['act'] : '';
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            switch ($act) {
                case 'add':
                    $url = isset($_POST['url']) ? $_POST['url'] : '';
                    $tieu_de = isset($_POST['tieu_de']) ? $_POST['tieu_de'] : '';
                    $mo_ta = isset($_POST['mo_ta']) ? $_POST['mo_ta'] : '';
                    $vi_tri = isset($_POST['vi_tri']) ? $_POST['vi_tri'] : '';
                    $tinh_trang = isset($_POST['tinh_trang']) ? $_POST['tinh_trang'] : '';

                    if(!isset($_FILES['Image']['name']) || empty($_FILES['Image']['name']) ){
                        ?> <script> window.alert("Chưa có dữ liệu thêm ảnh") </script> <?php
                    }else{
                        $anh = time().$_FILES['Image']['name'];
                        move_uploaded_file($_FILES['Image']['tmp_name'],"../public/Upload/Slider/".time().$_FILES['Image']['name']);
                        $this->Model->execute("insert into slider(id, url,tieu_de,mo_ta, anh, tinh_trang,vi_tri) values ('','$url','$tieu_de','$mo_ta','$anh','$tinh_trang','$vi_tri')");

                        ?> <script> window.alert("Thêm thành công") </script> <?php  
                    }
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=slider/Slider'>";
                    break;

                case 'edit':
                    $e_data = $this->Model->fetchOne("select * from slider where id = '$id'");
                    $data = $this->Model->fetch("SELECT * from slider order by id desc limit 25");
                    break;

                case 'do_edit':
                    $url = isset($_POST['url']) ? $_POST['url'] : '';
                    $tieu_de = isset($_POST['tieu_de']) ? $_POST['tieu_de'] : '';
                    $mo_ta = isset($_POST['mo_ta']) ? $_POST['mo_ta'] : '';
                    $vi_tri = isset($_POST['vi_tri']) ? $_POST['vi_tri'] : '';
                    $tinh_trang = isset($_POST['tinh_trang']) ? $_POST['tinh_trang'] : '';
                    if(isset($_GET['tt'])){
                        $tt = $_GET['tt'];
                        $this->Model->execute("update slider set tinh_trang='$tt' where id = '$id'");
                    }else if (isset($_GET['vt'])){
                        $vt = $_GET['vt'];
                        $this->Model->execute("update slider set vi_tri='$vt' where id = '$id'");
                    }
                    else{
                        if(!isset($_FILES['Image']['name']) || empty($_FILES['Image']['name']) ){
                            $this->Model->execute("update slider set url='$url',tieu_de='$tieu_de',mo_ta='$mo_ta',tinh_trang='$tinh_trang', vi_tri='$vi_tri' where id = '$id'");
                            ?> <script> window.alert("Sửa thành công") </script> <?php  
                        }else{
                            $check = $this->Model->fetchOne("Select Anh from slider where id = '$id'");
                            file_exists("../public/Upload/Slider/".$check['anh']) ? unlink("../public/Upload/Slider/".$check['anh']) : '';

                            $anh = time().$_FILES['Image']['name'];
                            move_uploaded_file($_FILES['Image']['tmp_name'],"../public/Upload/Slider/".time().$_FILES['Image']['name']);
                            $this->Model->execute("update slider set url='$url',tieu_de='$tieu_de',mo_ta='$mo_ta',anh='$anh',tinh_trang='$tinh_trang', vi_tri='$vi_tri' where id = '$id'");

                            ?> <script> window.alert("Sửa thành công") </script> <?php  
                        }
                    }
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=slider/Slider'>";
                    break;

                case 'delete':
                    $check = $this->Model->fetchOne("Select anh from slider where id = '$id'");
                    file_exists("../public/Upload/Slider/".$check['anh']) ? unlink("../public/Upload/Slider/".$check['anh']) : '';
                    $this->Model->execute("delete from slider where id = '$id'");

                    ?> <script> window.alert("Xóa thành công") </script> <?php

                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=slider/Slider'>";
                    break;
                case 'search':
                    $sr = isset($_POST['search']) ? $_POST['search'] : "";
                    $data = $this->Model->fetch("select * from slider where url like '%$sr%' or tieu_de like '%$sr%'  order by id desc limit 25");
                    break;
                case 'select':
                    $sl = isset($_GET['sl']) ? $_GET['sl'] : "";
                    $data = $this->Model->fetch("select * from slider order by id desc limit $sl");
                    break;  
                default:
                    $data = $this->Model->fetch("SELECT * from slider order by id desc limit 25");
                break;
            }

            include "views/slider/Slider.php";
        }
    }
    new Slider();
?>