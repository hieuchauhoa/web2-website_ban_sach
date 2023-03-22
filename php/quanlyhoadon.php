<?php
	ini_set('session.auto_start',0);
	ini_set('session.cookie_lifetime',0);
	session_start();
	require('common.php');
	//kiểm tra đã đăng nhập chưa
	//chưa đn
	if(isLogined()==false)
	{
			header("Location:dangnhapAdmin.php");
	}
	//đã đang nhập
	else if(isLogined()==true)
	{
		// kiểm tra đây là khách hàng thì về trang chủ kh
		if($_SESSION['login']['MaQuyen'] != "1" && $_SESSION['login']['MaQuyen'] != "2" )
			header("Location:../index.php");
		//kiểm tra nếu là admin thì về trang admin.php, đây là trang của manager
		else if($_SESSION['login']['MaQuyen']=="1")
			header("Location:admin.php");
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nhà sách OnePiece</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" >
<script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
<!--<script type="text/javascript" language="javascript" src="../js/bootstrap.js"></script>-->
<script type="text/javascript" language="javascript" src="../js/showBook.js"></script>

<!-- MetisMenu CSS -->
    <link href="../css/admin/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../css/admin/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/admin/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/admin/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <img src="../images/onepiece.PNG" style="" width="250px" height="52px" alt="logo-trang chủ">
			
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <span id="ca_nhan"> <?php echo $_SESSION['login']['HoTen'] ?></span> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="thongtincanhanAdmin.php"><i class="fa fa-user fa-fw"></i> Thông tin tài khoản </a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="xulydangnhapAdmin.php?dangxuat=1"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất </a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation" >
            <div class="sidebar-nav navbar-collapse" id="myNavbar">

                <ul class="nav" id="side-menu">
                    <li>
                        <a href="admin.php" style="" class='active'><i class="fa fa-home fa-fw"></i> Trang chủ </a>
                    </li>
                    <li>
                        <a href="quanlysanpham.php" style="" class='mg'><i class="fa fa-product-hunt fa-fw"></i> Quản lý sản phẩm <span class='mg_i' style="float:right;color:red"></span></a>
                    </li>
					<li>
                        <a href="quanlyhoadon.php" style="" class='mg' ><i class="fa fa-file-text-o fa-fw"></i> Quản lý đơn hàng <span class='mg_i' style="float:right;color:red"></span></a> 
                    </li>
					<li>
                        <a href="#" style="" class='mg' ><i class="fa fa-table fa-fw"></i> Thống kê <span class='mg_i' style="float:right;color:red"></span> </a>
						<ul class="nav nav-second-level">
                                    <li>
                                        <a href="thongke.php">Thống kê doanh thu</a>
                                    </li>
                                    <li>
                                        <a href="thongkesanpham.php">Thống kê sản phẩm</a>
                                    </li>                

                        </ul>
				   </li>
					<li>
                        <a href="#" class='ad' style=""><i class="fa fa-user fa-fw"></i> Quản lý người dùng<span class="fa arrow"> <span class='ad_i' style="float:right;color:red"></span></span></a>
						<ul class="nav nav-second-level">
                                    <li>
                                        <a href="quanlykhachhang.php">Khách hàng</a>
                                    </li>
                                    <li>
                                        <a href="quanlynhanvien.php">Nhân viên quản lý và Quản trị viên</a>
                                    </li>                

                        </ul>
                                <!-- /.nav-second-level -->
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý hóa đơn</h1>
                </div>
            </div>
			
	<!---------------------------------hien san pham ----------------------------------->
            <!-- ... Your content goes here ... -->
			
			
			<div clas="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						
						<div class="panel-heading">
							Danh sách hóa đơn
						</div>
						
						<div class="panel-body">
							<form name="timkiemhoadon" method="get" action="">
								<div class="row">

									<div class="col-lg-6">
										<div class="panel panel-default">
												<div class="panel-heading">
													Ngày đặt đơn hàng
												</div>
												<div class="panel-body">
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<label>Từ</label>
																<div class='input-group date' id='ngay-tu'>
																	
																	<input type='text' class="form-control" name='ngaytu' onchange="showHoaDonAjax()" onkeyup="showHoaDonAjax()" value="<?php if(isset($_GET['ngaytu'])) echo $_GET['ngaytu']; ?>">
																	<span class="input-group-addon">
																		<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																</div>
																<p><i>(yyyy-mm-dd)</i></p>
															</div>
														</div>
													
														<div class="col-lg-6">
															<div class="form-group">
																<label>Đến</label>
																<div class='input-group date' id='ngay-den'>
																	
																	<input type='text' class="form-control" name='ngayden' onchange="showHoaDonAjax()" onkeyup="showHoaDonAjax()" value="<?php if(isset($_GET['ngayden'])) echo $_GET['ngayden']; ?>">
																	<span class="input-group-addon">
																		<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																</div>
																<p><i>(yyyy-mm-dd)</i></p>
															</div>
														</div>
													</div>
													<script type="text/javascript">
														$(function () {
															$('#ngay-tu').datetimepicker({
																format: 'YYYY-MM-DD hh:mm:ss',
																useCurrent: false
															});
															$('#ngay-den').datetimepicker({
																format: 'YYYY-MM-DD hh:mm:ss'
																
															});
															$("#ngay-tu").on("dp.change", function (e) {
																$('#ngay-den').data("DateTimePicker").minDate(e.date);
															});
															$("#ngay-den").on("dp.change", function (e) {
																$('#ngay-tu').data("DateTimePicker").maxDate(e.date);
															});
														});
													</script>
												</div>
										</div>
										
									</div>
									
									<div class="col-lg-6" style="margin-top:0px;">
										<div class="panel panel-default">
											<div class="panel-body" style="padding-bottom:20px;">
												<label>Trạng thái đơn hàng</label>
												<div class="input-group" >
													<select name="tinhtrang" class="form-control" onchange="showHoaDonAjax()">
														<option value="">Tất cả trạng thái</option>
														<option value="Đã thanh toán xong">Đã thanh toán xong</option>
														<option value="Chưa thanh toán xong">Chưa thanh toán xong</option>
													</select>
												</div>
												<label style="margin-top:13px;">Tìm tên KH</label>
												<div class="input-group" >
													<input type="text" class="form-control" placeholder="Tìm kiếm" name="timkiem" onkeyup="showHoaDonAjax()">
													<div class="input-group-btn">
														<button class="btn btn-default" type="submit">
															<i class="glyphicon glyphicon-search"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								

								</div>
							</form>	
							<!------------------------table-------------------------------------------------------------->
							<style>
								#gg td,#gg th
								{
									text-align:center;
									vertical-align:middle;
								}
							</style>
							<div class="row" style="margin-top:10px">
								
								<div class="col-lg-12" id="hoadon">
									<?php
										require('DataProvider.php');
										require('Bill.php');
										Bill::updateBill();
										Bill::showBill();
									?>
								</div>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>

        </div>
    </div>

</div>
								<script>
									
									function showHoaDonAjax() {
										var xhttp;
										var tinhtrang=document.forms['timkiemhoadon']['tinhtrang'].value;
										var timkiem=document.forms['timkiemhoadon']['timkiem'].value;
										var ngaytu=document.forms['timkiemhoadon']['ngaytu'].value;
										var ngayden=document.forms['timkiemhoadon']['ngayden'].value;
										var url="showHoaDonAjax.php?";
										if (tinhtrang == "") 
											url=url+"tinhtrang=&";
										else 
											url=url+"tinhtrang="+tinhtrang+"&";
										if(ngaytu=="" && ngayden=="")
											url=url+"ngaytu=&ngayden=&";
										else 
											url=url+"ngaytu="+ngaytu+"&ngayden="+ngayden+"&";
										if(timkiem=="")
											url=url+"timkiem=";
										else
											url=url+"timkiem="+timkiem;
										/*alert(url);
										window.location.href=url;*/
										
										xhttp = new XMLHttpRequest();
										xhttp.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
											document.getElementById("hoadon").innerHTML = this.responseText;
											}
										  };
										  xhttp.open("GET",url, true);
										  xhttp.send();
										}
										<!--------------------------------------------------------------------------------------------------------------->
										
										function xoahoadon(e)
										{
											if(confirm("Bạn có muốn xóa")==true)
											{
												window.location.href="deleteHoaDon.php?xoahoadon=1&MaHD="+e;
											}
										}
										
								</script>
