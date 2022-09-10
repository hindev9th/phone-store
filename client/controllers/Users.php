<?php

class Users extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $act = $_GET['atc'] ?? '';
        $id = $_GET['id'] ?? '';
        $user = $_SESSION['customer'] ?? '';

        switch ($act) {
            case 'account':
                $data = $this->Model->fetchOne("select * from tb_users where id = '" . $user['id'] . "'");
                include "client/views/user/account.php";
                break;
            case 'order':
                $data = $this->Model->fetch("select * from don_hang where id_user = '" . $user['id'] . "' ORDER BY id_tinh_trang,thoi_gian_dh  DESC");
                include "client/views/user/order.php";
                break;
            case 'cancel_order':
                $data = $this->Model->fetch("select * from don_hang where id_user = '" . $user['id'] . "' ORDER BY id_tinh_trang,thoi_gian_dh DESC");
                $this->Model->execute("update don_hang set id_tinh_trang = '6' where id = '$id'");
                include "client/views/user/order.php";
                break;
            case 'update':
                $check = $this->Model->fetchOne("select * from tb_users where id = '" . $user['id'] . "'");
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
                    move_uploaded_file($_FILES['img_avt']['tmp_name'], "public/Upload/Avatar/".$anh);
                }

                $sql = "update tb_users set ho_ten='$ho_ten' , gioi_tinh='$gioi_tinh', ngay_sinh='$ngay_sinh', sdt='$sdt', email='$email', password='$password', dia_chi='$dia_chi', anh='$anh' where id='$id'";
                $this->Model->execute($sql);
//                echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Users&atc=account'>";
                break;
        }


    }
}

new Users();
?>