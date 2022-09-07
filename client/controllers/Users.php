<?php
class Users extends Controller{
    public function __construct(){
        parent::__construct();
        $act = isset($_GET['atc']) ? $_GET['atc'] : '';

        switch ($act){
            case 'account':
                $data = $this->Model->fetchOne('select * from tb_users');
                include "client/views/user/account.php";
                break;
            case 'order':
                $user = isset($_SESSION['customer']) ? $_SESSION['customer'] : '';
                $data = $this->Model->fetch("select * from don_hang where id_user = '".$user['id']."'");
                include "client/views/user/order.php";
                break;
            case 'update':
                $ho_ten = isset($_POST['ho_ten']) ? $_POST['ho_ten'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
                $noi_dung = isset($_POST['noi_dung']) ? $_POST['noi_dung'] : '';

                $sql= "INSERT INTO `tb_contact`(`id`, `ho_ten`, `email`, `sdt`, `noi_dung`,`seen`) VALUES ('','$ho_ten','$email','$sdt','$noi_dung',0)";
                $this->Model->execute($sql);

                break;
        }


    }
}
new Users();
?>