<?php
	
	if($_SESSION['login']['MaQuyen']=="1")
	{
		echo "<script>
				document.getElementsByClassName('mg')[0].setAttribute('style','pointer-events:none;');
				document.getElementsByClassName('mg')[1].setAttribute('style','pointer-events:none;');
				document.getElementsByClassName('mg')[2].setAttribute('style','pointer-events:none;');
				
				document.getElementsByClassName('mg_i')[0].innerHTML='<i class=\'fa fa-ban fa-fw\'></i>';
				document.getElementsByClassName('mg_i')[1].innerHTML='<i class=\'fa fa-ban fa-fw\'></i>';
				document.getElementsByClassName('mg_i')[2].innerHTML='<i class=\'fa fa-ban fa-fw\'></i>';
			</script>";
	}
	if($_SESSION['login']['MaQuyen']=="2")
	{
		echo "<script>
				document.getElementsByClassName('ad')[0].setAttribute('style','pointer-events:none;');
				document.getElementsByClassName('ad_i')[0].innerHTML='<i class=\'fa fa-ban fa-fw\'></i>';
			</script>";
	}
?>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../js/admin/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../js/admin/startmin.js"></script>

<link rel="stylesheet" type="text/css" href="../css/bootstrap-datetimepicker.css" />
<script type="text/javascript" src="../js/moment.js"></script>
<script type="text/javascript" src="../bootstrap/dist/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.js"></script>
</body>
</html>

