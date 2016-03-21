<?php
session_start();
include "../connectdb.php";
$error='';
if(!isset($_SESSION['username'])){		//未登录
    header("location: ../home.php");
    exit;
}
$username=$_SESSION['username'];
$query="SELECT `type` FROM user_info WHERE `username`='$username'";
$result = mysqli_query($con,$query);
$row =mysqli_fetch_array($result);
$type=$row[0];
if($type==0||$type==2) $ac=1;
else $ac=0;
if(isset($_GET['name'])) {

    if(isset($_POST['delete'])) {
        $delete="DELETE FROM SewageTreatmentInvestigation WHERE `WSCL_NAME`='$_GET[name]'";
        mysqli_query($con, $delete);
        header("location: ../search.php?status=0");
        exit;
    }

    if(isset($_POST['submit'])) {
        $update = "UPDATE SewageTreatmentInvestigation SET
`WSCL_INVESTIGATOR`='$_POST[WSCL_INVESTIGATOR]',
`WSCL_TELEPHONE`='$_POST[WSCL_TELEPHONE]',
`WSCL_RUNNING`='$_POST[WSCL_RUNNING]',
`JBSJ_DESIGN_SIZE`='$_POST[JBSJ_DESIGN_SIZE]',
`JBSJ_WATER_PROCESSING`='$_POST[JBSJ_WATER_PROCESSING]',
`JBSJ_YN_MEET_REQUIREMENT`='$_POST[JBSJ_YN_MEET_REQUIREMENT]',
`JBSJ_MAX_DAY_WATER_SIZE`='$_POST[JBSJ_MAX_DAY_WATER_SIZE]',
`JBSJ_RUNNING_DAYS`='$_POST[JBSJ_RUNNING_DAYS]',
`JBSJ_AVERAGE_DAY_WATER_SIZE`='$_POST[JBSJ_AVERAGE_DAY_WATER_SIZE]',
`JBSJ_RUNNING_FEE`='$_POST[JBSJ_RUNNING_FEE]',
`JBSJ_UNLOAD_STANDARD`='$_POST[JBSJ_UNLOAD_STANDARD]',
`JBSJ_WASTEWATER_PEOPLE`='$_POST[JBSJ_WASTEWATER_PEOPLE]',
`JBSJ_LAND_SIZE`='$_POST[JBSJ_LAND_SIZE]',
`JBSJ_MUD_PEOPLE`='$_POST[JBSJ_MUD_PEOPLE]',
`JBSJ_CONSTRUCTION_YEAR`='$_POST[JBSJ_CONSTRUCTION_YEAR]',
`JBSJ_CONSTRUCTION_INVESTMENT`='$_POST[JBSJ_CONSTRUCTION_INVESTMENT]',
`JBSJ_MEDCINE_FEE`='$_POST[JBSJ_MEDCINE_FEE]',
`JBSJ_ELECTRICITY_FEE`='$_POST[JBSJ_ELECTRICITY_FEE]',
`JBSJ_PEOPLE_FEE`='$_POST[JBSJ_PEOPLE_FEE]',
`JBSJ_EQUIPMENT_OLD_FEE`='$_POST[JBSJ_EQUIPMENT_OLD_FEE]',
`JBSJ_OTHER_FEE`='$_POST[JBSJ_OTHER_FEE]',
`JBSJ_MUD_PRODUCTIVITY_FEE`='$_POST[JBSJ_MUD_PRODUCTIVITY_FEE]',
`JBSJ_MUD_WATER_RATE`='$_POST[JBSJ_MUD_WATER_RATE]',
`JBSJ_MUD_PROCESSING_MEANS`='$_POST[JBSJ_MUD_PROCESSING_MEANS]',
`JBSJ_CONSTRUCTION_USAGE`='$_POST[JBSJ_CONSTRUCTION_USAGE]',
`JBSJ_LAND_USAGE`='$_POST[JBSJ_LAND_USAGE]',
`JBSJ_MUD_COMPOSIT`='$_POST[JBSJ_MUD_COMPOSIT]',
`JBSJ_MUD_DUMPLING`='$_POST[JBSJ_MUD_DUMPLING]',
`JBSJ_MUD_BURN`='$_POST[JBSJ_MUD_BURN]',
`JBSJ_MUD_OTHER_RESOURCE`='$_POST[JBSJ_MUD_OTHER_RESOURCE]',
`JBSJ_NOISE_INFLUNCE`='$_POST[JBSJ_NOISE_INFLUNCE]',
`JBSJ_OZONE_INFLUNCE`='$_POST[JBSJ_OZONE_INFLUNCE]',
`JBSJ_YN_PH_MONITORING`='$_POST[JBSJ_YN_PH_MONITORING]',
`JBSJ_YN_WATER_LEVEL_MONITORING`='$_POST[JBSJ_YN_WATER_LEVEL_MONITORING]',
`JBSJ_YN_GOOD_MONITORING`='$_POST[JBSJ_YN_GOOD_MONITORING]',
`JBSJ_AUTOMATIC_LEVEL`='$_POST[JBSJ_AUTOMATIC_LEVEL]',
`SZZB_CODCR_IN`='$_POST[SZZB_CODCR_IN]',
`SZZB_CODCR_OUT`='$_POST[SZZB_CODCR_OUT]',
`SZZB_BOD5_IN`='$_POST[SZZB_BOD5_IN]',
`SZZB_BOD5_OUT`='$_POST[SZZB_BOD5_OUT]',
`SZZB_COLOR_DEGREE_IN`='$_POST[SZZB_COLOR_DEGREE_IN]',
`SZZB_COLOR_DEGREE_OUT`='$_POST[SZZB_COLOR_DEGREE_OUT]',
`SZZB_SS_IN`='$_POST[SZZB_SS_IN]',
`SZZB_SS_OUT`='$_POST[SZZB_SS_OUT]',
`SZZB_TP_IN`='$_POST[SZZB_TP_IN]',
`SZZB_TP_OUT`='$_POST[SZZB_TP_OUT]',
`SZZB_TN_IN`='$_POST[SZZB_TN_IN]',
`SZZB_TN_OUT`='$_POST[SZZB_TN_OUT]',
`SZZB_NH3N_IN`='$_POST[SZZB_NH3N_IN]',
`SZZB_NH3N_OUT`='$_POST[SZZB_NH3N_OUT]',
`SZZB_PH_IN`='$_POST[SZZB_PH_IN]',
`SZZB_PH_OUT`='$_POST[SZZB_PH_OUT]',
`SZZB_SALINITY_IN`='$_POST[SZZB_SALINITY_IN]',
`SZZB_SALINITY_OUT`='$_POST[SZZB_SALINITY_OUT]',
`SZZB_ORG_IN`='$_POST[SZZB_ORG_IN]',
`SZZB_ORG_OUT`='$_POST[SZZB_ORG_OUT]',
`SZZB_CU_IN`='$_POST[SZZB_CU_IN]',
`SZZB_CU_OUT`='$_POST[SZZB_CU_OUT]',
`SZZB_FE_IN`='$_POST[SZZB_FE_IN]',
`SZZB_FE_OUT`='$_POST[SZZB_FE_OUT]',
`SZZB_NG_IN`='$_POST[SZZB_NG_IN]',
`SZZB_NG_OUT`='$_POST[SZZB_NG_OUT]',
`SZZB_CD_IN`='$_POST[SZZB_CD_IN]',
`SZZB_CD_OUT`='$_POST[SZZB_CD_OUT]',
`SZZB_OTHER_METAL_IN`='$_POST[SZZB_OTHER_METAL_IN]',
`SZZB_OTHER_METAL_OUT`='$_POST[SZZB_OTHER_METAL_OUT]',
`SZZB_OTHER_POLLUTION_IN`='$_POST[SZZB_OTHER_POLLUTION_IN]',
`SZZB_OTHER_POLLUTION_OUT`='$_POST[SZZB_OTHER_POLLUTION_OUT]',
`SZZB_MEET_REQUIREMENT_RATE_IN`='$_POST[SZZB_MEET_REQUIREMENT_RATE_IN]',
`SZZB_MEET_REQUIREMENT_RATE_OUT`='$_POST[SZZB_MEET_REQUIREMENT_RATE_OUT]',
`SZZB_PROCESSING_PROCESS`='$_POST[SZZB_PROCESSING_PROCESS]',
`WSCL_RECOVER_DAYS_Q`='$_POST[WSCL_RECOVER_DAYS_Q]',
`WSCL_RECOVER_DAYS_P`='$_POST[WSCL_RECOVER_DAYS_P]',
`WSCL_AUNTI_PRESSURE`='$_POST[WSCL_AUNTI_PRESSURE]',
`WSCL_SUGGESTIONS`='$_POST[WSCL_SUGGESTIONS]',
`WSCL_YN_HAVE_RESYCLE_PLANT`='$_POST[WSCL_YN_HAVE_RESYCLE_PLANT]',
`WSCL_PROCESSING_SIZE`='$_POST[WSCL_PROCESSING_SIZE]',
`WSCL_APPLICATIONS`='$_POST[WSCL_APPLICATIONS]'
        WHERE `WSCL_NAME`='$_GET[name]'";
        mysqli_query($con, $update);
        header("location: ../search.php?status=1");
        exit;
    }

    $select="SELECT * FROM SewageTreatmentInvestigation WHERE `WSCL_NAME`='$_GET[name]'";
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
    <link rel="icon" href="../image/logo.gif">

    <title>函件调查表</title>

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
            <form class="form-signin" method="POST" action="#">

                <h4 align="center">“重点流域典型工业园区水污染防治技术评估和管理制度研究”课题<br/>工业园区污水处理厂运营商函件调查表</h4><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">填表人</label> <input type="text" class="form-control" name="WSCL_INVESTIGATOR" placeholder="" value="<?php echo $rows[1] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">联系电话</label> <input type="text" class="form-control" name="WSCL_TELEPHONE" placeholder="" value="<?php echo $rows[2] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水处理厂名称</label> <input type="text" class="form-control" name="WSCL_NAME" placeholder="" value="<?php echo $rows[3] ?>" disabled >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运营单位名称</label> <input type="text" class="form-control" name="WSCL_RUNNING" placeholder="" value="<?php echo $rows[4] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设计规模(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_DESIGN_SIZE" placeholder="" value="<?php echo $rows[5] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">实际处理水量(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_WATER_PROCESSING" placeholder="" value="<?php echo $rows[6] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">处理能力满足需求</label> <input type="text" class="form-control" name="JBSJ_YN_MEET_REQUIREMENT" placeholder="" value="<?php echo $rows[7] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年最大日水量(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_MAX_DAY_WATER_SIZE" placeholder="" value="<?php echo $rows[8] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">年运行天数(天)</label> <input type="number" max="365" class="form-control" name="JBSJ_RUNNING_DAYS" placeholder="" value="<?php echo $rows[9] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年平均日水量(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_AVERAGE_DAY_WATER_SIZE" placeholder="" value="<?php echo $rows[10] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">运行费(万元/年)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_RUNNING_FEE" placeholder="" value="<?php echo $rows[11] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">排放标准</label> <input type="text" class="form-control" name="JBSJ_UNLOAD_STANDARD" placeholder="" value="<?php echo $rows[12] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">人员配备(污水班 人/班)</label> <input type="number" class="form-control" name="JBSJ_WASTEWATER_PEOPLE" placeholder="" value="<?php echo $rows[13] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">占地面积(m^2)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_LAND_SIZE" placeholder="" value="<?php echo $rows[14] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">人员配备(污泥班 人/班)</label> <input type="number" class="form-control" name="JBSJ_MUD_PEOPLE" placeholder="" value="<?php echo $rows[15] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工程建设(年)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_CONSTRUCTION_YEAR" placeholder="" value="<?php echo $rows[16] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">工程投资(万元)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_CONSTRUCTION_INVESTMENT" placeholder="" value="<?php echo $rows[17] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">药剂费(万元/年)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_MEDCINE_FEE" placeholder="" value="<?php echo $rows[18] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">电费(元/年)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_ELECTRICITY_FEE" placeholder="" value="<?php echo $rows[19] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">人工费(万元/年)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_PEOPLE_FEE" placeholder="" value="<?php echo $rows[20] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设备折旧费(万元/年)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_EQUIPMENT_OLD_FEE" placeholder="" value="<?php echo $rows[21] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">其他费(万元/年)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_OTHER_FEE" placeholder="" value="<?php echo $rows[22] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥产量(吨/天)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_MUD_PRODUCTIVITY_FEE" placeholder="" value="<?php echo $rows[23] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥含水率(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="JBSJ_MUD_WATER_RATE" placeholder="" value="<?php echo $rows[24] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污泥处理方式</label> <input type="text" class="form-control" name="JBSJ_MUD_PROCESSING_MEANS" placeholder="" value="<?php echo $rows[25] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥建材利用量(t/d)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_CONSTRUCTION_USAGE" placeholder="" value="<?php echo $rows[26] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥土地利用量(t/d)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_LAND_USAGE" placeholder="" value="<?php echo $rows[27] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥堆肥量(t/d)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_MUD_COMPOSIT" placeholder="" value="<?php echo $rows[28] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥填埋量(t/d)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_MUD_DUMPLING" placeholder="" value="<?php echo $rows[29] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥焚烧量(t/d)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_MUD_BURN" placeholder="" value="<?php echo $rows[30] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥其他资源利用量(t/d)</label> <input type="number" step="0.001" class="form-control" name="JBSJ_MUD_OTHER_RESOURCE" placeholder="" value="<?php echo $rows[31] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">噪声影响情况</label> <input type="text" class="form-control" name="JBSJ_NOISE_INFLUNCE" placeholder="" value="<?php echo $rows[32] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">臭气影响情况</label> <input type="text" class="form-control" name="JBSJ_OZONE_INFLUNCE" placeholder="" value="<?php echo $rows[33] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">pH自动监测</label> <input type="text" class="form-control" name="JBSJ_YN_PH_MONITORING" placeholder="" value="<?php echo $rows[34] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">水位自动监测</label> <input type="text" class="form-control" name="JBSJ_YN_WATER_LEVEL_MONITORING" placeholder="" value="<?php echo $rows[35] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">有无完善的监控系统</label> <input type="text" class="form-control" name="JBSJ_YN_GOOD_MONITORING" placeholder="" value="<?php echo $rows[36] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水厂自动化程度</label> <input type="text" class="form-control" name="JBSJ_AUTOMATIC_LEVEL" placeholder="" value="<?php echo $rows[37] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">CODcr(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_CODCR_IN" placeholder="" value="<?php echo $rows[38] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_CODCR_OUT" placeholder="" value="<?php echo $rows[39] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">BOD5(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_BOD5_IN" placeholder="" value="<?php echo $rows[40] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_BOD5_OUT" placeholder="" value="<?php echo $rows[41] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">色度(度)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_COLOR_DEGREE_IN" placeholder="" value="<?php echo $rows[42] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_COLOR_DEGREE_OUT" placeholder="" value="<?php echo $rows[43] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">SS(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_SS_IN" placeholder="" value="<?php echo $rows[44] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_SS_OUT" placeholder="" value="<?php echo $rows[45] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">TP(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_TP_IN" placeholder="" value="<?php echo $rows[46] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_TP_OUT" placeholder="" value="<?php echo $rows[47] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">TN(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_TN_IN" placeholder="" value="<?php echo $rows[48] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_TN_OUT" placeholder="" value="<?php echo $rows[49] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">NH3-N(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_NH3N_IN" placeholder="" value="<?php echo $rows[50] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_NH3N_OUT" placeholder="" value="<?php echo $rows[51] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">pH</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水pH(日均值)</label> <input type="number" step="0.1" max="14" class="form-control" name="SZZB_PH_IN" placeholder="" value="<?php echo $rows[52] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水pH(日均值)</label> <input type="number" step="0.1" max="14" class="form-control" name="SZZB_PH_OUT" placeholder="" value="<?php echo $rows[53] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">盐分(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_SALINITY_IN" placeholder="" value="<?php echo $rows[54] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_SALINITY_OUT" placeholder="" value="<?php echo $rows[55] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">难降解有机物(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_ORG_IN" placeholder="" value="<?php echo $rows[56] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_ORG_OUT" placeholder="" value="<?php echo $rows[57] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">铜(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_CU_IN" placeholder="" value="<?php echo $rows[58] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_CU_OUT" placeholder="" value="<?php echo $rows[59] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">铁(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_FE_IN" placeholder="" value="<?php echo $rows[60] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_FE_OUT" placeholder="" value="<?php echo $rows[61] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">镍(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_NG_IN" placeholder="" value="<?php echo $rows[62] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_NG_OUT" placeholder="" value="<?php echo $rows[63] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">镉(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_CD_IN" placeholder="" value="<?php echo $rows[64] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_CD_OUT" placeholder="" value="<?php echo $rows[65] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">其他重金属(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_OTHER_METAL_IN" placeholder="" value="<?php echo $rows[66] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_OTHER_METAL_OUT" placeholder="" value="<?php echo $rows[67] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">其他污染物(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_OTHER_POLLUTION_IN" placeholder="" value="<?php echo $rows[68] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" class="form-control" name="SZZB_OTHER_POLLUTION_OUT" placeholder="" value="<?php echo $rows[69] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">出水年达标率(%)</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">进水浓度(日均值)</label> <input type="number" step="0.001" max="100" class="form-control" name="SZZB_MEET_REQUIREMENT_RATE_IN" placeholder="" value="<?php echo $rows[70] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">出水浓度(日均值)</label> <input type="number" step="0.001" max="100" class="form-control" name="SZZB_MEET_REQUIREMENT_RATE_OUT" placeholder="" value="<?php echo $rows[71] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">工艺流程</label> <input type="text" class="form-control" name="SZZB_PROCESSING_PROCESS" placeholder="进水->" value="<?php echo $rows[72] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">抗水质冲击生物池恢复天数</label> <input type="number" class="form-control" name="WSCL_RECOVER_DAYS_Q" placeholder="" value="<?php echo $rows[73] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">抗水力冲击生物池恢复天数</label> <input type="number" class="form-control" name="WSCL_RECOVER_DAYS_P" placeholder="" value="<?php echo $rows[74] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">抗水质(水力)冲击负荷能力</label> <input type="text" class="form-control" name="WSCL_AUNTI_PRESSURE" placeholder="" value="<?php echo $rows[75] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水厂运行问题与建议</label> <input type="text" class="form-control" name="WSCL_SUGGESTIONS" placeholder="" value="<?php echo $rows[76] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否有再生水厂</label> <input type="text" class="form-control" name="WSCL_YN_HAVE_RESYCLE_PLANT" placeholder="" value="<?php echo $rows[77] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水处理规模(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="WSCL_PROCESSING_SIZE" placeholder="" value="<?php echo $rows[78] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">再生水用途</label> <input type="text" class="form-control" name="WSCL_APPLICATIONS" placeholder="" value="<?php echo $rows[79] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/><br/>
                    </div>
                </div>

                <h1 align="center">
                    <input class="btn btn-primary" type="submit" name="submit" value="提交" <?php if($ac==0) echo "disabled" ?> >
                    <input class="btn btn-primary" type="submit" name="delete" value="删除" <?php if($ac==0) echo "disabled" ?> >
                </h1>

            </form>
        </div>
        <div class="col-lg-3"></div>

    </div>

</div> <!-- /container -->

</body>

</html>

<?php } ?>