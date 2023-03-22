function addCart(id,sl) {

	if(sl>0) {
		$.ajax({
			type: "GET",
			url: "kiemtraslmua.php",
			data: {
				"masach": id,	
				"sl": sl
			}
		}).done(function(data){
			if(Number(data) > Number($('#slt').val())){
				alert("Số lượng sách chỉ có "+$('#slt').val()+" sản phẩm");
				return false;
			}else{
				$.ajax({
					type: "GET",
					url: "addcart.php",
					data: {
						"masach": id,	
						"sl": sl
					}
				}).done(function(data){
					myFunction();
					$.get('sl.php',{xh:1},function(data){
						console.log(data);
						$(".badge.badge-secondary ").html("<span>"+data+"</span>");	
					})
							// $(".badge.badge-secondary ").html("<span>"+s+"</span>");
						})
			}
		});

	}
	else{
		alert("Bạn nhập số lượng không phù hợp!!!");
		$('#soluong').val('1');
	}
	
}
function xoasp(masach){
	$.ajax({
		type: "GET",
		url: "updategiohang.php",
		data: {
			"masach": masach,
			"update": 0//0 là xoá
		}
	}).done(function(data){
			// console.log(data);
			//debugger;
			//alert(JSON.parse(data).masach);
			//alert(JSON.parse(data).sl);
			//alert(JSON.parse(data).tongtien);
			if(data!="false"){
				$('.badge.badge-secondary ').text(JSON.parse(data).sl);
				$('#demsl').text(JSON.parse(data).sl);
				$('#tong').text(formatNumber(JSON.parse(data).tongtien,".",",")+"đ");
				$('#thanhtien').text(formatNumber(JSON.parse(data).tongtien+25000,".",",")+"đ");
				$("tr#"+masach+"").hide();
				//alert(data);
			}
			else{
				$('.badge.badge-secondary ').text(0);
				document.getElementById('giohangrong').innerHTML=`<div><table class="table"><tr><td style="background-color:#ddd; height: 150px;text-align: center;padding-top:100px ">Không có sản phẩm nào trong giỏ hàng của bạn</td></tr><tr><td style="background-color:#ddd;border: 0;height: 200px;text-align: center;"><button class="thanhtoan" onclick="window.location.assign('../index.php')">Tiếp tục mua sắm</button></td></tr></table></div>`;
			}
		})
}
function myFunction() {
	var x = document.getElementById("snackbar");
	x.className = "show";
	setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
function hello(id,sl){
	alert("Xin chao");
	alert(id);
	alert(sl);
	//alert(document.getElementById("soluong").value);
}
function drop(){
	//alert('Xin chao');
	if(document.getElementById(`soluong`).value < 2){
		document.getElementById(`soluong`).value = 2;
	}
}
function formatNumber(nStr, decSeperate, groupSeperate) {
	nStr += '';
	x = nStr.split(decSeperate);
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
	}
	return x1 + x2;
}
function tang(id){
	//alert(id);
	debugger;
	var i= Number($("#"+id+" "+"input").val());
	//alert(i);
	i++;
	//$("#"+id+" "+"input").val();
	if(i>Number($('#ma_'+id).val())){
		alert("Số lượng sách chỉ có "+Number($('#ma_'+id).val())+" sản phẩm");
		$("#"+id+" input:eq(0)").val($('#ma_'+id).val());
		ajax(id,$('#ma_'+id).val());
	}
	else{
		$("#"+id+" input:eq(0)").val(i);
		ajax(id,i);
	}
}
function giam(id){
	//alert(id);
	//alert("Giam");
	var i= Number($("#"+id+" "+"input").val());
	if(i>1){
		i--;
		$("#"+id+" input:eq(0)").val(i);
		ajax(id,i);
	}
	ajax(id,i);
}
function thaydoi(id){
	var u=/^[0-9]+$/;
	var i= $("#"+id+" "+"input").val();
	if(i<1||i=="") {
		i=Number(1);
		$("#"+id+" input:eq(0)").val(i);
		ajax(id,i);
	}
	debugger;
	if(i>Number($('#ma_'+id).val())){
		alert("Số lượng sách chỉ có "+Number($('#ma_'+id).val())+" sản phẩm");
		i=Number($('#ma_'+id).val());
		$("#"+id+" input:eq(0)").val(i);
		ajax(id,i);
	}
	Number(i);
	ajax(id,i);
}
function ajax(id,i){
	$.ajax({
		type: "GET",
		url: "updategiohang.php",
		data:{
			"masach": id,
			"slsach":i,
			"update": 1//1 là update
		}
	}).done(function(data){
		if(data!="false"){
			$('.badge.badge-secondary ').text(JSON.parse(data).sl);
			$('#demsl').text(JSON.parse(data).sl);
			$('tr#'+JSON.parse(data).masach+' td:last').text(formatNumber(JSON.parse(data).tiensach,".",",")+"đ");
			$('#tong').text(formatNumber(JSON.parse(data).tongtien,".",",")+"đ");
			$('#thanhtien').text(formatNumber(JSON.parse(data).tongtien+25000,".",",")+"đ");
			//alert(JSON.parse(data).tiensach);
		}
	})
}

