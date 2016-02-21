<?php
include "login.php";
if(isset($_SESSION['username'])){		//if user has logged in
	header("location: home.php");
}
else{
	header("location: signin.php");
}