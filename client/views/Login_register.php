        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="?">Trang chủ</a></li>
                        <li class="active">Đăng nhập | Đăng ký</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-section mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                        <!-- Login Form s-->
                        <form action="?ctrl=Login_register&act=login" method="post">
                            <div class="login-form">
                                <h4 class="login-title">Đăng nhập</h4>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb-20">
                                        <label>Email*</label>
                                        <input class="mb-0" name="email" type="email" required placeholder="Email">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Mật khẩu*</label>
                                        <input class="mb-0" name="password" type="password" required placeholder="Mật khẩu">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                            <input type="checkbox" id="remember_me">
                                            <label for="remember_me">Nhớ mật khẩu</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                        <a href="#"> Bạn quên mật khẩu?</a>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="register-button mt-0">Đăng nhập</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                        <form action="?ctrl=Login_register&act=register" id="form-register" method="post">
                            <div class="login-form">
                                <h4 class="login-title">Đăng ký</h4>
                                <div class="row">
                                    <div class="col-md-12 mb-20">
                                        <span>Họ và tên</span><span class="text-danger">*</span>
                                        <input class="mb-0" name="ho_ten" id="name" required type="text"  placeholder="Họ và tên">
                                    </div>
                                    <div class="col-md-12 mb-20">
                                        <span>Email</span><span class="text-danger">*</span>
                                        <input class="mb-0" name="email" id="email" required type="Email"  placeholder="Email*">
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <span>Mật khẩu</span><span class="text-danger">*</span>
                                        <input class="mb-0" name="password" id="password" required type="password" placeholder="Mật khẩu">
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <span>Nhập lại mật khẩu</span><span class="text-danger">*</span>
                                        <input class="mb-0" name="re_password" id="re_password" required type="password"
                                            placeholder="Nhập lại mật khẩu">
                                    </div>
                                    <div class="col-12">
                                        <button class="register-button mt-0" id="btn_comfirm">Đăng ký</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script type="text/javascript">
            $('#form-register').validate({
                rules : {
                    Ho_Ten: "required",
                    Email: {
                        required: true,
                        email: true
                    },
                    Password : {
                        required: true,
                        minlength : 5
                    },
                    re_Password : {
                        equalTo : "#password"
                    }
                },
                messages: {
                    Ho_Ten : "Bạn chưa nhập họ tên",
                    Email :{
                        required: "Bạn chưa nhập Email",
                        email: "Email của bạn phải đúng định dạng ví dụ: abc@gmail.com"
                    },
                    Password : {
                        required: "Bạn chưa nhập mật khẩu!",
                        minlength : "Hãy nhập trên 5 ký tự!"
                    },
                    re_Password : {
                        equalTo: "Mật khẩu không khớp"
                    }

                }
            });
            $('#btn_comfirm').click(function(){
                console.log($('#form-register').valid());
            });
    </script>