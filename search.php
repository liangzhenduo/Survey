<?php
session_start();
$error='';
include("connectdb.php");
if(!isset($_SESSION['username'])){		//未登录
    header("location: home.php");
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
    <link rel="icon" href="image/logo.gif">

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

                    <li><a href="search.php">检索 <span class="glyphicon glyphicon-search"></span></a></li>
                    <li><a href="statistics.php">统计 <span class="glyphicon glyphicon-tasks"></span></a></li>

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
        <div class="col-lg-3"></div>

        <div class="col-lg-6">
            <form class="form-signin" method="post" action="">

                <h2 class="form-signin-heading" align="center">信息检索</h2><br/>
                <div class="form-group">
                    <div class="col-xs-4">
                        <label>所在省市</label>
                        <select class = "select form-control" name="YQSS" title="">
                            <option value="">不限</option>
                            <option value="北京">北京</option>
                            <option value="天津">天津</option>
                            <option value="河北">河北</option>
                            <option value="山西">山西</option>
                            <option value="内蒙古">内蒙古</option>
                            <option value="辽宁">辽宁</option>
                            <option value="吉林">吉林</option>
                            <option value="黑龙江">黑龙江</option>
                            <option value="上海">上海</option>
                            <option value="江苏">江苏</option>
                            <option value="浙江">浙江</option>
                            <option value="安徽">安徽</option>
                            <option value="福建">福建</option>
                            <option value="江西">江西</option>
                            <option value="山东">山东</option>
                            <option value="河南">河南</option>
                            <option value="湖北">湖北</option>
                            <option value="湖南">湖南</option>
                            <option value="广东">广东</option>
                            <option value="广西">广西</option>
                            <option value="海南">海南</option>
                            <option value="重庆">重庆</option>
                            <option value="四川">四川</option>
                            <option value="贵州">贵州</option>
                            <option value="云南">云南</option>
                            <option value="西藏">西藏</option>
                            <option value="陕西">陕西</option>
                            <option value="甘肃">甘肃</option>
                            <option value="青海">青海</option>
                            <option value="宁夏">宁夏</option>
                            <option value="新疆">新疆</option>
                            <option value="香港">香港</option>
                            <option value="澳门">澳门</option>
                            <option value="台湾">台湾</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <label>园区级别</label>
                        <select class = "select form-control" name="YQJB" title="">
                            <option value="">不限</option>
                            <option value="国家级">国家级</option>
                            <option value="省市级">省市级</option>
                            <option value="区县级">区县级</option>
                        </select>
                    </div>

                    <div class="col-xs-4">
                        <label>园区名称</label>
                        <input type="text" class="form-control" placeholder="关键字" name="YQMC"><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-4">
                        <label>园区类型</label>
                        <select class = "select form-control" name="YQLX" title="">
                            <option value="">不限</option>
                            <option value="行业主导型">行业主导型</option>
                            <option value="综合型">综合型</option>
                        </select><br/>
                    </div>
                    <div class="col-xs-4">
                        <label>单位类型</label>
                        <select class = "select form-control" name="type" title="">
                            <option value="1">排污企业</option>
                            <option value="2">污水处理厂运营商</option>
                            <option value="3">工业园区管委会\园区环保主管部门</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <label>单位名称</label>
                        <input type="text" class="form-control" placeholder="关键字" name="key"><br/>
                    </div>
                </div>

                <div class="col-xs-3"></div>
                <div class="col-xs-6">
                <h4 align="center"><button class="submit btn btn-primary btn-lg btn-block" name="search">检索</button></h4>
                </div>
                <div class="col-xs-3"></div>

            </form>
        </div>

        <div class="col-lg-3"></div>
        <?php

        if(isset($_POST['search'])) {
        if ($_POST['type'] == 1) {
            $link="q_Company_r.php";
            $table="CompanyQuestionnaire";
            $query = "SELECT CompanyQuestionnaire.ID, QYXX_NAME, YQSS, JBQK_NAME, YQJB, YQLX FROM IndustrialParkQuestionnaire
            LEFT JOIN CompanyQuestionnaire ON `GYYQ_NAME` LIKE concat('%',`JBQK_NAME`,'%')
            WHERE `QYXX_NAME` LIKE '%$_POST[key]%' AND `GYYQ_NAME` LIKE concat('%',`JBQK_NAME`,'%')
            AND `YQLX` LIKE '%$_POST[YQLX]%' AND `YQSS` LIKE '%$_POST[YQSS]%' AND `YQJB` LIKE '%$_POST[YQJB]%' AND `GYYQ_NAME` LIKE '%$_POST[YQMC]%'";
        } else if ($_POST['type'] == 2) {
            $link="q_SewageTreatment_r.php";
            $table="SewageTreatmentQuestionnaire";
            $link1="i_SewageTreatment_r.php";
            $query = "SELECT SewageTreatmentQuestionnaire.ID, GYYQ_WASTEWATER_TREATMENT_PLANT_NAME, YQSS, JBQK_NAME, YQJB, YQLX FROM IndustrialParkQuestionnaire
            LEFT JOIN SewageTreatmentQuestionnaire ON `GYYQ_NAME` LIKE concat('%',`JBQK_NAME`,'%')
            WHERE `GYYQ_WASTEWATER_TREATMENT_PLANT_NAME` LIKE '%$_POST[key]%' AND `GYYQ_NAME` LIKE concat('%',`JBQK_NAME`,'%')
            AND `YQLX` LIKE '%$_POST[YQLX]%' AND `YQSS` LIKE '%$_POST[YQSS]%' AND `YQJB` LIKE '%$_POST[YQJB]%' AND `GYYQ_NAME` LIKE '%$_POST[YQMC]%'";
        } else if ($_POST['type'] == 3) {
            $link="q_IndustrialPark_r.php";
            $table="IndustrialParkQuestionnaire";
            $link1="i_IndustrialPark_r.php";
            $query = "SELECT `ID`, `JBQK_NAME`, `YQSS`, `JBQK_NAME`, `YQJB`, `YQLX` FROM IndustrialParkQuestionnaire
            WHERE `JBQK_NAME` LIKE '%$_POST[key]%' AND `YQLX` LIKE '%$_POST[YQLX]%' AND `YQSS` LIKE '%$_POST[YQSS]%' AND `YQJB` LIKE '%$_POST[YQJB]%'";
        }

        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        ?>
        <div class="rows">
                <div class="col-lg-12" style="height:20px"></div>
        </div>

    </div>
    <div class="rows">
        <div class="col-lg-12" ><h3 align="center"><br/>本次查询返回 <?php echo $rows ?> 条结果<br/></h3> </div>
    </div>

    <table class="table" border="1px">
        <thead>
        <tr>
            <th>ID</th>
            <th>单位名称</th>
            <th>所在省市</th>
            <th>所在园区</th>
            <th>园区级别</th>
            <th>园区类型</th>
            <th>详细信息</th>
        </tr>
        </thead>
        <tbody>

        <?php
        while($rows = mysqli_fetch_array($result)) {
            echo "
				<tr >
					<td>$rows[0]</td>
					<td>$rows[1]</td>
					<td>$rows[2]</td>
					<td>$rows[3]</td>
					<td>$rows[4]</td>
					<td>$rows[5]</td>
                    <td><a href=\"$link?id=$rows[0]\">现场调查表 </a>";
                if($_POST['type']>1)
                    echo "  <a href=\"$link1?id=$rows[0]\">函件调查表 </a>
                                </td>
				</tr>
				";
        }

        } ?>

        </tbody>
    </table>


</div> <!-- /container -->


</body>

</html>

