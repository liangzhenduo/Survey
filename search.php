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

    <title>信息检索</title>

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
            </div>
            <div id="navbar" class="navbar-collapse collapse" style="text-align: center;">
                <ul class="nav navbar-nav">
                    <li><a class="navbar-brand" href="home.php">重点流域典型工业园区水污染防治及管理制度研究调研数据库</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home.php">主页<span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active"><a href="search.php">检索 <span class="glyphicon glyphicon-search"></span></a></li>
                    <li><a href="user.php"><b><?php echo $_SESSION['username'];?></b> <span class="glyphicon glyphicon-user"></span></a></li>
                    <li><a href="signout.php">注销 <span class="glyphicon glyphicon-off"></span></a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>


    <div class="rows">
        <div class="col-lg-3"></div>

        <div class="col-lg-6">
            <form class="form-signin" method="post" action="">

                <?php
                if(isset($_GET['status']) && $_GET['status']==1){
                    ?>
                    <div class="col-xs-4"></div>
                    <div class="col-lg-4" style="height:100px">
                        <br><div class="alert alert-success" align="center">更新成功!</div>
                    </div>
                    <div class="col-xs-4"></div><br/>
                    <?php
                }
                else if(isset($_GET['status']) && $_GET['status']==0){
                    ?>
                    <div class="col-xs-4"></div>
                    <div class="col-lg-4" style="height:100px">
                        <br><div class="alert alert-success" align="center">删除成功!</div>
                    </div>
                    <div class="col-xs-4"></div><br/>
                    <?php
                }
                ?>

                <br/><br/><br/><h2 class="form-signin-heading" align="center">信息检索</h2><br/>

                <div class="form-group">
                    <div class="col-xs-4">
                        <label>所在省市</label>
                        <select class = "select form-control" name="YQSS" title="">
                            <option value="">不限</option>
                            <option value="北京" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="北京") echo "selected" ?> >北京</option>
                            <option value="天津" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="天津") echo "selected" ?> >天津</option>
                            <option value="河北" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="河北") echo "selected" ?> >河北</option>
                            <option value="山西" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="山西") echo "selected" ?> >山西</option>
                            <option value="内蒙古" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="内蒙古") echo "selected" ?> >内蒙古</option>
                            <option value="辽宁" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="辽宁") echo "selected" ?> >辽宁</option>
                            <option value="吉林" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="吉林") echo "selected" ?> >吉林</option>
                            <option value="黑龙江" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="黑龙江") echo "selected" ?> >黑龙江</option>
                            <option value="上海" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="上海") echo "selected" ?> >上海</option>
                            <option value="江苏" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="江苏") echo "selected" ?> >江苏</option>
                            <option value="浙江" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="浙江") echo "selected" ?> >浙江</option>
                            <option value="安徽" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="安徽") echo "selected" ?> >安徽</option>
                            <option value="福建" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="福建") echo "selected" ?> >福建</option>
                            <option value="江西" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="江西") echo "selected" ?> >江西</option>
                            <option value="山东" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="山东") echo "selected" ?> >山东</option>
                            <option value="河南" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="河南") echo "selected" ?> >河南</option>
                            <option value="湖北" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="湖北") echo "selected" ?> >湖北</option>
                            <option value="湖南" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="湖南") echo "selected" ?> >湖南</option>
                            <option value="广东" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="广东") echo "selected" ?> >广东</option>
                            <option value="广西" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="广西") echo "selected" ?> >广西</option>
                            <option value="海南" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="海南") echo "selected" ?> >海南</option>
                            <option value="重庆" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="重庆") echo "selected" ?> >重庆</option>
                            <option value="四川" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="四川") echo "selected" ?> >四川</option>
                            <option value="贵州" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="贵州") echo "selected" ?> >贵州</option>
                            <option value="云南" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="云南") echo "selected" ?> >云南</option>
                            <option value="西藏" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="西藏") echo "selected" ?> >西藏</option>
                            <option value="陕西" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="陕西") echo "selected" ?> >陕西</option>
                            <option value="甘肃" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="甘肃") echo "selected" ?> >甘肃</option>
                            <option value="青海" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="青海") echo "selected" ?> >青海</option>
                            <option value="宁夏" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="宁夏") echo "selected" ?> >宁夏</option>
                            <option value="新疆" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="新疆") echo "selected" ?> >新疆</option>
                            <option value="香港" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="香港") echo "selected" ?> >香港</option>
                            <option value="澳门" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="澳门") echo "selected" ?> >澳门</option>
                            <option value="台湾" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="台湾") echo "selected" ?> >台湾</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <label>园区级别</label>
                        <select class = "select form-control" name="YQJB" title="">
                            <option value="">不限</option>
                            <option value="国家级" <?php if(isset($_POST['search'])&&$_POST['YQJB']=="国家级") echo "selected" ?> >国家级</option>
                            <option value="省市级" <?php if(isset($_POST['search'])&&$_POST['YQJB']=="省市级") echo "selected" ?> >省市级</option>
                            <option value="区县级" <?php if(isset($_POST['search'])&&$_POST['YQJB']=="区县级") echo "selected" ?> >区县级</option>
                        </select>
                    </div>

                    <div class="col-xs-4">
                        <label>园区名称</label>
                        <input type="text" class="form-control" placeholder="关键字" name="YQMC" value=<?php if(isset($_POST['search'])) echo $_POST['YQMC'] ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-4">
                        <label>园区类型</label>
                        <select class = "select form-control" name="YQLX" title="">
                            <option value="">不限</option>
                            <option value="行业主导型" <?php if(isset($_POST['search'])&&$_POST['YQLX']=="行业主导型") echo "selected" ?> >行业主导型</option>
                            <option value="综合型" <?php if(isset($_POST['search'])&&$_POST['YQLX']=="综合型") echo "selected" ?> >综合型</option>
                        </select><br/>
                    </div>
                    <div class="col-xs-4">
                        <label>单位类型</label>
                        <select class = "select form-control" name="type" title="">
                            <option value="1" <?php if(isset($_POST['search'])&&$_POST['type']=="1") echo "selected" ?> >排污企业</option>
                            <option value="2" <?php if(isset($_POST['search'])&&$_POST['type']=="2") echo "selected" ?> >污水处理厂运营商</option>
                            <option value="3" <?php if(isset($_POST['search'])&&$_POST['type']=="3") echo "selected" ?> >工业园区管委会\园区环保主管部门</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <label>单位名称</label>
                        <input type="text" class="form-control" placeholder="关键字" name="key" value=<?php if(isset($_POST['search'])) echo $_POST['key'] ?> ><br/>
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
            $link="feedback/q_Company.php";
            $table="CompanyQuestionnaire";
            $files="files/排污企业现场调查表附件/";
            $query = "SELECT CompanyQuestionnaire.ID, QYXX_NAME, YQSS, JBQK_NAME, YQJB, YQLX FROM IndustrialParkQuestionnaire
            LEFT JOIN CompanyQuestionnaire ON `GYYQ_NAME` LIKE concat('%',`JBQK_NAME`,'%')
            WHERE `QYXX_NAME` LIKE '%$_POST[key]%' AND `GYYQ_NAME` LIKE concat('%',`JBQK_NAME`,'%')
            AND `YQLX` LIKE '%$_POST[YQLX]%' AND `YQSS` LIKE '%$_POST[YQSS]%' AND `YQJB` LIKE '%$_POST[YQJB]%' AND `GYYQ_NAME` LIKE '%$_POST[YQMC]%'";
        } else if ($_POST['type'] == 2) {
            $link="feedback/q_SewageTreatment.php";
            $table="SewageTreatmentQuestionnaire";
            $link1="feedback/i_SewageTreatment.php";
            $files="files/处理厂现场调查表附件/";
            $query = "SELECT SewageTreatmentQuestionnaire.ID, GYYQ_WASTEWATER_TREATMENT_PLANT_NAME, YQSS, JBQK_NAME, YQJB, YQLX FROM IndustrialParkQuestionnaire
            LEFT JOIN SewageTreatmentQuestionnaire ON `GYYQ_NAME` LIKE concat('%',`JBQK_NAME`,'%')
            WHERE `GYYQ_WASTEWATER_TREATMENT_PLANT_NAME` LIKE '%$_POST[key]%' AND `GYYQ_NAME` LIKE concat('%',`JBQK_NAME`,'%')
            AND `YQLX` LIKE '%$_POST[YQLX]%' AND `YQSS` LIKE '%$_POST[YQSS]%' AND `YQJB` LIKE '%$_POST[YQJB]%' AND `GYYQ_NAME` LIKE '%$_POST[YQMC]%'";
        } else if ($_POST['type'] == 3) {
            $link="feedback/q_IndustrialPark.php";
            $table="IndustrialParkQuestionnaire";
            $link1="feedback/i_IndustrialPark.php";
            $files="files/管委会现场调查表附件/";
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
        ?>
				<tr >
					<td><?php echo $rows[0] ?></td>
					<td><?php echo $rows[1] ?></td>
					<td><?php echo $rows[2] ?></td>
					<td><?php echo $rows[3] ?></td>
					<td><?php echo $rows[4] ?></td>
					<td><?php echo $rows[5] ?></td>
                    <td><a href="<?php echo $link."?name=".$rows[1] ?>" target="_blank">现场调查表 </a>
        <?php
                if($_POST['type']>1){
        ?>
                        <a href="<?php echo $link1."?name=".$rows[1] ?>" target="_blank">函件调查表 </a>
        <?php   } ?>
                        <a href="<?php echo $files.$rows[1] ?>" target="_blank">附件</a></td>
				</tr>

        <?php } }?>

        </tbody>
    </table>


</div> <!-- /container -->


</body>

</html>

