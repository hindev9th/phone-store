<?php 

    class Product extends Controller{
        public function __construct()
        {
            parent::__construct();
            $act = $_GET['act'] ?? "";
            $id = $_GET['id'] ?? "";

            $data = $this->Model->fetchOne("select * from sp_view where id_loai = '$id'");
            $data_user = $_SESSION['customer']['id'] ?? 0;
            $data_dh = $this->Model->fetch("select * from don_hang where id_user='".$data_user."' and ma_sp = '".$data['ma_sp']."' limit 0,10");

            switch ($act) {
                case 'dg':
                    $id_sp =  $_POST['id_sp'] ?? "";
                    $id_user = $_POST['id_user'] ?? "";
                    $comment = $_POST['comment'] ?? "";
                    $rate = $_POST['rate'] ?? "";
                    if (isset($_SESSION['customer'])){
                        if (count($data_dh) > 0){
                            $this->Model->execute("insert into sp_danh_gia values ('','$id_sp','$id_user','$rate','$comment',current_timestamp())");
                            echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Product&id=$id'>";
                        }else{
                            echo "<script>alert('Bạn chưa mua sản phẩm này nên không thể đánh giá')</script>";
                        }

                    }else{
                        echo "<meta http-equiv='refresh' content='0; URL=?ctrl=Login_register'>";
                    }

                    break;

            }

            $data_loai = $this->Model->fetch("select * from sp_view where ma_sp = '".$data['ma_sp']."' group by loai");
            $data_mau = $this->Model->fetch("select * from sp_view where ma_sp = '".$data['ma_sp']."' and loai = '".$data['loai']."' GROUP by ma_mau");
            $data_img = $this->Model->fetch("select * from sp_image where ma_sp = '".$data['ma_sp']."'");
            $data_dg = $this->Model->fetch("select * from view_danh_gia where ma_sp = '".$data['ma_sp']."' limit 0,10");
            include "client/views/Product.php";
        }

    }
    
    new Product();

?>