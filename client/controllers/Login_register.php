<?php
class Login_register extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $act =  $_GET['act'] ?? "";
        $id = isset($_GET['id']) ? '&id=' . $_GET['id'] : "";
        $ctrl = isset($_GET['ctrl']) && $_GET['ctrl'] != "Login_register" ? 'ctrl=' . $_GET['ctrl'] : "";

        switch ($act) {
            case "login":
                $Email = $_POST['email'] ?? "";
                $Password = $_POST['password'] ?? "";

                $check = $this->Model->fetchOne("select * from tb_users where email = '$Email'");

                if (isset($check['email'])) {
                    if ($check['password'] == md5($Password)) {
                        $customer = array(
                            'id' => $check['id'],
                            'email' => $Email,
                            'ho_ten' => $check['ho_ten']
                        );
                        $_SESSION['customer'] = $customer;

                        echo "<meta http-equiv='refresh' content='0; URL=?" . $ctrl . $id . "'>";
                    } else {
                        ?>
                        <script>alert("Sai mật khẩu!")</script> <?php
                        echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Login_register'>";
                    }
                } else {
                    ?>
                    <script>alert("Tài khoản không tồn tại!")</script> <?php
                    echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Login_register'>";
                }
                break;
            case "register":
                $ho_ten = $_POST['ho_ten'] ?? "";
                $email =  $_POST['email'] ?? "";
                $password = $_POST['password'] ?? "";
                $re_password =  $_POST['re_password'] ?? "";

                $check = $this->Model->fetchOne("select * from tb_users where email = '$email'");

                if (isset($check['email'])) {
                    ?>
                    <script>alert("Email này đã đã tồn tại!")</script> <?php
                    echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Login_register'>";
                } else {
                    if ($password == $re_password) {
                        $password = md5($re_password);
                        $this->Model->execute("INSERT into `tb_users`(`id`, `ho_ten`, `gioi_tinh`, `nam_sinh`, `sdt`, `email`, `password`, `dia_chi`, `anh`) 
                                                    values('','$ho_ten','','','','$email','$password','','')");
                        $customer = array(
                            'id' => $check['id'],
                            'email' => $email,
                            'ho_ten' => $check['ho_ten']
                        );
                        $_SESSION['customer'] = $customer;
                        echo "<meta http-equiv='refresh' content='0; URL=?ctrl=users/account'>";
                    } else {
                        ?>
                        <script>alert("Mật khẩu không khớp nhau!")</script> <?php
                        echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Login_register'>";
                    }
                }
                break;

        }

        include "client/views/Login_register.php";
    }
}
new Login_register();
?>