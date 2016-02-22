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

    <title>污水处理厂运营商调研表</title>

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

                <h4 align="center">“重点流域典型工业园区水污染防治技术评估和管理制度研究”课题<br/>工业园区污水处理厂运营商</h4><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">调查人</label> <input type="text" class="form-control" name="INVESTIGATOR" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">数据年限</label> <input type="date" class="form-control" name="REPORT_DATE" required placeholder=""><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区名称</label> <input type="text" class="form-control" name="GYYQ_NAME" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水厂数量(个)</label> <input type="number" class="form-control" name="GYYQ_WASTEWATER_TREATMENT_PLANT_NUMBER" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水厂名称</label> <input type="text" class="form-control" name="GYYQ_WASTEWATER_TREATMENT_PLANT_NAME" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运营单位名称</label> <input type="text" class="form-control" name="GYYQ_WASTEWATER_TREATMENT_PLANT_COMPANY" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">联系人</label> <input type="text" class="form-control" name="GYYQ_WASTEWATER_TREATMENT_PLANT_CONTACT" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">联系电话</label> <input type="text" class="form-control" name="GYYQ_WASTEWATER_TREATMENT_PLANT_TELEPHONE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">建厂时间</label> <input type="date" class="form-control" name="GYYQ_WASTEWATER_TREATMENT_PLANT_FOUNDATION_DATE" placeholder="" required><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区废水收集、转输、监控技术</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区收水管网</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;雨污合流</label><input type="radio" name="YQFS_WATER_NETWORK" value="雨污合流" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;雨污分流</label><input type="radio" name="YQFS_WATER_NETWORK" value="雨污分流" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">管网投资(万元/km)</label> <input type="number" class="form-control" name="YQFS_WATER_NETWORK_INSTRUMENT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">管网水质监控点位(个)</label> <input type="number" class="form-control" name="YQFS_WATER_NETWORK_MONITORING_PLACE_NUMBER" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">监控频次(次/周)</label> <input type="number" class="form-control" name="YQFS_WATER_NETWORK_MONITORING_FREQUENCY" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">特征污染物监控</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="YQFS_Y/N_FEATURED_POLLUTION_MONITORING" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="YQFS_Y/N_FEATURED_POLLUTION_MONITORING" value="0" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工业废水分质分类收集</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="YQFS_COLLECTION_CLASSCIFICATION" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="YQFS_COLLECTION_CLASSCIFICATION" value="0" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">生活废水与工业废水分流</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="YQFS_DOMESTIC_INDUSTRIAL_SPLIT" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="YQFS_DOMESTIC_INDUSTRIAL_SPLIT" value="0" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网节点监控频次(次/周)</label> <input type="number" class="form-control" name="YQFS_MONITORING_FREQUENCY" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水管网转输形式</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;地上管廊</label><input type="radio" name="YQFS_NETWORK_TRANSFER_MEANS" value="地上管廊" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;地埋式</label><input type="radio" name="YQFS_NETWORK_TRANSFER_MEANS" value="地埋式" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水管网节点监控指标</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;流量</label><input type="checkbox" name="YQFS_MONITORING_OBJECTIVE_LIU" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;pH</label><input type="checkbox" name="YQFS_MONITORING_OBJECTIVE_PH" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;温度</label><input type="checkbox" name="YQFS_MONITORING_OBJECTIVE_WEN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;化学需氧量</label><input type="checkbox" name="YQFS_MONITORING_OBJECTIVE_HUA" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生化需氧量</label><input type="checkbox" name="YQFS_MONITORING_OBJECTIVE_SHENG" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;氨氮</label><input type="checkbox" name="YQFS_MONITORING_OBJECTIVE_AN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总氮</label><input type="checkbox" name="YQFS_MONITORING_OBJECTIVE_DAN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总磷</label><input type="checkbox" name="YQFS_MONITORING_OBJECTIVE_LIN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;重金属</label><input type="checkbox" name="YQFS_MONITORING_OBJECTIVE_ZHONG" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;难降解有机物</label><input type="checkbox" name="YQFS_MONITORING_OBJECTIVE_NAN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="checkbox" name="YQFS_MONITORING_OBJECTIVE_OTHER" placeholder="" ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水管网投资来源</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;政府</label><input type="radio" name="YQFS_NETWORK_INVESTMENT_SOURCE" value="政府" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;企业</label><input type="radio" name="YQFS_NETWORK_INVESTMENT_SOURCE" value="企业" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;第三方</label><input type="radio" name="YQFS_NETWORK_INVESTMENT_SOURCE" value="第三方" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网运行费来源</label><br/>
                        <label>企业缴纳污水处理费</label><input type="radio" name="YQFS_NETWORK_RUNING_FEE_SOURCE" value="企业缴纳污水处理费" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;政府提供</label><input type="radio" name="YQFS_NETWORK_RUNING_FEE_SOURCE" value="政府提供" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="radio" name="YQFS_NETWORK_RUNING_FEE_SOURCE" value="其他" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水回用管道</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="YQFS_Y/N_RECYCLE_NETWORK" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="YQFS_Y/N_RECYCLE_NETWORK" value="0" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">中水管网投资来源</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;政府</label><input type="radio" name="YQFS_WATER_PIPE_NETWORK_INVESTMENT_SOURCE" value="政府" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;企业</label><input type="radio" name="YQFS_WATER_PIPE_NETWORK_INVESTMENT_SOURCE" value="企业" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;第三方</label><input type="radio" name="YQFS_WATER_PIPE_NETWORK_INVESTMENT_SOURCE" value="第三方" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水管网运行费用(元/m^3水)</label> <input type="number" class="form-control" name="YQFS_WATER_PIPE_NETWORK_RUNNING_FEE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">中水管网运行费用来源</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;企业</label><input type="radio" name="YQFS_WATER_PIPE_NETWORK_RUNNING_FEE_SOURCE" value="企业" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;政府提供</label><input type="radio" name="YQFS_WATER_PIPE_NETWORK_RUNNING_FEE_SOURCE" value="政府提供" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="radio" name="YQFS_WATER_PIPE_NETWORK_RUNNING_FEE_SOURCE" value="其他" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">排污收费标准</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;浓度</label><input type="radio" name="YQFS_CHARGE_STANDARD" value="浓度" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总量</label><input type="radio" name="YQFS_CHARGE_STANDARD" value="总量" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;统一收费</label><input type="radio" name="YQFS_CHARGE_STANDARD" value="统一收费" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;分类收费</label><input type="radio" name="YQFS_CHARGE_STANDARD" value="分类收费" placeholder="" required>
                        <!--label>&nbsp;&nbsp;&nbsp;&nbsp;生活废水</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;工业废水</label><input type="checkbox" name="contact" placeholder="" required--><br/><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区污水处理厂</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水处理厂设计规模(m^3/d)</label> <input type="number" class="form-control" name="YQWS_SIZE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运行模式</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;BOT</label><input type="radio" name="YQWS_RUNNING_PATTERN" value="BOT" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;TOT</label><input type="radio" name="YQWS_RUNNING_PATTERN" value="TOT" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="radio" name="YQWS_RUNNING_PATTERN" value="其他" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">实际处理水量(m^3/d)</label> <input type="number" class="form-control" name="YQWS_WATER_PROCESSING_VOLUME" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">占地面积(m^2)</label> <input type="number" class="form-control" name="YQWS_LAND_SIZE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">年最大日水量(m^3/d)</label> <input type="number" class="form-control" name="YQWS_MAX_WATER_SIZE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年平均日水量(m^3/d)</label> <input type="number" class="form-control" name="YQWS_AVERAGE_WATER_SIZE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水厂建设投资(万元)</label> <input type="number" class="form-control" name="YQWS_CONSTRUCTION_INVESTMENT" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水处理厂的年运行天数(天)</label> <input type="number" class="form-control" name="YQWS_RUNNING_DAYS" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水厂建设、运行主体</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;园区政府</label><input type="radio" name="YQWS_CONSTRUCTION_PARTY" value="园区政府" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;第三方</label><input type="radio" name="YQWS_CONSTRUCTION_PARTY" value="第三方" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="radio" name="YQWS_CONSTRUCTION_PARTY" value="其他" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区污水厂的设计处理能力是否能满足实际需求</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="YQWS_Y/N_MEET_REQUIREMENT" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="YQWS_Y/N_MEET_REQUIREMENT" value="0" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">人员数量(人)</label> <input type="number" class="form-control" name="YQWS_PEOPLE_NUMBER" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">人员配备(污水处理班,人/班)</label> <input type="number" class="form-control" name="YQWS_PEOPLE_WASTEWATER_TREATMENT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">人员配备(污泥班,人/班)</label> <input type="number" class="form-control" name="YQWS_PEOPLE_DIRTY" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">投加药剂名称</label> <input type="text" class="form-control" name="YQWS_MEDCINE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">运行费(万元/年)</label> <input type="number" class="form-control" name="YQWS_RUNNING_FEE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年药剂费(万元/年)</label> <input type="number" class="form-control" name="YQWS_MEDCINE_EXPENSE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设备折旧费(万元/年)</label> <input type="number" class="form-control" name="YQWS_EQUIPMENT_OLD_FEE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年耗电量(kw/a)</label> <input type="number" class="form-control" name="YQWS_ELECTRICITY_EXPENSE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">电费(万元/年)</label> <input type="number" class="form-control" name="YQWS_ELECTRICITY_FEE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">其他费用(万元/a)</label> <input type="number" class="form-control" name="YQWS_OTHER_FEE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">人工费(万元/a)</label> <input type="number" class="form-control" name="YQWS_PEOPLE_FEE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥产生量(t/d)</label> <input type="number" class="form-control" name="YQWS_DIRTY_MUD_PRODUCTIVITY" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥含水率(%)</label> <input type="number" class="form-control" name="YQWS_MUD_WATER_RATE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥建材利用(t/d)</label> <input type="number" class="form-control" name="YQWS_MUD_USAGE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥土地利用量(t/d)</label> <input type="number" class="form-control" name="YQWS_MUD_LAND_USAGE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥填埋量(t/d)</label> <input type="number" class="form-control" name="YQWS_MUD_DUMPLING_SIZE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥焚烧量(t/d)</label> <input type="number" class="form-control" name="YQWS_MUD_BURN_SIZE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污泥堆肥量(t/d)</label> <input type="number" class="form-control" name="YQWS_MUD_COMPOSIT_SIZE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污泥其他资源利用量(t/d)</label> <input type="number" class="form-control" name="YQWS_OTHER_RESOURCE_USAGE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">有无臭气控制措施</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="YQWS_Y/N_OZONE_CONTROL" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="YQWS_Y/N_OZONE_CONTROL" value="0" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">臭气影响程度</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;强</label><input type="radio" name="YQWS_OZONE_INFLUENCE" value="强" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较强</label><input type="radio" name="YQWS_OZONE_INFLUENCE" value="较强" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;一般</label><input type="radio" name="YQWS_OZONE_INFLUENCE" value="一般" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较弱</label><input type="radio" name="YQWS_OZONE_INFLUENCE" value="较弱" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">噪声影响情况</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;强烈</label><input type="radio" name="YQWS_NOISE_INFLUENCE" value="强烈" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较强烈</label><input type="radio" name="YQWS_NOISE_INFLUENCE" value="较强烈" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;一般</label><input type="radio" name="YQWS_NOISE_INFLUENCE" value="一般" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较弱</label><input type="radio" name="YQWS_NOISE_INFLUENCE" value="较弱" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污泥处理方式</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;焚烧</label><input type="radio" name="YQWS_MUD_PROCESSING_MEANS" value="焚烧" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;填埋</label><input type="radio" name="YQWS_MUD_PROCESSING_MEANS" value="填埋" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;堆肥</label><input type="radio" name="YQWS_MUD_PROCESSING_MEANS" value="堆肥" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;土地利用</label><input type="radio" name="YQWS_MUD_PROCESSING_MEANS" value="土地利用" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;建材利用</label><input type="radio" name="YQWS_MUD_PROCESSING_MEANS" value="建材利用" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他资源利用</label><input type="radio" name="YQWS_MUD_PROCESSING_MEANS" value="其他资源利用" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设备完好率(%)</label> <input type="number" class="form-control" name="YQWS_EQUIPMENT_GOOD_RATE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">人工劳动强度(时/天)</label> <input type="number" class="form-control" name="YQWS_PEOPLE_WORK_HOURS" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">水位自动监测</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="YQWS_Y/N_WATER_LEVEL_MONITORING" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较弱</label><input type="radio" name="YQWS_Y/N_WATER_LEVEL_MONITORING" value="0" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">pH自动监测</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="YQWS_Y/N_PH_MONITORING" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="YQWS_Y/N_PH_MONITORING" value="0" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水厂自动化程度</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;高</label><input type="radio" name="YQWS_AUTOMATIC_LEVEL" value="高" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较高</label><input type="radio" name="YQWS_AUTOMATIC_LEVEL" value="较高" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;一般</label><input type="radio" name="YQWS_AUTOMATIC_LEVEL" value="一般" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较低</label><input type="radio" name="YQWS_AUTOMATIC_LEVEL" value="较低" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">有无完善的监控系统</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="YQWS_Y/N_GOOD_MONITORING" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="YQWS_Y/N_GOOD_MONITORING" value="0" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区污废水来源比例</label><br/>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生产废水所占比例(%)</label> <input type="number" class="form-control" name="YQWS_WASTEWATER_INDU" placeholder="" required>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生活污水所占比例(%)</label> <input type="number" class="form-control" name="YQWS_WASTEWATER_LIFE" placeholder="" required>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生产废水的主要来源</label> <input type="text" class="form-control" name="YQWS_WASTEWATER_SOURCE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区污水厂执行排放标准</label> <input type="text" class="form-control" name="YQWS_TREATEMENT_STANDARD" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水厂运行问题与建议</label> <input type="text" class="form-control" name="YQWS_TREATEMENT_SUGGESTIONS" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">进水主要污染物浓度(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">CODcr</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_COD" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">BOD5</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_BOD" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">TN</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_TH" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">SS</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_SS" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">TP</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_TP" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">色度</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_SE" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">pH</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_PH" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">温度</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_WEN" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">NH3-N</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_NH" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">其他</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_IN_DENSITY_OTHER" placeholder="" required><br/>
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
                        <label for="InputName">汞</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_HG" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">镉</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_CD" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">铅</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_PB" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">铬</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_CR" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">砷</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_SB" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">铜</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_CU" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">难降解有机物</label>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">芳烃类</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_ARO" placeholder="" required>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">抗生素</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_ANT" placeholder="" required>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">其他</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_IN_DENSITY_OTHER" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">出水主要污染物浓度(mg/L)</label><br/>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">CODcr</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_COD" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">BOD5</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_BOD" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">TN</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_TN" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">SS</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_SS" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">TP</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_TP" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">色度</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_SE" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">pH</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_PH" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">温度</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_WEN" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">NH3-N</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_NH" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">其他</label> <input type="number" class="form-control" name="YQWS_MAIN_WASTE_OUT_DENSITY_OTHER" placeholder="" required><br/>
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
                        <label for="InputName">汞</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_HG" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">镉</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_CD" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">铅</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_PB" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">铬</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_CR" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">砷</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_SB" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">铜</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_CU" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">难降解有机物</label>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">芳烃类</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_ARO" placeholder="" required>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">抗生素</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_ANT" placeholder="" required>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">其他</label> <input type="number" class="form-control" name="YQWS_FEATURED_WASTE_OUT_DENSITY_OTHER" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">主要处理工艺名称</label> <input type="text" class="form-control" name="YQWS_PROCESSING_MEANS" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">是否有并行处理工艺</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="YQWS_Y/N_PARALLEL_PROCESSING" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="YQWS_Y/N_PARALLEL_PROCESSING" value="0" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">处理工艺流程简介(1#)</label> <input type="text" class="form-control" name="YQWS_PROCESSING_PROCESS_1" placeholder="进水->" required><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">处理工艺流程简介(2#)</label> <input type="text" class="form-control" name="YQWS_PROCESSING_PROCESS_2" placeholder="进水->" required><br/>
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
                        <label for="InputName">好氧</label> <input type="number" class="form-control" name="YQWS_MAIN_PARAMETERS_MLSS_AE" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">厌氧</label> <input type="number" class="form-control" name="YQWS_MAIN_PARAMETERS_MLSS_AN" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">缺氧</label> <input type="number" class="form-control" name="YQWS_MAIN_PARAMETERS_MLSS_HY" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">好氧</label> <input type="number" class="form-control" name="YQWS_MAIN_PARAMETERS_HRT_AE" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">厌氧</label> <input type="number" class="form-control" name="YQWS_MAIN_PARAMETERS_HRT_AN" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">缺氧</label> <input type="number" class="form-control" name="YQWS_MAIN_PARAMETERS_HRT_HY" placeholder="" required><br/>
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
                        <label for="InputName">好氧</label> <input type="number" class="form-control" name="YQWS_MAIN_PARAMETERS_SRT_AE" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">厌氧</label> <input type="number" class="form-control" name="YQWS_MAIN_PARAMETERS_SRT_AN" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">缺氧</label> <input type="number" class="form-control" name="YQWS_MAIN_PARAMETERS_SRT_HY" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">好氧</label> <input type="number" class="form-control" name="YQWS_MAIN_PARAMETERS_SIZE_AE" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">厌氧</label> <input type="number" class="form-control" name="YQWS_MAIN_PARAMETERS_SIZE_AN" placeholder="" required>
                    </div>
                    <div class="col-xs-2">
                        <label for="InputName">缺氧</label> <input type="number" class="form-control" name="YQWS_MAIN_PARAMETERS_SIZE_HY" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">出水年达标率(%)</label> <input type="number" class="form-control" name="YQWS_ANNUAL_WATER_GOOD_RATE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水处理规模(m^3/d)</label> <input type="number" class="form-control" name="YQWS_RESYCLE_WATER_SIZE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">抗水质冲击负荷能力</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;强</label><input type="radio" name="YQWS_ANTI_PRESSURE" value="强" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较强</label><input type="radio" name="YQWS_ANTI_PRESSURE" value="较强" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;一般</label><input type="radio" name="YQWS_ANTI_PRESSURE" value="一般" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;较弱</label><input type="radio" name="YQWS_ANTI_PRESSURE" value="较弱" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">抗水质冲击生物池恢复天数</label> <input type="number" class="form-control" name="YQWS_RECOVER_DAYS_Q" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">抗水力冲击生物池恢复天数</label> <input type="number" class="form-control" name="YQWS_RECOVER_DAYS_P" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水厂水质监测点覆盖率(%)</label> <input type="number" class="form-control" name="YQWS_MONITORING_RATE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">非常规工况废水处理措施</label> <input type="text" class="form-control" name="YQWS_ABNORMAL_PROCESSING" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水厂内有无事故水池</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="YQWS_Y/N_ACCIDENT_POOL" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="YQWS_Y/N_ACCIDENT_POOL" value="0" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">事故水池的容积(m^3)</label> <input type="number" class="form-control" name="YQWS_ACCIDENT_POOL_VOLUME" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否制定了污水回用管理办法</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="YYQWS_Y/N_RESYCLE_MEANS" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="YQWS_Y/N_RESYCLE_MEANS" value="0" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如果已经制定，请提供</label>
                        <input type="file" name="" value=""><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否建立了应急预案</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="YQWS_Y/N_ANTI_ACCIDENT_PLAN" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="YQWS_Y/N_ANTI_ACCIDENT_PLAN" value="0" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有应急预案，请提供</label>
                        <input type="file" name="" value=""><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否采用了分质入网处理方式</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="YQWS_Y/N_DIVIDE_ENTER_PROCESSING" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="YQWS_Y/N_DIVIDE_ENTER_PROCESSING" value="0" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区采取了何种监管手段</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;在线监测</label><input type="radio" name="YQWS_MONITORING_MEANS" value="在线监测" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;不定期抽查</label><input type="radio" name="YQWS_MONITORING_MEANS" value="不定期抽查" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;日常监督</label><input type="radio" name="YQWS_MONITORING_MEANS" value="日常监督" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label>请提供污水厂近期进出水水质监测报告（至少3个月）</label>
                        <input type="file" name="" value=""><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">管理层面</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">技术层面是否存在障碍</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="GLCM_Y/N_TECHNIQUE_PROBLEM" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="GLCM_Y/N_TECHNIQUE_PROBLEM" value="0" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">主要原因</label> <input type="text" class="form-control" name="GLCM_TECHNIQUE_PROBLEM_REASON" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">经济层面是否存在障碍</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="GLCM_Y/N_ECNOMIC_PROBLEM" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="GLCM_Y/N_ECNOMIC_PROBLEM" value="0" placeholder="" required>
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">盈利来自收入</label> <input type="text" class="form-control" name="GLCM_INCOME_SOURCE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">亏损源自支出</label> <input type="text" class="form-control" name="GLCM_LOSE_SOURCE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">与园区管委会和环保部门的对接关系</label> <input type="text" class="form-control" name="GLCM_RELATIONSHIP" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">在政策的落实方面存在的问题或困难</label> <input type="text" class="form-control" name="GLCM_PROBLEM" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">若是第三方运营商，对管理模式或服务模式有什么新的想法或规划</label> <input type="text" class="form-control" name="GLCM_THIRD_PARTY_SUGGESTIONS" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">对于政府或管理部门有什么需求，如政策上的支持，经济上的补贴，监管方面的加强等</label> <input type="text" class="form-control" name="GLCM_REQUIREMENTS" placeholder="" required><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">再生回用水</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设计水量(m^3/d)</label> <input type="number" class="form-control" name="ZSHY_DESIGN_WATER_SIZE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运行水量(m^3/d)</label> <input type="number" class="form-control" name="ZSHY_RUNNING_WATER_SIZE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">占地面积(m^2)</label> <input type="number" class="form-control" name="ZSHY_LAND_SIZE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工程建设投资费用(万元)</label> <input type="number" class="form-control" name="ZSHY_CONSTRUCTION_INVESTMENT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">运行费用(万元/a)</label> <input type="number" class="form-control" name="ZSHY_RUNNING_FEE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年回用水量(t/a)</label> <input type="number" class="form-control" name="ZSHY_ANNUAL_RESCYCLE_WATER" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">回用收益(万元/a)</label> <input type="number" class="form-control" name="ZSHY_RESYCLE_PROFIT" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">投资回收期(a)</label> <input type="number" class="form-control" name="ZSHY_RESYCLE_TIME" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">废水回用比例(%)</label> <input type="number" class="form-control" name="ZSHY_RESYCLE_RATE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水生产进水水质标准</label> <input type="text" class="form-control" name="ZSHY_RESYCLE_IN_STANDARD" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水生产出水水质标准</label> <input type="text" class="form-control" name="ZSHY_RESYCLE_OUT_STANDARD" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水生产的废水排放标准</label> <input type="text" class="form-control" name="ZSHY_RESYCLE_UNLOAD_STANDARD" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">再生水生产工艺流程</label> <input type="text" class="form-control" name="ZSHY_RESYCLE_PROCESSING_PROCESS" placeholder="进水->" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">稳定达标率(%)</label> <input type="number" class="form-control" name="ZSHY_STABILITY_RATE" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">一般固废产生量(t/a)</label> <input type="number" class="form-control" name="ZSHY_SOLID_RATE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">固废处理方式</label> <input type="text" class="form-control" name="ZSHY_SOLID_PROCESSING_MEANS" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水处理中控系统</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="ZSHY_Y/N_CONTROL_SYSTEM" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="ZSHY_Y/N_CONTROL_SYSTEM" value="0" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>再生水处理操作规程</label>
                        <input type="file" name="" value="">
                        <br/>
                    </div>
                    <div class="col-xs-6">
                        <label>再生水处理计量体系</label>
                        <input type="file" name="" value="">
                        <br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">其他需要说明情况</label>
                        <textarea class="textarea form-control input-lg" rows="5" name="ZSHY_OTHER" title=""></textarea><br/>
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

