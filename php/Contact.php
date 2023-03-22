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
	<link rel="stylesheet" type="text/css" href="../css/Contact.css" />
	<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../js/bootstrap.js"></script>
	
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
					<div class="col-md-5 col-md-offset-2">
						<form class="navbar-form navbar-left" action="php/sanpham.php" name="searchIndex">
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
						<li id="loginn"><a href="php/DangNhap.php"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a></li>					
						<li id="logout" class=""><a href="php/Dangky.php"><span class="glyphicon glyphicon-log-in"></span> Đăng ký</a></li>	
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

	<style>
		.multi-item-carousel {
			overflow: hidden;
		}
		.multi-item-carousel img {
			height: auto;
			width: 100%;
		}
		.multi-item-carousel .carousel-control.left, 
		.multi-item-carousel .carousel-control.right {
			background: rgba(255, 255, 255, 0.3);
			width: 25%;
		}
		.multi-item-carousel .carousel-inner {
			width: 150%;
			left: -25%;
		}
		.carousel-inner > .item.next, 
		.carousel-inner > .item.active.right {
			-webkit-transform: translate3d(33%, 0, 0);
			transform: translate3d(33%, 0, 0);
		}
		.carousel-inner > .item.prev, 
		.carousel-inner > .item.active.left {
			-webkit-transform: translate3d(-33%, 0, 0);
			transform: translate3d(-33%, 0, 0);
		}
		.item__third {
			float: left;
			position: relative;  /* captions can now be added */
			width: 33.33333333%;
		}

	</style>
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
					<li><a href="../index.php">Trang chủ</a></li>
					<li><a href="About.php">Về chúng tôi</a></li>
					<li class="active"><a href="Contact.php">Liên hệ</a></li>
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
						<a href="giohang.php"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng <span class="badge badge-secondary" style="margin-bottom: 2px;"><?php echo $soluongsp ?></span></a>
					</li>
				</ul>
			</div>


		</div>
	</nav>
	<!---------------------content sach ----------------------->
	<div class="footer_center">
	<div class="container">
		<div class="info-foot">
			<div class="title_c">
			CỬA HÀNG ONE PIECE VN
			</div>
			<div class="address">
				<div class="items">
					<div class="title">Hà Nội</div>
					<div class="item">
					89 Hàng Bông </div>
					<div class="item">
					Số 26 ngõ 1 Phạm Tuấn Tài </div>
					<div class="item">
					45E Nguyễn Chí Thanh </div>
				</div>
				<div class="items">
					<div class="title">Hồ Chí Minh</div>
					<div class="item">
					456/30A đường Cao Thắng, Q.10 </div>
					<div class="item">
					189/19 Hoàng Hoa Thám, Bình Thạnh </div>
					<div class="item">
					416/36 Dương Quảng Hàm, P.5, Gò Vấp </div>
					<div class="item">
					 4F Robins Crescent Mall - Quận 7 </div>
					<div class="item">
					15/7 Nguyễn Trãi, Quận 5 </div>
					<div class="item">
					Tầng 4, Vạn Hạnh Mall, 11 Sư Vạn Hạnh, Phường 12, Quận 10, Hồ Chí Minh </div>
				</div>
				<div class="items">
					<div class="title">Đà Nẵng</div>
					<div class="item">
					134 Nguyễn Đức Trung </div>
					</div>
					<div class="items">
					<div class="title">Cần Thơ</div>
					<div class="item">
					85-87 Trương Định, Ninh Kiều </div>
				</div>
				<div class="items">
					<div class="title">20+ CỬA HÀNG</div>
					<div class="item">
					<a href="#">Xem tất cả >></p></a>
					</div>
			</div>
			</div>
		</div>
	</div>
	</div>

	<!---------------------- footer ----------------------->
	<div class="container">

		
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
				.    "<li><a href=\'DonHang.php\'><i class=\'glyphicon glyphicon-list-alt\'></i> Xem đơn hàng </a>"
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


