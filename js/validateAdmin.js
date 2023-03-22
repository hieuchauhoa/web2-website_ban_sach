
function validateFormLoginAdmin()
{
	var tdn=document.forms['dangnhapadmin']['tendangnhap'].value;
	var mk=document.forms['dangnhapadmin']['matkhau'].value;
	var pattern=/^[a-zA-Z0-9\_\-\@\.]*$/gi;
	if(tdn=="")
	{
		document.getElementById('loidn').innerHTML="Tên đăng nhập không được để trống.";
		return false;
	}
	else if(pattern.test(tdn)==false)
	{
		document.getElementById('loidn').innerHTML="Tên đăng nhập không hợp lệ.";
		return false;
	}
	else if(mk=="")
	{
		document.getElementById('loidn').innerHTML="Mật khẩu không được để trống.";
		return false;
	}
	
}

function validateFormEditBook()
{
	var tensach=document.forms['sua']['tensach'].value;
	var tentacgia=document.forms['sua']['tentacgia'].value;
	var gia=document.forms['sua']['gia'].value;
	var nhaxuatban=document.forms['sua']['nhaxuatban'].value;
	var kichthuoc=document.forms['sua']['kichthuoc'].value;
	var trongluong=document.forms['sua']['trongluong'].value;
	var sotrang=document.forms['sua']['sotrang'].value;
	var danhmuc=document.forms['sua']['danhmuc'].value;
	var ngayphathanh=document.forms['sua']['ngayphathanh'].value;
	var soluongton=document.forms['sua']['soluongton'].value;
	var noidunggioithieusach=document.forms['sua']['noidunggioithieusach'].value;
	var slttoithieu=document.forms['sua']['slttoithieu'].value;
	
	var ptnKyTuHopLe=/[\!@#\$%\^&\*\=\+\<\>\?\/;\[\]\{\}\(\)]/gi;
	var ptnSoHopLe=/^[0-9]*$/;
	var ptnkichthuoc=/[0-9]+(.[0-9]+|)( |)(x|X)( |)[0-9]+(.[0-9]+|)( |)[a-zA-Z]+$/;
	var ptntrongluong=/[0-9]+(.[0-9]+|)( |)[a-zA-Z]+$/;
	var ptnngayphathanh=/^[0-9]{1,2}(\/[0-9]{1,2}\/|\-[0-9]{1,2}\-)[0-9]{4}$/;
	//alert("jj");
	document.getElementById('loitensach').innerHTML="";
	document.getElementById('loitentacgia').innerHTML="";
	document.getElementById('loigia').innerHTML="";
	document.getElementById('loinoidunggioithieusach').innerHTML="";
	document.getElementById('loinhaxuatban').innerHTML="";
	document.getElementById('loikichthuoc').innerHTML="";
	document.getElementById('loitrongluong').innerHTML="";
	document.getElementById('loisotrang').innerHTML="";
	document.getElementById('loidanhmuc').innerHTML="";
	document.getElementById('loingayphathanh').innerHTML="";
	document.getElementById('loisoluongton').innerHTML="";
	document.getElementById('loislttoithieu').innerHTML="";
	if(tensach=="")
	{
		document.getElementById('loitensach').innerHTML="Tên sách không được để trống.";
		return false;
	}
	else if(ptnKyTuHopLe.test(tensach)==true)
	{
		document.getElementById('loitensach').innerHTML="Tên sách không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(tentacgia=="")
	{
		document.getElementById('loitentacgia').innerHTML="Tên tác giả không được để trống.";
		return false;
	}
	else if(ptnKyTuHopLe.test(tentacgia)==true)
	{
		document.getElementById('loitentacgia').innerHTML="Tên tác giả không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(gia=="")
	{
		document.getElementById('loigia').innerHTML="Giá không được để trống.";
		return false;
	}
	else if(ptnSoHopLe.test(gia)==false)
	{
		document.getElementById('loigia').innerHTML="Giá không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(noidunggioithieusach=="")
	{
		document.getElementById('loinoidunggioithieusach').innerHTML="Nội dung giới thiệu sách không được để trống.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(nhaxuatban=="")
	{
		document.getElementById('loinhaxuatban').innerHTML="Nhà xuất bản không được để trống.";
		return false;
	}
	else if(ptnKyTuHopLe.test(nhaxuatban)==true)
	{
		document.getElementById('loinhaxuatban').innerHTML="Nhà xuất bản không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(kichthuoc=="")
	{
		document.getElementById('loikichthuoc').innerHTML="Kích thước không được để trống.";
		return false;
	}
	else if(ptnkichthuoc.test(kichthuoc)==false)
	{
		document.getElementById('loikichthuoc').innerHTML="Kích thước không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(trongluong=="")
	{
		document.getElementById('loitrongluong').innerHTML="Trọng lượng không được để trống.";
		return false;
	}
	else if(ptntrongluong.test(trongluong)==false)
	{
		document.getElementById('loitrongluong').innerHTML="Trọng lượng không hợp lê.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(sotrang=="")
	{
		document.getElementById('loisotrang').innerHTML="Số trang không được để trống.";
		return false;
	}
	else if(ptnSoHopLe.test(sotrang)==false)
	{
		document.getElementById('loisotrang').innerHTML="Số trang không hợp lê.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(danhmuc=="")
	{
		document.getElementById('loidanhmuc').innerHTML="Danh mục không được để trống.";
		return false;
	}
	else if(ptnKyTuHopLe.test(danhmuc)==true)
	{
		document.getElementById('loidanhmuc').innerHTML="Danh mục không hợp lê.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(ngayphathanh=="")
	{
		document.getElementById('loingayphathanh').innerHTML="Ngày phát hành không được để trống.";
		return false;
	}
	else if(ptnngayphathanh.test(ngayphathanh)==false)
	{
		document.getElementById('loingayphathanh').innerHTML="Ngày phát hành không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(soluongton=="")
	{
		document.getElementById('loisoluongton').innerHTML="Số lượng tồn không được để trống.";
		return false;
	}
	else if(ptnSoHopLe.test(soluongton)==false)
	{
		document.getElementById('loisoluongton').innerHTML="Số lượng tồn không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(ptnSoHopLe.test(slttoithieu)==false)
	{
		document.getElementById('loislttoithieu').innerHTML="Số lượng tồn tối thiểu không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else
	{
		if(confirm("Bạn có muốn sửa thông tin sách ?")==false)
			return false;
	}

}

function validateFormAddBook()
{
	var tensach=document.forms['them']['tensach'].value;
	var tentacgia=document.forms['them']['tentacgia'].value;
	var gia=document.forms['them']['gia'].value;
	var nhaxuatban=document.forms['them']['nhaxuatban'].value;
	var kichthuoc=document.forms['them']['kichthuoc'].value;
	var trongluong=document.forms['them']['trongluong'].value;
	var sotrang=document.forms['them']['sotrang'].value;
	var danhmuc=document.forms['them']['danhmuc'].value;
	var ngayphathanh=document.forms['them']['ngayphathanh'].value;
	var soluongton=document.forms['them']['soluongton'].value;
	var noidunggioithieusach=document.forms['them']['noidunggioithieusach'].value;
	var hinhanh=document.forms['them']['hinhanh'].value;
	var matheloai=document.forms['them']['matheloai'].value;
	var slttoithieu=document.forms['them']['slttoithieu'].value;
	
	var ptnKyTuHopLe=/[\!@#\$%\^&\*\=\+\<\>\?\/;\"\[\]\{\}\(\)]/gi;
	var ptnSoHopLe=/^[0-9]*$/;
	var ptnkichthuoc=/[0-9]+(.[0-9]+|)( |)(x|X)( |)[0-9]+(.[0-9]+|)( |)[a-zA-Z]+$/;
	var ptntrongluong=/[0-9]+(.[0-9]+|)( |)[a-zA-Z]+$/;
	var ptnngayphathanh=/^[0-9]{1,2}(\/[0-9]{1,2}\/|\-[0-9]{1,2}\-)[0-9]{4}$/;
	//alert("jj");
	document.getElementById('loitensach').innerHTML="";
	document.getElementById('loitentacgia').innerHTML="";
	document.getElementById('loigia').innerHTML="";
	document.getElementById('loinoidunggioithieusach').innerHTML="";
	document.getElementById('loinhaxuatban').innerHTML="";
	document.getElementById('loikichthuoc').innerHTML="";
	document.getElementById('loitrongluong').innerHTML="";
	document.getElementById('loisotrang').innerHTML="";
	document.getElementById('loidanhmuc').innerHTML="";
	document.getElementById('loingayphathanh').innerHTML="";
	document.getElementById('loisoluongton').innerHTML="";
	document.getElementById('loihinhanh').innerHTML="";
	document.getElementById('loislttoithieu').innerHTML="";
	if(tensach=="")
	{
		document.getElementById('loitensach').innerHTML="Tên sách không được để trống.";
		return false;
	}
	else if(ptnKyTuHopLe.test(tensach)==true)
	{
		document.getElementById('loitensach').innerHTML="Tên sách không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(matheloai=="")
	{
		document.getElementById('loimatheloai').innerHTML="Bạn phải chọn một thể loại sách.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(tentacgia=="")
	{
		document.getElementById('loitentacgia').innerHTML="Tên tác giả không được để trống.";
		return false;
	}
	else if(ptnKyTuHopLe.test(tentacgia)==true)
	{
		document.getElementById('loitentacgia').innerHTML="Tên tác giả không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(gia=="")
	{
		document.getElementById('loigia').innerHTML="Giá không được để trống.";
		return false;
	}
	else if(ptnSoHopLe.test(gia)==false)
	{
		document.getElementById('loigia').innerHTML="Giá không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(noidunggioithieusach=="")
	{
		document.getElementById('loinoidunggioithieusach').innerHTML="Nội dung giới thiệu sách không được để trống.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(nhaxuatban=="")
	{
		document.getElementById('loinhaxuatban').innerHTML="Nhà xuất bản không được để trống.";
		return false;
	}
	else if(ptnKyTuHopLe.test(nhaxuatban)==true)
	{
		document.getElementById('loinhaxuatban').innerHTML="Nhà xuất bản không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(kichthuoc=="")
	{
		document.getElementById('loikichthuoc').innerHTML="Kích thước không được để trống.";
		return false;
	}
	else if(ptnkichthuoc.test(kichthuoc)==false)
	{
		document.getElementById('loikichthuoc').innerHTML="Kích thước không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(trongluong=="")
	{
		document.getElementById('loitrongluong').innerHTML="Trọng lượng không được để trống.";
		return false;
	}
	else if(ptntrongluong.test(trongluong)==false)
	{
		document.getElementById('loitrongluong').innerHTML="Trọng lượng không hợp lê.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(sotrang=="")
	{
		document.getElementById('loisotrang').innerHTML="Số trang không được để trống.";
		return false;
	}
	else if(ptnSoHopLe.test(sotrang)==false)
	{
		document.getElementById('loisotrang').innerHTML="Số trang không hợp lê.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(danhmuc=="")
	{
		document.getElementById('loidanhmuc').innerHTML="Danh mục không được để trống.";
		return false;
	}
	else if(ptnKyTuHopLe.test(danhmuc)==true)
	{
		document.getElementById('loidanhmuc').innerHTML="Danh mục không hợp lê.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(ngayphathanh=="")
	{
		document.getElementById('loingayphathanh').innerHTML="Ngày phát hành không được để trống.";
		return false;
	}
	else if(ptnngayphathanh.test(ngayphathanh)==false)
	{
		document.getElementById('loingayphathanh').innerHTML="Ngày phát hành không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(soluongton=="")
	{
		document.getElementById('loisoluongton').innerHTML="Số lượng tồn không được để trống.";
		return false;
	}
	else if(ptnSoHopLe.test(soluongton)==false)
	{
		document.getElementById('loisoluongton').innerHTML="Số lượng tồn không hợp lệ.";
		return false;
	}
	else if(hinhanh=="")
	{
		document.getElementById('loihinhanh').innerHTML="Hình ảnh không được để trống.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else if(ptnSoHopLe.test(slttoithieu)==false)
	{
		document.getElementById('loislttoithieu').innerHTML="Số lượng tồn tối thiểu không hợp lệ.";
		return false;
	}
	//-------------------------------------------------------------------------------------//
	else
	{
		if(confirm("Bạn có muốn thêm sách ?")==false)
			return false;
	}
	
	

}
function themnhanvien()
{
			var user=document.forms["formdangky"]["username"].value;
            var hoten=document.forms["formdangky"]["name"].value;
			var email=document.forms["formdangky"]["email"].value;
            var mk=document.forms["formdangky"]["pass"].value;
			var nlmk=document.forms["formdangky"]["repass"].value;
			var phone=document.forms["formdangky"]["phone"].value;
			var loai=document.forms["formdangky"]["loai"].value;
			var s=/^[a-zA-Z0-9 ]*$/;
			var mail=/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/;
			var dt=/0([1-9]{9}|[1-9][0-9]{8})$/;
			
			if(user=="")
                {
                    document.getElementById("kiemtra").innerHTML="Tên đăng nhập không được để trống";
					return false;
                }
			else if(s.test(user)==false)
					{
						document.getElementById("kiemtra").innerHTML="Tên đăng nhập không hợp lệ, vui lòng nhập lại.";
						return false;
					}	
            
			else if(email=="")
                {
                    document.getElementById("kiemtra").innerHTML="Email không được để trống";
					return false;
                }
			else if(mail.test(email)==false)
					{
						document.getElementById("kiemtra").innerHTML="Email không hợp lệ, vui lòng nhập lại.";	
						return false;
					}	
			
            else if(mk==""||nlmk=="")
                {
                    document.getElementById("kiemtra").innerHTML="Vui lòng nhập mật khẩu";
					return false;
                }
            else if(mk!=nlmk)
                {
                    document.getElementById("kiemtra").innerHTML="Mật khẩu không khớp";
					        return false;
                }
        
            else if(hoten=="")
                {
                    document.getElementById("kiemtra").innerHTML="Họ tên không được để trống";
					        return false;
                }
			else if(s.test(hoten)==false)
					{
						document.getElementById("kiemtra").innerHTML="Họ tên không hợp lệ, vui lòng nhập lại.";
						return false;
					}		
				
			else if(phone=="")
                {
                    document.getElementById("kiemtra").innerHTML="Số điện thoại không được để trống";
					return false;
                }	
			
			else if(dt.test(phone)==false)
				{
					document.getElementById("kiemtra").innerHTML="Số điện thoại không hợp lệ, vui lòng nhập lại.";	
					return false;	
				}
			else if(loai=="")
				{
					document.getElementById('loiloai').innerHTML="Bạn phải chọn loại nhân viên";
				}
			else
				{
					if(confirm("Bạn có muốn thêm nhân viên ?")==false)
						return false;
				}	
}