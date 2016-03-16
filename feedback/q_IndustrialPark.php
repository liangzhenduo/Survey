<?php
session_start();
include "../connectdb.php";
$error='';
if(!isset($_SESSION['username'])){		//未登录
    header("location: ../home.php");
    exit;
}
$username=$_SESSION['username'];
$query="select `type` from user_info where username='$username'";
$result = mysqli_query($con,$query);
$row =mysqli_fetch_array($result);
$type=$row[0];
if($type==0||$type==3) $ac=1;
else $ac=0;
if(isset($_GET['name'])) {

    if(isset($_POST['submit'])) {
        $update = "UPDATE IndustrialParkQuestionnaire SET
`INVESTIGATOR`='$_POST[INVESTIGATOR]',
`REPORT_DATE`='$_POST[REPORT_DATE]',
`JBQK_TYPE`='$_POST[JBQK_TYPE]',
`JBQK_ADDRESS`='$_POST[JBQK_ADDRESS]',
`JBQK_LEADER`='$_POST[JBQK_LEADER]',
`JBQK_CONTACT`='$_POST[JBQK_CONTACT]',
`JBQK_TELEPHONE`='$_POST[JBQK_TELEPHONE]',
`JBQK_SIZE`='$_POST[JBQK_SIZE]',
`JBQK_FUNDING_TIME`='$_POST[JBQK_FUNDING_TIME]',
`JBQK_NUMBER_COMPANY`='$_POST[JBQK_NUMBER_COMPANY]',
`JBQK_REACH_STANDARED_RATE`='$_POST[JBQK_REACH_STANDARED_RATE]',
`JBQK_CHECK_IMPLEMENT_RATE`='$_POST[JBQK_CHECK_IMPLEMENT_RATE]',
`JBQK_ACCESS_IMPMEMENT_RATE`='$_POST[JBQK_ACCESS_IMPMEMENT_RATE]',
`JBQK_ACCEPTANCE_FACTOR_HANGYE`='$_POST[JBQK_ACCEPTANCE_FACTOR_HANGYE]',
`JBQK_ACCEPTANCE_FACTOR_BIAOXIAN`='$_POST[JBQK_ACCEPTANCE_FACTOR_BIAOXIAN]',
`JBQK_ACCEPTANCE_FACTOR_HUANPING`='$_POST[JBQK_ACCEPTANCE_FACTOR_HUANPING]',
`JBQK_ACCEPTANCE_FACTOR_ZHENGCE`='$_POST[JBQK_ACCEPTANCE_FACTOR_ZHENGCE]',
`JBQK_ACCEPTANCE_FACTOR_CHENGDU`='$_POST[JBQK_ACCEPTANCE_FACTOR_CHENGDU]',
`JBQK_ACCEPTANCE_FACTOR_JIELUN`='$_POST[JBQK_ACCEPTANCE_FACTOR_JIELUN]',
`JBQK_ACCEPTANCE_FACTOR_QUHUA`='$_POST[JBQK_ACCEPTANCE_FACTOR_QUHUA]',
`JBQK_ACCEPTANCE_FACTOR_OTHER`='$_POST[JBQK_ACCEPTANCE_FACTOR_OTHER]',
`JBQK_YEAR_PROFIT`='$_POST[JBQK_YEAR_PROFIT]',
`JBQK_NUMBER_COMPANY_USING_RESYCLING_WATER`='$_POST[JBQK_NUMBER_COMPANY_USING_RESYCLING_WATER]',
`JBQK_ACREAGE`='$_POST[JBQK_ACREAGE]',
`JBQK_TAX`='$_POST[JBQK_TAX]',
`JBQK_GREEN_SPACE_RATE`='$_POST[JBQK_GREEN_SPACE_RATE]',
`JBQK_POLLUTION_EXPENSE`='$_POST[JBQK_POLLUTION_EXPENSE]',
`JBQK_POLLUTION_DISCHARGE_STANDARED_GB`='$_POST[JBQK_POLLUTION_DISCHARGE_STANDARED_GB]',
`JBQK_POLLUTION_DISCHARGE_STANDARED_DB`='$_POST[JBQK_POLLUTION_DISCHARGE_STANDARED_DB]',
`JBQK_POLLUTION_DISCHARGE_STANDARED_HY`='$_POST[JBQK_POLLUTION_DISCHARGE_STANDARED_HY]',
`JBQK_POLLUTION_DISCHARGE_STANDARED_CJ`='$_POST[JBQK_POLLUTION_DISCHARGE_STANDARED_CJ]',
`JBQK_POLLUTION_DISCHARGE_STANDARED_OTHER`='$_POST[JBQK_POLLUTION_DISCHARGE_STANDARED_OTHER]',
`JBQK_POLLUTION_DISCHARGE_STANDARED_LC`='$_POST[JBQK_POLLUTION_DISCHARGE_STANDARED_LC]',
`JBQK_WATER_USING`='$_POST[JBQK_WATER_USING]',
`JBQK_WATER_VALUE`='$_POST[JBQK_WATER_VALUE]',
`JBQK_WATER_SOURCE`='$_POST[JBQK_WATER_SOURCE]',
`JBQK_WATER_BODY`='$_POST[JBQK_WATER_BODY]',
`JBQK_MANAGEMENT`='$_POST[JBQK_MANAGEMENT]',
`JBQK_WATER_RECYCLE_MANAGEMENT`='$_POST[JBQK_WATER_RECYCLE_MANAGEMENT]',
`JBQK_ENVIRONMENT_MERIT_GOVERMENT_EXAMINE`='$_POST[JBQK_ENVIRONMENT_MERIT_GOVERMENT_EXAMINE]',
`JBQK_URGEMENT_SETTING`='$_POST[JBQK_URGEMENT_SETTING]',
`JBQK_SOLID_PRODUCTION`='$_POST[JBQK_SOLID_PRODUCTION]',
`JBQK_DANGER_SOLID_PRODUCTION`='$_POST[JBQK_DANGER_SOLID_PRODUCTION]',
`JBQK_WASTE_EXPENSE_COVER_RATE`='$_POST[JBQK_WASTE_EXPENSE_COVER_RATE]',
`JBQK_EXAMINE_METHOD`='$_POST[JBQK_EXAMINE_METHOD]',
`JBQK_COMPANY_OVERLOAD`='$_POST[JBQK_COMPANY_OVERLOAD]',
`JBQK_COMPANY_OVERLOAD_PUNISHMENT`='$_POST[JBQK_COMPANY_OVERLOAD_PUNISHMENT]',
`JBQK_WASTE_PROCESSING_OVERLOAD`='$_POST[JBQK_WASTE_PROCESSING_OVERLOAD]',
`JBQK_WASTE_PROCESSING_OVERLOAD_PUNISHMENT`='$_POST[JBQK_WASTE_PROCESSING_OVERLOAD_PUNISHMENT]',
`JBQK_WASTE_PROCESSING_NUMBER`='$_POST[JBQK_WASTE_PROCESSING_NUMBER]',
`JBQK_WASTE_PROCESSING_CONSTRUCTION`='$_POST[JBQK_WASTE_PROCESSING_CONSTRUCTION]',
`JBQK_WASTE_PROCESSING_SIZE`='$_POST[JBQK_WASTE_PROCESSING_SIZE]',
`JBQK_RUNING_PATTERN`='$_POST[JBQK_RUNING_PATTERN]',
`JBQK_YN_ACCIDENT_POOL`='$_POST[JBQK_YN_ACCIDENT_POOL]',
`JBQK_ACCIDENT_POOL_VOLUME`='$_POST[JBQK_ACCIDENT_POOL_VOLUME]',
`YQCL_WATER_COLLECTION_NETWORK`='$_POST[YQCL_WATER_COLLECTION_NETWORK]',
`YQCL_WATER_COLLECTION_METHOD`='$_POST[YQCL_WATER_COLLECTION_METHOD]',
`YQCL_YN_INDUSTRIAL_LIFE_SEPERATION`='$_POST[YQCL_YN_INDUSTRIAL_LIFE_SEPERATION]',
`YQCL_YN_COLLECTION_SEPERATION`='$_POST[YQCL_YN_COLLECTION_SEPERATION]',
`YQCL_DISCHARGING_PLACE_NUMBER`='$_POST[YQCL_DISCHARGING_PLACE_NUMBER]',
`YQCL_DISCHARGING_MONITORING_NUMBER`='$_POST[YQCL_DISCHARGING_MONITORING_NUMBER]',
`YQCL_YN_FEATURED_POLLUTION_MONITORING`='$_POST[YQCL_YN_FEATURED_POLLUTION_MONITORING]',
`YQCL_NETWORK_TRANSFER`='$_POST[YQCL_NETWORK_TRANSFER]',
`YQCL_NETWORK_PLACE_NUMBER`='$_POST[YQCL_NETWORK_PLACE_NUMBER]',
`YQCL_MONITORING_FREQUNCY`='$_POST[YQCL_MONITORING_FREQUNCY]',
`YQCL_MONITORING_FACTOR_LIU`='$_POST[YQCL_MONITORING_FACTOR_LIU]',
`YQCL_MONITORING_FACTOR_PH`='$_POST[YQCL_MONITORING_FACTOR_PH]',
`YQCL_MONITORING_FACTOR_WEN`='$_POST[YQCL_MONITORING_FACTOR_WEN]',
`YQCL_MONITORING_FACTOR_HUA`='$_POST[YQCL_MONITORING_FACTOR_HUA]',
`YQCL_MONITORING_FACTOR_SHENG`='$_POST[YQCL_MONITORING_FACTOR_SHENG]',
`YQCL_MONITORING_FACTOR_AN`='$_POST[YQCL_MONITORING_FACTOR_AN]',
`YQCL_MONITORING_FACTOR_DAN`='$_POST[YQCL_MONITORING_FACTOR_DAN]',
`YQCL_MONITORING_FACTOR_LIN`='$_POST[YQCL_MONITORING_FACTOR_LIN]',
`YQCL_MONITORING_FACTOR_ZHONG`='$_POST[YQCL_MONITORING_FACTOR_ZHONG]',
`YQCL_MONITORING_FACTOR_NAN`='$_POST[YQCL_MONITORING_FACTOR_NAN]',
`YQCL_MONITORING_FACTOR_OTHER`='$_POST[YQCL_MONITORING_FACTOR_OTHER]',
`YQCL_NETWORK_PROVIDER`='$_POST[YQCL_NETWORK_PROVIDER]',
`YQCL_NETWORK_MANAGEMENT_SOURCE`='$_POST[YQCL_NETWORK_MANAGEMENT_SOURCE]',
`ZSHY_YN_REPRODUCE_WATER`='$_POST[ZSHY_YN_REPRODUCE_WATER]',
`ZSHY_RESCYCLE_RATE`='$_POST[ZSHY_RESCYCLE_RATE]',
`ZSHY_YN_RESCYCLE_NETWORK`='$_POST[ZSHY_YN_RESCYCLE_NETWORK]',
`ZSHY_RESCYCLE_MATERIAL`='$_POST[ZSHY_RESCYCLE_MATERIAL]',
`ZSHY_NETWORK_RUNING_VALUE`='$_POST[ZSHY_NETWORK_RUNING_VALUE]',
`ZSHY_NETWORK_PROVIDER`='$_POST[ZSHY_NETWORK_PROVIDER]',
`ZSHY_NETWORK_EXPENSE_SOURCE`='$_POST[ZSHY_NETWORK_EXPENSE_SOURCE]',
`ZSHY_RESCYCLE_WATER_SIZE`='$_POST[ZSHY_RESCYCLE_WATER_SIZE]',
`ZSHY_RESCYCLE_WATER_VALUE`='$_POST[ZSHY_RESCYCLE_WATER_VALUE]',
`ZSHY_RESCYCLE_CONSTRUCTION_COST`='$_POST[ZSHY_RESCYCLE_CONSTRUCTION_COST]',
`ZSHY_RESCYCLE_PLACE_SIZE`='$_POST[ZSHY_RESCYCLE_PLACE_SIZE]',
`ZSHY_RUNING_EXPENSE`='$_POST[ZSHY_RUNING_EXPENSE]',
`ZSHY_RESCYCLE_PRODUCE_ELECTRICITY_COST`='$_POST[ZSHY_RESCYCLE_PRODUCE_ELECTRICITY_COST]',
`ZSHY_RESCYCLE_PROFIT`='$_POST[ZSHY_RESCYCLE_PROFIT]',
`ZSHY_PROFIT_TIME`='$_POST[ZSHY_PROFIT_TIME]',
`ZSHY_RESCYCLE_WATER_USAGE`='$_POST[ZSHY_RESCYCLE_WATER_USAGE]',
`ZSHY_RESCYCLE_WATER_IN_STANDARD`='$_POST[ZSHY_RESCYCLE_WATER_IN_STANDARD]',
`ZSHY_RESCYCLE_WATER_OUT_STANDARD`='$_POST[ZSHY_RESCYCLE_WATER_OUT_STANDARD]',
`ZSHY_RESCYCLE_WATER_PROCESS`='$_POST[ZSHY_RESCYCLE_WATER_PROCESS]',
`ZSHY_RESCYCLE_WATER_STABILITY`='$_POST[ZSHY_RESCYCLE_WATER_STABILITY]',
`ZSHY_SOLID_PRODUCTIVITY`='$_POST[ZSHY_SOLID_PRODUCTIVITY]',
`ZSHY_RESCYCLE_COMPANY_SUGGESTION`='$_POST[ZSHY_RESCYCLE_COMPANY_SUGGESTION]',
`FSTJ_USAGE`='$_POST[FSTJ_USAGE]',
`ZYHS_MEANS`='$_POST[ZYHS_MEANS]',
`ZYHS_CATEGORY`='$_POST[ZYHS_CATEGORY]',
`YQGL_CONSTRUCTION_MAP`='$_POST[YQGL_CONSTRUCTION_MAP]',
`YQGL_PLAN_EVALUATION_FILE`='$_POST[YQGL_PLAN_EVALUATION_FILE]',
`YQGL_REVIEW_EVALUATION_FILE`='$_POST[YQGL_REVIEW_EVALUATION_FILE]',
`YQGL_ANNUAL_EVALUATION_FILE`='$_POST[YQGL_ANNUAL_EVALUATION_FILE]',
`YQGL_STEP_USAGE`='$_POST[YQGL_STEP_USAGE]',
`YQGL_EMERGENCY_PROCESSING`='$_POST[YQGL_EMERGENCY_PROCESSING]',
`YQGL_REWARDS_AND_PUNISHMENT`='$_POST[YQGL_REWARDS_AND_PUNISHMENT]',
`YQGL_CHARGE_MANAGEMENT`='$_POST[YQGL_CHARGE_MANAGEMENT]',
`YQGL_RECYCLE_MANAGEMENT_FILE`='$_POST[YQGL_RECYCLE_MANAGEMENT_FILE]',
`YQGL_NETWORK_PROFILE`='$_POST[YQGL_NETWORK_PROFILE]',
`YQGL_MANAGEMENT_DUTY_FILE`='$_POST[YQGL_MANAGEMENT_DUTY_FILE]',
`YQGL_COMPANY_ENTER_PERMIT_FILE`='$_POST[YQGL_COMPANY_ENTER_PERMIT_FILE]',
`YQGL_COMPANY_DISCHARGE_PERMIT`='$_POST[YQGL_COMPANY_DISCHARGE_PERMIT]',
`YQGL_DISCHARGE_MONITORING`='$_POST[YQGL_DISCHARGE_MONITORING]',
`YQGL_ANNUAL_DEVELOPMENT_REPORT`='$_POST[YQGL_ANNUAL_DEVELOPMENT_REPORT]',
`YQGL_ENVIRONMENT_REPORT`='$_POST[YQGL_ENVIRONMENT_REPORT]',
`YQGL_POLLUTION_TOTAL_DATA`='$_POST[YQGL_POLLUTION_TOTAL_DATA]',
`YQGL_COMPANY_EVALUATION_FILE`='$_POST[YQGL_COMPANY_EVALUATION_FILE]',
`YQGL_NETWORK_DESIGN_FILE`='$_POST[YQGL_NETWORK_DESIGN_FILE]',
`YQGL_WASTEWATER_TREATMENT_PLANT_DESIGN_FILE`='$_POST[YQGL_WASTEWATER_TREATMENT_PLANT_DESIGN_FILE]',
`YQGL_PARAMETER_MONITORING_FILE`='$_POST[YQGL_PARAMETER_MONITORING_FILE]',
`YQGL_WATER_RECYCLE_ENCOURAGE_POLICY`='$_POST[YQGL_WATER_RECYCLE_ENCOURAGE_POLICY]',
`YQGL_RESOURCE_RECYCLE_ENCOURAGE_POLICY`='$_POST[YQGL_RESOURCE_RECYCLE_ENCOURAGE_POLICY]',
`YQGL_CLEAN_PRODUCTIVITY_OBJECTIVE`='$_POST[YQGL_CLEAN_PRODUCTIVITY_OBJECTIVE]',
`YQGL_CLEAN_PRODUCTIVITY_REWARDS_AND_PUNISHMENT`='$_POST[YQGL_CLEAN_PRODUCTIVITY_REWARDS_AND_PUNISHMENT]',
`YQGL_POLLUTION_TOTAL_OBJECTIVE`='$_POST[YQGL_POLLUTION_TOTAL_OBJECTIVE]',
`YQGL_POLLUTION_TOTAL_MANAGEMENT`='$_POST[YQGL_POLLUTION_TOTAL_MANAGEMENT]',
`YQGL_CONTRADICTION`='$_POST[YQGL_CONTRADICTION]',
`YQGL_INFORMATION_PUBLIC`='$_POST[YQGL_INFORMATION_PUBLIC]',
`YQGL_THIRD_PARTY`='$_POST[YQGL_THIRD_PARTY]',
`YQGL_MONITORING_PUNISHMENT_POLICY`='$_POST[YQGL_MONITORING_PUNISHMENT_POLICY]',
`YQGL_LAW_PROBLEM`='$_POST[YQGL_LAW_PROBLEM]'
		WHERE `JBQK_NAME`='$_GET[name]'";
        mysqli_query($con, $update);
    }

    $select="select * from IndustrialParkQuestionnaire where `JBQK_NAME`='$_GET[name]'";
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

    <title>现场调查表</title>

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
                <a class="navbar-brand" href="../home.php">污水处理管理系统</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../home.php">主页<span class="glyphicon glyphicon-home"></span></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php
                    if(isset($_SESSION['username'])){
                        ?>
                        <li><a href="../user.php" target="_blank"><b><?php echo $_SESSION['username'];?></b> <span class="glyphicon glyphicon-user"></span></a></li>
                        <li><a href="../signout.php">注销 <span class="glyphicon glyphicon-off"></span></a></li>
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
            <form class="form-signin" method="POST" action="#" enctype="multipart/form-data">

                <h4 align="center">“重点流域典型工业园区水污染防治技术评估和管理制度研究”课题<br/>工业园区管委会\园区环保主管部门现场调查表</h4><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">调查人</label> <input type="text" class="form-control" name="INVESTIGATOR" placeholder="" value="<?php echo $rows[1] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">数据年限</label> <input type="text" class="form-control" name="REPORT_DATE" placeholder="" value="<?php echo $rows[2] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">基本情况</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区名称</label> <input type="text" class="form-control" name="JBQK_NAME" placeholder="" value="<?php echo $rows[3] ?>" disabled >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">主导行业类型</label> <input type="text" class="form-control" name="JBQK_TYPE" placeholder="" value="<?php echo $rows[4] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区地址</label> <input type="text" class="form-control" name="JBQK_ADDRESS" placeholder="" value="<?php echo $rows[5] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">上级主管部门</label> <input type="text" class="form-control" name="JBQK_LEADER" placeholder="" value="<?php echo $rows[6] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区联系人</label> <input type="text" class="form-control" name="JBQK_CONTACT" placeholder="" value="<?php echo $rows[7] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">联系电话</label> <input type="text" class="form-control" name="JBQK_TELEPHONE" placeholder="" value="<?php echo $rows[8] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区占地面积(km^2)</label> <input type="number" step="0.001" class="form-control" name="JBQK_SIZE" placeholder="" value="<?php echo $rows[9] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">建立时间</label> <input type="text" class="form-control" name="JBQK_FUNDING_TIME" placeholder="" value="<?php echo $rows[10] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区内企业数量(个)</label> <input type="number" class="form-control" name="JBQK_NUMBER_COMPANY" placeholder="" value="<?php echo $rows[11] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">已入园企业污水排放达标率(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="JBQK_REACH_STANDARED_RATE" placeholder="" value="<?php echo $rows[12] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">入园企业验收执行率(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="JBQK_CHECK_IMPLEMENT_RATE" placeholder="" value="<?php echo $rows[13] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">入园企业环评执行率(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="JBQK_ACCESS_IMPMEMENT_RATE" placeholder="" value="<?php echo $rows[14] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">对园区企业准入考虑的环保因素（可多选）</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;所属行业</label><input type="hidden" name="JBQK_ACCEPTANCE_FACTOR_HANGYE" value="0">
                        <input type="checkbox" value="1" name="JBQK_ACCEPTANCE_FACTOR_HANGYE" placeholder="" <?php if($rows[15]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;历史环境表现</label><input type="hidden" name="JBQK_ACCEPTANCE_FACTOR_BIAOXIAN" value="0">
                        <input type="checkbox" value="1" name="JBQK_ACCEPTANCE_FACTOR_BIAOXIAN" placeholder="" <?php if($rows[16]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;拟建项目环评</label><input type="hidden" name="JBQK_ACCEPTANCE_FACTOR_HUANPING" value="0">
                        <input type="checkbox" value="1" name="JBQK_ACCEPTANCE_FACTOR_HUANPING" placeholder="" <?php if($rows[17]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;产业政策</label><input type="hidden" name="JBQK_ACCEPTANCE_FACTOR_ZHENGCE" value="0">
                        <input type="checkbox" value="1" name="JBQK_ACCEPTANCE_FACTOR_ZHENGCE" placeholder="" <?php if($rows[18]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生产工艺先进程度</label><input type="hidden" name="JBQK_ACCEPTANCE_FACTOR_CHENGDU" value="0">
                        <input type="checkbox" value="1" name="JBQK_ACCEPTANCE_FACTOR_CHENGDU" placeholder="" <?php if($rows[19]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;园区规划环评结论</label><input type="hidden" name="JBQK_ACCEPTANCE_FACTOR_JIELUN" value="0">
                        <input type="checkbox" value="1" name="JBQK_ACCEPTANCE_FACTOR_JIELUN" placeholder="" <?php if($rows[20]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;园区所在地环境功能区划</label><input type="hidden" name="JBQK_ACCEPTANCE_FACTOR_QUHUA" value="0">
                        <input type="checkbox" value="1" name="JBQK_ACCEPTANCE_FACTOR_QUHUA" placeholder="" <?php if($rows[21]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="text" name="JBQK_ACCEPTANCE_FACTOR_OTHER" placeholder="" value="<?php echo $rows[22] ?>" <?php if($ac==0) echo "disabled" ?>  ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">年工业产值(亿元)</label> <input type="number" step="0.001" class="form-control" name="JBQK_YEAR_PROFIT" placeholder="" value="<?php echo $rows[23] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">使用循环水的企业数量(个)</label> <input type="number" class="form-control" name="JBQK_NUMBER_COMPANY_USING_RESYCLING_WATER" placeholder="" value="<?php echo $rows[24] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区出让工业土地面积(km2)</label> <input type="number" step="0.001" class="form-control" name="JBQK_ACREAGE" placeholder="" value="<?php echo $rows[25] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区年税收额(万元)</label> <input type="number" step="0.001" class="form-control" name="JBQK_TAX" placeholder="" value="<?php echo $rows[26] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区公共绿地比率(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="JBQK_GREEN_SPACE_RATE" placeholder="" value="<?php echo $rows[27] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">排污费征收额度(万元/年)</label> <input type="number" step="0.001" class="form-control" name="JBQK_POLLUTION_EXPENSE" placeholder="" value="<?php echo $rows[28] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">企业污水排放执行标准（可多选）</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;GB8978-1996《污水综合排放标准》</label><input type="hidden" name="JBQK_POLLUTION_DISCHARGE_STANDARED_GB" value="0">
                        <input type="checkbox" value="1" name="JBQK_POLLUTION_DISCHARGE_STANDARED_GB" placeholder="" <?php if($rows[29]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;地标《污水综合排放标准》</label><input type="hidden" name="JBQK_POLLUTION_DISCHARGE_STANDARED_DB" value="0">
                        <input type="checkbox" value="1" name="JBQK_POLLUTION_DISCHARGE_STANDARED_DB" placeholder="" <?php if($rows[30]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;行业标准</label><input type="hidden" name="JBQK_POLLUTION_DISCHARGE_STANDARED_HY" value="0">
                        <input type="checkbox" value="1" name="JBQK_POLLUTION_DISCHARGE_STANDARED_HY" placeholder="" <?php if($rows[31]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;《污水排入城镇下水道水质标准》CJ343-2010</label><input type="hidden" name="JBQK_POLLUTION_DISCHARGE_STANDARED_CJ" value="0">
                        <input type="checkbox" value="1" name="JBQK_POLLUTION_DISCHARGE_STANDARED_CJ" placeholder="" <?php if($rows[32]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他标准</label><input type="hidden" name="JBQK_POLLUTION_DISCHARGE_STANDARED_OTHER" value="0">
                        <input type="checkbox" value="1" name="JBQK_POLLUTION_DISCHARGE_STANDARED_OTHER" placeholder="" <?php if($rows[33]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;协议</label><input type="hidden" name="JBQK_POLLUTION_DISCHARGE_STANDARED_LC" value="0">
                        <input type="checkbox" value="1" name="JBQK_POLLUTION_DISCHARGE_STANDARED_LC" placeholder="" <?php if($rows[34]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区用水量(万m^3/d)</label> <input type="number" step="0.001" class="form-control" name="JBQK_WATER_USING" placeholder="" value="<?php echo $rows[35] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工业用水售价(元/m^3)</label> <input type="number" step="0.001" class="form-control" name="JBQK_WATER_VALUE" placeholder="" value="<?php echo $rows[36] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区用水水源</label> <input type="text" class="form-control" name="JBQK_WATER_SOURCE" placeholder="" value="<?php echo $rows[37] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区排水水体</label> <input type="text" class="form-control" name="JBQK_WATER_BODY" placeholder="" value="<?php echo $rows[38] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设置环保管理部门</label> <input type="text" class="form-control" name="JBQK_MANAGEMENT" placeholder="" value="<?php echo $rows[39] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">是否制定了污水回用管理办法</label> <input type="text" class="form-control" name="JBQK_WATER_RECYCLE_MANAGEMENT" placeholder="" value="<?php echo $rows[40] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否将环境绩效纳入政府考核</label> <input type="text" class="form-control" name="JBQK_ENVIRONMENT_MERIT_GOVERMENT_EXAMINE" placeholder="" value="<?php echo $rows[41] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">是否建立了应急预案</label> <input type="text" class="form-control" name="JBQK_URGEMENT_SETTING" placeholder="" value="<?php echo $rows[42] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区一般固废产生量(t/a)</label> <input type="number" step="0.001" class="form-control" name="JBQK_SOLID_PRODUCTION" placeholder="" value="<?php echo $rows[43] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区危险固废产生量(t/a)</label> <input type="number" step="0.001" class="form-control" name="JBQK_DANGER_SOLID_PRODUCTION" placeholder="" value="<?php echo $rows[44] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">排污收费的覆盖率/执行率(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="JBQK_WASTE_EXPENSE_COVER_RATE" placeholder="" value="<?php echo $rows[45] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">考核指标或方法</label> <input type="text" class="form-control" name="JBQK_EXAMINE_METHOD" placeholder="" value="<?php echo $rows[46] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">对企业超标/违规排放的处罚措施</label> <input type="text" class="form-control" name="JBQK_COMPANY_OVERLOAD" placeholder="" value="<?php echo $rows[47] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label>如有处罚措施请列举</label> <input type="text" class="form-control" name="JBQK_COMPANY_OVERLOAD_PUNISHMENT" placeholder="" value="<?php echo $rows[48] ?>" <?php if($ac==0) echo "disabled" ?>  ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">对企业超标/违规排放的处罚措施</label> <input type="text" class="form-control" name="JBQK_WASTE_PROCESSING_OVERLOAD" placeholder="" value="<?php echo $rows[49] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label>如有处罚依据措施请列举</label> <input type="text" class="form-control" name="JBQK_WASTE_PROCESSING_OVERLOAD_PUNISHMENT" placeholder="" value="<?php echo $rows[50] ?>" <?php if($ac==0) echo "disabled" ?>  ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区污水厂数量(个)</label> <input type="number" class="form-control" name="JBQK_WASTE_PROCESSING_NUMBER" placeholder="" value="<?php echo $rows[51] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水处理厂建设和运行主体</label> <input type="text" class="form-control" name="JBQK_WASTE_PROCESSING_CONSTRUCTION" placeholder="" value="<?php echo $rows[52] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区污水厂设计规模(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="JBQK_WASTE_PROCESSING_SIZE" placeholder="" value="<?php echo $rows[53] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运行模式</label> <input type="text" class="form-control" name="JBQK_RUNING_PATTERN" placeholder="" value="<?php echo $rows[54] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区事故水池设置</label> <input type="text" class="form-control" name="JBQK_YN_ACCIDENT_POOL" placeholder="" value="<?php echo $rows[55] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区事故水池容积(m^3)</label> <input type="number" step="0.001" class="form-control" name="JBQK_ACCIDENT_POOL_VOLUME" placeholder="" value="<?php echo $rows[56] ?>" <?php if($ac==0) echo "disabled" ?>  ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区污水收集、转输、监控技术</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区收水管网</label> <input type="text" class="form-control" name="YQCL_WATER_COLLECTION_NETWORK" placeholder="" value="<?php echo $rows[57] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水收集方式</label> <input type="text" class="form-control" name="YQCL_WATER_COLLECTION_METHOD" placeholder="" value="<?php echo $rows[58] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">生活污水与工业废水分流</label> <input type="text" class="form-control" name="YQCL_YN_INDUSTRIAL_LIFE_SEPERATION" placeholder="" value="<?php echo $rows[59] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工业废水分质分类收集</label> <input type="text" class="form-control" name="YQCL_YN_COLLECTION_SEPERATION" placeholder="" value="<?php echo $rows[60] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">企业排放口数量(个)</label> <input type="number" class="form-control" name="YQCL_DISCHARGING_PLACE_NUMBER" placeholder="" value="<?php echo $rows[61] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">企业排放口监控量(个)</label> <input type="number" class="form-control" name="YQCL_DISCHARGING_MONITORING_NUMBER" placeholder="" value="<?php echo $rows[62] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">特征污染物监控</label> <input type="text" class="form-control" name="YQCL_YN_FEATURED_POLLUTION_MONITORING" placeholder="" value="<?php echo $rows[63] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网转输形式</label> <input type="text" class="form-control" name="YQCL_NETWORK_TRANSFER" placeholder="" value="<?php echo $rows[64] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水管网监控点位(个)</label> <input type="number" class="form-control" name="YQCL_NETWORK_PLACE_NUMBER" placeholder="" value="<?php echo $rows[65] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">水质监控频次(次/月)</label> <input type="number" class="form-control" name="YQCL_MONITORING_FREQUNCY" placeholder="" value="<?php echo $rows[66] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水管网节点监控指标</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;流量</label><input type="hidden" name="YQCL_MONITORING_FACTOR_LIU" value="0">
                        <input type="checkbox" value="1" name="YQCL_MONITORING_FACTOR_LIU" placeholder="" <?php if($rows[67]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;pH</label><input type="hidden" name="YQCL_MONITORING_FACTOR_PH" value="0">
                        <input type="checkbox" value="1" name="YQCL_MONITORING_FACTOR_PH" placeholder="" <?php if($rows[68]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;温度</label><input type="hidden" name="YQCL_MONITORING_FACTOR_WEN" value="0">
                        <input type="checkbox" value="1" name="YQCL_MONITORING_FACTOR_WEN" placeholder="" <?php if($rows[69]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;化学需氧量</label><input type="hidden" name="YQCL_MONITORING_FACTOR_HUA" value="0">
                        <input type="checkbox" value="1" name="YQCL_MONITORING_FACTOR_HUA" placeholder="" <?php if($rows[70]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生化需氧量</label><input type="hidden" name="YQCL_MONITORING_FACTOR_SHENG" value="0">
                        <input type="checkbox" value="1" name="YQCL_MONITORING_FACTOR_SHENG" placeholder="" <?php if($rows[71]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;氨氮</label><input type="hidden" name="YQCL_MONITORING_FACTOR_AN" value="0">
                        <input type="checkbox" value="1" name="YQCL_MONITORING_FACTOR_AN" placeholder="" <?php if($rows[72]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总氮</label><input type="hidden" name="YQCL_MONITORING_FACTOR_DAN" value="0">
                        <input type="checkbox" value="1" name="YQCL_MONITORING_FACTOR_DAN" placeholder="" <?php if($rows[73]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总磷</label><input type="hidden" name="YQCL_MONITORING_FACTOR_LIN" value="0">
                        <input type="checkbox" value="1" name="YQCL_MONITORING_FACTOR_LIN" placeholder="" <?php if($rows[74]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;重金属</label><input type="hidden" name="YQCL_MONITORING_FACTOR_ZHONG" value="0">
                        <input type="checkbox" value="1" name="YQCL_MONITORING_FACTOR_ZHONG" placeholder="" <?php if($rows[75]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;难降解有机物</label><input type="hidden" name="YQCL_MONITORING_FACTOR_NAN" value="0">
                        <input type="checkbox" value="1" name="YQCL_MONITORING_FACTOR_NAN" placeholder="" <?php if($rows[76]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="hidden" name="YQCL_MONITORING_FACTOR_OTHER" value="0">
                        <input type="checkbox" value="1" name="YQCL_MONITORING_FACTOR_OTHER" placeholder="" <?php if($rows[77]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水管网投资来源</label> <input type="text" class="form-control" name="YQCL_NETWORK_PROVIDER" placeholder="" value="<?php echo $rows[78] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网维护费来源</label> <input type="text" class="form-control" name="YQCL_NETWORK_MANAGEMENT_SOURCE" placeholder="" value="<?php echo $rows[79] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">再生回用水</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水回用</label> <input type="text" class="form-control" name="ZSHY_YN_REPRODUCE_WATER" placeholder="" value="<?php echo $rows[80] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">环保部门设置的回用率目标(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="ZSHY_RESCYCLE_RATE" placeholder="" value="<?php echo $rows[81] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水回用管道</label> <input type="text" class="form-control" name="ZSHY_YN_RESCYCLE_NETWORK" placeholder="" value="<?php echo $rows[82] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">中水管网管材</label> <input type="text" class="form-control" name="ZSHY_RESCYCLE_MATERIAL" placeholder="" value="<?php echo $rows[83] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水管网运行费用(元/m^3水)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_NETWORK_RUNING_VALUE" placeholder="" value="<?php echo $rows[84] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">中水管网投资来源</label> <input type="text" class="form-control" name="ZSHY_NETWORK_PROVIDER" placeholder="" value="<?php echo $rows[85] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水管网运行费用来源</label> <input type="text" class="form-control" name="ZSHY_NETWORK_EXPENSE_SOURCE" placeholder="" value="<?php echo $rows[86] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年回用水量(m^3/a)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_RESCYCLE_WATER_SIZE" placeholder="" value="<?php echo $rows[87] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水售价(元/m^3)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_RESCYCLE_WATER_VALUE" placeholder="" value="<?php echo $rows[88] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水建设投资费用(万元)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_RESCYCLE_CONSTRUCTION_COST" placeholder="" value="<?php echo $rows[89] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水厂或车间占地(m^2)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_RESCYCLE_PLACE_SIZE" placeholder="" value="<?php echo $rows[90] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运行费用(万元/a)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_RUNING_EXPENSE" placeholder="" value="<?php echo $rows[91] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">制备再生水电耗(kWh/m^3)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_RESCYCLE_PRODUCE_ELECTRICITY_COST" placeholder="" value="<?php echo $rows[92] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">回用收益(万元/a)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_RESCYCLE_PROFIT" placeholder="" value="<?php echo $rows[93] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">投资回收期(a)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_PROFIT_TIME" placeholder="" value="<?php echo $rows[94] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水用途</label> <input type="text" class="form-control" name="ZSHY_RESCYCLE_WATER_USAGE" placeholder="" value="<?php echo $rows[95] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水厂进水水质标准</label> <input type="text" class="form-control" name="ZSHY_RESCYCLE_WATER_IN_STANDARD" placeholder="" value="<?php echo $rows[96] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水厂出水水质标准</label> <input type="text" class="form-control" name="ZSHY_RESCYCLE_WATER_OUT_STANDARD" placeholder="" value="<?php echo $rows[97] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">处理工艺流程简介（描述）</label> <input type="text" class="form-control" name="ZSHY_RESCYCLE_WATER_PROCESS" placeholder="" value="<?php echo $rows[98] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水厂是否稳定达标</label> <input type="text" class="form-control" name="ZSHY_RESCYCLE_WATER_STABILITY" placeholder="" value="<?php echo $rows[99] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">一般固废产生量(t/a)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_SOLID_PRODUCTIVITY" placeholder="" value="<?php echo $rows[100] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">再生水厂运行问题与建议</label> <input type="text" class="form-control" name="ZSHY_RESCYCLE_COMPANY_SUGGESTION" placeholder="" value="<?php echo $rows[101] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">废水梯级利用</h3><br/>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">废水梯级利用形式</label> <input type="text" class="form-control" name="FSTJ_USAGE" placeholder="" value="<?php echo $rows[102] ?>" <?php if($ac==0) echo "disabled" ?>  ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">废水、废液中金属类、有机物、无机物等资源回收</h3><br/>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">资源回收途径</label> <input type="text" class="form-control" name="ZYHS_MEANS" placeholder="" value="<?php echo $rows[103] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">资源回收种类</label> <input type="text" class="form-control" name="ZYHS_CATEGORY" placeholder="" value="<?php echo $rows[104] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区水环境管理</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区的组织架构图</label> <input type="text" class="form-control" name="YQGL_CONSTRUCTION_MAP" placeholder="" value="<?php echo $rows[105] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区规划和规划环评文件，落实情况</label> <input type="text" class="form-control" name="YQGL_PLAN_EVALUATION_FILE" placeholder="" value="<?php echo $rows[106] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区回顾性环评文件</label> <input type="text" class="form-control" name="YQGL_REVIEW_EVALUATION_FILE" placeholder="" value="<?php echo $rows[107] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区年度环境质量报告</label> <input type="text" class="form-control" name="YQGL_ANNUAL_EVALUATION_FILE" placeholder="" value="<?php echo $rows[108] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区是否实现园区层面水资源梯级利用</label> <input type="text" class="form-control" name="YQGL_STEP_USAGE" placeholder="" value="<?php echo $rows[109] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区是否制定了环境污染事故应急预案</label> <input type="text" class="form-control" name="YQGL_EMERGENCY_PROCESSING" placeholder="" value="<?php echo $rows[110] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区是否建立了水污染减排的奖惩制度</label> <input type="text" class="form-control" name="YQGL_REWARDS_AND_PUNISHMENT" placeholder="" value="<?php echo $rows[111] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区水收费管理情况</label> <input type="text" class="form-control" name="YQGL_CHARGE_MANAGEMENT" placeholder="" value="<?php echo $rows[112] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区再生水管理文件</label> <input type="text" class="form-control" name="YQGL_RECYCLE_MANAGEMENT_FILE" placeholder="" value="<?php echo $rows[113] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水管网概化图</label> <input type="text" class="form-control" name="YQGL_NETWORK_PROFILE" placeholder="" value="<?php echo $rows[114] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区水环境管理职责文件</label> <input type="text" class="form-control" name="YQGL_MANAGEMENT_DUTY_FILE" placeholder="" value="<?php echo $rows[115] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区企业准入文件及其落实情况</label> <input type="text" class="form-control" name="YQGL_COMPANY_ENTER_PERMIT_FILE" placeholder="" value="<?php echo $rows[116] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区企业排污许可证制度</label> <input type="text" class="form-control" name="YQGL_COMPANY_DISCHARGE_PERMIT" placeholder="" value="<?php echo $rows[117] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">重点排污企业/国控企业废水监测报告</label> <input type="text" class="form-control" name="YQGL_DISCHARGE_MONITORING" placeholder="" value="<?php echo $rows[118] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区年度发展报告</label> <input type="text" class="form-control" name="YQGL_ANNUAL_DEVELOPMENT_REPORT" placeholder="" value="<?php echo $rows[119] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区环境质量报告</label> <input type="text" class="form-control" name="YQGL_ENVIRONMENT_REPORT" placeholder="" value="<?php echo $rows[120] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区及企业污染物总量控制数据</label> <input type="text" class="form-control" name="YQGL_POLLUTION_TOTAL_DATA" placeholder="" value="<?php echo $rows[121] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区主要企业环评文件及验收批复文件</label> <input type="text" class="form-control" name="YQGL_COMPANY_EVALUATION_FILE" placeholder="" value="<?php echo $rows[122] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区管网设计文件</label> <input type="text" class="form-control" name="YQGL_NETWORK_DESIGN_FILE" placeholder="" value="<?php echo $rows[123] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区污水处理厂设计文件</label> <input type="text" class="form-control" name="YQGL_WASTEWATER_TREATMENT_PLANT_DESIGN_FILE" placeholder="" value="<?php echo $rows[124] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区地表水、地下水、气、声、固现状监测报告</label> <input type="text" class="form-control" name="YQGL_PARAMETER_MONITORING_FILE" placeholder="" value="<?php echo $rows[125] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水梯级利用、再生利用的鼓励政策</label> <input type="text" class="form-control" name="YQGL_WATER_RECYCLE_ENCOURAGE_POLICY" placeholder="" value="<?php echo $rows[126] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">废水中重要资源回收的鼓励政策</label> <input type="text" class="form-control" name="YQGL_RESOURCE_RECYCLE_ENCOURAGE_POLICY" placeholder="" value="<?php echo $rows[127] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">是否制定了园区清洁生产目标，实施情况</label> <input type="text" class="form-control" name="YQGL_CLEAN_PRODUCTIVITY_OBJECTIVE" placeholder="" value="<?php echo $rows[128] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否设定园区清洁生产奖惩制度</label> <input type="text" class="form-control" name="YQGL_CLEAN_PRODUCTIVITY_REWARDS_AND_PUNISHMENT" placeholder="" value="<?php echo $rows[129] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区是否设置了污水总量控制要求</label> <input type="text" class="form-control" name="YQGL_POLLUTION_TOTAL_OBJECTIVE" placeholder="" value="<?php echo $rows[130] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区制定了污水排放总量控制分配制度</label> <input type="text" class="form-control" name="YQGL_POLLUTION_TOTAL_MANAGEMENT" placeholder="" value="<?php echo $rows[131] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区建设或扩建过程中，是否存在征地、拆迁之类的矛盾？有无圆桌会、协调会之类的沟通机制？</label>
                        <input type="text" class="form-control" name="YQGL_CONTRADICTION" placeholder="" value="<?php echo $rows[132] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区内的水环境信息是否向公众公开？主要通过哪些渠道和形式？</label> <input type="text" class="form-control" name="YQGL_INFORMATION_PUBLIC" placeholder="" value="<?php echo $rows[133] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">第三方环保服务商进入情况，存在的主要问题</label> <input type="text" class="form-control" name="YQGL_THIRD_PARTY" placeholder="" value="<?php echo $rows[134] ?>" <?php if($ac==0) echo "disabled" ?>  ><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">园区对企业污水排放的监管措施，以及违规或超标排放的处罚措施</label>
                        <textarea class="textarea form-control input-lg" rows="5" name="YQGL_MONITORING_PUNISHMENT_POLICY" title="" placeholder="" <?php if($ac==0) echo "disabled" ?> ><?php echo $rows[135] ?></textarea><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">国家或地方法律法规、政策、标准的落实情况及存在的问题，包括政策的合理性和政策实施的有效性</label>
                        <textarea class="textarea form-control input-lg" rows="5" name="YQGL_LAW_PROBLEM" title="" placeholder="" <?php if($ac==0) echo "disabled" ?> ><?php echo $rows[136] ?></textarea><br/><br/>
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