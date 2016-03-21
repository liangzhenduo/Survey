<?php
session_start();
$error='';
if(!isset($_SESSION['username'])){		//未登录
    header("location: ../home.php");
    exit;
}
include("../connectdb.php");
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
    <link rel="icon" href="../image/logo.gif">

    <title>信息检索</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

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
                    <li><a class="navbar-brand" href="../home.php">重点流域典型工业园区水污染防治及管理制度研究调研数据库</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../home.php">主页<span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="../search.php">检索 <span class="glyphicon glyphicon-search"></span></a></li>
                    <li><a href="../user.php"><b><?php echo $_SESSION['username'];?></b> <span class="glyphicon glyphicon-user"></span></a></li>
                    <li><a href="../signout.php">注销 <span class="glyphicon glyphicon-off"></span></a></li>
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
                    <div class="col-xs-6">
                        <label>排序依据</label>
                        <select class = "select form-control" name="PXYJ" title="">
                            <option value="ID">默认</option>
                            <option value="YQWS_SIZE" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_SIZE") echo "selected" ?> >设计规模</option>
                            <option value="YQWS_WATER_PROCESSING_VOLUME/YQWS_SIZE" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_WATER_PROCESSING_VOLUME/YQWS_SIZE") echo "selected" ?> >实际处理水量/设计规模</option>
                            <option value="YQWS_MAIN_WASTE_IN_DENSITY_COD" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_MAIN_WASTE_IN_DENSITY_COD") echo "selected" ?> >进水CODcr</option>
                            <option value="YQWS_MAIN_WASTE_IN_DENSITY_BOD" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_MAIN_WASTE_IN_DENSITY_BOD") echo "selected" ?> >进水BOD5</option>
                            <option value="YQWS_MAIN_WASTE_IN_DENSITY_TH" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_MAIN_WASTE_IN_DENSITY_TH") echo "selected" ?> >进水TN</option>
                            <option value="YQWS_MAIN_WASTE_IN_DENSITY_SS" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_MAIN_WASTE_IN_DENSITY_SS") echo "selected" ?> >进水SS</option>
                            <option value="YQWS_MAIN_WASTE_IN_DENSITY_TP" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_MAIN_WASTE_IN_DENSITY_TP") echo "selected" ?> >进水TP</option>
                            <option value="YQWS_MAIN_WASTE_IN_DENSITY_SE" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_MAIN_WASTE_IN_DENSITY_SE") echo "selected" ?> >进水色度</option>
                            <option value="YQWS_MAIN_WASTE_IN_DENSITY_PH" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_MAIN_WASTE_IN_DENSITY_PH") echo "selected" ?> >进水pH</option>
                            <option value="YQWS_MAIN_WASTE_IN_DENSITY_WEN" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_MAIN_WASTE_IN_DENSITY_WEN") echo "selected" ?> >进水温度</option>
                            <option value="YQWS_MAIN_WASTE_IN_DENSITY_NH" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_MAIN_WASTE_IN_DENSITY_NH") echo "selected" ?> >进水NH3-N</option>
                            <option value="YQWS_ACCIDENT_POOL_VOLUME" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_ACCIDENT_POOL_VOLUME") echo "selected" ?> >事故水池容积</option>
                            <option value="YQWS_ACCIDENT_POOL_VOLUME/YQWS_SIZE" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="YQWS_ACCIDENT_POOL_VOLUME/YQWS_SIZE") echo "selected" ?> >事故水池容积/设计规模</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>排序方法</label>
                        <select class = "select form-control" name="PXFF" title="">
                            <option value="ASC" >升序</option>
                            <option value="DESC" <?php if(isset($_POST['search'])&&$_POST['PXFF']=="DESC") echo "selected" ?> >降序</option>
                        </select><br>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>工艺字段</label>
                        <select class = "select form-control" name="GYZD" title="">
                            <option value="">不限</option>
                            <option value="调节池" <?php if(isset($_POST['search'])&&$_POST['GYZD']=="调节池") echo "selected" ?> >调节池</option>
                            <option value="水解酸化池" <?php if(isset($_POST['search'])&&$_POST['GYZD']=="水解酸化池") echo "selected" ?> >水解酸化池</option>
                            <option value="AO池" <?php if(isset($_POST['search'])&&$_POST['GYZD']=="AO池") echo "selected" ?> >AO池</option>
                            <option value="氧化沟" <?php if(isset($_POST['search'])&&$_POST['GYZD']=="氧化沟") echo "selected" ?> >氧化沟</option>
                            <option value="过滤池" <?php if(isset($_POST['search'])&&$_POST['GYZD']=="过滤池") echo "selected" ?> >过滤池</option>
                            <option value="高效沉淀池" <?php if(isset($_POST['search'])&&$_POST['GYZD']=="高效沉淀池") echo "selected" ?> >高效沉淀池</option>
                        </select><br/>
                    </div>
                    <div class="col-xs-6">
                        <label>中水回用</label>
                        <select class = "select form-control" name="ZSHY" title="">
                            <option value="">不限</option>
                            <option value="1" <?php if(isset($_POST['search'])&&$_POST['ZSHY']=="1") echo "selected" ?> >有</option>
                            <option value="0" <?php if(isset($_POST['search'])&&$_POST['ZSHY']=="0") echo "selected" ?> >无</option>
                        </select>
                    </div>
                </div><br/>

                <div class="col-xs-12">
                    <div class="col-xs-3"></div>
                    <div class="col-xs-6">
                    <h4 align="center"><button class="submit btn btn-primary btn-lg btn-block" name="search">检索</button></h4>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-3"></div>
        <?php

        if(isset($_POST['search'])) {
            $query = "SELECT GYYQ_WASTEWATER_TREATMENT_PLANT_NAME, YQWS_SIZE, YQWS_WATER_PROCESSING_VOLUME/YQWS_SIZE, YQWS_LAND_SIZE, YQWS_LAND_SIZE/YQWS_SIZE,
 YQWS_MAIN_WASTE_IN_DENSITY_COD, YQWS_MAIN_WASTE_IN_DENSITY_BOD, YQWS_MAIN_WASTE_IN_DENSITY_TH, YQWS_MAIN_WASTE_IN_DENSITY_SS, YQWS_MAIN_WASTE_IN_DENSITY_TP,
 YQWS_MAIN_WASTE_IN_DENSITY_SE, YQWS_MAIN_WASTE_IN_DENSITY_PH, YQWS_MAIN_WASTE_IN_DENSITY_WEN, YQWS_MAIN_WASTE_IN_DENSITY_NH, YQWS_PROCESSING_MEANS,
 YQWS_ACCIDENT_POOL_VOLUME, YQWS_ACCIDENT_POOL_VOLUME/YQWS_SIZE FROM SewageTreatmentQuestionnaire
            WHERE `YQWS_PROCESSING_MEANS` LIKE '%$_POST[GYZD]%' AND `YQFS_YN_RECYCLE_NETWORK` LIKE '%$_POST[ZSHY]%'
            ORDER BY $_POST[PXYJ] $_POST[PXFF]";
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
            <th width="8%">处理厂名称</th>
            <th width="6%">设计规模</th>
            <th width="6%">实际处理水量/设计规模</th>
            <th width="6%">占地面积</th>
            <th width="6%">占地面积/设计规模</th>
            <th width="6%">CODcr</th>
            <th width="6%">BOD5</th>
            <th width="6%">TN</th>
            <th width="6%">SS</th>
            <th width="6%">TP</th>
            <th width="4%">色度</th>
            <th width="4%">pH</th>
            <th width="4%">温度</th>
            <th width="6%">NH3-N</th>
            <th width="8%">处理工艺</th>
            <th width="6%">事故水池容积</th>
            <th width="6%">事故水池容积/设计规模</th>
        </tr>
        </thead>
        <tbody>

        <?php
        while($rows = mysqli_fetch_array($result)) {
        ?>
				<tr >
					<td><?php echo $rows[0] ?></td>
					<td><?php echo $rows[1] ?> m^3/d</td>
					<td><?php echo round($rows[2],3) ?></td>
					<td><?php echo $rows[3] ?> m^2</td>
					<td><?php echo round($rows[4],3) ?></td>
					<td><?php echo $rows[5] ?> mg/L</td>
                    <td><?php echo $rows[6] ?> mg/L</td>
                    <td><?php echo $rows[7] ?> mg/L</td>
                    <td><?php echo $rows[8] ?> mg/L</td>
                    <td><?php echo $rows[9] ?> mg/L</td>
                    <td><?php echo $rows[10] ?></td>
                    <td><?php echo $rows[11] ?></td>
                    <td><?php echo $rows[12] ?></td>
                    <td><?php echo $rows[13] ?> mg/L</td>
                    <td><?php echo $rows[14] ?></td>
                    <td><?php echo $rows[15] ?> m^3</td>
                    <td><?php echo round($rows[16],3) ?></td>
                </tr>
        <?php }} ?>
        </tbody>
    </table>


</div> <!-- /container -->


</body>

</html>

