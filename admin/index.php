<?php
    session_start();
    include "../config/Config.php";
    include "../config/Model.php";
    include "../config/Controller.php";
    include "../config/RemoveUnicode.php";
    include "../config/Token.php";

    if(isset($_GET['act']) && $_GET['act'] =='logout'){
        unset($_SESSION['account']);
    }

    class index extends Controller{

        public function __construct()
        {
            parent::__construct();

            if (isset($_SESSION['admin'])) {
                $email =$_SESSION['admin']['email'];
                $check = $this->Model->fetchOne("select * from tb_admin where email='$email'");

                $contact = $this->Model->count("select * from tb_contact where seen = 0");
                $ctrl = isset($_GET['ctrl']) ? "controllers/".$_GET['ctrl'].".php" : "controllers/Home.php";
                include "../layout/admin/admin.php";
            } else{
                include "controllers/Login.php";
            }
        }
    }
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
    new index();

?>