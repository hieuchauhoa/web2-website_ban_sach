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
		// kiểm tra đây là khách hàng thì về trang chủ kh
		if($_SESSION['login']['MaQuyen'] != "1" && $_SESSION['login']['MaQuyen'] != "2" )
		{
				header("Location:../index.php");
		}
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nhà sách OnePiece</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
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
                        <a href="quanlyhoadon.php" style="" class='mg' ><i class="fa fa-file-text-o fa-fw"></i> Quản lý đơn hàng<span class='mg_i' style="float:right;color:red"></span></a> 
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
                    <h1 class="page-header">Thống kê</h1>
                </div>
            </div>

			
			
            <!-- ... Your content goes here ... -->
			<form name="thongke" action="" method="get">	
						<div class="row" style="margin-bottom:24px;">
						<!--------------------------------------------------------------------------------------------------------->
										<div class="col-lg-4">
											<div class="input-group" style="margin-top:24px;">
												<select name="theloai" class="form-control" onchange="showthongkeAjax()" >
													<option value="" <?php if(isset($_GET['theloai']) && $_GET['theloai']=="") echo 'selected' ?> >Tất cả thể loại</option>
													<option value="NN" <?php if(isset($_GET['theloai']) && $_GET['theloai']=="NN") echo 'selected' ?>>Ngoại ngữ</option>
													<option value="KT" <?php if(isset($_GET['theloai']) && $_GET['theloai']=="KT") echo 'selected' ?>>Kinh tế</option>
													<option value="KNS" <?php if(isset($_GET['theloai']) && $_GET['theloai']=="KNS") echo 'selected' ?>>Kỹ năng sống</option>
													<option value="LS" <?php if(isset($_GET['theloai']) && $_GET['theloai']=="LS") echo 'selected' ?>>Lịch sử</option>
													<option value="CN" <?php if(isset($_GET['theloai']) && $_GET['theloai']=="CN") echo 'selected' ?>>Chuyên ngành</option>
													<option value="TN" <?php if(isset($_GET['theloai']) && $_GET['theloai']=="TN") echo 'selected' ?>>Thiếu nhi</option>
													<option value="TT" <?php if(isset($_GET['theloai']) && $_GET['theloai']=="TT") echo 'selected' ?>>Tuổi teen</option>
													<option value="VH" <?php if(isset($_GET['theloai']) && $_GET['theloai']=="VH") echo 'selected' ?>>Văn học</option>
												</select>
											</div>
										</div>
										
										<div class="col-lg-2" style="float:right">
											<div class="input-group" style="margin-top:24px;">
												<select name="tinhtrangsp" class="form-control" onchange="showthongkeAjax()" >
													<option value="">Tình trạng</option>
													<option value="0">Hết hàng</option>
													<option value="1">Còn hàng</option>
													<option value="2">Cảnh báo</option>
												</select>
											</div>
										</div>
						
				</div>
				
					<!------------------------------------------------------------------------------------------->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body" id="thongkesanpham">
								<?php
									require('DataProvider.php');
									require('ShowThongKe.php');
									thongketinhtrangsp();
								?>
								
							</div>
						</div>
					</div>
				</div>
				
			</form>
		</div>
	</div>

</div>
								<script>
									
									function showthongkeAjax() {
										var xhttp;
										var matheloai=document.forms['thongke']['theloai'].value;
										var tinhtrangsp=document.forms['thongke']['tinhtrangsp'].value;
										
											
										var url="showthongkeAjax.php?";
										if (matheloai == "") 
											url=url+"theloai=&";
										else 
											url=url+"theloai="+matheloai+"&";
										if (tinhtrangsp == "") 
											url=url+"tinhtrangsp=";
										else 
											url=url+"tinhtrangsp="+tinhtrangsp;
										xhttp = new XMLHttpRequest();
										xhttp.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
											document.getElementById("thongkesanpham").innerHTML = this.responseText;	
											}
										  };
										  xhttp.open("GET",url, true);
										  xhttp.send();
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
													<script type="text/javascript">
														
													</script>
</body>
</html>

