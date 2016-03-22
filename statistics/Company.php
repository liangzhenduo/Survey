<?php
session_start();
$error='';
if(!isset($_SESSION['username'])){		//未登录
    header("location: ../home.php");
    exit;
}
include("../connectdb.php");
include('../export.php');
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

                <h2 class="form-signin-heading" align="center">企业数据</h2><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>排序依据</label>
                        <select class = "select form-control" name="PXYJ" title="">
                            <option value="CompanyQuestionnaire.ID">默认</option>
                            <option value="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_COD" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['PXYJ']=="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_COD") echo "selected" ?> >进水CODcr</option>
                            <option value="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_BOD" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['PXYJ']=="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_BOD") echo "selected" ?> >进水BOD5</option>
                            <option value="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_TN" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['PXYJ']=="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_TN") echo "selected" ?> >进水TN</option>
                            <option value="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_SS" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['PXYJ']=="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_SS") echo "selected" ?> >进水SS</option>
                            <option value="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_TP" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['PXYJ']=="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_TP") echo "selected" ?> >进水TP</option>
                            <!--option value="YQWS_MAIN_WASTE_IN_DENSITY_SE" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['PXYJ']=="YQWS_MAIN_WASTE_IN_DENSITY_SE") echo "selected" ?> >进水色度</option-->
                            <option value="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_PH" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['PXYJ']=="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_PH") echo "selected" ?> >进水pH</option>
                            <!--option value="YQWS_MAIN_WASTE_IN_DENSITY_WEN" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['PXYJ']=="YQWS_MAIN_WASTE_IN_DENSITY_WEN") echo "selected" ?> >进水温度</option-->
                            <option value="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_NH" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['PXYJ']=="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_NH") echo "selected" ?> >进水NH3-N</option>
                            <option value="SGCL_YN_ACCIDENT_POOL_VOLUME/JBQK_WASTE_PROCESSING_SIZE" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['PXYJ']=="SGCL_YN_ACCIDENT_POOL_VOLUME/JBQK_WASTE_PROCESSING_SIZE") echo "selected" ?> >事故水池容积/处理规模</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>排序方法</label>
                        <select class = "select form-control" name="PXFF" title="">
                            <option value="ASC" >升序</option>
                            <option value="DESC" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['PXFF']=="DESC") echo "selected" ?> >降序</option>
                        </select><br>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>行业字段</label>
                        <input type="text" class="form-control" placeholder="关键字" name="HYZD" value=<?php if((isset($_POST['search'])||isset($_POST['export']))) echo $_POST['HYZD'] ?> ><br/>
                    </div>
                    <div class="col-xs-6">
                        <label>清洁生产</label>
                        <select class = "select form-control" name="QJSC" title="">
                            <option value="">不限</option>
                            <option value="1" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['QJSC']=="1") echo "selected" ?> >是</option>
                            <option value="0" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['QJSC']=="0") echo "selected" ?> >否</option>
                        </select><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>工艺字段</label>
                        <select class = "select form-control" name="GYZD" title="">
                            <option value="">不限</option>
                            <option value="调节池" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['GYZD']=="调节池") echo "selected" ?> >调节池</option>
                            <option value="好氧池" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['GYZD']=="好氧池") echo "selected" ?> >好氧池</option>
                            <option value="生化池" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['GYZD']=="生化池") echo "selected" ?> >生化池</option>
                            <option value="厌氧池" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['GYZD']=="厌氧池") echo "selected" ?> >厌氧池</option>
                        </select><br/>
                    </div>
                    <div class="col-xs-6">
                        <label>事故水池</label>
                        <select class = "select form-control" name="SGSC" title="">
                            <option value="">不限</option>
                            <option value="1" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['SGSC']=="1") echo "selected" ?> >有</option>
                            <option value="0" <?php if((isset($_POST['search'])||isset($_POST['export']))&&$_POST['SGSC']=="0") echo "selected" ?> >无</option>
                        </select>
                    </div>
                </div><br/>

                <div class="col-xs-12">
                    <div class="col-xs-2"></div>
                    <div class="col-xs-4">
                        <h4 align="center"><button class="submit btn btn-primary btn-lg btn-block" name="search">检索</button></h4>
                    </div>
                    <div class="col-xs-4">
                        <h4 align="center"><button class="submit btn btn-primary btn-lg btn-block" name="export">导出</button></h4>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="col-xs-3"></div>
                    <div class="col-xs-6">
                        <?php
                        $time=date("Y-m-d-H-i-s",time());
                        if(isset($_POST['export'])) {
                        echo "<br><div class=\"alert alert-success\" align=\"center\">导出成功" ?>
                        <a href = "../files/<?php echo $time ?>.xls" target = "_blank" >点击下载</a></div>
                    <?php
                    }
                    ?>
                </div>
            </form>
        </div>

        <div class="col-lg-3"></div>
        <?php

        if(isset($_POST['search'])||isset($_POST['export'])) {
        $query = "SELECT QYXX_NAME, QJSC_YN_CLEANPRODUCT, WSCL_YN_SEWAGE_TREATMENT_FACILITY, SGCL_YN_ACCIDENT_POOL,
            WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_COD, WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_BOD, WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_TN,
            WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_SS, WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_TP, WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_PH,
            WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_NH, WSCL_GENERAL_PROCESSING_PROCEDURE, SGCL_YN_ACCIDENT_POOL_VOLUME/JBQK_WASTE_PROCESSING_SIZE
            FROM CompanyQuestionnaire LEFT JOIN IndustrialParkQuestionnaire ON `GYYQ_NAME` LIKE concat('%',`JBQK_NAME`,'%')
            WHERE `QYXX_TYPE` LIKE '%$_POST[HYZD]%' AND `QJSC_YN_CLEANPRODUCT` LIKE '%$_POST[QJSC]%'
            AND `WSCL_GENERAL_PROCESSING_PROCEDURE` LIKE '%$_POST[GYZD]%' AND `SGCL_YN_ACCIDENT_POOL` LIKE '%$_POST[SGSC]%'
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

    <?php
    $Excel = new Excel();//建立对象，准备写入
    $Excel->Start();
    ?>

    <table class="table" border="1px">
        <thead>
        <tr>
            <th width="11%">企业名称</th>
            <th width="7%">清洁生产</th>
            <th width="7%">污水预处理系统</th>
            <th width="7%">事故水池</th>
            <th width="7%">CODcr(mg/L)</th>
            <th width="7%">BOD5(mg/L)</th>
            <th width="7%">TN(mg/L)</th>
            <th width="7%">SS(mg/L)</th>
            <th width="7%">TP(mg/L)</th>
            <!--th width="4%">色度</th-->
            <th width="6%">pH</th>
            <!--th width="4%">温度</th-->
            <th width="7%">NH3-N(mg/L)</th>
            <th width="13%">处理工艺</th>
            <th width="7%">事故水池容积/处理规模</th>
        </tr>
        </thead>
        <tbody>

        <?php
        while($rows = mysqli_fetch_array($result)) {
            ?>
            <tr >
                <td align="center"><?php echo $rows[0] ?></td>
                <td align="center"><?php if($rows[1]) echo "是"; else echo "否" ?></td>
                <td align="center"><?php if($rows[2]) echo "有"; else echo "无" ?></td>
                <td align="center"><?php if($rows[3]) echo "有"; else echo "无" ?></td>
                <td align="center"><?php echo $rows[4] ?></td>
                <td align="center"><?php echo $rows[5] ?></td>
                <td align="center"><?php echo $rows[6] ?></td>
                <td align="center"><?php echo $rows[7] ?></td>
                <td align="center"><?php echo $rows[8] ?></td>
                <td align="center"><?php echo $rows[9] ?></td>
                <td align="center"><?php echo $rows[10] ?></td>
                <td align="center"><?php echo $rows[11] ?></td>
                <td align="center"><?php echo round($rows[12],3) ?></td>
            </tr>
        <?php }} ?>
        </tbody>
    </table>

    <?php
    if(isset($_POST['export'])) {
        $Excel->Save("../files/$time.xls");
    }
    ?>


</div> <!-- /container -->


</body>

</html>

