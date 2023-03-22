<?php 
ini_set('session.auto_start',0);
ini_set('session.cookie_lifetime',0);
include 'sl.php';
require('common.php');
	//đã đang nhập
if(isLogined()==true)
		// kiểm tra đây là khách hàng thì về trang chủ kh
	if($_SESSION['login']['MaQuyen'] == "1" || $_SESSION['login']['MaQuyen'] == "2" )
	{
		header("Location:admin.php");
	}

	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Nhà sách OnePiece</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
		<script type="text/javascript" language="javascript" src="../js/jquery-3.4.0.min.js"></script>
		<script type="text/javascript" language="javascript" src="../js/bootstrap.js"></script>
		<script type="text/javascript" language="javascript" src="../js/giohang.js"></script>
		<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">

		<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
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
		<style>
			
			.intro i {
				color: #00cc66;
				padding-right: 5px;
			}

			.spinner {
				width: 100px;
			}
			.spinner input {
				text-align: center;
			}
			.input-group-btn-vertical {
				position: relative;
				white-space: nowrap;
				width: 1%;
				vertical-align: middle;
				display: table-cell;
			}
			.input-group-btn-vertical > .btn {
				display: block;
				float: none;
				width: 100%;
				max-width: 100%;
				padding: 8px;
				margin-left: -1px;
				position: relative;
				border-radius: 0;
			}
			.input-group-btn-vertical > .btn:first-child {
				border-top-right-radius: 4px;
			}
			.input-group-btn-vertical > .btn:last-child {
				margin-top: -2px;
				border-bottom-right-radius: 4px;
			}
			.input-group-btn-vertical i{
				position: absolute;
				top: 0;
				left: 4px;
			}

			.pb-cmnt-textarea {
				resize: none;
				padding: 20px;
				height: 130px;
				width: 100%;
				border: 1px solid #F2F2F2;
			}

		</style>
	</head>
	<body>

		<!--------------- header --------------->
		<nav class="navbar navbar-inverse " style="border-radius:0px">
			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
					<a class="navbar-brand" href="../index.php" title="Trang chủ"><img src="../images/onepiece.PNG" style="margin:-16px" width="200px" height="52px" alt="logo-trang chủ"></a>
				</div>

				<div class="collapse navbar-collapse" id="myNavbar">
					<div class="row">    
						<div class="col-md-4 col-md-offset-2">
							<form class="navbar-form navbar-left" action="sanpham.php" name="searchIndex">
								<div class="input-group" >
									<input type="hidden" name="theloai" value="tatca">
									<input type="text" class="form-control" placeholder="Tìm kiếm" name="search" size="44">
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit">
											<i class="glyphicon glyphicon-search"></i>
										</button>
									</div>
								</div>
							</form>	
						</div>
						<ul class="nav navbar-nav navbar-right" >
							<li id="loginn"><a href="DangNhap.php"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a></li>
							<li id="logout" class=""><a href="DangKy.php"><span class="glyphicon glyphicon-log-in"></span> Đăng ký</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>

		<!---------------- slder ----------------->

		<div id="carousel-1" class="carousel slide multi-item-carousel" data-ride="carousel" style="margin-top:-20px;height:350px">
			<ol class="carousel-indicators">
				<li data-target="#carousel-1" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-1" data-slide-to="1"></li>
				<li data-target="#carousel-1" data-slide-to="2"></li>
				<li data-target="#carousel-1" data-slide-to="3"></li>
				<li data-target="#carousel-1" data-slide-to="4"></li>
				<li data-target="#carousel-1" data-slide-to="5"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active" style="height:350px">
					<div class="item__third" style="height:350px">
						<img src="../images/qc/0.png" alt="" style="height:350px">
					</div>
				</div>
				<div class="item" style="height:350px">
					<div class="item__third" style="height:350px">
						<img src="../images/qc/1.png" alt="" style="height:350px">
					</div>
				</div>
				<div class="item" style="height:350px">
					<div class="item__third" style="height:350px">
						<img src="../images/qc/2.png" alt="" style="height:350px">
					</div>
				</div>
				<div class="item" style="height:350px">
					<div class="item__third" style="height:350px">
						<img src="../images/qc/3.png" alt="" style="height:350px">
					</div>
				</div>
				<div class="item" style="height:350px">
					<div class="item__third" style="height:350px">
						<img src="../images/qc/4.png" alt="" style="height:350px">
					</div>
				</div>
				<div class="item" style="height:350px">
					<div class="item__third" style="height:350px">
						<img src="../images/qc/5.png" alt="" style="height:350px">
					</div>
				</div>

			</div>
			<a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
			<a href="#carousel-1" class="right carousel-control" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
		</div>
		<script>
			$('.multi-item-carousel .item').each(function(){
				var next = $(this).next();
				if (!next.length) next = $(this).siblings(':first');
				next.children(':first-child').clone().appendTo($(this));
			});
			$('.multi-item-carousel .item').each(function(){
				var prev = $(this).prev();
				if (!prev.length) prev = $(this).siblings(':last');
				prev.children(':nth-last-child(2)').clone().prependTo($(this));
			});
		</script>


		<!--------------------------------------------- navbar menu ------------------------------------------------->

		<nav class="navbar navbar-inverse" style="margin-top:0px;border-radius:0px">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar2">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar2">

					<ul class="nav navbar-nav">
						<li class="active"><a href="../index.php">Trang chủ</a></li>
						<li><a href="About.php">Về chúng tôi</a></li>
						<li><a href="Contact.php">Liên hệ</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Thể loại <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="sanpham.php?theloai=ngoaingu&page=1" >Học ngoại ngữ</a></li>
								<li><a href="sanpham.php?theloai=kinhte&page=1" >Kinh tế</a></li>
								<li><a href="sanpham.php?theloai=kynangsong&page=1" >Kỹ năng sống</a></li>
								<li><a href="sanpham.php?theloai=lichsu&page=1" >Lịch sử</a></li>
								<li><a href="sanpham.php?theloai=chuyennganh&page=1" >Sách chuyên ngành</a></li>
								<li><a href="sanpham.php?theloai=thieunhi&page=1" >Sách thiếu nhi</a></li>
								<li><a href="sanpham.php?theloai=tuoiteen&page=1" >Sách tuổi teen</a></li>
								<li><a href="sanpham.php?theloai=vanhoc&page=1" >Sách văn học</a></li>
								<li role="separator" class="divider"></li>
								<li class="dropdown-header"></li>
								<li><a href="sanpham.php?theloai=tatca&page=1">Tất cả</a></li>
							</ul>
						</li>
					</ul>


					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="giohang.php"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng <span class="badge badge-secondary " style="margin-bottom: 2px;"><?php echo $soluongsp ?></span></a>
						</li>
					</ul>
				</div>


			</div>
		</nav>
		<!---------------------content sach ----------------------->
		<div class="container" >
			<h3>Hoá đơn</h3>
			<hr style="border:1px solid black;">
			<div class="row">
				<div id="hoadon">
					<form action="xulyxoadonhang.php" method="GET" onsubmit="return confirmxoa()">
						<div class="col-md-12">
							<?php 
							if(empty($_SESSION['login'])){//Check xem có session login, nếu ko có thì bắt đăng nhập;
								echo '<script>
								$(function(){
									$(`#hoadon`).html(`<table class="table"><tr><td style="background-color:#ddd; height: 150px;text-align: center;padding-top:100px ">Bạn chưa đăng nhập!!Vui lòng đăng nhập để xem hoá đơn</td></tr><tr><td style="background-color:#ddd;border: 0;height: 200px;text-align: center;"><button class="thanhtoan" onclick="dangnhap()">Đăng nhập</button></td></tr></table>`);
									})
									</script>';
								}
								else{//Khi đã đăng nhập
									if(isset($_GET['MaHD']) && isset($_GET['MaKH'])){//Nếu có MaHD và MaKH
										include 'hoadon.php';
										if(Chitiet::KTHD($_GET['MaHD'],$_GET['MaKH'])==1&& $_GET['MaKH']==$_SESSION['login']['MaKH']){
											echo '<div class="row">
											<div class="col-md-12">

											<table class="table table-striped" id="muahang">
											<thead>
											<tr style="background-color: #101010;">
											<th>Sản phẩm</th>
											<th>Tên sách</th>
											<th>Giá</th>
											<th>Số lượng</th>
											<th>Tổng</th>
											</tr>
											</thead>
											<tbody>
											'.Chitiet::thongtinchitiet($_GET['MaHD']).'
											</tbody>
											</table>

											</div>
											</div>';
										}
										else{//Sai
											echo '<script>
													index();		
												</script>';
											}
										}
										else{
											include 'hoadon.php';
											if(Chitiet::KTKH($_SESSION['login']['MaKH'])==1)
											{	
												echo '<table class="table table-striped" id="muahang">
												<thead>
												<tr style="background-color: #101010;">
												<th>Xoá đơn hàng</th>
												<th>Chi tiết</th>
												<th>Mã hoá đơn</th>
												<th>Ngày đặt hàng</th>
												<th>Địa chỉ</th>
												<th>Hình thức thanh toán</th>
												<th>Hình thức giao hàng</th>
												<th>Tổng sản phẩm</th>
												<th>Tổng tiền</th>
												<th>Tình trạng</th>
												</tr>
												</thead>
												<tbody>'.Chitiet::ChitietHD($_SESSION['login']['MaKH']).'
												</tbody>
												</table>';
											}
											else{
												echo '<script>
												$(function(){
													$(`#hoadon`).html(`<table class="table"><tr><td style="background-color:#ddd; height: 150px;text-align: center;padding-top:100px ">Bạn chưa có đơn hàng nào!!!</td></tr><tr><td style="background-color:#ddd;border: 0;height: 200px;text-align: center;"><button class="thanhtoan" onclick="index()">Trang chủ</button></td></tr></table>`);
													})
													</script>';
												}
											}
										}
										?>
										<input type="hidden" id="MaHD" name="MaHD" value="">
									</div>
								</form>
							</div>
						</div>
					</div>
					<!---------------------- footer ----------------------->
					<div class="container">
						<hr style="border:1px solid black;">
						<div class="gioithieu">
							<h4>Mua Sách Online Tại Onepiece.Vn</h4><br>
							<p>- Ra đời từ năm 2011, đến nay Onepiece.vn đã trở thành địa chỉ mua sách online quen thuộc của hàng ngàn độc giả trên cả nước. Với đầu sách phong phú, thuộc các thể loại: Văn học nước ngoại, Văn học trong nước, Kinh tế, Kỹ năng sống, Thiếu nhi, Sách học ngoại ngữ, Sách chuyên ngành,... được cập nhật liên tục từ các nhà xuất bản uy tín trong nước. </p><br>
							<p>- Khi mua sách online tại Onepiece.vn, Quý khách được Bọc plastic miễn phí đến 99% (trừ sách bìa cứng, sách dạng hộp - dạng đặc biệt, sách khổ quá to, ...)</p><br>
							<p>- Ngoài ra, với hình thức Giao hàng thu tiền tận nơi và Đổi hàng trong vòng 7 ngày nếu sách có bất kỳ lỗi nào trong quá trình in ấn sẽ giúp Quý khách yên tâm hơn khi mua sắm tại Onepiece.vn</p>
						</div>
						<hr style="border:1px solid black;">
						<div class="chitietfooter">
							<h4>HỖ TRỢ KHÁCH HÀNG</h4><br>
							Email: admin@onepiece.vn<br>
							Hotline: 0938 424 289
						</div>
						<div class="chitietfooter">
							<h4>Giới Thiệu</h4><br>
							Về Onepiece<br>
							Tuyển dụng
						</div>
						<div class="chitietfooter">
							<h4>Tài Khoản</h4><br>
							Tài khoản<br>
							Danh sách đơn hàng<br>
							Thông báo
						</div>
						<div class="chitietfooter">
							<h4>Hướng Dẫn</h4><br>
							Hướng dẫn mua hàng<br>
							Phương thức thanh toán<br>
							Câu hỏi thường gặp<br>
							Phương thức vận chuyển
						</div>
					</div>
					<div id="php"></div>
				</div>
				<script src="../js/Validate.js"></script>
				<?php
				if(isLogined()==true)
				{
					echo "<script>
					document.getElementById('loginn').innerHTML=''; 
					</script>";
					$s="<a class=\'dropdown-toggle\' data-toggle=\'dropdown\' href=\'#\'>"
					.    "<i class=\'glyphicon glyphicon-user\'></i> ".$_SESSION['login']['TenDangNhap']." <b class=\'caret\'></b>"
					."</a>"
					."<ul class=\'dropdown-menu\'>"
					.    "<li><a href=\'thongtincanhanUser.php\'><i class=\'glyphicon glyphicon-user\'></i> Thông tin tài khoản </a>"
					.    "</li>"
					.    "<li><a href=\'chitiethd.php\'><i class=\'glyphicon glyphicon-list-alt\'></i> Xem đơn hàng </a>"
					.    "</li>"
					.    "<li class=\'divider\'></li>"
					.    "<li><a href=\'xulydangnhapUser.php?dangxuat=1\'><i class=\'glyphicon glyphicon-log-out\'></i> Đăng xuất </a>"
					.    "</li>"
					."</ul>";
					echo "<script>"
					."document.getElementById('logout').setAttribute('class','dropdown'); "
					."document.getElementById('logout').innerHTML='".$s."';"
					."</script>";
				}
				?>
			</body>
			</html>
