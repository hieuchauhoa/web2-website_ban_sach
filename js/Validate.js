//kiem tra dang nhap
function ktdangnhap()
		{
			var tdn=document.forms["formdangnhap"]["username"].value;
			var mk=document.forms["formdangnhap"]["pass"].value;
			
			if(/^[a-zA-Z0-9 ]*$/.test(tdn) == false)
					{
						alert("Ký tự nhập không hợp lệ, vui lòng nhập lại.");
						return false;
					}
			else
			{	
				if(tdn=="")
				{
                    document.getElementById("kiemtra").innerHTML="Tên đăng nhập không được để trống";
					return false;
                }
                if(mk=="")
                {
                    document.getElementById("kiemtra").innerHTML="Mật khẩu không được để trống";
					return false;
                }
			}
		}
		
//Dang ky
		function submitdangky(){
            var user=document.forms["formdangky"]["username"].value;
            var hoten=document.forms["formdangky"]["name"].value;
			var email=document.forms["formdangky"]["email"].value;
            var mk=document.forms["formdangky"]["pass"].value;
			var nlmk=document.forms["formdangky"]["repass"].value;
			var phone=document.forms["formdangky"]["phone"].value;
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
			else if(mk.length<6 || mk.length>16)
			{
				document.getElementById("kiemtra").innerHTML="Mật khẩu không hợp lệ";
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
				
            
		
				alert("Đăng kí thành công");
			      
            
		}
		
		function themuser()
		{
			var user=document.forms["formdangky"]["username"].value;
            var hoten=document.forms["formdangky"]["name"].value;
			var email=document.forms["formdangky"]["email"].value;
            var mk=document.forms["formdangky"]["pass"].value;
			var nlmk=document.forms["formdangky"]["repass"].value;
			var phone=document.forms["formdangky"]["phone"].value;
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
			else if(mk.length<6 || mk.length>16)
			{
				document.getElementById("kiemtra").innerHTML="Mật khẩu không hợp lệ";
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
			else
					{
						if(confirm("Bạn có muốn thêm khách hàng ?")==false)
							return false;
					}	
		}
