<?php
    class Product_List extends Controller{
        public function __construct()
        {
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $order = isset($_GET['order']) ? $_GET['order'] : "";
            $act_name = "";


            
            $nb_item = 10;
            $pg = isset($_GET['pg']) ? $_GET['pg'] : 1 ;
            $pagi = ($pg-1)*$nb_item;
            switch ($act) {
                case 'spnb':
                    $act_name = "Sản phẩm nổi bật";
                    $data_nb = $this->Model->fetch("select * from sp_view GROUP BY ma_sp");
                    switch ($order) {
                        case 'az':
                            $data = $this->Model->fetch("select * from sp_view where Sale > 0 GROUP BY ma_sp order by ten_sp ASC limit $pagi,$nb_item ");
                            break;
                        case 'za':
                            $data = $this->Model->fetch("select * from sp_view where Sale > 0 GROUP BY ma_sp order by ten_sp DESC limit $pagi,$nb_item ");
                            break;
                        case 'gial':
                            $data = $this->Model->fetch("select * from sp_view where Sale > 0 GROUP BY ma_sp order by gia ASC limit $pagi,$nb_item ");
                            break;
                        case 'giah':
                            $data = $this->Model->fetch("select * from sp_view where Sale > 0 GROUP BY ma_sp order by gia DESC limit $pagi,$nb_item ");
                            break;
                        default:
                            $data = $this->Model->fetch("select * from sp_view where Sale > 0 GROUP BY ma_sp order by da_ban DESC limit $pagi,$nb_item ");
                            break;
                    }
                    break;
                case 'sp':
                    $act_name = "";
                    $dm = isset($_GET['dm']) && !empty($_GET['dm']) ? $_GET['dm'] : "%";
                    $th = isset($_GET['th']) && !empty($_GET['th']) ? $_GET['th'] : "%";

                    $data_nb = $this->Model->fetch("select * from sp_view where id_dm = '$dm' AND id_th = '$th' GROUP BY ma_sp ");
                    switch ($order) {
                        case 'az':
                            $data = $this->Model->fetch("select * from sp_view where id_dm like '$dm' AND id_th like '$th' GROUP BY ma_sp order by ten_sp ASC limit $pagi,$nb_item ");
                            break;
                        case 'za':
                            $data = $this->Model->fetch("select * from sp_view where id_dm like '$dm' AND id_th like '$th' GROUP BY ma_sp order by ten_sp DESC limit $pagi,$nb_item ");
                            break;
                        case 'gial':
                            $data = $this->Model->fetch("select * from sp_view where id_dm like '$dm' AND id_th like '$th' GROUP BY ma_sp order by gia ASC limit $pagi,$nb_item ");
                            break;
                        case 'giah':
                            $data = $this->Model->fetch("select * from sp_view where id_dm like '$dm' AND id_th like '$th' GROUP BY ma_sp order by gia DESC limit $pagi,$nb_item ");
                            break;
                        default:
                            $data = $this->Model->fetch("select * from sp_view where id_dm like '$dm' AND id_th like '$th' GROUP BY ma_sp order by id DESC limit $pagi,$nb_item ");
                            break;
                    }
                    break;
                case 'search':
                    $act_name = "Kết quả tìm kiếm";
                    $name  = isset($_GET['name']) ? $_GET['name'] : "";
                    $data_nb = $this->Model->fetch("select * from sp_view where ma_sp like '%$name%' OR ten_sp like '%$name%' GROUP BY ma_sp");
                    switch ($order) {
                        case 'az':
                            $data = $this->Model->fetch("select * from sp_view where ma_sp like '%$name%' OR ten_sp like '%$name%' GROUP BY ma_sp order by ten_sp ASC limit $pagi,$nb_item ");
                            break;
                        case 'za':
                            $data = $this->Model->fetch("select * from sp_view where ma_sp like '%$name%' OR ten_sp like '%$name%' GROUP BY ma_sp order by ten_sp DESC limit $pagi,$nb_item ");
                            break;
                        case 'gial':
                            $data = $this->Model->fetch("select * from sp_view where ma_sp like '%$name%' OR ten_sp like '%$name%' GROUP BY ma_sp order by gia ASC limit $pagi,$nb_item ");
                            break;
                        case 'giah':
                            $data = $this->Model->fetch("select * from sp_view where ma_sp like '%$name%' OR ten_sp like '%$name%' GROUP BY ma_sp order by gia DESC limit $pagi,$nb_item ");
                            break;
                        default:
                            $data = $this->Model->fetch("select * from sp_view where ma_sp like '%$name%' OR ten_sp like '%$name%' GROUP BY ma_sp order by id DESC limit $pagi,$nb_item ");
                            break;
                    }
                    break;
                default:
                    $data_nb = $this->Model->fetch("select * from sp_view GROUP BY ma_sp ");
                    switch ($order) {
                        case 'az':
                            $data = $this->Model->fetch("select * from sp_view GROUP BY ma_sp order by ten_sp ASC limit $pagi,$nb_item ");
                            break;
                        case 'za':
                            $data = $this->Model->fetch("select * from sp_view GROUP BY ma_sp order by ten_sp DESC limit $pagi,$nb_item ");
                            break;
                        case 'gial':
                            $data = $this->Model->fetch("select * from sp_view GROUP BY ma_sp order by gia ASC limit $pagi,$nb_item ");
                            break;
                        case 'giah':
                            $data = $this->Model->fetch("select * from sp_view GROUP BY ma_sp order by gia DESC limit $pagi,$nb_item ");
                            break;
                        case 'rate':
                            $data = $this->Model->fetch("select * from sp_view GROUP BY ma_sp order by diem_danh_gia DESC limit $pagi,$nb_item ");
                            break;
                        default:
                            $data = $this->Model->fetch("select * from sp_view GROUP BY ma_sp order by id DESC limit $pagi,$nb_item ");
                            break;
                    }
                    break;
            }
            $data_dm = $this->Model->fetch("select * from danh_muc");

            include "client/views/Product_List.php";
        }
    }
    new Product_List();
?>