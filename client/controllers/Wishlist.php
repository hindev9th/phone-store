<?php
    class Wishlist extends Controller{
        public function __construct(){
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : "";


            if(isset($_SESSION['customer'])){
                $id_user = $_SESSION['customer']['id'];
                $data = $this->Model->fetch("select * from yeu_thich where id_user = '$id_user'");

                switch ($act){
                    case 'add':
                        $this->Model->execute("INSERT INTO `yeu_thich`(`id`, `id_user`, `id_sp`) VALUES ('','$id_user','$id')");

                        echo "<script>$(document).ready(function (){toast('Đã thêm vào danh sách yêu thích');});</script>";
                        echo "<meta http-equiv='refresh' content='0; URL=?ctrl=wishlist'>";
                        break;
                    case 'delete':
                        $this->Model->execute("DELETE FROM `yeu_thich` WHERE id_sp = '$id' and id_user = '$id_user'");
                        echo "<meta http-equiv='refresh' content='0; URL=?ctrl=wishlist'>";
                        break;
                }

                include "client/views/Wishlist.php";
            }else{
                include "client/views/Login_register.php";
            }
        }
    }
    
    new Wishlist();
?>