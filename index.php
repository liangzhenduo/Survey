<?php
include "signin.php";
if(isset($_SESSION['username'])){  //已登录跳转主页
	header("location: home.php");
}