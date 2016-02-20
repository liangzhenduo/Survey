<?php
session_start();
$error='';
if(isset($_POST['submit'])) {

    include("connectdb.php");

    if (isset($_SESSION['user']))  //已登录
    {
        $query = "UPDATE user_info SET name='$_POST[name]', branch='$_POST[branch]',year=$_POST[group],university='$_POST[university]',college='$_POST[college]',email='$_POST[email]',contact=$_POST[contact],facebookid='$_POST[facebookid]',address='$_POST[address]',password='$_POST[password]' WHERE rollno=$_SESSION[user]";
    } else  //未登录
    {
        $query = "INSERT INTO user_info(username, password, `type`, unit, mail) values('$_POST[username]','$_POST[password]',$_POST[type],'$_POST[unit]','$_POST[mail]')";
        //$query2="INSERT INTO answer (rollno) values('$_POST[rollno]')";
        //$query3="INSERT INTO ranklist (rollno) values('$_POST[rollno]')";
    }

   /* $query_exist = "select username from user_info where `username`='$_POST[username]'";
    $result = mysqli_query($con, $query_exist);
    if ($rows = mysqli_num_rows($result)) {
        if ($rows > 0) {
            $error = '用户已存在!';
        } else if ($_POST['password'] == $_POST['retry']) {
            $error = "密码不匹配!";
        } //echo $query;
        else {
            $res = mysqli_query($con, $query);
            if (!mysqli_errno($con)) {
                if (!isset($_SESSION['user'])) {
                    //$res2=mysqli_query($con,$query2);
                    //$res3=mysqli_query($con,$query3);
                }

                header("location: index.php?status=1");
            } else if (mysqli_errno($con) != 1062)
                $error = mysqli_error($con);
        }

        //echo "error is".mysqli_error($con);
        if(mysqli_errno($con) == 1062) {
            $error='用户已存在!';
        }

    }*/

    $query_exist = "select username from user_info where `username`='$_POST[username]'";
    $result = mysqli_query($con, $query_exist);
    if ($_POST['password'] == $_POST['retry']) {
            $res = mysqli_query($con, $query);
            //echo "error is".mysqli_error($con);
           /* if (mysqli_errno($con) == 1062) {
                $error = 'Roll number already registere!!!';
            }*/
            if (!mysqli_errno($con)) {
                if (!isset($_SESSION['user'])) {
                    //$res2 = mysqli_query($con, $query2);
                    //$res3 = mysqli_query($con, $query3);
                }

                header("location: index.php?status=1");
            } else if (mysqli_errno($con) != 1062)
                $error = mysqli_error($con);
        }
        else {
            $error = "密码不匹配!";
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

    <title>用户注册</title>

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
            <form class="form-signin" method="POST" action="#">

                <h2 class="form-signin-heading" align="center">用户注册</h2><br/>
                <?php
                if($error!='')
                    echo "<div class='alert alert-danger'> $error</div><br>" ;
                ?>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label>用户名</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="col-xs-6">
                        <label>电子邮箱</label>
                        <input type="email" class="form-control" name="mail" placeholder="Email" required>
                    </div>

                </div>
                <br/><br/><br/><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="inputPassword" >密码</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="inputPassword" >确认密码</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Retry" name="retry" required>
                    </div>
                </div>
                <br/><br/><br/><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>单位名称</label>
                        <input type="text" class="form-control" placeholder="" name="unit" required>
                    </div>
                    <div class="col-xs-6">
                        <label>用户类型</label>
                        <select class = "select form-control" name="type" >
                            <option value="1">排污企业</option>
                            <option value="2">污水处理厂运营商</option>
                            <option value="3">工业园区管委会\园区环保主管部门</option>
                            <select>
                    </div>
                </div>
                <br/><br/><br/><br/>

                <h1 align="center"><input class="btn btn-primary" type="submit" name="submit"/></h1>

            </form>
        </div>
        <div class="col-lg-3"></div>

    </div>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="ie10-viewport-bug-workaround.js"></script>
</body>

</html>

</html>

