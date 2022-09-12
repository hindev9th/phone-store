<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    		<title>َĐăng nhập</title>
	</head>
	<body>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        .hero{
            height: 100%;
            width: 100%;
            background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(banner.jpg);
            background-position: center;
            background-size: cover;
            position: absolute;
        }

        .from-box{
            width:380px;
            height:480px;
            position: relative;
            margin: 6% auto;
            background: #fff;
            padding: 5px;
            overflow: hidden;
        }

        .button-box{
            width: 240px;
            margin: 35px auto;
            position: relative;
            box-shadow: 0 0 20px 9px #ff61241f;
            border-radius: 30px;
        }

        .toggle-btn{
            padding: 10px 30px;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
            margin-left: 57px;
        }

        #btn{
            top: 0;
            left: 0;
            position: absolute;
            width: 240px;
            height: 100%;
            background: linear-gradient(to right, #ff105f, #ffad06);
            border-radius: 30px;
            transition: .5s;

        }

        .social-icons{
            margin: 30px auto;
            text-align:center;
        }
        .social-icons img{
            width: 30px;
            margin : 0 12px;
            box-shadow: 0 0 20px 0 #7f7f7f3d;
            cursor: pointer;
            border-radius: 50%;
        }

        .input-group{
            top: 180px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }

        .input-field{
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border-left:0;
            border-top:0;
            border-right:0;
            border-bottom: 1px solid #999;
            outline: none;
            background: transparent;
        }

        .submit-btn{
            width:85%;
            padding: 10px 30px;
            cursor: pointer;
            display: block;
            margin: auto;
            background: linear-gradient(to right, #ff105f, #ffad06);
            border: 0;
            outline: none;
            border-radius:30px;
        }

        .chech-box{
            margin: 30px 10px 30px 0;
        }
        span{
            color: #777;
            font-size:12px;
            bottom: 63.5px;
            position: absolute;
        }

        #login{
            left:50px;
        }
        #register{
            left: 450px;
        }

    </style>
		<div class="hero">
			<div class="from-box">
				<?php if(isset($thong_bao)) { ?>
					<div style ="text-align:center; color:orange;">
						<?php echo($thong_bao) ?>
					</div>
				<?php } ?>

				

				<div class="button-box">
					<div id="btn"></div>
					<button type="button" class="toggle-btn" onclick="login()">Đăng nhập</button>
					<!-- <button type="button" class="toggle-btn" onclick="register()">Đăng kí</button> -->
				</div>
				<div class="social-icons">
					<img src ="..\public\admin\img\fb.png">
					<img src ="..\public\admin\img\tw.png">
					<img src ="..\public\admin\img\gp.png">
				</div>
				<form id="login" class="input-group" method="post">
					<input type="email" name="email" class="input-field" required placeholder= "Email" />
					<input type="password" name="password" class="input-field" required placeholder= "Mật khẩu" />
					<input type="checkbox" class = "chech-box"><Span>Ghi nhớ mật khẩu</span>
					<input type="submit" name="sb_Dang_nhap" class="submit-btn btn-DN" value="Đăng nhập" />
				</form>
				<!-- <form id="register" class="input-group" metod="post">
					<input type="text" name ="name" class="input-field" placeholder= "Họ và tên" repuired>
					<input type="email" name= "email-DK" class="input-field" placeholder= "Email" repuired>
					<input type="text" name= "password-DK" class="input-field" placeholder= "Mật khẩu" repuired>
					<input type="checkbox" class = "chech-box"><Span>Tôi đồng ý với các Điều khoản & Điều kiện</span>
					<button type="sbmit" class="submit-btn btn-DK">Đăng kí</button>
				</form> -->
			</div>	
		</div>
		
		<script>
			var x = document.getElementById("login")
			var y = document.getElementById("register")
			var z = document.getElementById("btn")
			
			function register(){
				x.style.left ="-400px";
				y.style.left ="50px";
				z.style.left ="120px";
			}
			function login(){
				x.style.left ="50px";
				y.style.left ="450px";
				z.style.left ="0";
			}
		</script>
		
  	</body>
</html>