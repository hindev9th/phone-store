<?php 

    class Product extends Controller{
        public function __construct()
        {
            parent::__construct();
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : "";

            switch ($act) {
                case 'delete':
                    $this->Model->execute("delete from san_pham where id = '$id'");
                    ?> <script> window.alert("Xóa thành công") </script> <?php  
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=products/Product'>";
                    break;

                case 'search':
                    $sr = isset($_POST['search']) ? $_POST['search'] : "";
                    $data = $this->Model->fetch("select * from san_pham where ma_sp like '%$sr%'  OR ten_sp like '%$sr%' order by id desc limit 25");
                    break;
                case 'add':
                    $data_dm = $this->Model->fetch("select * from danh_muc ");
                    $data_th = $this->Model->fetch("select * from thuong_hieu ");
                    include "views/products/Add.php";
                    break;
                case 'edit':
                    $data_dm = $this->Model->fetch("select * from danh_muc ");
                    $data_th = $this->Model->fetch("select * from thuong_hieu ");
                    $data = $this->Model->fetchOne("select * from san_pham where id = '$id'");
                    $data_loai = $this->Model->fetch("select * from sp_loai where ma_sp = '".$data['ma_sp']."'");
                    $data_img = $this->Model->fetch("select * from sp_image where ma_sp = '".$data['ma_sp']."'");
                    include "views/products/Add.php";
                    break;
                case 'select':
                    $sl = isset($_GET['sl']) ? $_GET['sl'] : "";
                    $data = $this->Model->fetch("select * from san_pham order by id desc limit $sl");
                    break;    
                default:
                    $data = $this->Model->fetch("select * from san_pham order by id desc limit 25");
                    include "views/products/Product.php";
                break;
            }


            
        }
    }
    
    new Product();
?>
