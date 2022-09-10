<?php

class Customer extends Controller
{
    public function __construct()
    {
        parent:: __construct();
        $act = $_GET['act'] ?? "";
        $id = $_GET['id'] ?? 0;
        $thong_bao = "";
        switch ($act) {
            case 'add':
                include "views/users/add.php";
                break;
            case 'save_new':
                $check = $this->Model->fetch("select * from tb_users");
                $ho_ten = $_POST['ho_ten'] ?? '';
                $gioi_tinh = $_POST['gioi_tinh'] ?? '';
                $ngay_sinh = $_POST['ngay_sinh'] ?? '';
                $sdt = $_POST['sdt'] ?? '';
                $email = $_POST['email'] ?? '';
                $password = md5($_POST['password'] ?? '');
                $dia_chi = $_POST['dia_chi'] ?? '';
                $anh = '';
                if (!empty($_FILES['img_avt']['name'])) {
                    $anh = time() . $_FILES['img_avt']['name'];
                    move_uploaded_file($_FILES['img_avt']['tmp_name'], "../public/Upload/Avatar/" . $anh);
                }

                $can = false;
                foreach ($check as $value){
                    $value['email'] != $email ? $can = true : $can = false;
                }
                if($can){
                    $sql = "INSERT INTO `tb_users`(`id`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `sdt`, `email`, `password`, `dia_chi`, `anh`) 
                            VALUES ('','$ho_ten','$gioi_tinh','$ngay_sinh','$sdt','$email','$password','$dia_chi','$anh')";
                    $this->Model->execute($sql);
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Customer'>";
                }else{
                    echo "<script>alert('Email đã tồn tại!. Vui lòng kiểm tra lại')</script>";
                }
                break;
            case 'edit':
                $data = $this->Model->fetchOne("SELECT * from tb_users where id = '$id'");
                include "views/users/add.php";
                break;
            case 'save':
                $check = $this->Model->fetchOne("select * from tb_users where id = '$id'");
                $ho_ten = $_POST['ho_ten'] ?? '';
                $gioi_tinh = $_POST['gioi_tinh'] ?? '';
                $ngay_sinh = $_POST['ngay_sinh'] ?? '';
                $sdt = $_POST['sdt'] ?? '';
                $email = $_POST['email'] ?? '';
                $password = md5($_POST['password'] ?? '');
                $dia_chi = $_POST['dia_chi'] ?? '';
                $anh = $check['anh'];
                if (!empty($_FILES['img_avt']['name'])) {
                    if (file_exists("../public/Upload/Avatar/" . $anh)) {
                        unlink("../public/Upload/Avatar/" . $anh);
                    }

                    $anh = time() . $_FILES['img_avt']['name'];
                    move_uploaded_file($_FILES['img_avt']['tmp_name'], "../public/Upload/Avatar/" . $anh);
                }

                $sql = "update tb_users set ho_ten='$ho_ten' , gioi_tinh='$gioi_tinh', ngay_sinh='$ngay_sinh', sdt='$sdt', email='$email', password='$password', dia_chi='$dia_chi', anh='$anh' where id='$id'";
                $this->Model->execute($sql);
                echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Customer'>";
                break;

            case 'search':
                $sr = $_POST['search'] ?? "";
                $data = $this->Model->fetch("select * from tb_users where ho_ten like '%$sr%'  OR sdt like '%$sr%' OR email like '%$sr%' OR dia_Chi like '%$sr%' order by id desc limit 25");
                include "views/users/Customer.php";
                break;
            case 'select':
                $sl = isset($_GET['sl']) ? $_GET['sl'] : "";
                $data = $this->Model->fetch("select * from tb_users order by id desc limit $sl");
                include "views/users/Customer.php";
                break;
            default:
                $data = $this->Model->fetch("SELECT * from tb_users order by id desc limit 25");
                include "views/users/Customer.php";
                break;
        }


    }
}

new Customer();

?>