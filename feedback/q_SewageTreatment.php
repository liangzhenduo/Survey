<?php
session_start();
include "../connectdb.php";
$error='';
if(!isset($_SESSION['username'])){		//未登录
    header("location: ../home.php");
    exit;
}
$username=$_SESSION['username'];
$query="select `type` from user_info where `username`='$username'";
$result = mysqli_query($con,$query);
$row =mysqli_fetch_array($result);
$type=$row[0];
if($type==0||$type==2) $ac=1;
else $ac=0;
if(isset($_GET['id'])) {
    $select="select * from SewageTreatmentQuestionnaire where `ID`='$_GET[id]'";
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

                <h4 align="center">“重点流域典型工业园区水污染防治技术评估和管理制度研究”课题<br/>工业园区污水处理厂运营商现场调查表</h4><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">调查人</label> <input type="text" class="form-control" name="INVESTIGATOR" placeholder="" value="<?php echo $rows[1] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">数据年限</label> <input type="text" class="form-control" name="REPORT_DATE" placeholder="" value="<?php echo $rows[2] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区名称</label> <input type="text" class="form-control" name="GYYQ_NAME" placeholder="" value="<?php echo $rows[3] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水厂数量(个)</label> <input type="number" class="form-control" name="GYYQ_WASTEWATER_TREATMENT_PLANT_NUMBER" placeholder="" value="<?php echo $rows[4] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水厂名称</label> <input type="text" class="form-control" name="GYYQ_WASTEWATER_TREATMENT_PLANT_NAME" placeholder="" value="<?php echo $rows[5] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运营单位名称</label> <input type="text" class="form-control" name="GYYQ_WASTEWATER_TREATMENT_PLANT_COMPANY" placeholder="" value="<?php echo $rows[6] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">联系人</label> <input type="text" class="form-control" name="GYYQ_WASTEWATER_TREATMENT_PLANT_CONTACT" placeholder="" value="<?php echo $rows[7] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">联系电话</label> <input type="text" class="form-control" name="GYYQ_WASTEWATER_TREATMENT_PLANT_TELEPHONE" placeholder="" value="<?php echo $rows[8] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">建厂时间</label> <input type="text" class="form-control" name="GYYQ_WASTEWATER_TREATMENT_PLANT_FOUNDATION_DATE" placeholder="" value="<?php echo $rows[9] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区废水收集、转输、监控技术</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区收水管网</label> <input type="text" class="form-control" name="YQFS_WATER_NETWORK" placeholder="" value="<?php echo $rows[10] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">管网投资(万元/km)</label> <input type="number" step="0.001" class="form-control" name="YQFS_WATER_NETWORK_INSTRUMENT" placeholder="" value="<?php echo $rows[11] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">管网水质监控点位(个)</label> <input type="number" class="form-control" name="YQFS_WATER_NETWORK_MONITORING_PLACE_NUMBER" placeholder="" value="<?php echo $rows[12] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">监控频次(次/周)</label> <input type="number" class="form-control" name="YQFS_WATER_NETWORK_MONITORING_FREQUENCY" placeholder="" value="<?php echo $rows[13] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">特征污染物监控</label> <input type="text" class="form-control" name="YQFS_YN_FEATURED_POLLUTION_MONITORING" placeholder="" value="<?php echo $rows[14] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工业废水分质分类收集</label> <input type="text" class="form-control" name="YQFS_COLLECTION_CLASSCIFICATION" placeholder="" value="<?php echo $rows[15] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">生活废水与工业废水分流</label> <input type="text" class="form-control" name="YQFS_DOMESTIC_INDUSTRIAL_SPLIT" placeholder="" value="<?php echo $rows[16] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网节点监控频次(次/周)</label> <input type="number" class="form-control" name="YQFS_MONITORING_FREQUENCY" placeholder="" value="<?php echo $rows[17] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水管网转输形式</label> <input type="text" class="form-control" name="YQFS_NETWORK_TRANSFER_MEANS" placeholder="" value="<?php echo $rows[18] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水管网节点监控指标</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;流量</label><input type="hidden" name="YQFS_MONITORING_OBJECTIVE_LIU" value="0">
                        <input type="checkbox" value="1" name="YQFS_MONITORING_OBJECTIVE_LIU" placeholder="" <?php if($rows[19]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;pH</label><input type="hidden" name="YQFS_MONITORING_OBJECTIVE_PH" value="0">
                        <input type="checkbox" value="1" name="YQFS_MONITORING_OBJECTIVE_PH" placeholder="" <?php if($rows[20]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;温度</label><input type="hidden" name="YQFS_MONITORING_OBJECTIVE_WEN" value="0">
                        <input type="checkbox" value="1" name="YQFS_MONITORING_OBJECTIVE_WEN" placeholder="" <?php if($rows[21]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;化学需氧量</label><input type="hidden" name="YQFS_MONITORING_OBJECTIVE_HUA" value="0">
                        <input type="checkbox" value="1" name="YQFS_MONITORING_OBJECTIVE_HUA" placeholder="" <?php if($rows[22]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生化需氧量</label><input type="hidden" name="YQFS_MONITORING_OBJECTIVE_SHENG" value="0">
                        <input type="checkbox" value="1" name="YQFS_MONITORING_OBJECTIVE_SHENG" placeholder="" <?php if($rows[23]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;氨氮</label><input type="hidden" name="YQFS_MONITORING_OBJECTIVE_AN" value="0">
                        <input type="checkbox" value="1" name="YQFS_MONITORING_OBJECTIVE_AN" placeholder="" <?php if($rows[24]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总氮</label><input type="hidden" name="YQFS_MONITORING_OBJECTIVE_DAN" value="0">
                        <input type="checkbox" value="1" name="YQFS_MONITORING_OBJECTIVE_DAN" placeholder="" <?php if($rows[25]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总磷</label><input type="hidden" name="YQFS_MONITORING_OBJECTIVE_LIN" value="0">
                        <input type="checkbox" value="1" name="YQFS_MONITORING_OBJECTIVE_LIN" placeholder="" <?php if($rows[26]==1){ ?> checked <?php } ?>" <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;重金属</label><input type="hidden" name="YQFS_MONITORING_OBJECTIVE_ZHONG" value="0">
                        <input type="checkbox" value="1" name="YQFS_MONITORING_OBJECTIVE_ZHONG" placeholder="" <?php if($rows[27]==1){ ?> checked <?php } ?>" <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;难降解有机物</label><input type="hidden" name="YQFS_MONITORING_OBJECTIVE_NAN" value="0">
                        <input type="checkbox" value="1" name="YQFS_MONITORING_OBJECTIVE_NAN" placeholder="" <?php if($rows[28]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?>  >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="hidden" name="YQFS_MONITORING_OBJECTIVE_OTHER" value="0">
                        <input type="checkbox" value="1" name="YQFS_MONITORING_OBJECTIVE_OTHER" placeholder="" <?php if($rows[29]==1){ ?> checked <?php } ?>" <?php if($ac==0) echo "disabled" ?>  ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水管网投资来源</label> <input type="text" class="form-control" name="YQFS_NETWORK_INVESTMENT_SOURCE" placeholder="" value="<?php echo $rows[30] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网运行费来源</label> <input type="text" class="form-control" name="YQFS_NETWORK_RUNING_FEE_SOURCE" placeholder="" value="<?php echo $rows[31] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水回用管道</label> <input type="text" class="form-control" name="YQFS_YN_RECYCLE_NETWORK" placeholder="" value="<?php echo $rows[32] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">中水管网投资来源</label> <input type="text" class="form-control" name="YQFS_WATER_PIPE_NETWORK_INVESTMENT_SOURCE" placeholder="" value="<?php echo $rows[33] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水管网运行费用(元/m^3水)</label> <input type="number" step="0.001" class="form-control" name="YQFS_WATER_PIPE_NETWORK_RUNNING_FEE" placeholder="" value="<?php echo $rows[34] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">中水管网运行费用来源</label> <input type="text" class="form-control" name="YQFS_WATER_PIPE_NETWORK_RUNNING_FEE_SOURCE" placeholder="" value="<?php echo $rows[35] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">排污收费标准</label> <input type="text" class="form-control" name="YQFS_CHARGE_STANDARD" placeholder="" value="<?php echo $rows[36] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区污水处理厂</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水处理厂设计规模(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="YQWS_SIZE" placeholder="" value="<?php echo $rows[37] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运行模式</label> <input type="text" class="form-control" name="YQWS_RUNNING_PATTERN" placeholder="" value="<?php echo $rows[38] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">实际处理水量(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="YQWS_WATER_PROCESSING_VOLUME" placeholder="" value="<?php echo $rows[39] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">占地面积(m^2)</label> <input type="number" step="0.001" class="form-control" name="YQWS_LAND_SIZE" placeholder="" value="<?php echo $rows[40] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">年最大日水量(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAX_WATER_SIZE" placeholder="" value="<?php echo $rows[41] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年平均日水量(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="YQWS_AVERAGE_WATER_SIZE" placeholder="" value="<?php echo $rows[42] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水厂建设投资(万元)</label> <input type="number" step="0.001" class="form-control" name="YQWS_CONSTRUCTION_INVESTMENT" placeholder="" value="<?php echo $rows[43] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水处理厂的年运行天数(天)</label> <input type="number" max="365" class="form-control" name="YQWS_RUNNING_DAYS" placeholder="" value="<?php echo $rows[44] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水厂建设、运行主体</label> <input type="text" class="form-control" name="YQWS_CONSTRUCTION_PARTY" placeholder="" value="<?php echo $rows[45] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区污水厂的设计处理能力是否能满足实际需求</label> <input type="text" class="form-control" name="YQWS_YN_MEET_REQUIREMENT" placeholder="" value="<?php echo $rows[46] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">人员数量(人)</label> <input type="number" class="form-control" name="YQWS_PEOPLE_NUMBER" placeholder="" value="<?php echo $rows[47] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">人员配备(污水处理班,人/班)</label> <input type="number" class="form-control" name="YQWS_PEOPLE_WASTEWATER_TREATMENT" placeholder="" value="<?php echo $rows[48] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">人员配备(污泥班,人/班)</label> <input type="number" class="form-control" name="YQWS_PEOPLE_DIRTY" placeholder="" value="<?php echo $rows[49] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">投加药剂名称</label> <input type="text" class="form-control" name="YQWS_MEDCINE" placeholder="" value="<?php echo $rows[50] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">运行费(万元/年)</label> <input type="number" step="0.001" class="form-control" name="YQWS_RUNNING_FEE" placeholder="" value="<?php echo $rows[51] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年药剂费(万元/年)</label> <input type="number" step="0.001" class="form-control" name="YQWS_MEDCINE_EXPENSE" placeholder="" value="<?php echo $rows[52] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设备折旧费(万元/年)</label> <input type="number" step="0.001" class="form-control" name="YQWS_EQUIPMENT_OLD_FEE" placeholder="" value="<?php echo $rows[53] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年耗电量(kw/a)</label> <input type="number" step="0.001" class="form-control" name="YQWS_ELECTRICITY_EXPENSE" placeholder="" value="<?php echo $rows[54] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">电费(万元/年)</label> <input type="number" step="0.001" class="form-control" name="YQWS_ELECTRICITY_FEE" placeholder="" value="<?php echo $rows[55] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">其他费用(万元/a)</label> <input type="number" step="0.001" class="form-control" name="YQWS_OTHER_FEE" placeholder="" value="<?php echo $rows[56] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">人工费(万元/a)</label> <input type="number" step="0.001" class="form-control" name="YQWS_PEOPLE_FEE" placeholder="" value="<?php echo $rows[57] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥产生量(t/d)</label> <input type="number" step="0.001" class="form-control" name="YQWS_DIRTY_MUD_PRODUCTIVITY" placeholder="" value="<?php echo $rows[58] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥含水率(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="YQWS_MUD_WATER_RATE" placeholder="" value="<?php echo $rows[59] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥建材利用(t/d)</label> <input type="number" step="0.001" class="form-control" name="YQWS_MUD_USAGE" placeholder="" value="<?php echo $rows[60] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥土地利用量(t/d)</label> <input type="number" step="0.001" class="form-control" name="YQWS_MUD_LAND_USAGE" placeholder="" value="<?php echo $rows[61] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥填埋量(t/d)</label> <input type="number" step="0.001" class="form-control" name="YQWS_MUD_DUMPLING_SIZE" placeholder="" value="<?php echo $rows[62] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥焚烧量(t/d)</label> <input type="number" step="0.001" class="form-control" name="YQWS_MUD_BURN_SIZE" placeholder="" value="<?php echo $rows[63] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥堆肥量(t/d)</label> <input type="number" step="0.001" class="form-control" name="YQWS_MUD_COMPOSIT_SIZE" placeholder="" value="<?php echo $rows[64] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥其他资源利用量(t/d)</label> <input type="number" step="0.001" class="form-control" name="YQWS_OTHER_RESOURCE_USAGE" placeholder="" value="<?php echo $rows[65] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">有无臭气控制措施</label> <input type="text" class="form-control" name="YQWS_YN_OZONE_CONTROL"  placeholder="" value="<?php echo $rows[66] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">臭气影响程度</label> <input type="text" class="form-control" name="YQWS_OZONE_INFLUENCE" placeholder="" value="<?php echo $rows[67] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">噪声影响情况</label> <input type="text" class="form-control" name="YQWS_NOISE_INFLUENCE" placeholder="" value="<?php echo $rows[68] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污泥处理方式</label> <input type="text" class="form-control" name="YQWS_MUD_PROCESSING_MEANS" placeholder="" value="<?php echo $rows[69] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设备完好率(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="YQWS_EQUIPMENT_GOOD_RATE" placeholder="" value="<?php echo $rows[70] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">人工劳动强度(时/天)</label> <input type="number" step="0.001" max="24" class="form-control" name="YQWS_PEOPLE_WORK_HOURS" placeholder="" value="<?php echo $rows[71] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">水位自动监测</label> <input type="text" class="form-control" name="YQWS_YN_WATER_LEVEL_MONITORING" placeholder="" value="<?php echo $rows[72] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">pH自动监测</label> <input type="text" class="form-control" name="YQWS_YN_PH_MONITORING" placeholder="" value="<?php echo $rows[73] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水厂自动化程度</label> <input type="text" class="form-control" name="YQWS_AUTOMATIC_LEVEL" placeholder="" value="<?php echo $rows[74] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">有无完善的监控系统</label> <input type="text" class="form-control" name="YQWS_YN_GOOD_MONITORING" placeholder="" value="<?php echo $rows[75] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区污废水来源比例</label><br/>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生产废水所占比例(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="YQWS_WASTEWATER_INDU" placeholder="" value="<?php echo $rows[76] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生活污水所占比例(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="YQWS_WASTEWATER_LIFE" placeholder="" value="<?php echo $rows[77] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生产废水的主要来源</label> <input type="text" class="form-control" name="YQWS_WASTEWATER_SOURCE" placeholder="" value="<?php echo $rows[78] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区污水厂执行排放标准</label> <input type="text" class="form-control" name="YQWS_TREATEMENT_STANDARD" placeholder="" value="<?php echo $rows[79] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水厂运行问题与建议</label> <input type="text" class="form-control" name="YQWS_TREATEMENT_SUGGESTIONS" placeholder="" value="<?php echo $rows[80] ?>" <?php if($ac==0) echo "disabled" ?>  ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">进水主要污染物浓度(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">CODcr</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_COD" placeholder="" value="<?php echo $rows[81] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">BOD5</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_BOD" placeholder="" value="<?php echo $rows[82] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">TN</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_TH" placeholder="" value="<?php echo $rows[83] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">SS</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_SS" placeholder="" value="<?php echo $rows[84] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">TP</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_TP" placeholder="" value="<?php echo $rows[85] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">色度</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_SE" placeholder="" value="<?php echo $rows[86] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">pH</label> <input type="number" step="0.1" max="14" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_PH" placeholder="" value="<?php echo $rows[87] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">温度</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_WEN" placeholder="" value="<?php echo $rows[88] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">NH3-N</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_NH" placeholder="" value="<?php echo $rows[89] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">其他</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_OTHER" placeholder="" value="<?php echo $rows[90] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">进水特征污染物浓度(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">重金属</label>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">汞</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_HG" placeholder="" value="<?php echo $rows[91] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">镉</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_CD" placeholder="" value="<?php echo $rows[92] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">铅</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_PB" placeholder="" value="<?php echo $rows[93] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">铬</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_CR" placeholder="" value="<?php echo $rows[94] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">砷</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_SB" placeholder="" value="<?php echo $rows[95] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">铜</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_CU" placeholder="" value="<?php echo $rows[96] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">难降解有机物</label>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">芳烃类</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_ARO" placeholder="" value="<?php echo $rows[97] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">抗生素</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_ANT" placeholder="" value="<?php echo $rows[98] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">其他</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_OTHER" placeholder="" value="<?php echo $rows[99] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">出水主要污染物浓度(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">CODcr</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_COD" placeholder="" value="<?php echo $rows[100] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">BOD5</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_BOD" placeholder="" value="<?php echo $rows[101] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">TN</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_TN" placeholder="" value="<?php echo $rows[102] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">SS</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_SS" placeholder="" value="<?php echo $rows[103] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">TP</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_TP" placeholder="" value="<?php echo $rows[104] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">色度</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_SE" placeholder="" value="<?php echo $rows[105] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">pH</label> <input type="number" step="0.1" max="14" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_PH" placeholder="" value="<?php echo $rows[106] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">温度</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_WEN" placeholder="" value="<?php echo $rows[107] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">NH3-N</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_NH" placeholder="" value="<?php echo $rows[108] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">其他</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_OTHER" placeholder="" value="<?php echo $rows[109] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">出水特征污染物浓度(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">重金属</label>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">汞</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_HG" placeholder="" value="<?php echo $rows[110] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">镉</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_CD" placeholder="" value="<?php echo $rows[111] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">铅</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_PB" placeholder="" value="<?php echo $rows[112] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">铬</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_CR" placeholder="" value="<?php echo $rows[113] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">砷</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_SB" placeholder="" value="<?php echo $rows[114] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">铜</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_CU" placeholder="" value="<?php echo $rows[115] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">难降解有机物</label>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">芳烃类</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_ARO" placeholder="" value="<?php echo $rows[116] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">抗生素</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_ANT" placeholder="" value="<?php echo $rows[117] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">其他</label> <input type="number" step="0.001" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_OTHER" placeholder="" value="<?php echo $rows[118] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">主要处理工艺名称</label> <input type="text" class="form-control" name="YQWS_PROCESSING_MEANS" placeholder="" value="<?php echo $rows[119] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">是否有并行处理工艺</label> <input type="text" class="form-control" name="YQWS_YN_PARALLEL_PROCESSING" placeholder="" value="<?php echo $rows[120] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">处理工艺流程简介(1#)</label> <input type="text" class="form-control" name="YQWS_PROCESSING_PROCESS_1" placeholder="" value="<?php echo $rows[121] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">处理工艺流程简介(2#)</label> <input type="text" class="form-control" name="YQWS_PROCESSING_PROCESS_2" placeholder="" value="<?php echo $rows[122] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">主要设计及运行参数</label><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">MLSS(mg/L)</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">HRT</label>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">好氧</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_PARAMETERS_MLSS_AE" placeholder="" value="<?php echo $rows[123] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">厌氧</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_PARAMETERS_MLSS_AN" placeholder="" value="<?php echo $rows[124] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">缺氧</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_PARAMETERS_MLSS_HY" placeholder="" value="<?php echo $rows[125] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">好氧</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_PARAMETERS_HRT_AE" placeholder="" value="<?php echo $rows[126] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">厌氧</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_PARAMETERS_HRT_AN" placeholder="" value="<?php echo $rows[127] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">缺氧</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_PARAMETERS_HRT_HY" placeholder="" value="<?php echo $rows[128] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">SRT</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">处理池有效容积</label>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">好氧</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_PARAMETERS_SRT_AE" placeholder="" value="<?php echo $rows[129] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">厌氧</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_PARAMETERS_SRT_AN" placeholder="" value="<?php echo $rows[130] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">缺氧</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_PARAMETERS_SRT_HY" placeholder="" value="<?php echo $rows[131] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">好氧</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_PARAMETERS_SIZE_AE" placeholder="" value="<?php echo $rows[132] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">厌氧</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_PARAMETERS_SIZE_AN" placeholder="" value="<?php echo $rows[133] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">缺氧</label> <input type="number" step="0.001" class="form-control" name="YQWS_MAIN_PARAMETERS_SIZE_HY" placeholder="" value="<?php echo $rows[134] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">出水年达标率(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="YQWS_ANNUAL_WATER_GOOD_RATE" placeholder="" value="<?php echo $rows[135] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水处理规模(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="YQWS_RESYCLE_WATER_SIZE" placeholder="" value="<?php echo $rows[136] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">抗水质冲击负荷能力</label> <input type="text" class="form-control" name="YQWS_ANTI_PRESSURE" placeholder="" value="<?php echo $rows[137] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">抗水质冲击生物池恢复天数</label> <input type="number" step="0.001" class="form-control" name="YQWS_RECOVER_DAYS_Q" placeholder="" value="<?php echo $rows[138] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">抗水力冲击生物池恢复天数</label> <input type="number" step="0.001" class="form-control" name="YQWS_RECOVER_DAYS_P" placeholder="" value="<?php echo $rows[139] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水厂水质监测点覆盖率(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="YQWS_MONITORING_RATE" placeholder="" value="<?php echo $rows[140] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">非常规工况废水处理措施</label> <input type="text" class="form-control" name="YQWS_ABNORMAL_PROCESSING" placeholder="" value="<?php echo $rows[141] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水厂内有无事故水池</label> <input type="text" class="form-control" name="YQWS_YN_ACCIDENT_POOL" placeholder="" value="<?php echo $rows[142] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">事故水池的容积(m^3)</label> <input type="number" step="0.001" class="form-control" name="YQWS_ACCIDENT_POOL_VOLUME" placeholder="" value="<?php echo $rows[143] ?>" <?php if($ac==0) echo "disabled" ?>  ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否制定了污水回用管理办法</label> <input type="text" class="form-control" name="YQWS_YN_RESYCLE_MEANS" placeholder="" value="<?php echo $rows[144] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">是否建立了应急预案</label> <input type="text" class="form-control" name="YQWS_YN_ANTI_ACCIDENT_PLAN" placeholder="" value="<?php echo $rows[145] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否采用了分质入网处理方式</label> <input type="text" class="form-control" name="YQWS_YN_DIVIDE_ENTER_PROCESSING" placeholder="" value="<?php echo $rows[146] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区采取了何种监管手段</label> <input type="text" class="form-control" name="YQWS_MONITORING_MEANS" placeholder="" value="<?php echo $rows[147] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">管理层面</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">技术层面是否存在障碍</label> <input type="text" class="form-control" name="GLCM_YN_TECHNIQUE_PROBLEM" placeholder="" value="<?php echo $rows[148] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">主要原因</label> <input type="text" class="form-control" name="GLCM_TECHNIQUE_PROBLEM_REASON" placeholder="" value="<?php echo $rows[149] ?>" <?php if($ac==0) echo "disabled" ?>  ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">经济层面是否存在障碍</label> <input type="text" class="form-control" name="GLCM_YN_ECNOMIC_PROBLEM" placeholder="" value="<?php echo $rows[150] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">盈利来自收入</label> <input type="text" class="form-control" name="GLCM_INCOME_SOURCE" placeholder="" value="<?php echo $rows[151] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">亏损源自支出</label> <input type="text" class="form-control" name="GLCM_LOSE_SOURCE" placeholder="" value="<?php echo $rows[152] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">与园区管委会和环保部门的对接关系</label> <input type="text" class="form-control" name="GLCM_RELATIONSHIP" placeholder="" value="<?php echo $rows[153] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">在政策的落实方面存在的问题或困难</label> <input type="text" class="form-control" name="GLCM_PROBLEM" placeholder="" value="<?php echo $rows[154] ?>" <?php if($ac==0) echo "disabled" ?>  ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">若是第三方运营商，对管理模式或服务模式有什么新的想法或规划</label> <input type="text" class="form-control" name="GLCM_THIRD_PARTY_SUGGESTIONS" placeholder="" value="<?php echo $rows[155] ?>" <?php if($ac==0) echo "disabled" ?>  ><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">对于政府或管理部门有什么需求，如政策上的支持，经济上的补贴，监管方面的加强等</label> <input type="text" class="form-control" name="GLCM_REQUIREMENTS" placeholder="" value="<?php echo $rows[156] ?>" <?php if($ac==0) echo "disabled" ?>  ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">再生回用水</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设计水量(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_DESIGN_WATER_SIZE" placeholder="" value="<?php echo $rows[157] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运行水量(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_RUNNING_WATER_SIZE" placeholder="" value="<?php echo $rows[158] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">占地面积(m^2)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_LAND_SIZE" placeholder="" value="<?php echo $rows[159] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工程建设投资费用(万元)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_CONSTRUCTION_INVESTMENT" placeholder="" value="<?php echo $rows[160] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">运行费用(万元/a)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_RUNNING_FEE" placeholder="" value="<?php echo $rows[161] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年回用水量(t/a)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_ANNUAL_RESCYCLE_WATER" placeholder="" value="<?php echo $rows[162] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">回用收益(万元/a)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_RESYCLE_PROFIT" placeholder="" value="<?php echo $rows[163] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">投资回收期(a)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_RESYCLE_TIME" placeholder="" value="<?php echo $rows[164] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">废水回用比例(%)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_RESYCLE_RATE" placeholder="" value="<?php echo $rows[165] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水生产进水水质标准</label> <input type="text" class="form-control" name="ZSHY_RESYCLE_IN_STANDARD" placeholder="" value="<?php echo $rows[166] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水生产出水水质标准</label> <input type="text" class="form-control" name="ZSHY_RESYCLE_OUT_STANDARD" placeholder="" value="<?php echo $rows[167] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水生产的废水排放标准</label> <input type="text" class="form-control" name="ZSHY_RESYCLE_UNLOAD_STANDARD" placeholder="" value="<?php echo $rows[168] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">再生水生产工艺流程</label> <input type="text" class="form-control" name="ZSHY_RESYCLE_PROCESSING_PROCESS" placeholder="" value="<?php echo $rows[169] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">稳定达标率(%)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_STABILITY_RATE" placeholder="" value="<?php echo $rows[170] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">一般固废产生量(t/a)</label> <input type="number" step="0.001" class="form-control" name="ZSHY_SOLID_RATE" placeholder="" value="<?php echo $rows[171] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">固废处理方式</label> <input type="text" class="form-control" name="ZSHY_SOLID_PROCESSING_MEANS" placeholder="" value="<?php echo $rows[172] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水处理中控系统</label> <input type="text" class="form-control" name="ZSHY_YN_CONTROL_SYSTEM" placeholder="" value="<?php echo $rows[173] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">其他需要说明情况</label>
                        <textarea class="textarea form-control input-lg" rows="5" name="ZSHY_OTHER" title="" <?php if($ac==0) echo "disabled" ?> ><?php echo $rows[174] ?></textarea><br/><br/>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-lg-3"></div>

    </div>

</div> <!-- /container -->

</body>

</html>

<?php } ?>