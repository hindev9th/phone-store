<?php 

    class Oder extends Controller{
        public function __construct()
        {
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            $id_tt = isset($_GET['id_tt']) ? $_GET['id_tt'] : "";

            switch ($act) {
                case 'do_edit':
                    $this->Model->execute("UPDATE don_hang set id_tinh_trang = '$id_tt' where id='$id'");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=oder/Oder'>";
                    break;
                case 'search':
                    $sr = isset($_POST['search']) ? $_POST['search'] : "";
                    $data = $this->Model->fetch("select * from don_hang where ma_dh like '%$sr%'  OR ma_sp like '%$sr%' OR ten_sp like '%$sr%' order by thoi_gian_dh desc limit 25");
                    break;
                case 'select':
                    $sl = isset($_GET['sl']) ? $_GET['sl'] : "";
                    $data = $this->Model->fetch("select * from don_hang order by thoi_gian_dh desc limit $sl");
                    break;  
                default:
                    $data = $this->Model->fetch("SELECT * from don_hang order by thoi_gian_dh desc limit 25");
                break;
                
            }

            $dataTT = $this->Model->fetch("SELECT * from dh_tinh_trang");
            include "views/oder/Oder.php";
        }
    }
    new Oder();
?>