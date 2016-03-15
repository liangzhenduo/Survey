<?php
session_start();
$error='';
if(!isset($_SESSION['username'])){		//未登录
    header("location: home.php");
    exit;
}
include("connectdb.php");
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

    <title>数据统计</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
                        <li><a href="user.php" target="_blank"><b><?php echo $_SESSION['username'];?></b> <span class="glyphicon glyphicon-user"></span></a></li>
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

                <h2 class="form-signin-heading" align="center">数据统计</h2><br/>
                <div class="form-group">
                    <div class="col-xs-6">
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
                    <div class="col-xs-6">
                        <label>园区级别</label>
                        <select class = "select form-control" name="YQJB" title="">
                            <option value="">不限</option>
                            <option value="国家级">国家级</option>
                            <option value="省市级">省市级</option>
                            <option value="区县级">区县级</option>
                        </select><br/>
                    </div>

                    <div class="col-xs-6">
                        <label>园区类型</label>
                        <select class = "select form-control" name="YQLX" title="">
                            <option value="">不限</option>
                            <option value="行业主导型">行业主导型</option>
                            <option value="综合型">综合型</option>
                        </select><br/>
                    </div>

                    <div class="col-xs-6">
                        <label>园区名称</label>
                        <input type="text" class="form-control" placeholder="关键字" name="YQMC"><br/>
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
        include("connectdb.php");
        $link = "feedback/q_IndustrialPark.php";
        $link1 = "feedback/i_IndustrialPark.php";
        $files="files/管委会现场调查表附件/";
        $query = "SELECT `ID`, `JBQK_NAME`, `JBQK_NUMBER_COMPANY`, `JBQK_YEAR_PROFIT`, `JBQK_NUMBER_COMPANY_USING_RESYCLING_WATER`, `JBQK_TAX`, `JBQK_POLLUTION_EXPENSE`, `JBQK_WATER_USING`, `JBQK_WATER_VALUE` FROM IndustrialParkQuestionnaire
            WHERE `JBQK_NAME` LIKE '%$_POST[YQMC]%' AND `YQLX` LIKE '%$_POST[YQLX]%' AND `YQSS` LIKE '%$_POST[YQSS]%' AND `YQJB` LIKE '%$_POST[YQJB]%'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);

        ?>
        <div class="rows">
            <div class="col-lg-12" style="height:20px"></div>
        </div>

    </div>
    <div class="rows">
        <div class="col-lg-12"><h3 align="center"><br/>本次查询返回 <?php echo $rows ?> 条结果<br/></h3></div>
    </div>

    <table class="table" border="1px">
        <thead>
        <tr>
            <th>ID</th>
            <th>园区名称</th>
            <th>企业数量</th>
            <th>年工业产值</th>
            <th>使用循环水企业数量</th>
            <th>年税收</th>
            <th>年排污费征收额度</th>
            <th>日用水量</th>
            <th>工业用水售价</th>
            <th>详细信息</th>
        </tr>
        </thead>
        <tbody>

        <?php
        while($rows = mysqli_fetch_array($result)) {
            ?>
            <tr >
                <td><?php echo $rows[0] ?></td>
                <td><?php echo $rows[1] ?></td>
                <td><?php echo $rows[2] ?></td>
                <td><?php echo $rows[3] ?> 亿元</td>
                <td><?php echo $rows[4] ?></td>
                <td><?php echo $rows[5] ?> 万元</td>
                <td><?php echo $rows[6] ?> 万元</td>
                <td><?php echo $rows[7] ?> 立方米</td>
                <td><?php echo $rows[8] ?> 元/立方米</td>
                <td><a href="<?php echo $link."?name=".$rows[1] ?>" target="_blank">现场调查表 </a>
                    <a href="<?php echo $link1."?name=".$rows[1] ?>" target="_blank">函件调查表 </a>
                    <a href="<?php echo $files.$rows[1] ?>" target="_blank">附件</a></td>
            </tr>

        <?php } }?>

        </tbody>
    </table>


</div> <!-- /container -->


</body>

</html>

