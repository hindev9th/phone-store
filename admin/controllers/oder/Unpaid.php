<?php
class Unpaid extends Controller{
    public function __construct()
    {
        parent::__construct();
        $act = isset($_GET['act']) ? $_GET['act'] : "";

        switch ($act) {
            case 'search':
                $sr = isset($_POST['search']) ? $_POST['search'] : "";
                $data = $this->Model->fetch("select * from don_hang where ma_dh like '%$sr%'  OR ma_sp like '%$sr%' OR ten_sp like '%$sr%' AND id_tinh_trang = 4 order by thoi_gian_dh desc limit 25");
                break;
            case 'select':
                $sl = isset($_GET['sl']) ? $_GET['sl'] : "";
                $data = $this->Model->fetch("select * from don_hang where id_tinh_trang = 4 order by thoi_gian_dh desc limit $sl");
                break;
            default:
                $data = $this->Model->fetch("SELECT * from don_hang where id_tinh_trang = 4 order by thoi_gian_dh desc limit 25");
                break;
        }

        $dataTT = $this->Model->fetch("SELECT * from dh_tinh_trang");
        include "views/oder/Unpaid.php";
    }
}
new Unpaid();
?>