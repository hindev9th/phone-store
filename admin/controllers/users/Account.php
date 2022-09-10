<?php

    class Account extends Controller{
        public function __construct(){
            parent:: __construct();          
            $act = isset($_GET['act']) ? $_GET['act'] : "";
            $id = isset($_GET['id']) ? $_GET['id'] : 0;  
            $thong_bao = "";          
  
            switch ($act) {
                case 'add':   
                    $UserName = isset($_POST['UserName']) ? $_POST['UserName'] : '';
                    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
                    $re_Password = isset($_POST['re_Password']) ? $_POST['re_Password'] : '';
                    $id_positon = isset($_POST['id_positon']) ? $_POST['id_positon'] : '';
                    $check = $this->Model->fetchOne("select * from tb_admin where UserName='$UserName'");

                    if(isset($check)){
                        $thong_bao = "Tài khoản đã tồn tại!";
                    }else{
                        if($_POST['Password'] != $_POST['re_Password']){
                            $thong_bao = "Mật khẩu không khớp!";
                        }else{          
                            $this->Model->execute("insert into tb_admin(id,UserName,Password,id_positon) values ('','$UserName', '$Password','$id_positon')");
                            echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Account'>";
                        }
                    }
                    
                    break;
                case 'delete':
                    $this->Model->execute("delete from tb_admin where id=$id");
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Account'>";
                    break;
                case 'edit':
                    $data = $this->Model->fetchOne("select * from tb_admin where id='$id'");
                    include "views/users/add.php";
                    break;
                case 'save':
                    $check = $this->Model->fetchOne("select * from tb_admin where id = '$id'");
                    $ho_ten = $_POST['ho_ten'] ?? '';
                    $gioi_tinh = $_POST['gioi_tinh'] ?? '';
                    $ngay_sinh = $_POST['ngay_sinh'] ?? '';
                    $sdt = $_POST['sdt'] ?? '';
                    $email = $_POST['email'] ?? '';
                    $password = md5($_POST['password'] ?? '');
                    $dia_chi = $_POST['dia_chi'] ?? '';
                    $anh = $check['anh'];
                    if (!empty($_FILES['img_avt']['name'])) {
                        if (file_exists("../public/Upload/Avatar/" . $anh)) {
                            unlink("../public/Upload/Avatar/" . $anh);
                        }

                        $anh = time() . $_FILES['img_avt']['name'];
                        move_uploaded_file($_FILES['img_avt']['tmp_name'], "public/Upload/Avatar/".$anh);
                    }

                    $sql = "update tb_admin set ho_ten='$ho_ten' , gioi_tinh='$gioi_tinh', ngay_sinh='$ngay_sinh', sdt='$sdt', email='$email', password='$password', dia_chi='$dia_chi', anh='$anh' where id='$id'";
                    $this->Model->execute($sql);
                    echo "<meta http-equiv='refresh' content='0; URL=index.php?ctrl=users/Account'>";
                    break;
                case 'search':
                    $sr = isset($_POST['search']) ? $_POST['search'] : "";
                    $data = $this->Model->fetch("select * from tb_admin where UserName like '%$sr%' order by id desc limit 25");
                    include "views/users/Account.php";
                    break;
                case 'select':
                    $sl = isset($_GET['sl']) ? $_GET['sl'] : "";
                    $data = $this->Model->fetch("select * from tb_admin order by id desc limit $sl");
                    include "views/users/Account.php";
                    break;  
                default:
                    $data = $this->Model->fetch("SELECT * from tb_admin order by id desc limit 25");
                    include "views/users/Account.php";
                    break;
            }
        }
    }
    new Account();

?>