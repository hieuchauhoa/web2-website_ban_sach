<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng ký</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('../images/bg-02.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-40 p-b-30">
			<form class="login100-form validate-form" name="formdangky"  action="xulydangkyKH.php" method="post"  onsubmit="return submitdangky()">
				<span class="login100-form-title p-b-37">
					Đăng Ký
				</span>

				<div class="wrap-input100  m-b-20" data-validate="Nhập tên đăng nhập">
					<input class="input100" type="text" name="username" placeholder="Tên đăng nhập">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100  m-b-25" data-validate = "Nhập email">
					<input class="input100" type="text" name="email" placeholder="Email">
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100  m-b-25" data-validate = "Nhập mật khẩu">
					<input class="input100" type="password" name="pass" placeholder="Mật khẩu">
					<span class="focus-input100"></span>
				</div>
				<div class="text-center">
				<i>(Mật khẩu nhiều nhất 16 ký tự,ít nhất 6 ký tự)</i>
				</div>
				<div class="wrap-input100  m-b-25 m-t-5" data-validate = "Nhập lại mật khẩu">
					<input class="input100" type="password" name="repass" placeholder="Nhập lại mật khẩu">
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100  m-b-25" data-validate = "Nhập họ và tên">
					<input class="input100" type="text" name="name" placeholder="Họ và tên">
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100  m-b-25" data-validate = "Nhập SĐT">
					<input class="input100" type="text" name="phone" placeholder="SĐT">
					<span class="focus-input100"></span>
				</div>
				
				<div class="text-center p-t-5 p-b-20">
					<span class="txt3" id="kiemtra">
						
					</span>
				</div>
				
				<div class="wrap-input100  m-b-25" >
					<input class="input100"  name="makh" type="hidden">
				</div>
				
				<div class="container-login100-form-btn p-b-20">
					<input type="submit" class="login100-form-btn" value="Đăng ký">
						
					
				</div>
				
				<div class="text-center">
					<a href="../index.php" class="txt2 hov1 m-l-10">
						Quay lại
					</a>	
						
				</div>

				
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
	<script>
	function hienthimakh() {
			var xhttp;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			document.forms['formdangky']['makh'].value = this.responseText;
				}
			};
			xhttp.open("GET","ngaunhienmaKH.php?cho=themkh", true);
			xhttp.send();
			
			}
		
	window.onload=function(){hienthimakh()};
			
</script>
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>
	<script src="../js/Validate.js"></script>

</body>
</html>