function back(){
	window.location.assign("../index.php");
}
function chinhsua(){
	$('#md').modal('show');
}
function hinhthucthanhtoan(){
	$('#httt').modal('show');
}
function hinhthucgiaohang(){
	$('#htgh').modal('show');
}
function thenganhang(){
	$('#theng').modal('show');
	$('#httt').modal('hide');
	$('#the').modal('hide');
	$('#tng').prop('checked', true);
}
function the(){
	$('#the').modal('show');
	$('#httt').modal('hide');
	$('#theng').modal('hide');
	$('#t').prop('checked',true);
}
function ttbt(){
	$('#htthanhtoan').val(3);
	$('#thongtingiaohang td:eq(8)').html(`<span class=\"glyphicon glyphicon-credit-card\"></span> Hình thức thanh toán (Thanh toán khi nhận hàng)`);
}
function nhanhang(){
	$('#httt').modal('show');
	$('#the').modal('hide');
	$('#theng').modal('hide');
	$('#bt').prop('checked',true);
}
function maht(){
	$('#htthanhtoan').val(1);
	$('#thongtingiaohang td:eq(8)').html(`<span class=\"glyphicon glyphicon-credit-card\"></span> Hình thức thanh toán (Thẻ ngân hàng)`);
}
function maht2(){
	$('#htthanhtoan').val(2);
	$('#thongtingiaohang td:eq(8)').html(`<span class=\"glyphicon glyphicon-credit-card\"></span> Hình thức thanh toán (Thẻ...)`);
}
function checkgh(){
	var s=0;
	if($('input[name=gh]:checked').val()==1) s=1;
	if($('input[name=gh]:checked').val()==2) s=2;
	$.ajax({
		type: "GET",
		url: "ship.php",
		data: {
			"ship": s
		}
	}).done(function(data){
		if(data==1){
			$('#thongtingiaohang td:eq(10)').html(`<i class="fa fa-truck" aria-hidden="true"></i> Hình thức giao hàng (Giao hàng nhanh  50.000đ - Giao hàng từ 3-5 ngày)`);
			$('#thongtingiaohang td:eq(17)').text("25.000 đ");
		}
		if(data==2){
			$('#thongtingiaohang td:eq(10)').html(`<i class="fa fa-truck" aria-hidden="true"></i> Hình thức giao hàng (Giao hàng nhanh  50.000đ - Giao hàng từ 1-2 ngày)`);
			$('#thongtingiaohang td:eq(17)').text("50.000 đ");
		}
	})
	$('#htgiaohang').val($('input[name=gh]:checked').val());
}
function ktgiohang(){
	if(document.forms['thanhtoan']['DiaChi'].value==""){
		alert("Địa chỉ không được để trống!!!");
		return false;
	}
	alert("Thanh toán thành công!!!");
	return true;
}
function dangnhap(){
	window.location.assign("Dangnhap.php");
}
function hd(MaHD){
	//alert(MaHD);
	$('#MaHD').val(MaHD);
}
function index(){
	window.location.assign("../index.php");
}
function httt(){
	ajaxhttt(3);
}
function ttthe(){
	ajaxhttt(2);
}
function ttnganhang(){
	ajaxhttt(1);
}
function ajaxhttt(x){
	$.ajax({
		type: "GET",
		url: "httt.php",
		data: {
			"httt": x
		}
	}).done(function(data){
		$('#htthanhtoan').val(data);
		if(data==1){
			$('#thongtingiaohang td:eq(8)').html(`<span class=\"glyphicon glyphicon-credit-card\"></span> Hình thức thanh toán (Thẻ ngân hàng)`);
		}
		if(data==2){
			$('#thongtingiaohang td:eq(8)').html(`<span class=\"glyphicon glyphicon-credit-card\"></span> Hình thức thanh toán (Thẻ Visa/Master Card)`);
		}
		if(data==3){
			$('#thongtingiaohang td:eq(8)').html(`<span class=\"glyphicon glyphicon-credit-card\"></span> Hình thức thanh toán (Thanh toán khi nhận hàng)`);
		}
	})
}
function confirmxoa(){
	var r = confirm("Bạn có chắc muốn xoá đơn hàng???");
	if(r==true) return true;
	if(r==false) return false;
}
function checkinfo(){
	ptnKyTuHopLe=/[\!@#\$%\^&\*_\=\+\-\<\>,\?\/;\"\[\]\{\}\(\)]/gi;
	ptnKyTu=/[\!@#\$%\^&\*_\=\+\-\<\>\?\\"\[\]\{\}\(\)]/gi;
			debugger;
	if(document.forms['info']['hoten'].value==""||document.forms['info']['duong'].value==""||document.forms['info']['phuong'].value==""||document.forms['info']['quan'].value==""||document.forms['info']['TP'].value==""||document.forms['info']['sdt'].value==""||document.forms['info']['email'].value==""||ptnKyTuHopLe.test(document.forms['info']['hoten'].value)==true||ptnKyTuHopLe.test(document.forms['info']['duong'].value)==true||ptnKyTuHopLe.test(document.forms['info']['phuong'].value)==true||ptnKyTuHopLe.test(document.forms['info']['quan'].value)==true||ptnKyTuHopLe.test(document.forms['info']['TP'].value)==true||/0([1-9]{9}|[1-9][0-9]{8})$/.test(document.forms['info']['sdt'].value)==false||/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/.test(document.forms['info']['email'].value)==false){
		if(ptnKyTuHopLe.test(document.forms['info']['hoten'].value)==true||document.forms['info']['hoten'].value==""){
			$('#hoten').text("*");
			alert("Họ và tên không phù hợp!!");
		}
		else{
			$('#hoten').text(" ");
		}
		if(ptnKyTuHopLe.test(document.forms['info']['duong'].value)==true||document.forms['info']['duong'].value==""||ptnKyTuHopLe.test(document.forms['info']['phuong'].value)==true||document.forms['info']['phuong'].value==""||ptnKyTuHopLe.test(document.forms['info']['quan'].value)==true||document.forms['info']['quan'].value==""||ptnKyTuHopLe.test(document.forms['info']['TP'].value)==true||document.forms['info']['TP'].value==""){
			$('#diachi').text("*");
			alert("Địa chỉ của bạn không hợp lệ!!");
		}
		else{
			$('#diachi').text(" ");
		}
		if(/0([1-9]{9}|[1-9][0-9]{8})$/.test(document.forms['info']['sdt'].value)==false||document.forms['info']['sdt'].value==""){
			$('#sdt').text("*");
			alert("Số điện thoại không phù hợp!!Số điện thoại gồm 10 số");
		}
		else{
			$('#sdt').text(" ");
		}
		if(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/.test(document.forms['info']['email'].value)==false||document.forms['info']['email'].value==""){
			$('#email').text("*");
			alert("Email không phù hợp!!");
		}
		else{
			$('#email').text(" ");
		}
		/*Check input phù hợp*/
		return false;
	}
	else{
		return true;
	}

	
}

