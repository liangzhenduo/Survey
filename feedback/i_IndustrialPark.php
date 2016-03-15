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
$row = mysqli_fetch_array($result);
$type=$row[0];
if($type==0||$type==3) $ac=1;
else $ac=0;
if(isset($_GET['id'])) {
    $select="select * from IndustrialParkInvestigation where `ID`='$_GET[id]'";
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
            <form class="form-signin" method="POST" action="#">

                <h4 align="center">“重点流域典型工业园区水污染防治技术评估和管理制度研究”课题<br/>工业园区管委会\园区环保主管部门函件调查表</h4><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">填表人</label> <input type="text" class="form-control" name="YQGW_INVESTIGATOR" placeholder="" value="<?php echo $rows[1] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">联系电话</label> <input type="text" class="form-control" name="YQGW_CONTACT"  placeholder="" value=" <?php echo $rows[2] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">基本情况</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区名称</label> <input type="text" class="form-control" name="JBQK_NAME" placeholder="" value=" <?php echo $rows[3] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区地址</label> <input type="text" class="form-control" name="JBQK_ADDRESS" placeholder="" value=" <?php echo $rows[4] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区类型</label> <input type="text" class="form-control" name="JBQK_CATEGORY" placeholder="" value=" <?php echo $rows[5] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区出让工业用地面积(平方公里)</label> <input type="text" step="0.001" class="form-control" name="JBQK_LAND" placeholder="" value=" <?php echo $rows[6] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">用水水源</label> <input type="text" class="form-control" name="JBQK_WATER_SOURCE" placeholder="" value=" <?php echo $rows[7] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区日均用水量(万吨)</label> <input type="text" step="0.001" class="form-control" name="JBQK_WATER_PER_DAY" placeholder="" value=" <?php echo $rows[8] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">企业数量(已生产、在建、签订合同)</label> <input type="text" class="form-control" name="JBQK_COMPANY_NUMBER" placeholder="" value=" <?php echo $rows[9] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工业年产值(GDP)万元</label> <input type="text" step="0.001" class="form-control" name="JBQK_GDP" placeholder="" value=" <?php echo $rows[10] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">年税收(万元)</label> <input type="text" step="0.001" class="form-control" name="JBQK_TAX" placeholder="" value=" <?php echo $rows[11] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">排污收费的年征收额度(万元)</label> <input type="text" step="0.001" class="form-control" name="JBQK_UNLOAD_CHARGE" placeholder="" value=" <?php echo $rows[12] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否将环境绩效纳入政府考核</label> <input type="text" class="form-control" name="JBQK_YN_EVALUATION" placeholder="" value=" <?php echo $rows[13] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区是否做规划环评</label> <input type="text" class="form-control" name="JBQK_YN_SCHEDULED_EVALUATION" placeholder="" value=" <?php echo $rows[14] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">环保部门是否对建设项目进行前置审批</label> <input type="text" class="form-control" name="JBQK_PRE_EXAMINATION" placeholder="" value=" <?php echo $rows[15] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区的总量控制指标(吨/年)</label>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">化学需氧量</label> <input type="text" step="0.001" class="form-control" name="JBQK_CHEMISTRY_PARAMETER_HUA" placeholder="" value=" <?php echo $rows[16] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生化需氧量</label> <input type="text" step="0.001" class="form-control" name="JBQK_CHEMISTRY_PARAMETER_SHENG" placeholder="" value=" <?php echo $rows[17] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">氨氮</label> <input type="text" step="0.001" class="form-control" name="JBQK_CHEMISTRY_PARAMETER_AN" placeholder="" value=" <?php echo $rows[18] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">总氮</label> <input type="text" step="0.001" class="form-control" name="JBQK_CHEMISTRY_PARAMETER_DAN" placeholder="" value=" <?php echo $rows[19] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">总磷</label> <input type="text" step="0.001" class="form-control" name="JBQK_CHEMISTRY_PARAMETER_LIN" placeholder="" value=" <?php echo $rows[20] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">其他</label> <input type="text" step="0.001" class="form-control" name="JBQK_CHEMISTRY_PARAMETER_OTHER" placeholder="" value=" <?php echo $rows[21] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水处理厂（分别填写）</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">名称</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT1_NAME" placeholder="" value=" <?php echo $rows[22] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运营单位</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT1_RUNNING" placeholder="" value=" <?php echo $rows[23] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">排水去向</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT1_WATER_DIRECTION" placeholder="" value=" <?php echo $rows[24] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">设计规模(m^3/d)</label> <input type="text" step="0.001" class="form-control" name="JBQK_WASTEWATER_TREATMENT1_SIZE" placeholder="" value=" <?php echo $rows[25] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">名称</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT2_NAME" placeholder="" value=" <?php echo $rows[26] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运营单位</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT2_RUNNING" placeholder="" value=" <?php echo $rows[27] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">排水去向</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT2_WATER_DIRECTION" placeholder="" value=" <?php echo $rows[28] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">设计规模(m^3/d)</label> <input type="text" step="0.001" class="form-control" name="JBQK_WASTEWATER_TREATMENT2_SIZE" placeholder="" value=" <?php echo $rows[29] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">名称</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT3_NAME" placeholder="" value=" <?php echo $rows[30] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运营单位</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT3_RUNNING" placeholder="" value=" <?php echo $rows[31] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">排水去向</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT3_WATER_DIRECTION" placeholder="" value=" <?php echo $rows[32] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">设计规模(m^3/d)</label> <input type="text" step="0.001" class="form-control" name="JBQK_WASTEWATER_TREATMENT3_SIZE" placeholder="" value=" <?php echo $rows[33] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区对企业超标/违规排放处罚措施</label> <input type="text" class="form-control"  name="JBQK_YN_TREATMENT_PLANT_PUNISHMENT" placeholder="" value=" <?php echo $rows[34] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区对污水厂超标/违规排放处罚措施</label> <input type="text" class="form-control" name="JBQK_YN_COMPANY_PUNISHMENT" placeholder="" value=" <?php echo $rows[35] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区事故水池设置</label> <input type="text" class="form-control" name="JBQK_YN_POOL_SETTING" placeholder="" value=" <?php echo $rows[36] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区事故水池容积(m^3)</label> <input type="text" step="0.001" class="form-control" name="JBQK_POOL_VOLUME" placeholder="" value=" <?php echo $rows[37] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区事故水池数量</label> <input type="text" class="form-control" name="JBQK_POOL_NUMBER" placeholder="" value=" <?php echo $rows[38] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区事故水池位置</label> <input type="text" class="form-control" name="JBQK_POOL_LOCATION" placeholder="" value=" <?php echo $rows[39] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区企业</h3><br/>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区主导行业、主要排水企业类型</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;化工</label><input type="hidden" name="YQQY_COMPANY_CATEGORIES_HUA" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_CATEGORIES_HUA" placeholder="" <?php if($rows[40]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;冶金</label><input type="hidden" name="YQQY_COMPANY_CATEGORIES_YE" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_CATEGORIES_YE" placeholder="" <?php if($rows[41]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;纺织印染</label><input type="hidden" name="YQQY_COMPANY_CATEGORIES_FANG" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_CATEGORIES_FANG" placeholder="" <?php if($rows[42]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生物医药</label><input type="hidden" name="YQQY_COMPANY_CATEGORIES_SHENG" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_CATEGORIES_SHENG"  placeholder="" <?php if($rows[43]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;造纸工业</label><input type="hidden" name="YQQY_COMPANY_CATEGORIES_ZAO" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_CATEGORIES_ZAO" placeholder="" <?php if($rows[44]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;电子电工</label><input type="hidden" name="YQQY_COMPANY_CATEGORIES_DIAN" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_CATEGORIES_DIAN" placeholder="" <?php if($rows[45]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;机械</label><input type="hidden" name="YQQY_COMPANY_CATEGORIES_JI" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_CATEGORIES_JI" placeholder="" <?php if($rows[46]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;轻工食品</label><input type="hidden" name="YQQY_COMPANY_CATEGORIES_QING" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_CATEGORIES_QING" placeholder="" <?php if($rows[47]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;新型材料</label><input type="hidden" name="YQQY_COMPANY_CATEGORIES_XIN" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_CATEGORIES_XIN" placeholder="" <?php if($rows[48]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;印刷包装</label><input type="hidden" name="YQQY_COMPANY_CATEGORIES_YIN" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_CATEGORIES_YIN" placeholder="" <?php if($rows[49]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;现代制造</label><input type="hidden" name="YQQY_COMPANY_CATEGORIES_XIAN" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_CATEGORIES_XIAN" placeholder="" <?php if($rows[50]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="text" name="YQQY_COMPANY_CATEGORIES_OTHER" placeholder="" value=" <?php echo $rows[51] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区企业环保要求及执行情况(所占比例)</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">环评</label> <input type="text" step="0.001" max="100" class="form-control" name="YQQY_ENVIRONMENT_PROTECTION_HUAN" placeholder="" value=" <?php echo $rows[52] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">清洁生产</label> <input type="text" step="0.001" max="100" class="form-control" name="YQQY_ENVIRONMENT_PROTECTION_QING" placeholder="" value=" <?php echo $rows[53] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">ISO14001认证</label> <input type="text" step="0.001" max="100" class="form-control" name="YQQY_ENVIRONMENT_PROTECTION_ISO" placeholder="" value=" <?php echo $rows[54] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">总量控制</label> <input type="text" step="0.001" max="100" class="form-control" name="YQQY_ENVIRONMENT_PROTECTION_ZONG" placeholder="" value=" <?php echo $rows[55] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设置污水处理设施的企业数量(个)</label> <input type="text" class="form-control" name="YQQY_COMPANY_HAVE_TREATMENT_NUMBER" placeholder="" value=" <?php echo $rows[56] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">设置标准化排放口的企业数量(个)</label> <input type="text" class="form-control" name="YQQY_COMPANY_HAVE_STANDARD_UNLOADPLACE_NUMBER" placeholder="" value=" <?php echo $rows[57] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">企业排放污水执行标准（可多选）</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;GB8978-1996《污水综合排放标准》</label><input type="hidden" name="YQQY_STANDARD_GB" value="0">
                        <input type="checkbox" value="1" name="YQQY_STANDARD_GB" placeholder="" <?php if($rows[58]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;地标《污水综合排放标准》</label><input type="hidden" name="YQQY_STANDARD_DB" value="0">
                        <input type="checkbox" value="1" name="YQQY_STANDARD_DB" placeholder="" <?php if($rows[59]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;行业标准</label><input type="hidden" name="YQQY_STANDARD_HY" value="0">
                        <input type="checkbox" value="1" name="YQQY_STANDARD_HY" placeholder="" <?php if($rows[60]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;《污水排入城镇下水道水质标准》CJ343-2010</label><input type="hidden" name="YQQY_STANDARD_CJ" value="0">
                        <input type="checkbox" value="1" name="YQQY_STANDARD_CJ" placeholder="" <?php if($rows[61]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他标准</label><input type="hidden" name="YQQY_STANDARD_OTHER" value="0">
                        <input type="checkbox" value="1" name="YQQY_STANDARD_OTHER" placeholder="" <?php if($rows[62]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;协议</label><input type="hidden" name="YQQY_STANDARD_LC" value="0">
                        <input type="checkbox" value="1" name="YQQY_STANDARD_LC" placeholder="" <?php if($rows[63]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">日排放水量100吨以上企业数量(个)</label> <input type="text" class="form-control" name="YQQY_COMPANY_LARGERTHAN100_NUMBER" placeholder="" value=" <?php echo $rows[64] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">达标直排外环境，不进园区污水管网企业数量(个)</label> <input type="text" class="form-control" name="YQQY_COMPANY_OUT_DIRECTLY_NUMBER" placeholder="" value=" <?php echo $rows[65] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">排水纳入园区污水厂的企业数量(个)</label> <input type="text" class="form-control" name="YQQY_COMPANY_IN_TREATMENT_NUMBER" placeholder="" value=" <?php echo $rows[66] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">设置事故水池的企业数量(个)</label> <input type="text" class="form-control" name="YQQY_COMPANY_HAVE_POOL_NUMBER" placeholder="" value=" <?php echo $rows[67] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">设置事故水池企业所属行业</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;化工</label><input type="hidden" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_HUA" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_HUA" placeholder="" <?php if($rows[68]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;冶金</label><input type="hidden" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_YE" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_YE" placeholder="" <?php if($rows[69]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;纺织印染</label><input type="hidden" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_FANG" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_FANG" placeholder="" <?php if($rows[70]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生物医药</label><input type="hidden" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_SHENG" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_SHENG" placeholder="" <?php if($rows[71]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;造纸工业</label><input type="hidden" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_ZAO" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_ZAO" placeholder="" <?php if($rows[72]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;电子电工</label><input type="hidden" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_DIAN" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_DIAN" placeholder="" <?php if($rows[73]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;机械</label><input type="hidden" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_JI" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_JI" placeholder="" <?php if($rows[74]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;轻工食品</label><input type="hidden" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_QING" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_QING" placeholder="" <?php if($rows[75]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;新型材料</label><input type="hidden" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_XIN" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_XIN" placeholder="" <?php if($rows[76]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;印刷包装</label><input type="hidden" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_YIN" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_YIN" placeholder="" <?php if($rows[77]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;现代制造</label><input type="hidden" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_XIAN" value="0">
                        <input type="checkbox" value="1" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_XIAN" placeholder="" <?php if($rows[78]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="text" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_OTHER" placeholder="" value=" <?php echo $rows[79] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区管网</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区收水管网</label> <input type="text" class="form-control" name="YQGW_NETWORK_CATEGORY" placeholder="" value=" <?php echo $rows[80] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工业废水分质分类收集</label> <input type="text" class="form-control" name="YQGW_YN_WASTE_DIVIDE" placeholder="" value=" <?php echo $rows[81] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">生活污水和工业废水分流</label> <input type="text" class="form-control" name="YQGW_YN_LIFE_AND_INDUSTRIAL_WASTE_DIVIDE" placeholder="" value=" <?php echo $rows[82] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网转输形式</label> <input type="text" class="form-control" name="YQGW_TRANSFER" placeholder="" value=" <?php echo $rows[83] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区污水管网节点监控</label> <input type="text" class="form-control" name="YQGW_YN_MONITORING" placeholder="" value=" <?php echo $rows[84] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网节点监控个数(个)</label> <input type="text" class="form-control" name="YQGW_MONITORING_NODE_NUMBER" placeholder="" value=" <?php echo $rows[85] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水管网节点监控指标</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;流量</label><input type="hidden" name="YQGW_MONITORING_PARAMETERS_LIU" value="0">
                        <input type="checkbox" value="1" name="YQGW_MONITORING_PARAMETERS_LIU" placeholder="" <?php if($rows[86]==1){ ?> checked <?php } ?>" <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;pH</label><input type="hidden" name="YQGW_MONITORING_PARAMETERS_PH" value="0">
                        <input type="checkbox" value="1" name="YQGW_MONITORING_PARAMETERS_PH" placeholder="" <?php if($rows[87]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;温度</label><input type="hidden" name="YQGW_MONITORING_PARAMETERS_WEN" value="0">
                        <input type="checkbox" value="1" name="YQGW_MONITORING_PARAMETERS_WEN" placeholder="" <?php if($rows[88]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;化学需氧量</label><input type="hidden" name="YQGW_MONITORING_PARAMETERS_HUA" value="0">
                        <input type="checkbox" value="1" name="YQGW_MONITORING_PARAMETERS_HUA" placeholder="" <?php if($rows[89]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生化需氧量</label><input type="hidden" name="YQGW_MONITORING_PARAMETERS_SHENG" value="0">
                        <input type="checkbox" value="1" name="YQGW_MONITORING_PARAMETERS_SHENG" placeholder="" <?php if($rows[90]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;氨氮</label><input type="hidden" name="YQGW_MONITORING_PARAMETERS_AN" value="0">
                        <input type="checkbox" value="1" name="YQGW_MONITORING_PARAMETERS_AN" placeholder="" <?php if($rows[91]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总氮</label><input type="hidden" name="YQGW_MONITORING_PARAMETERS_DAN" value="0">
                        <input type="checkbox" value="1" name="YQGW_MONITORING_PARAMETERS_DAN" placeholder="" <?php if($rows[92]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总磷</label><input type="hidden" name="YQGW_MONITORING_PARAMETERS_LIN" value="0">
                        <input type="checkbox" value="1" name="YQGW_MONITORING_PARAMETERS_LIN" placeholder="" <?php if($rows[93]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;重金属</label><input type="hidden" name="YQGW_MONITORING_PARAMETERS_ZHONG" value="0">
                        <input type="checkbox" value="1" name="YQGW_MONITORING_PARAMETERS_ZHONG" placeholder="" <?php if($rows[94]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;难降解有机物</label><input type="hidden" name="YQGW_MONITORING_PARAMETERS_NAN" value="0">
                        <input type="checkbox" value="1" name="YQGW_MONITORING_PARAMETERS_NAN" placeholder="" <?php if($rows[95]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="hidden" name="YQGW_MONITORING_PARAMETERS_OTHER" value="0">
                        <input type="checkbox" value="1" name="YQGW_MONITORING_PARAMETERS_OTHER" placeholder="" <?php if($rows[96]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">排污收费标准</label> <input type="text" class="form-control" name="YQGW_WASTE_UNLOAD_STANDARD" placeholder="" value=" <?php echo $rows[97] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水管网节点监控频次(次/周)</label> <input type="text" class="form-control" name="YQGW_MONITORING_FREQUENCY" placeholder="" value=" <?php echo $rows[98] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网投资来源</label> <input type="text" class="form-control" name="YQGW_WASTEWATER_NETWORK_INVESTMENT_SOURCE" placeholder="" value=" <?php echo $rows[99] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水管网运行费用(元/m^3水)</label> <input type="text" step="0.001" class="form-control" name="YQGW_NETWORK_RUNNING_FEE" placeholder="" value=" <?php echo $rows[100] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网维护费来源</label> <input type="text" class="form-control" name="YQGW_NETWORK_RUNNING_FEE_SOURCE" placeholder="" value=" <?php echo $rows[101] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水回用管道</label> <input type="text" class="form-control" name="YQGW_YN_RESYCLE_NETWORK" placeholder="" value=" <?php echo $rows[102] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">中水管网投资来源</label> <input type="text" class="form-control" name="YQGW_WATER_NETWORK_INVESTMENT_SOURCE" placeholder="" value=" <?php echo $rows[103] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水管网运行费用(元/m^3水)</label> <input type="text" step="0.001" class="form-control" name="YQGW_PIPE_NETWORK_RUNNING_FEE" placeholder="" value=" <?php echo $rows[104] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">中水管网运行费用来源</label> <input type="text" class="form-control" name="YQGW_PIPE_NETWORK_SOURCE" placeholder="" value=" <?php echo $rows[105] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区水资源循环利用</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">年污水排放量(m^3)</label> <input type="text" step="0.001" class="form-control" name="YQSZ_WASTEWATER_DISCHARGE" placeholder="" value=" <?php echo $rows[106] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年再生水回用量(m^3)</label> <input type="text" step="0.001" class="form-control" name="YQSZ_WASTEWATER_RESYCLE" placeholder="" value=" <?php echo $rows[107] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">回用类型</label> <input type="text" class="form-control" name="YQSZ_WASTEWATER_RESYCLE_CATEGORY" placeholder="" value=" <?php echo $rows[108] ?>" <?php if($ac==0) echo "disabled" ?>><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">再生水制备工艺</label> <input type="text" class="form-control" name="YQSZ_WASTEWATER_RESYCLE_MEANS" placeholder="" value=" <?php echo $rows[109] ?>" <?php if($ac==0) echo "disabled" ?>><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">再生水回用用途</label> <input type="text" class="form-control" name="YQSZ_WASTEWATER_RESYCLE_USAGE" placeholder="" value=" <?php echo $rows[110] ?>" <?php if($ac==0) echo "disabled" ?>><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">梯级利用用途</label> <input type="text" class="form-control" name="XHJJ_YN_WATER_RESYCLE_METHOD3" placeholder="" value=" <?php echo $rows[111] ?>" <?php if($ac==0) echo "disabled" ?>><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否存在企业间废水再利用</label> <input type="text" class="form-control" name="YQSZ_YN_INTERCOMPANY_USAGE" placeholder="" value=" <?php echo $rows[112] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">重要资源回收收益(万元)</label> <input type="text" step="0.001" class="form-control" name="YQSZ_RESOURCE_RESYCLE" placeholder="" value=" <?php echo $rows[113] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水价格(元/m^3)</label> <input type="text" step="0.001" class="form-control" name="YQSZ_RESYCLE_WATER_VALUE" placeholder="" value=" <?php echo $rows[114] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">梯级利用和再生回用奖励政策</label> <input type="text" class="form-control" name="YQSZ_RESYCLE_REWARDS_POLICY" placeholder="" value=" <?php echo $rows[115] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">废水中重要资源回收方式</label>
                        <input type="text" class="form-control" name="YQSZ_RESYCLE_MEANS" placeholder="" value=" <?php echo $rows[116] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">重要资源回收种类及回收量(吨/年)</label>
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">金</label> <input type="text" step="0.001" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_AU" placeholder="" value=" <?php echo $rows[117] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">银</label> <input type="text" step="0.001" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_AG" placeholder="" value=" <?php echo $rows[118] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">铜</label> <input type="text" step="0.001" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_CU" placeholder="" value=" <?php echo $rows[119] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">镍</label> <input type="text" step="0.001" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_NI" placeholder="" value=" <?php echo $rows[120] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">镉</label> <input type="text" step="0.001" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_CD" placeholder="" value=" <?php echo $rows[121] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">其他</label> <input type="text" step="0.001" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_OTHER" placeholder="" value=" <?php echo $rows[122] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-5">
                        <label for="InputName">有机物质</label> <input type="text" step="0.001" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_OR" placeholder="" value=" <?php echo $rows[123] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区污水厂</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水处理厂建设和运行主体</label> <input type="text" class="form-control" name="YQWS_RUNING_PARTY" placeholder="" value=" <?php echo $rows[124] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运行模式</label> <input type="text" class="form-control" name="YQWS_RUNING_PATTERN" placeholder="" value=" <?php echo $rows[125] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">运行负荷率(%)</label> <input type="text" step="0.001" max="100" class="form-control" name="YQWS_RUNING_LOAD_RATE" placeholder="" value=" <?php echo $rows[126] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">建厂时间</label> <input type="text" class="form-control" name="YQWS_BUILD_DATE" placeholder="" value=" <?php echo $rows[127] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区主要污染物种类</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;化学需氧量CODcr</label><input type="hidden" name="YQWS_POLLUTION_CATEGORIES_HUA" value="0">
                        <input type="checkbox" value="1" name="YQWS_POLLUTION_CATEGORIES_HUA" placeholder="" <?php if($rows[128]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生化需氧量BOD5</label><input type="hidden" name="YQWS_POLLUTION_CATEGORIES_SHENG" value="0">
                        <input type="checkbox" value="1" name="YQWS_POLLUTION_CATEGORIES_SHENG" placeholder="" <?php if($rows[129]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;氨氮NH3</label><input type="hidden" name="YQWS_POLLUTION_CATEGORIES_AN" value="0">
                        <input type="checkbox" value="1" name="YQWS_POLLUTION_CATEGORIES_AN" placeholder="" <?php if($rows[130]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总氮TN</label><input type="hidden" name="YQWS_POLLUTION_CATEGORIES_DAN" value="0">
                        <input type="checkbox" value="1" name="YQWS_POLLUTION_CATEGORIES_DAN" placeholder="" <?php if($rows[131]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总磷TP</label><input type="hidden" name="YQWS_POLLUTION_CATEGORIES_LIN" value="0">
                        <input type="checkbox" value="1" name="YQWS_POLLUTION_CATEGORIES_LIN" placeholder="" <?php if($rows[132]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;重金属</label><input type="hidden" name="YQWS_POLLUTION_CATEGORIES_ZHONG" value="0">
                        <input type="checkbox" value="1" name="YQWS_POLLUTION_CATEGORIES_ZHONG" placeholder="" <?php if($rows[133]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;难降解有机物</label><input type="hidden" name="YQWS_POLLUTION_CATEGORIES_NAN" value="0">
                        <input type="checkbox" value="1" name="YQWS_POLLUTION_CATEGORIES_NAN" placeholder="" <?php if($rows[134]==1){ ?> checked <?php } ?>" <?php if($ac==0) echo "disabled" ?> >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="hidden" name="YQWS_POLLUTION_CATEGORIES_OTHER" value="0">
                        <input type="checkbox" value="1" name="YQWS_POLLUTION_CATEGORIES_OTHER" placeholder="" <?php if($rows[135]==1){ ?> checked <?php } ?> <?php if($ac==0) echo "disabled" ?> ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区污水主要来源及比例</label>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生产废水(%)</label> <input type="text" step="0.001" max="100" class="form-control" name="YQWS_POLLUTION_SOURCE_PROD" placeholder="" value=" <?php echo $rows[136] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生活污水(%)</label> <input type="text" step="0.001" max="100" class="form-control" name="YQWS_POLLUTION_SOURCE_LIFE" placeholder="" value=" <?php echo $rows[137] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生产废水的主要来源</label> <input type="text" class="form-control" name="YQWS_POLLUTION_SOURCE" placeholder="" value=" <?php echo $rows[138] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水厂水质监测点覆盖率(%)</label> <input type="text" step="0.001" max="100" class="form-control" name="YQWS_MONITORING_COVER_RATE" placeholder="" value=" <?php echo $rows[139] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">主要影响污水处理厂运行的企业个数</label> <input type="text" class="form-control" name="YQWS_COMPANY_INFLENCE_TREATMENT" placeholder="" value=" <?php echo $rows[140] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水处理厂排放标准</label> <input type="text" class="form-control" name="YQWS_TREATMENT_UNLOAD_STANDARD" placeholder="" value=" <?php echo $rows[141] ?>" <?php if($ac==0) echo "disabled" ?> ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">企业类型(填行业)</label> <input type="text" class="form-control" name="YQWS_COMPANY_CATEGORIES" placeholder="" value=" <?php echo $rows[142] ?>" <?php if($ac==0) echo "disabled" ?> >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">主要企业排水量(m^3/d)</label> <input type="text" step="0.001" class="form-control" name="YQWS_DISCHARGE_VOLUME" placeholder="" value=" <?php echo $rows[143] ?>" <?php if($ac==0) echo "disabled" ?> ><br/><br/>
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