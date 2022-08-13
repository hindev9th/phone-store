<?php
class Info extends Controller{
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
            case 'edit':
                $data = $this->Model->fetchOne("select * from don_hang where id = '$id' ");
                break;
        }

        $dataTT = $this->Model->fetch("SELECT * from dh_tinh_trang");
        include "views/oder/info_order.php";
    }
}
new Info();
?>