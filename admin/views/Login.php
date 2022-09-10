<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    		<title>َĐăng nhập</title>
    		<link rel="stylesheet" href="..\public\admin\css\style.css">
			<!-- <link rel="stylesheet" href="..\public\admin\css\bootstrap.min.css"> -->
	</head>
	<body>

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
					<input type="email" name="email" class="input-field" placeholder= "Email" repuired >
					<input type="password" name="password" class="input-field" placeholder= "Mật khẩu" repuired >
					<input type="checkbox" class = "chech-box"><Span>Ghi nhớ mật khẩu</span>
					<input type="submit" name="sb_Dang_nhap" class="submit-btn btn-DN" value="Đăng nhập">
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