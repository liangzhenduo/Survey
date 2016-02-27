<?php
session_start();
$error='';
if(isset($_SESSION['username'])){		//未登录
    header("location: home.php");
}

if(isset($_POST['submit'])) {
    include("connectdb.php");

    if($_POST['password'] != $_POST['retry']){
        $error = "密码不匹配!";
    }
    else {
        $query = "select username from user_info where `username`='$_POST[username]'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            $error = "用户已存在!";
        }
        else {
            if($_POST['username']=='root'||$_POST['username']=='Shintaku')
                $_POST['usertype']=0;
            $query = "INSERT INTO user_info(`username`, `password`, `type`, `unit`, `mail`) values('$_POST[username]','$_POST[password]','$_POST[usertype]','$_POST[unit]','$_POST[mail]')";
            $result = mysqli_query($con, $query);
            $username=$_POST['username'];
            $query="select `uid` from user_info where `username`='$username'";
            $result = mysqli_query($con,$query);
            $row =mysqli_fetch_array($result);
            $res=$row[0];
            if($_POST['usertype']==1){
                $query="INSERT INTO CompanyQuestionnaire(ID) values('$res')";
                $result = mysqli_query($con, $query);
                mkdir("./files/1/$username");
            }
            else if($_POST['usertype']==2){
                $query="INSERT INTO SewageTreatmentQuestionnaire(ID) values('$res')";
                $result = mysqli_query($con, $query);
                $query="INSERT INTO SewageTreatmentInvestigation(ID) values('$res')";
                $result = mysqli_query($con, $query);
                mkdir("./files/2/$username");
            }
            else if($_POST['usertype']==3){
                $query="INSERT INTO IndustrialParkQuestionnaire(ID) values('$res')";
                $result = mysqli_query($con, $query);
                $query="INSERT INTO IndustrialParkInvestigation(ID) values('$res')";
                $result = mysqli_query($con, $query);
                mkdir("./files/3/$username");
            }
            header("location: home.php?status=1");
        }
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
    <link rel="icon" href="image/logo.gif">

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
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">污水处理管理系统</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php">主页<span class="glyphicon glyphicon-home"></span></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php
                    if(isset($_SESSION['username'])){
                        ?>
                        <li><a href="user.php"><b><?php echo $_SESSION['username'];?></b> <span class="glyphicon glyphicon-user"></span></a></li>
                        <li><a href="signout.php">注销 <span class="glyphicon glyphicon-off"></span></a></li>
                        <?php
                    }
                    else{
                        ?>
                        <li><a href="signup.php">注册<span class="glyphicon glyphicon-user"></span></a></li>
                        <?php
                    }
                    ?>

                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

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
                        <select class = "select form-control" name="usertype"  title="">
                            <option value="1">排污企业</option>
                            <option value="2">污水处理厂运营商</option>
                            <option value="3">工业园区管委会\园区环保主管部门</option>
                        </select>
                    </div>
                </div>
                <br/><br/><br/><br/>

                <h1 align="center"><input class="btn btn-primary" type="submit" name="submit"/></h1>

            </form>
        </div>
        <div class="col-lg-3"></div>

    </div>

</div> <!-- /container -->
</body>

</html>

