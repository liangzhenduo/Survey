<?php
session_start();
include "connectdb.php";
$error='';
if(!isset($_SESSION['username'])){		//未登录
    header("location: signin.php");
}
else {
    $username=$_SESSION['username'];
    $query="select `type`, `submit` from user_info where `username`='$username'";
    $result = mysqli_query($con,$query);
    $row =mysqli_fetch_array($result);
    $type=$row[0];
    $submit=$row[1];
    if($type!=2&&$type!=0||$submit==1){
        header("location: home.php");
    }
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

    <title>函件调查表</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="ie-emulation-modes-warning.js"></script>

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

                    <li><a href="ranklist.php?id=1">Ranklist <span class="glyphicon glyphicon-list-alt"></span></a></li>

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
            <form class="form-signin" method="POST" action="#">

                <h4 align="center">“重点流域典型工业园区水污染防治技术评估和管理制度研究”课题<br/>函件调查表</h4><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">填表人</label> <input type="text" class="form-control" name="WSCL_INVESTIGATOR" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">联系电话</label> <input type="text" class="form-control" name="WSCL_TELEPHONE" required placeholder=""><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水处理厂名称</label> <input type="text" class="form-control" name="WSCL_NAME" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运营单位名称</label> <input type="text" class="form-control" name="WSCL_RUNNING" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设计规模(m^3/d)</label> <input type="number" class="form-control" name="JBSJ_DESIGN_SIZE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">实际处理水量(m^3/d)</label> <input type="number" class="form-control" name="JBSJ_WATER_PROCESSING" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">处理能力满足需求</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="JBSJ_Y/N_MEET_REQUIREMENT" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="JBSJ_Y/N_MEET_REQUIREMENT" value="0" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年最大日水量(m^3/d)</label> <input type="number" class="form-control" name="JBSJ_MAX_DAY_WATER_SIZE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">年运行天数(天)</label> <input type="number" class="form-control" name="JBSJ_RUNNING_DAYS" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年平均日水量(m^3/d)</label> <input type="number" class="form-control" name="JBSJ_AVERAGE_DAY_WATER_SIZE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">运行费(万元/年)</label> <input type="number" class="form-control" name="JBSJ_RUNNING_FEE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">排放标准</label> <input type="text" class="form-control" name="JBSJ_UNLOAD_STANDARD" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">人员配备(污水班 人/班)</label> <input type="number" class="form-control" name="JBSJ_WASTEWATER_PEOPLE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">占地面积(m^2)</label> <input type="number" class="form-control" name="JBSJ_LAND_SIZE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">人员配备(污泥班 人/班)</label> <input type="number" class="form-control" name="JBSJ_MUD_PEOPLE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工程建设(年)</label> <input type="number" class="form-control" name="JBSJ_CONSTRUCTION_YEAR" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">工程投资(万元)</label> <input type="number" class="form-control" name="JBSJ_CONSTRUCTION_INVESTMENT" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">药剂费(万元/年)</label> <input type="number" class="form-control" name="JBSJ_MEDCINE_FEE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">电费(元/年)</label> <input type="number" class="form-control" name="JBSJ_ELECTRICITY_FEE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">人工费(万元/年)</label> <input type="number" class="form-control" name="JBSJ_PEOPLE_FEE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设备折旧费(万元/年)</label> <input type="number" class="form-control" name="JBSJ_EQUIPMENT_OLD_FEE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">其他费(万元/年)</label> <input type="number" class="form-control" name="JBSJ_OTHER_FEE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥产量(吨/天)</label> <input type="number" class="form-control" name="JBSJ_MUD_PRODUCTIVITY_FEE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥含水率(%)</label> <input type="number" class="form-control" name="JBSJ_MUD_WATER_RATE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污泥处理方式</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;焚烧</label><input type="radio" name="JBSJ_MUD_PROCESSING_MEANS" value="焚烧" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;填埋</label><input type="radio" name="JBSJ_MUD_PROCESSING_MEANS" value="填埋" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;堆肥</label><input type="radio" name="JBSJ_MUD_PROCESSING_MEANS" value="堆肥" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;土地利用</label><input type="radio" name="JBSJ_MUD_PROCESSING_MEANS" value="土地利用" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;建材利用</label><input type="radio" name="JBSJ_MUD_PROCESSING_MEANS" value="建材利用" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他资源</label><input type="radio" name="JBSJ_MUD_PROCESSING_MEANS" value="其他资源" placeholder="" ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥建材利用量(t/d)</label> <input type="number" class="form-control" name="JBSJ_CONSTRUCTION_USAGE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥土地利用量(t/d)</label> <input type="number" class="form-control" name="JBSJ_LAND_USAGE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥堆肥量(t/d)</label> <input type="number" class="form-control" name="JBSJ_MUD_COMPOSIT" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥填埋量(t/d)</label> <input type="number" class="form-control" name="JBSJ_MUD_DUMPLING" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥焚烧量(t/d)</label> <input type="number" class="form-control" name="JBSJ_MUD_BURN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥其他资源利用量(t/d)</label> <input type="number" class="form-control" name="JBSJ_MUD_OTHER_RESOURCE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">噪声影响情况</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;强</label><input type="radio" name="JBSJ_NOISE_INFLUNCE" value="强烈" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较强</label><input type="radio" name="JBSJ_NOISE_INFLUNCE" value="较强烈" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;一般</label><input type="radio" name="JBSJ_NOISE_INFLUNCE" value="一般" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较弱</label><input type="radio" name="JBSJ_NOISE_INFLUNCE" value="较弱" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">臭气影响情况</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;强</label><input type="radio" name="JBSJ_OZONE_INFLUNCE" value="强烈" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较强</label><input type="radio" name="JBSJ_OZONE_INFLUNCE" value="较强烈" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;一般</label><input type="radio" name="JBSJ_OZONE_INFLUNCE" value="一般" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较弱</label><input type="radio" name="JBSJ_OZONE_INFLUNCE" value="较弱" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">pH自动监测</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="JBSJ_Y/N_PH_MONITORING" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="JBSJ_Y/N_PH_MONITORING" value="0" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">水位自动监测</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="JBSJ_Y/N_WATER_LEVEL_MONITORING" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="JBSJ_Y/N_WATER_LEVEL_MONITORING" value="0" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">有无完善的监控系统</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="JBSJ_Y/N_GOOD_MONITORING" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="JBSJ_Y/N_GOOD_MONITORING" value="0" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水厂自动化程度</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;高</label><input type="radio" name="JBSJ_AUTOMATIC_LEVEL" value="高" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较高</label><input type="radio" name="JBSJ_AUTOMATIC_LEVEL" value="较高" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;一般</label><input type="radio" name="JBSJ_AUTOMATIC_LEVEL" value="一般" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较低</label><input type="radio" name="JBSJ_AUTOMATIC_LEVEL" value="较低" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">CODcr(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_CODCR_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_CODCR_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">BOD5(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_BOD5_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_BOD5_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">色度(度)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_COLOR_DEGREE_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_COLOR_DEGREE_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">SS(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_SS_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_SS_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">TP(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_TP_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_TP_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">TN(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_TN_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_TN_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">NH3-N(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_NH3N_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_NH3N_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">pH</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水pH(日均值)</label> <input type="number" class="form-control" name="SZZB_PH_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水pH(日均值)</label> <input type="number" class="form-control" name="SZZB_PH_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">盐分(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_SALINITY_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_SALINITY_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">难降解有机物(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_ORG_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_ORG_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">铜(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_CU_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_CU_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">铁(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_FE_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_FE_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">镍(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_NG_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_NG_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">镉(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_CD_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_CD_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">其他重金属(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_OTHER_METAL_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_OTHER_METAL_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">其他污染物(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_OTHER_POLLUTION_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_OTHER_POLLUTION_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">出水年达标率(%)</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_MEET_REQUIREMENT_RATE_IN" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" class="form-control" name="SZZB_MEET_REQUIREMENT_RATE_OUT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">工艺流程</label> <input type="text" class="form-control" name="SZZB__PROCESSING_PROCESS" placeholder="进水->" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">抗水质冲击生物池恢复天数</label> <input type="number" class="form-control" name="WSCL_RECOVER_DAYS_Q" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">抗水力冲击生物池恢复天数</label> <input type="number" class="form-control" name="WSCL_RECOVER_DAYS_P" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">抗水质(水力)冲击负荷能力</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;强</label><input type="radio" name="WSCL_AUNTI_PRESSURE" value="强" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较强</label><input type="radio" name="WSCL_AUNTI_PRESSURE" value="较强" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;一般</label><input type="radio" name="WSCL_AUNTI_PRESSURE" value="一般" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较弱</label><input type="radio" name="WSCL_AUNTI_PRESSURE" value="较弱" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水厂运行问题与建议</label> <input type="text" class="form-control" name="WSCL_SUGGESTIONS" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否有再生水厂</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="WSCL_Y/N_HAVE_RESYCLE_PLANT" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="WSCL_Y/N_HAVE_RESYCLE_PLANT" value="0" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水处理规模(m^3/d)</label> <input type="number" class="form-control" name="WSCL_PROCESSING_SIZE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">再生水用途</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;城市杂用</label><input type="radio" name="WSCL_APPLICATIONS" value="城市杂用" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;工业</label><input type="radio" name="WSCL_APPLICATIONS" value="工业" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;景观</label><input type="radio" name="WSCL_APPLICATIONS" value="景观" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <h1 align="center"><input class="btn btn-primary" type="submit" name="submit"/></h1>

            </form>
        </div>
        <div class="col-lg-3"></div>

    </div>

</div> <!-- /container -->

</body>

</html>

