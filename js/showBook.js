
function showBook()
{
	// cắt link
	var diachi=window.location.href;
	var theloai_trang=diachi.split("?");
	var gg=theloai_trang[1].split("\&");
	
	// Lấy tên thể loại
	var tl=gg[0].split("\=");
	var theloai=tl[1];
	
	// Lấy số trang hiện hành
	
	//-------------------------------------------------------------//
		if(theloai=="ngoaingu")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH HỌC NGOẠI NGỮ';
			x[1].innerHTML='Sách học ngoại ngữ';
			document.getElementById("title-background").style.background=" url('../images/theme/HocNgoaiNgu.png') no-repeat center center";
		}
		if(theloai=="kinhte")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH KINH TẾ';
			x[1].innerHTML='Sách kinh tế';
			document.getElementById("title-background").style.background=" url('../images/theme/KinhTe.jpg') no-repeat center center";
		}
		if(theloai=="kynangsong")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH KỸ NĂNG SỐNG';
			x[1].innerHTML='Sách kỹ năng sống';
			document.getElementById("title-background").style.background=" url('../images/theme/KyNangSong.jpg') no-repeat center center";
		}
		if(theloai=="tuoiteen")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH TUỐI TEEN';
			x[1].innerHTML='Sách tuổi teen';
			document.getElementById("title-background").style.background=" url('../images/theme/TuoiTeen.jpg') no-repeat center center";
		}
		if(theloai=="vanhoc")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH VĂN HỌC';
			x[1].innerHTML='Sách văn học';
			document.getElementById("title-background").style.background=" url('../images/theme/VanHoc.jpg') no-repeat center center";
		}
		if(theloai=="thieunhi")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH THIẾU NHI';
			x[1].innerHTML='Sách thiếu nhi';
			document.getElementById("title-background").style.background=" url('../images/theme/ThieuNhi.jpg') no-repeat center center";
		}
		if(theloai=="chuyennganh")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH CHUYÊN NGÀNH';
			x[1].innerHTML='Sách chuyên ngành';
			document.getElementById("title-background").style.background=" url('../images/theme/ChuyenNganh.jpg') no-repeat center center";
		}
		if(theloai=="lichsu")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='SÁCH LỊCH SỬ';
			x[1].innerHTML='Sách lịch sử';
			document.getElementById("title-background").style.background=" url('../images/theme/LichSu.jpg') no-repeat center center";
		}
		if(theloai=="tatca")
		{
			var x=document.getElementsByClassName('tieude');
			x[0].innerHTML='TẤT CẢ THỂ LOẠI SÁCH';
			x[1].innerHTML='Tất cả các sách';
			document.getElementById("title-background").style.background=" url('../images/theme/TatCa.png') no-repeat center center";
		}
}
/*window.onload=function()
{
	showBook();
}*/