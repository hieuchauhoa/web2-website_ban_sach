<?php
ini_set('session.auto_start', 0);
ini_set('session.cookie_lifetime', 0);
include 'sl.php';
require('common.php');
//đã đang nhập
if (isLogined() == true)
	// kiểm tra đây là khách hàng thì về trang chủ kh
	if ($_SESSION['login']['MaQuyen'] == "1" || $_SESSION['login']['MaQuyen'] == "2") {
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

		.input-group-btn-vertical>.btn {
			display: block;
			float: none;
			width: 100%;
			max-width: 100%;
			padding: 8px;
			margin-left: -1px;
			position: relative;
			border-radius: 0;
		}

		.input-group-btn-vertical>.btn:first-child {
			border-top-right-radius: 4px;
		}

		.input-group-btn-vertical>.btn:last-child {
			margin-top: -2px;
			border-bottom-right-radius: 4px;
		}

		.input-group-btn-vertical i {
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

		#md #hoten,
		#diachi,
		#sdt,
		#email {
			color: red;
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
							<div class="input-group">
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
					<ul class="nav navbar-nav navbar-right">
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
		$('.multi-item-carousel .item').each(function() {
			var next = $(this).next();
			if (!next.length) next = $(this).siblings(':first');
			next.children(':first-child').clone().appendTo($(this));
		});
		$('.multi-item-carousel .item').each(function() {
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
							<li><a href="sanpham.php?theloai=ngoaingu&page=1">Học ngoại ngữ</a></li>
							<li><a href="sanpham.php?theloai=kinhte&page=1">Kinh tế</a></li>
							<li><a href="sanpham.php?theloai=kynangsong&page=1">Kỹ năng sống</a></li>
							<li><a href="sanpham.php?theloai=lichsu&page=1">Lịch sử</a></li>
							<li><a href="sanpham.php?theloai=chuyennganh&page=1">Sách chuyên ngành</a></li>
							<li><a href="sanpham.php?theloai=thieunhi&page=1">Sách thiếu nhi</a></li>
							<li><a href="sanpham.php?theloai=tuoiteen&page=1">Sách tuổi teen</a></li>
							<li><a href="sanpham.php?theloai=vanhoc&page=1">Sách văn học</a></li>
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
	<div class="container">
		<h3>Giỏ hàng</h3>
		<hr style="border:1px solid black;">
		<div class="row">
			<div id="giohangrong">
				<div class="col-md-8">
					<?php
					include 'cart.php';
					if (!empty($_SESSION['cart'])) {
						// echo "<pre />";
						//var_dump($_SESSION['cart']);
						$s = "";
						$demsl = 0;
						$tong = 0;
						foreach ($_SESSION['cart'] as $key => $value) {
							//var_dump($key);
							if ($_SESSION['cart'][$key]['theloai'] == 'NN') {
								$s = $s . '<tr id="' . $key . '">
									<td><img class="icon" src="../images/thungrac.gif" alt="" onclick="xoasp(`' . $key . '`)"></td>
									<td>
									<a href="chitietsach.php?theloai=ngoaingu&masach=' . $key . '"><img class="biasach" src="../images/ngoaingu/' . $_SESSION["cart"][$key]["hinhanh"] . '" alt=""></a></td>
									<td>' . $_SESSION["cart"][$key]["tensach"] . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"]) . 'đ</td>
									<td>' . '<div id="buyandnumber">'
									. '<div class="input-group spinner" id="nhapso">'
									. '<input type="number" class="form-control" value="' . $_SESSION["cart"][$key]["sl"] . '" name="sl" id="soluong" min="1" onkeyup="thaydoi(`' . $key . '`)">'
									. '<div class="input-group-btn-vertical">'
									. '<button class="btn btn-default tang" type="button" onclick="tang(`' . $key . '`)"><i class="fa fa-caret-up"></i></button>'
									. '<button class="btn btn-default giam" type="button" onclick="giam(`' . $key . '`)"><i class="fa fa-caret-down"></i></button>'
									. '</div>'
									. '</div>'
									. '</div>' . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"]) . 'đ</td>
									<input type="hidden" id="ma_' . $key . '" value="' . $_SESSION["cart"][$key]["slton"] . '">
									</tr>';
								$demsl += $_SESSION["cart"][$key]["sl"];
								$tong += $_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"];
							}
							if ($_SESSION['cart'][$key]['theloai'] == 'CN') {
								$s = $s . '<tr id="' . $key . '">
									<td><img class="icon" src="../images/thungrac.gif" alt="" onclick="xoasp(`' . $key . '`)"></td>
									<td>
									<a href="chitietsach.php?theloai=chuyennganh&masach=' . $key . '"><img class="biasach" src="../images/chuyennganh/' . $_SESSION["cart"][$key]["hinhanh"] . '" alt=""></a></td>
									<td>' . $_SESSION["cart"][$key]["tensach"] . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"]) . 'đ</td>
									<td>' . '<div id="buyandnumber">'
									. '<div class="input-group spinner" id="nhapso">'
									. '<input type="number" class="form-control" value="' . $_SESSION["cart"][$key]["sl"] . '" name="sl" id="soluong" min="1" onkeyup="thaydoi(`' . $key . '`)">'
									. '<div class="input-group-btn-vertical">'
									. '<button class="btn btn-default tang" type="button" onclick="tang(`' . $key . '`)"><i class="fa fa-caret-up"></i></button>'
									. '<button class="btn btn-default giam" type="button" onclick="giam(`' . $key . '`)"><i class="fa fa-caret-down"></i></button>'
									. '</div>'
									. '</div>'
									. '</div>'
									. '</div>' . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"]) . 'đ</td>
									<input type="hidden" id="ma_' . $key . '" value="' . $_SESSION["cart"][$key]["slton"] . '">
									</tr>';
								$demsl += $_SESSION["cart"][$key]["sl"];
								$tong += $_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"];
							}
							if ($_SESSION['cart'][$key]['theloai'] == 'KNS') {
								$s = $s . '<tr id="' . $key . '">
									<td><img class="icon" src="../images/thungrac.gif" alt="" onclick="xoasp(`' . $key . '`)"></td>
									<td>
									<a href="chitietsach.php?theloai=kynangsong&masach=' . $key . '"><img class="biasach" src="../images/kynangsong/' . $_SESSION["cart"][$key]["hinhanh"] . '" alt=""></a></td>
									<td>' . $_SESSION["cart"][$key]["tensach"] . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"]) . 'đ</td>
									<td>' . '<div id="buyandnumber">'
									. '<div class="input-group spinner" id="nhapso">'
									. '<input type="number" class="form-control" value="' . $_SESSION["cart"][$key]["sl"] . '" name="sl" id="soluong" min="1" onkeyup="thaydoi(`' . $key . '`)">'
									. '<div class="input-group-btn-vertical">'
									. '<button class="btn btn-default tang" type="button" onclick="tang(`' . $key . '`)"><i class="fa fa-caret-up"></i></button>'
									. '<button class="btn btn-default giam" type="button" onclick="giam(`' . $key . '`)"><i class="fa fa-caret-down"></i></button>'
									. '</div>'
									. '</div>'
									. '</div>'
									. '</div>' . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"]) . 'đ</td>
									<input type="hidden" id="ma_' . $key . '" value="' . $_SESSION["cart"][$key]["slton"] . '">
									</tr>';
								$demsl += $_SESSION["cart"][$key]["sl"];
								$tong += $_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"];
							}
							if ($_SESSION['cart'][$key]['theloai'] == 'KT') {
								$s = $s . '<tr id="' . $key . '">
									<td><img class="icon" src="../images/thungrac.gif" alt="" onclick="xoasp(`' . $key . '`)"></td>
									<td>
									<a href="chitietsach.php?theloai=kinte&masach=' . $key . '"><img class="biasach" src="../images/kinhte/' . $_SESSION["cart"][$key]["hinhanh"] . '" alt=""></a></td>
									<td>' . $_SESSION["cart"][$key]["tensach"] . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"]) . 'đ</td>
									<td>' . '<div id="buyandnumber">'
									. '<div class="input-group spinner" id="nhapso">'
									. '<input type="number" class="form-control" value="' . $_SESSION["cart"][$key]["sl"] . '" name="sl" id="soluong" min="1" onkeyup="thaydoi(`' . $key . '`)">'
									. '<div class="input-group-btn-vertical">'
									. '<button class="btn btn-default tang" type="button" onclick="tang(`' . $key . '`)"><i class="fa fa-caret-up"></i></button>'
									. '<button class="btn btn-default giam" type="button" onclick="giam(`' . $key . '`)"><i class="fa fa-caret-down"></i></button>'
									. '</div>'
									. '</div>'
									. '</div>'
									. '</div>' . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"]) . 'đ</td>
									<input type="hidden" id="ma_' . $key . '" value="' . $_SESSION["cart"][$key]["slton"] . '">
									</tr>';
								$demsl += $_SESSION["cart"][$key]["sl"];
								$tong += $_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"];
							}
							if ($_SESSION['cart'][$key]['theloai'] == 'LS') {
								$s = $s . '<tr id="' . $key . '">
									<td><img class="icon" src="../images/thungrac.gif" alt="" onclick="xoasp(`' . $key . '`)"></td>
									<td>
									<a href="chitietsach.php?theloai=lichsu&masach=' . $key . '"><img class="biasach" src="../images/lichsu/' . $_SESSION["cart"][$key]["hinhanh"] . '" alt=""></a></td>
									<td>' . $_SESSION["cart"][$key]["tensach"] . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"]) . 'đ</td>
									<td>' . '<div id="buyandnumber">'
									. '<div class="input-group spinner" id="nhapso">'
									. '<input type="number" class="form-control" value="' . $_SESSION["cart"][$key]["sl"] . '" name="sl" id="soluong" min="1" onkeyup="thaydoi(`' . $key . '`)">'
									. '<div class="input-group-btn-vertical">'
									. '<button class="btn btn-default tang" type="button" onclick="tang(`' . $key . '`)"><i class="fa fa-caret-up"></i></button>'
									. '<button class="btn btn-default giam" type="button" onclick="giam(`' . $key . '`)"><i class="fa fa-caret-down"></i></button>'
									. '</div>'
									. '</div>'
									. '</div>'
									. '</div>' . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"]) . 'đ</td>
									<input type="hidden" id="ma_' . $key . '" value="' . $_SESSION["cart"][$key]["slton"] . '">
									</tr>';
								$demsl += $_SESSION["cart"][$key]["sl"];
								$tong += $_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"];
							}
							if ($_SESSION['cart'][$key]['theloai'] == 'TN') {
								$s = $s . '<tr id="' . $key . '">
									<td><img class="icon" src="../images/thungrac.gif" alt="" onclick="xoasp(`' . $key . '`)"></td>
									<td>
									<a href="chitietsach.php?theloai=thieunhi&masach=' . $key . '"><img class="biasach" src="../images/thieunhi/' . $_SESSION["cart"][$key]["hinhanh"] . '" alt=""></a></td>
									<td>' . $_SESSION["cart"][$key]["tensach"] . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"]) . 'đ</td>
									<td>' . '<div id="buyandnumber">'
									. '<div class="input-group spinner" id="nhapso">'
									. '<input type="number" class="form-control" value="' . $_SESSION["cart"][$key]["sl"] . '" name="sl" id="soluong" min="1" onkeyup="thaydoi(`' . $key . '`)">'
									. '<div class="input-group-btn-vertical">'
									. '<button class="btn btn-default tang" type="button" onclick="tang(`' . $key . '`)"><i class="fa fa-caret-up"></i></button>'
									. '<button class="btn btn-default giam" type="button" onclick="giam(`' . $key . '`)"><i class="fa fa-caret-down"></i></button>'
									. '</div>'
									. '</div>'
									. '</div>'
									. '</div>' . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"]) . 'đ</td>
									<input type="hidden" id="ma_' . $key . '" value="' . $_SESSION["cart"][$key]["slton"] . '">
									</tr>';
								$demsl += $_SESSION["cart"][$key]["sl"];
								$tong += $_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"];
							}
							if ($_SESSION['cart'][$key]['theloai'] == 'TT') {
								$s = $s . '<tr id="' . $key . '">
									<td><img class="icon" src="../images/thungrac.gif" alt="" onclick="xoasp(`' . $key . '`)"></td>
									<td>
									<a href="chitietsach.php?theloai=tuoiteen&masach=' . $key . '"><img class="biasach" src="../images/tuoiteen/' . $_SESSION["cart"][$key]["hinhanh"] . '" alt=""></a></td>
									<td>' . $_SESSION["cart"][$key]["tensach"] . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"]) . 'đ</td>
									<td>' . '<div id="buyandnumber">'
									. '<div class="input-group spinner" id="nhapso">'
									. '<input type="number" class="form-control" value="' . $_SESSION["cart"][$key]["sl"] . '" name="sl" id="soluong" min="1" onkeyup="thaydoi(`' . $key . '`)">'
									. '<div class="input-group-btn-vertical">'
									. '<button class="btn btn-default tang" type="button" onclick="tang(`' . $key . '`)"><i class="fa fa-caret-up"></i></button>'
									. '<button class="btn btn-default giam" type="button" onclick="giam(`' . $key . '`)"><i class="fa fa-caret-down"></i></button>'
									. '</div>'
									. '</div>'
									. '</div>'
									. '</div>' . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"]) . 'đ</td>
									<input type="hidden" id="ma_' . $key . '" value="' . $_SESSION["cart"][$key]["slton"] . '">
									</tr>';
								$demsl += $_SESSION["cart"][$key]["sl"];
								$tong += $_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"];
							}
							if ($_SESSION['cart'][$key]['theloai'] == 'VH') {
								$s = $s . '<tr id="' . $key . '">
									<td><img class="icon" src="../images/thungrac.gif" alt="" onclick="xoasp(`' . $key . '`)"></td>
									<td>
									<a href="chitietsach.php?theloai=vanhoc&masach=' . $key . '"><img class="biasach" src="../images/vanhoc/' . $_SESSION["cart"][$key]["hinhanh"] . '" alt=""></a></td>
									<td>' . $_SESSION["cart"][$key]["tensach"] . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"]) . 'đ</td>
									<td>' . '<div id="buyandnumber">'
									. '<div class="input-group spinner" id="nhapso">'
									. '<input type="number" class="form-control" value="' . $_SESSION["cart"][$key]["sl"] . '" name="sl" id="soluong" min="1" onkeyup="thaydoi(`' . $key . '`)">'
									. '<div class="input-group-btn-vertical">'
									. '<button class="btn btn-default tang" type="button" onclick="tang(`' . $key . '`)"><i class="fa fa-caret-up"></i></button>'
									. '<button class="btn btn-default giam" type="button" onclick="giam(`' . $key . '`)"><i class="fa fa-caret-down"></i></button>'
									. '</div>'
									. '</div>'
									. '</div>'
									. '</div>' . '</td>
									<td>' . number_format($_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"]) . 'đ</td>
									<input type="hidden" id="ma_' . $key . '" value="' . $_SESSION["cart"][$key]["slton"] . '">
									</tr>';
								$demsl += $_SESSION["cart"][$key]["sl"];
								$tong += $_SESSION["cart"][$key]["gia"] * $_SESSION["cart"][$key]["sl"];
							}
						}
						echo '<table class="table table-striped" id="muahang">
							<thead>
							<tr style="background-color: #101010;">
							<th>Xoá</th>
							<th>Sản phẩm</th>
							<th>Tên sản phẩm</th>
							<th>Giá</th>
							<th>Số lượng</th>
							<th>Tổng</th>
							</tr>
							</thead>
							<tbody>
							' . $s . '
							</tbody>
							</table>';
					} else {
						echo '<script>
							$(function(){
								$(`#giohangrong`).html(`<table class="table"><tr><td style="background-color:#ddd; height: 150px;text-align: center;padding-top:100px ">Không có sản phẩm nào trong giỏ hàng của bạn</td></tr><tr><td style="background-color:#ddd;border: 0;height: 200px;text-align: center;"><button class="thanhtoan" onclick="back()">Tiếp tục mua sắm</button></td></tr></table>`);
								})
								</script>';
					}
					?>
				</div>
				<form name="thanhtoan" action="xulythanhtoan.php" method="GET" onsubmit="return ktgiohang()">
					<div class="col-md-4">
						<?php
						include 'diachi.php';
						if (!empty($_SESSION['login'])) {
							if ($_SESSION['login']['htgh'] == 1) {
								$htgh = "Hình thức giao hàng (Giao hàng bình thường 25.000đ -Giao hàng từ 3-5 ngày )";
								$ship = 25000;
							}
							if ($_SESSION['login']['htgh'] == 2) {
								$htgh = "Hình thức giao hàng (Giao hàng nhanh  50.000đ - Giao hàng từ 1-2 ngày)";
								$ship = 50000;
							}
							if ($_SESSION['login']['httt'] == 1) {
								$httt = "Hình thức thanh toán (Thẻ ngân hàng)";
							}
							if ($_SESSION['login']['httt'] == 2) {
								$httt = "Hình thức thanh toán (Thẻ Visa/Master Card)";
							}
							if ($_SESSION['login']['httt'] == 3) {
								$httt = "Hình thức thanh toán (Thanh toán khi nhận hàng)";
							}
							$dc = diachi::showdiachi($_SESSION['login']['MaKH']);
							if ($_SESSION['login']['DiaChi'] != "") $dc = $_SESSION['login']['DiaChi'];
							echo '
									<table class="table table-striped" id="thongtingiaohang">
									<thead>
									<tr style="background-color: #101010;">
									<th colspan="2" style="text-align: center;">Thanh toán vận chuyển</th>
									</tr>
									</thead>
									<tr>
									<td><i class="glyphicon glyphicon-user"></i><b>' . $_SESSION['login']['HoTen'] . '
									</td>
									<td id=""><a style="cursor: pointer;" onclick="chinhsua()">Chỉnh sửa</a></td>
									</tr>
									<tr>
									<td><span class="glyphicon glyphicon-map-marker"></span><b>' . $dc . '
									</td>
									<td id=""><a style="cursor: pointer;" onclick="chinhsua()">Chỉnh sửa</a></td>
									</tr>
									<tr>
									<td><span class="glyphicon glyphicon-phone"></span>' . $_SESSION['login']['SĐT'] . '
									</td>
									<td id=""><a style="cursor: pointer;" onclick="chinhsua()">Chỉnh sửa</a></td>
									</tr>
									<tr>
									<tr>
									<td><span class="glyphicon glyphicon-envelope"> </span> ' . $_SESSION['login']['Email'] . '
									</td>
									<td id=""><a onclick="chinhsua()" style="cursor: pointer;">Chỉnh sửa</a></td>
									</tr>
									<tr>
									<td><span class="glyphicon glyphicon-credit-card" ></span> ' . $httt . '
									</td>
									<td id=""><a style="cursor: pointer;" onclick="hinhthucthanhtoan()">Chỉnh sửa</a></td>
									</tr>
									<tr>
									<td><i class="fa fa-truck" aria-hidden="true"></i> ' . $htgh . '
									</td>
									<td id=""><a onclick="hinhthucgiaohang()" style="cursor: pointer;">Chỉnh sửa</a></td>
									</tr>
									<thead>
									<tr style="background-color: #101010;">
									<th colspan="2" style="text-align: center;">Thông tin đơn hàng</th>
									</tr>
									</thead>
									<tbody>
									<tr>
									<td>Số lượng sản phẩm</td>
									<td id="demsl">' . $demsl . '</td>
									</tr>
									<tr>
									<td>Tổng</td>
									<td id="tong">' . number_format($tong) . 'đ</td>
									</tr>
									<tr>
									<td>Phí vận chuyển</td>
									<td>' . number_format($ship) . 'đ</td>
									</tr>
									<tr>
									<td colspan="2" align="center">
									<hr width="70%" style="border: 1px solid;margin: 0">
									</td>
									</tr>	
									<tr>
									<td>Thành tiền</td>
									<td id="thanhtien">' . number_format($tong + $ship) . 'đ</td>
									</tr>
									<tr>
									<td align="center" colspan="2"><a style="color:black;"><input type="submit" value="Thanh toán" class="thanhtoan" data-toggle="modal" data-target="#myModal";"></a></td>
									</tr>
									</tbody>
									<input type="hidden" name="MaKH" value="' . $_SESSION['login']['MaKH'] . '">
									<input type="hidden" name="DiaChi" value="' . $dc . '">
									<input type="hidden" name="TongSoLuong" value="' . $demsl . '">
									<input type="hidden" name="TongTien" value="' . ($tong + $ship) . '">
									<input type="hidden" name="TinhTrang" value="Chưa thanh toán xong">
									</table>';
						} else {
							echo '
									<table class="table table-striped">
									<tr style="background-color: #101010;">
									<th colspan="2" style="text-align: center;">Thông tin đơn hàng</th>
									</tr>
									</thead>
									<tbody>
									<tr>
									<td>Số lượng sản phẩm</td>
									<td id="demsl">' . $demsl . '</td>
									</tr>
									<tr>
									<td>Tổng</td>
									<td id="tong">' . number_format($tong) . 'đ</td>
									</tr>
									<tr>
									<td>Phí vận chuyển(Tạm tính)</td>
									<td>' . number_format(25000) . 'đ</td>
									</tr>
									<tr>
									<td colspan="2" align="center">
									<hr width="70%" style="border: 1px solid;margin: 0">
									</td>
									</tr>	
									<tr>
									<td>Thành tiền</td>
									<td id="thanhtien">' . number_format($tong + 25000) . 'đ</td>
									</tr>
									<tr>
									<td align="center" colspan="2"><a style="color:black;"><input type="button" value="Thanh toán" class="thanhtoan" data-toggle="modal" data-target="#myModal"></a></td>
									</tr>
									</tbody>
									</table>';
						}
						?>
					</div>
					<input type="hidden" name="htthanhtoan" value="<?php echo $_SESSION['login']['httt']; ?>" id="htthanhtoan">
					<input type="hidden" name="htgiaohang" value="<?php echo $_SESSION['login']['htgh']; ?>" id="htgiaohang">

				</form>
			</div>
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


	<!-- The Modal -->
	<?php
	if (empty($_SESSION['login'])) {
		echo '<div class="modal fade" id="myModal">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title"><label for="">Đăng nhập</label></h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body" style="text-align: center;">
			Bạn chưa đăng nhập. Vui lòng đăng nhập để mua hàng!!!
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
			<div class="row">
			<div class="col-sm-6"><a href="./DangNhap.php"><button style="background-color: #007bff;border-color:#007bff" type="button" class="btn btn-danger">Đăng nhập</button></a></div>
			<div class="col-sm-6" style="text-align: left;"><button type="button" style="width: 90px" class="btn btn-danger" data-dismiss="modal">Quay lại</button></div>
			</div>
			</div>
			</div>
			</div>
			</div>';
	}
	?>
	<div class="modal fade" id="md">
		<form name="info" action="suainfo.php" method="POST" onsubmit="return checkinfo()">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action=""></form>
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Chỉnh sửa thông tin</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<?php
						echo '<div class="form-group row">
							<input type="hidden" name="makhachhang" value="' . $_SESSION['login']['MaKH'] . '">
							<input type="hidden" name="tendangnhap" value="' . $_SESSION['login']['TenDangNhap'] . '">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Họ tên</label>
							<div class="col-sm-9">
							<input type="text" name="hoten" class="form-control" id="inputEmail3" placeholder="Họ tên" value="' . $_SESSION['login']['HoTen'] . '">
							</div>
							<div class="col-md-1"><span id="hoten"></span></div>
							</div>
							<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Địa chỉ</label>
							<div class="col-sm-3">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Số đường" value="" name="duong">
							</div>
							<div class="col-sm-2">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Phường" value="" name="phuong">
							</div>
							<div class="col-sm-2">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Quận" value="" name="quan">
							</div>
							<div class="col-sm-2">
							<input type="text" class="form-control" id="inputEmail3" placeholder="TP" value="" name="TP">
							</div>
							<div class="col-md-1"><span id="diachi"></span></div>
							</div>
							<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">SĐT</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" id="inputEmail3" placeholder="SĐT" name="sdt" value="' . $_SESSION['login']['SĐT'] . '">
							</div>
							<div class="col-md-1"><span id="sdt"></span></div>
							</div>
							<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="' . $_SESSION['login']['Email'] . '">
							</div>
							<div class="col-md-1"><span id="email"></span></div>
							</div>
							</div>';
						?>
						<!-- Modal footer -->
						<div class="modal-footer">
							<div class="row">
								<div class="col-sm-6"><a><button style="background-color: #007bff;border-color:#007bff" type="submit" class="btn btn-danger">Thay đổi</button></a></div>
								<div class="col-sm-6" style="text-align: left;"><button type="button" style="width: 90px" class="btn btn-danger" data-dismiss="modal">Quay lại</button></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</form>
	</div>
	<!--Hinh thức thanh toán-->
	<div class="modal fade" id="httt">
		<form action="suainfo.php" method="POST">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action=""></form>
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Phương thức thanh toán</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<div class="row" style="text-align: center;">
							<div class="col-sm-4"> <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" onclick="thenganhang()">Thẻ ngân hàng</div>
							<div class="col-sm-4"> <input type="radio" class="form-check-input" name="optradio" onclick="the()" value="option1">Thẻ Visa/Master Card</div>
							<div class="col-sm-4"> <input type="radio" class="form-check-input" id="bt" onclick="nhanhang()" name="optradio" value="option1" checked>Thanh toán khi nhận hàng</div>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							<div class="row">
								<div class="col-sm-6"><a><button style="background-color: #007bff;border-color:#007bff" type="button" class="btn btn-danger" data-dismiss="modal" onclick="httt()">Thay đổi</button></a></div>
								<div class="col-sm-6" style="text-align: left;"><button type="button" style="width: 90px" class="btn btn-danger" data-dismiss="modal">Quay lại</button></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</form>
	</div>

	<!--Thẻ ngân hàng-->
	<div class="modal fade" id="theng">
		<form action="suainfo.php" method="POST">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action=""></form>
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Phương thức thanh toán</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<div class="row" style="text-align: center;">
							<div class="col-sm-4"> <input type="radio" class="form-check-input" id="tng" name="optradio" value="option1" onclick="thenganhang()" checked>Thẻ ngân hàng</div>
							<div class="col-sm-4"> <input type="radio" class="form-check-input" id="radio1" name="optradio" onclick="the()" value="option1">Thẻ Visa/Master Card</div>
							<div class="col-sm-4"> <input type="radio" onclick="nhanhang()" class="form-check-input" id="radio1" name="optradio" value="option1">Thanh toán khi nhận hàng</div>
						</div>
						<div class="form-group row"></div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Ngân hàng</label>
							<div class="col-sm-10">
								<div class="form-group">
									<select class="form-control" id="exampleFormControlSelect1">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Họ và tên chủ thẻ</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputEmail3" placeholder="Họ tên chủ thẻ" value="" name="diachi">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Số thẻ</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputEmail3" placeholder="Số thẻ" value="" name="diachi">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Hiệu lực</label>
							<div class="col-sm-10">
								<input class="form-control" type="date" value="" id="example-date-input">
							</div>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							<div class="row">
								<div class="col-sm-6"><a><button style="background-color: #007bff;border-color:#007bff" type="button" class="btn btn-danger" data-dismiss="modal" onclick="ttnganhang()">Thay đổi</button></a></div>
								<div class="col-sm-6" style="text-align: left;"><button type="button" style="width: 90px" class="btn btn-danger" data-dismiss="modal">Quay lại</button></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</form>
	</div>
	<!--Thẻ ...-->
	<div class="modal fade" id="the">
		<form action="suainfo.php" method="POST">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action=""></form>
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Phương thức thanh toán</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<div class="row" style="text-align: center;">
							<div class="col-sm-4"> <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" onclick="thenganhang()">Thẻ ngân hàng</div>
							<div class="col-sm-4"> <input type="radio" class="form-check-input" checked id="t" name="optradio" onclick="the()" value="option1">Thẻ Visa/Master Card</div>
							<div class="col-sm-4"> <input type="radio" onclick="nhanhang()" class="form-check-input" id="radio1" name="optradio" value="option1">Thanh toán khi nhận hàng</div>
						</div>
						<div class="form-group row"></div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Họ và tên chủ thẻ</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputEmail3" placeholder="Họ tên chủ thẻ" value="" name="diachi">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Số thẻ</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputEmail3" placeholder="Số thẻ" value="" name="diachi">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Hiệu lực</label>
							<div class="col-sm-10">
								<input class="form-control" type="date" value="" id="example-date-input">
							</div>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							<div class="row">
								<div class="col-sm-6"><a><button style="background-color: #007bff;border-color:#007bff" type="button" class="btn btn-danger" data-dismiss="modal" onclick="ttthe()">Thay đổi</button></a></div>
								<div class="col-sm-6" style="text-align: left;"><button type="button" style="width: 90px" class="btn btn-danger" data-dismiss="modal">Quay lại</button></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</form>
	</div>
	</div>

	<!--Hình thức giao hàng-->
	<div class="modal fade" id="htgh">
		<form action="suainfo.php" method="POST">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action=""></form>
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Hình thức giao hàng</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<div class="row" style="text-align: center;">
							<div class="col-sm-6"> <input type="radio" class="form-check-input" id="radio1" checked name="gh" value="1">Giao hàng bình thường 25.000đ (3-5 ngày)</div>
							<div class="col-sm-6"> <input type="radio" class="form-check-input" id="radio1" name="gh" value="2">Giao hàng nhanh 50.000đ (1-2 ngày)</div>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							<div class="row">
								<div class="col-sm-6"><a><button style="background-color: #007bff;border-color:#007bff" type="button" class="btn btn-danger" data-dismiss="modal" onclick="checkgh()">Thay đổi</button></a></div>
								<div class="col-sm-6" style="text-align: left;"><button type="button" style="width: 90px" class="btn btn-danger" data-dismiss="modal">Quay lại</button></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</form>
	</div>
	<div id="php"></div>
	</div>
	<script src="../js/Validate.js"></script>
	<?php
	// echo '<pre/>';
	// var_dump($_SESSION['login']);
	// var_dump($_SESSION['cart']);
	if (isLogined() == true) {
		echo "<script>
	document.getElementById('loginn').innerHTML=''; 
	</script>";
		$s = "<a class=\'dropdown-toggle\' data-toggle=\'dropdown\' href=\'#\'>"
			.    "<i class=\'glyphicon glyphicon-user\'></i> " . $_SESSION['login']['TenDangNhap'] . " <b class=\'caret\'></b>"
			. "</a>"
			. "<ul class=\'dropdown-menu\'>"
			.    "<li><a href=\'thongtincanhanUser.php\'><i class=\'glyphicon glyphicon-user\'></i> Thông tin tài khoản </a>"
			.    "</li>"
			.    "<li><a href=\'DonHang.php\'><i class=\'glyphicon glyphicon-list-alt\'></i> Xem đơn hàng </a>"
			.    "</li>"
			.    "<li class=\'divider\'></li>"
			.    "<li><a href=\'xulydangnhapUser.php?dangxuat=1\'><i class=\'glyphicon glyphicon-log-out\'></i> Đăng xuất </a>"
			.    "</li>"
			. "</ul>";
		echo "<script>"
			. "document.getElementById('logout').setAttribute('class','dropdown'); "
			. "document.getElementById('logout').innerHTML='" . $s . "';"
			. "</script>";
	}
	?>
</body>

</html>