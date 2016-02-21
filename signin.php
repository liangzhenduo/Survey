<?php
session_start();
$error='';

if(isset($_SESSION['username'])) {  //未注销重新登录
    header("location: signout.php");
}

if (isset($_POST['submit'])) {

    include("connectdb.php");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
    $query = "select username, password from user_info where `password`='$password' AND `username`='$username'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    if($rows > 0){
        $_SESSION['username'] = $username;
    }
    else {
        $error="用户名或密码错误!";
    }
    mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="image/photo.jpg">

    <title>用户登录</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div class="rows">
        <div class="col-lg-12" style="height:100px"></div>
    </div>
    <div class="rows">
        <div class="col-lg-3"></div>

        <div class="col-lg-6">
            <form class="form-signin" action="index.php" method="post">
                <h2 class="form-signin-heading" align="center">请登录</h2><br/><br/>
                <label for="inputEmail" >用户名</label><br/>
                <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required><br/><br/>
                <label for="inputPassword">密码</label><br/>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <?php
                if($error!='')
                    echo "<br><div class=\"alert alert-danger\" >$error</div>";
                if(isset($_GET['status']) && $_GET['status']==1)
                    echo "<br><div class=\"alert alert-success\" >注册成功,请登录!</div>";
                if(isset($_GET['status']) && $_GET['status']==2)
                    echo "<br><div class=\"alert alert-danger\" ></div>";
                ?>
                <br/><br/>
                <div class="rows">
                    <div class="col-lg-6">
                        <button class="submit btn btn-primary btn-lg btn-block" name="submit">登录</button>

                    </div>
                    <div class="col-lg-6">
                        <a href="signup.php" class="btn btn-lg btn-primary btn-block" name="signup" >注册</a>
                    </div>



                </div>

            </form>
        </div>

        <div class="col-lg-3"></div>

    </div>

</div> <!-- /container -->
</body>
</html>
