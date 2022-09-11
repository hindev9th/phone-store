<?php

class Add extends Controller
{
    public function __construct()
    {
        parent:: __construct();
        $act =  $_GET['act'] ?? "";
        $id =  $_GET['id'] ?? '';
        switch ($act) {
            case "add":
                $ma_sp = isset($_POST['ma_sp']) ? trim(strtoupper($_POST['ma_sp'])) : "";
                $id_dm = $_POST['danh_muc'] ?? "";
                $id_th = $_POST['thuong_hieu'] ?? "";
                $ten_sp = $_POST['ten_sp'] ?? "";
                $mo_ta_ngan = $_POST['mo_ta_ngan'] ?? "";
                $mo_ta = $_POST['mo_ta'] ?? "";

                $loai = $_POST['loai'] ?? "";
                $ma_mau = $_POST['ma_mau'] ?? "";
                $ten_mau = $_POST['ten_mau'] ?? "";
                $so_luong = $_POST['so_luong'] ?? "";
                $gia = $_POST['gia'] ?? "";
                $gia_giam = $_POST['gia_giam'] ?? "";


                if (empty($ma_sp) || empty($ten_sp)) {
                    echo "<script> window.alert('Vui lòng nhập đủ thông tin') </script>";
                } else {
                    $check = $this->Model->fetchOne("select * from san_pham where ma_sp = '$ma_sp'");

                    if (!empty($check['ma_sp'])) {
                        echo "<script> window.alert('Sản phẩm đã tồn tại') </script>";
                    } else {

                        $sql = "insert into san_pham values ('','$ma_sp','$ten_sp','$id_dm','$id_th','0','$mo_ta_ngan','$mo_ta',CURRENT_TIME())";
                        $this->Model->execute($sql);
                        $check = $this->Model->fetchOne("SELECT * FROM san_pham where ma_sp = '$ma_sp'");
                        if (!empty($check)) {
                            echo "<script> window.alert('Thêm thành công!') </script>";
                            foreach ($loai as $key => $data_loai) {
                                $sql = "insert into sp_loai values ('','$ma_sp','$loai[$key]','$ma_mau[$key]','$ten_mau[$key]','$gia[$key]','$gia_giam[$key]','$so_luong[$key]','0')";
                                $this->Model->execute($sql);
                            }

                            foreach ($_FILES['images']['name'] as $key => $data_anh) {
                                if (!empty($_FILES['images']['name'][$key])) {
                                    $sql = "insert into sp_image values ('','$ma_sp','" . time() . $_FILES['images']['name'][$key] . "')";
                                    $this->Model->execute($sql);

                                    move_uploaded_file($_FILES['images']['tmp_name'][$key], "../public/Upload/Products/".time() . $_FILES['images']['name'][$key]);
                                }
                            }

                            echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=products/Product'>";
                        }
                    }
                }
                break;
            case "update":
                $ma_sp = isset($_POST['ma_sp']) ? trim(strtoupper($_POST['ma_sp'])) : "";
                $ma_dm = $_POST['danh_muc'] ?? "";
                $ma_th = $_POST['thuong_hieu'] ?? "";
                $ten_sp = $_POST['ten_sp'] ?? "";
                $mo_ta_ngan = $_POST['mo_ta_ngan'] ?? "";
                $mo_ta = $_POST['mo_ta'] ?? "";

                $loai = $_POST['loai'] ?? "";
                $ma_mau = $_POST['ma_mau'] ?? "";
                $ten_mau = $_POST['ten_mau'] ?? "";
                $so_luong = $_POST['so_luong'] ?? "";
                $gia = $_POST['gia'] ?? "";
                $gia_giam = $_POST['gia_giam'] ?? "";
                $images_sp = $_POST['images_sp'] ?? "";

                if (empty($ma_sp) || empty($ten_sp)) {
                    echo "<script> window.alert('Vui lòng nhập đủ thông tin') </script>";
                } else {
                    $sql = "update san_pham set ten_sp='$ten_sp',id_dm='$ma_dm',id_th='$ma_th',mo_ta_ngan='$mo_ta_ngan',mo_ta='$mo_ta'";
                    $this->Model->execute($sql);

                    $this->Model->execute("DELETE FROM `sp_loai` WHERE ma_sp='$ma_sp'");
                    $this->Model->execute("DELETE FROM `sp_image` WHERE ma_sp='$ma_sp'");
                    foreach ($loai as $key => $data_loai) {
                        $sql = "insert into sp_loai values ('','$ma_sp','$loai[$key]','$ma_mau[$key]','$ten_mau[$key]','$gia[$key]','$gia_giam[$key]','$so_luong[$key]','0'";
                        $this->Model->execute($sql);
                    }

                    foreach ($images_sp as $key => $data_anh) {
                        if (!empty($_FILES['images']['name'][$key])) {
                            $sql = "insert into sp_image values ('','$ma_sp','$images_sp'";
                            $this->Model->execute($sql);
                        }
                    }
                    foreach ($_FILES['images']['name'] as $key => $data_anh) {
                        if (!empty($_FILES['images']['name'][$key])) {
                            $sql = "insert into sp_image values ('','$ma_sp','" . time() . $_FILES['images']['name'][$key] . "'";
                            $this->Model->execute($sql);

                            move_uploaded_file($_FILES['images']['tmp_name'][$key], "../public/Upload/Products/".time() . $_FILES['images']['name'][$key]);
                        }
                    }
//                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=products/Add'>";
                }
                break;
            case "delete":
                $this->Model->execute("delete from san_pham where id = '$id'");
                echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=products/Product'>";
                break;
        }

        $data_th = $this->Model->fetch("select * from thuong_hieu");
        $data_dm = $this->Model->fetch("select * from danh_muc");
        include "views/products/Add.php";
    }
}

new Add();
?>
