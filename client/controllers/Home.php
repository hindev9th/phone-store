<?php
    class Home extends Controller{
        public function __construct(){
            parent::__construct();
            $data_dm = $this->Model->fetch("select * from danh_muc");
            $data_sp_moi = $this->Model->fetch("select * from sp_view GROUP BY ma_sp limit 10");
            $data_noi_bat = $this->Model->fetch("select * from sp_view GROUP BY ma_sp order by da_ban DESC limit 10");

            $slider = $this->Model->fetch("select * from slider where Tinh_Trang = 0 order by id desc ");

            include "client/views/Home.php";
        }
    }
    
    new Home();
?>