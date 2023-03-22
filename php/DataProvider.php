
<?php
class DataProvider
{
	public static function executeQuery($sql)
	{
		include('database.inc');
		if(!($connection=mysqli_connect($hostName,$username,$password)))
		{
			die ("couldn't connect to localhost");
		}
		if(!(mysqli_select_db($connection,$databaseName)))
		{
			die ("couldn't connect to database webbansach");
		}
		if (!(mysqli_query($connection,"set names 'utf8'")))
			showError();
		if(!($result=mysqli_query($connection,$sql)))
			showError();
		if(!(mysqli_close($connection)))
			showError();
		return $result;
	}

	public function prepareStatementNew($sql, $s, ...$__)
    {
		include('database.inc');
		$connection=mysqli_connect($hostName,$username,$password);
		mysqli_select_db($connection,$databaseName);
		mysqli_query($connection,"set names 'utf8'");

        $stmt = mysqli_stmt_init($connection);
        mysqli_stmt_prepare($stmt, $sql); //Hàm này kiểm tra xem câu truy vấn có đúng dạng ? hay ko, trả về 1 hoặc ko có values
        mysqli_stmt_bind_param($stmt, $s, ...$__); //Tương tự
        mysqli_stmt_execute($stmt);
        return $result = mysqli_stmt_get_result($stmt);
        
	}
	//Su dung prepare statement chong sql injection
	public static function Get_InfoKH($username, $pass)
    {
        $sql = "SELECT * 
        FROM `khachhang` 
        WHERE TenDangNhap=? AND MatKhau=?";

        $result = DataProvider::prepareStatementNew($sql, "ss", $username, $pass);
        $arr = []; //Trả về trong trường hợp đăng nhập ko hợp lệ
        return $result;
    }
}
?>