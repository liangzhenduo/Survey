<?php
session_start();
$error='';

if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "用户名或密码不能为空!";
	}
	
	else{
		$username=$_POST['username'];
		$password=$_POST['password'];

        include("connectdb.php");

		$username = htmlspecialchars($username);
		$password = htmlspecialchars($password);
		$query="select username, password from user_info where `password`='$password' AND `username`='$username'";
		$result = mysqli_query($con, $query);

        if($rows = mysqli_num_rows($result));
		if ($rows > 0) {
            $_SESSION['username'] = $username;
            header("location: home.php"); // Redirecting To Other Page
        }
        else {
				$error = "用户名或密码错误!";
        }

		mysqli_close($con);
	}
}
?>