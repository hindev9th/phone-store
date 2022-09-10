<?php

    class login extends Controller{
        public function __construct(){
            parent::__construct();

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $thong_bao = "";
                $check = $this->Model->fetchOne("select * from tb_admin where email='$email'");
                
                if(isset($check['email'])){
                    if($check['password'] == MD5($password)){

                        $data = array(
                            'id' => $check['id'],
                            'ho_ten' => $check['ho_ten'],
                            'email' => $check['email'],
                        );
                        $_SESSION['admin'] = $data;
                        header("location: index.php");
                    }else{
                        $thong_bao = "Mật khẩu không đúng!";
                    }
                }else{
                    $thong_bao = "Tài khoản này không tồn tại!";
                }
            }

            include "views/Login.php"; 
        }
    }
    new Login();
    
?>