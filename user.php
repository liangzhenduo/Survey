<?php
session_start();
$error='';
include "connectdb.php";
if(!isset($_SESSION['username'])){		//未登录
    header("location: home.php");
}
$username=$_SESSION['username'];
$select="select * from user_info where `username`='$username'";
$result = mysqli_query($con,$select);
$rows = mysqli_fetch_array($result);

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

    <title>用户信息</title>

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

                <h2 class="form-signin-heading" align="center">用户信息</h2><br/>
                <?php
                if($error!='')
                    echo "<div class='alert alert-danger'> $error</div><br>" ;
                ?>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label>用户名</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $rows[1] ?>" disabled title="">
                    </div>
                    <div class="col-xs-6">
                        <label>电子邮箱</label>
                        <input type="email" class="form-control" name="mail" value="<?php echo $rows[5] ?>" disabled title="">
                    </div>

                </div>
                <br/><br/><br/><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>单位名称</label>
                        <input type="text" class="form-control" name="unit" value="<?php echo $rows[4] ?>" disabled title="">
                    </div>
                    <div class="col-xs-6">
                        <label>用户类型</label>
                        <input type="text" class="form-control" name="unit" value="
                        <?php
                        if($rows[3]==1) echo "排污企业";
                        else if($rows[3]==2) echo "污水处理厂";
                        else if($rows[3]==3) echo "工业园区";
                        ?>" disabled title="">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3"></div>

    </div>

</div> <!-- /container -->
</body>

</html>

