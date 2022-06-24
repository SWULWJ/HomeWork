<?php
$ervername = "localhost";
$username = "root";
$password = "MySQL&db12";
$db = "phoenix_mall";

// 创建连接
$conn = new mysqli($servername, $username, $password, $db);
 
// 检测连接
if ($conn->connect_error) {
	$json_array = array('status'=>500);
	$json= json_encode($json_array);
	echo  $json;
} else {
	$username = $_POST["user_name"];
	$tel = $_POST["tel"];
	$passwd = $_POST["set_pw"];
	$sql = "SELECT * FROM user_basic_info WHERE tel=$tel";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    		$json_array = array("status"=>403);
		$json= json_encode($json_array);
		echo  $json;
	}else{
		$sql = "INSERT INTO user_basic_info (tel, user_name, passwd) VALUES ('{$tel}','{$username}','{$passwd}');";
		if ($conn->query($sql) === TRUE){
			$json_array = array('status'=>200);
			$json= json_encode($json_array);
			echo  $json;
		}
	}
}
$conn->close();
?>
