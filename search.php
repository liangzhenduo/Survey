<?php
session_start();
$error='';
include("connectdb.php");
if(!isset($_SESSION['username'])){		//未登录
    header("location: signin.php");
}
$username=$_SESSION['username'];
$query="select `type` from user_info where username='$username'";
$result = mysqli_query($con,$query);
$row =mysqli_fetch_array($result);
$type=$row[0];
if($type!=0){
    header("location: home.php");
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

    <title>信息检索</title>

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

                    <li><a href="search.php">检索 <span class="glyphicon glyphicon-list-alt"></span></a></li>

                    <?php
                    if(isset($_SESSION['username'])){
                        ?>
                        <li><a href="user.php"><b><?php echo $_SESSION['username'];?></b> <span class="glyphicon glyphicon-user"></span></a></li>
                        <li><a href="signout.php">注销 <span class="glyphicon glyphicon-off"></span></a></li>
                        <?php
                    }
                    else{
                        ?>
                        <li><a href="signin.php">登录<span class="glyphicon glyphicon-log-in"></span></a></li>
                        <li><a href="signup.php">注册<span class="glyphicon glyphicon-user"></span></a></li>
                        <?php
                    }
                    ?>

                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>


    <div class="rows">
        <div class="col-lg-3"></div>

        <div class="col-lg-6">
            <form class="form-signin" method="post" action="#">

                <h2 class="form-signin-heading" align="center">信息检索</h2><br/>


                <div class="form-group">
                    <div class="col-xs-6">
                        <label>问卷类型</label>
                        <select class = "select form-control" name="type" title="">
                            <option value="1">排污企业现场调查表</option>
                            <option value="2">污水处理厂运营商现场调查表</option>
                            <option value="3">工业园区管委会\园区环保主管部门现场调查表</option>
                            <option value="4">污水处理厂运营商函件调查表</option>
                            <option value="5">工业园区管委会\园区环保主管部门函件调查表</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>关键字</label>
                        <input type="text" class="form-control" placeholder="" name="key">
                    </div>
                </div>
                <br/><br/>

                <h1 align="center"><input class="btn btn-primary" type="submit" name="search"/></h1>

            </form>
        </div>
        <div class="col-lg-3"></div>
        <?php

        if(isset($_POST['search'])) {
        if ($_POST['type'] == 1) {
            $table = "CompanyQuestionnaire";
            $name = "QYXX_NAME";
            $link="q_Company_r.php";
        } else if ($_POST['type'] == 2) {
            $table = "SewageTreatmentQuestionnaire";
            $name = "GYYQ_WASTEWATER_TREATMENT_PLANT_NAME";
            $link="q_SewageTreatment_r.php";
        } else if ($_POST['type'] == 3) {
            $table = "IndustrialParkQuestionnaire";
            $name = "JBQK_NAME";
            $link="q_IndustrialPark_r.php";
        } else if ($_POST['type'] == 4) {
            $table = "SewageTreatmentInvestigation";
            $name = "WSCL_NAME";
            $link="i_SewageTreatment_r.php";
        } else if ($_POST['type'] == 5) {
            $table = "IndustrialParkInvestigation";
            $name = "JBQK_NAME";
            $link="i_IndustrialPark_r.php";
        }
        ?>

    </div>
    <table class="table" border="1px">
        <thead>
        <tr>
            <th>ID</th>
            <th>单位名称</th>
            <th>详细信息</th>
        </tr>
        </thead>
        <tbody>

        <?php

        $query = "SELECT `ID`, `$name` FROM $table WHERE `$name` LIKE '%$_POST[key]%' ";
        $result = mysqli_query($con, $query);
        while($rows = mysqli_fetch_array($result)) {
            echo "
				<tr >
					<td>$rows[0]</td>
					<td>$rows[1]</td>
                    <td><a href=\"$link?id=$rows[0]\">查看</a></td>
				</tr>
				";
        }

        } ?>

        </tbody>
    </table>


</div> <!-- /container -->


</body>

</html>

