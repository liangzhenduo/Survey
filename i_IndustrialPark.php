<?php
session_start();
include "connectdb.php";
$error='';
if(!isset($_SESSION['username'])){		//未登录
    header("location: signin.php");
}
else {
    $username=$_SESSION['username'];
    $query="select `type`, `submit` from user_info where username='$username'";
    $result = mysqli_query($con,$query);
    $row =mysqli_fetch_array($result);
    $type=$row[0];
    $submit=$row[1];
    if($type!=3&&$type!=0||$submit==1){
        header("location: home.php");
    }
    else{

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

                <h4 align="center">“重点流域典型工业园区水污染防治技术评估和管理制度研究”课题<br/>工业园区管委会\园区环保主管部门函件调查表</h4><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">填表人</label> <input type="text" class="form-control" name="YQGW_INVESTIGATOR" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">联系电话</label> <input type="text" class="form-control" name="YQGW_CONTACT" required placeholder=""><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">基本情况</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区名称</label> <input type="text" class="form-control" name="JBQK_NAME" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区地址</label> <input type="text" class="form-control" name="JBQK_ADDRESS" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区类型</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;综合型</label><input type="radio" name="JBQK_CATEGORY" value="市政管网" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;行业主导型</label><input type="radio" name="JBQK_CATEGORY" value="地下水" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区出让工业用地面积(平方公里)</label> <input type="number" class="form-control" name="JBQK_LAND" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">用水水源</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;市政管网</label><input type="radio" name="JBQK_WATER_SOURCE" value="市政管网" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;地下水</label><input type="radio" name="JBQK_WATER_SOURCE" value="地下水" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区日均用水量(万吨)</label> <input type="number" class="form-control" name="JBQK_WATER_PER_DAY" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">企业数量(已生产、在建、签订合同)</label> <input type="number" class="form-control" name="JBQK_COMPANY_NUMBER" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工业年产值(GDP)万元</label> <input type="number" class="form-control" name="JBQK_GDP" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">年税收(万元)</label> <input type="number" class="form-control" name="JBQK_TAX" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">排污收费的年征收额度(万元)</label> <input type="number" class="form-control" name="JBQK_UNLOAD_CHARGE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否将环境绩效纳入政府考核</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="JBQK_YN_EVALUATION" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="JBQK_YN_EVALUATION" value="0" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区是否做规划环评</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="JBQK_YN_SCHEDULED_EVALUATION" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="JBQK_YN_SCHEDULED_EVALUATION" value="0" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">环保部门是否对建设项目进行前置审批</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="JBQK_PRE_EXAMINATION" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="JBQK_PRE_EXAMINATION" value="0" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区的总量控制指标(吨/年)</label>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">化学需氧量</label> <input type="number" class="form-control" name="JBQK_CHEMISTRY_PARAMETER_HUA" placeholder="" >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生化需氧量</label> <input type="number" class="form-control" name="JBQK_CHEMISTRY_PARAMETER_SHENG" placeholder="" >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">氨氮</label> <input type="number" class="form-control" name="JBQK_CHEMISTRY_PARAMETER_AN" placeholder="" >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">总氮</label> <input type="number" class="form-control" name="JBQK_CHEMISTRY_PARAMETER_DAN" placeholder="" >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">总磷</label> <input type="number" class="form-control" name="JBQK_CHEMISTRY_PARAMETER_LIN" placeholder="" >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">其他</label> <input type="number" class="form-control" name="JBQK_CHEMISTRY_PARAMETER_OTHER" placeholder="" ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水处理厂（分别填写）</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">名称</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT1_NAME" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运营单位</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT1_RUNNING" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">排水去向</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT1_WATER_DIRECTION" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">设计规模(m^3/d)</label> <input type="number" class="form-control" name="JBQK_WASTEWATER_TREATMENT1_SIZE" placeholder="" ><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">名称</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT2_NAME" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运营单位</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT2_RUNNING" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">排水去向</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT2_WATER_DIRECTION" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">设计规模(m^3/d)</label> <input type="number" class="form-control" name="JBQK_WASTEWATER_TREATMENT2_SIZE" placeholder="" ><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">名称</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT3_NAME" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运营单位</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT3_RUNNING" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">排水去向</label> <input type="text" class="form-control" name="JBQK_WASTEWATER_TREATMENT3_WATER_DIRECTION" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">设计规模(m^3/d)</label> <input type="number" class="form-control" name="JBQK_WASTEWATER_TREATMENT3_SIZE" placeholder="" ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区对企业超标/违规排放处罚措施</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="JBQK_YN_TREATMENT_PLANT_PUNISHMENT" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="JBQK_YN_TREATMENT_PLANT_PUNISHMENT" value="0" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区对污水厂超标/违规排放处罚措施</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="JBQK_YN_COMPANY_PUNISHMENT" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="JBQK_YN_COMPANY_PUNISHMENT" value="0" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区事故水池设置</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="JBQK_YN_POOL_SETTING" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="JBQK_YN_POOL_SETTING" value="0" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区事故水池容积(m^3)</label> <input type="number" class="form-control" name="JBQK_POOL_VOLUME" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区事故水池数量</label> <input type="number" class="form-control" name="JBQK_POOL_NUMBER" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区事故水池位置</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;园区污水处理厂内</label><input type="radio" name="JBQK_POOL_LOCATION" value="园区污水处理厂内" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;园区污水处理厂外</label><input type="radio" name="JBQK_POOL_LOCATION" value="园区污水处理厂外" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区企业</h3><br/>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区主导行业、主要排水企业类型</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;化工</label><input type="checkbox" name="YQQY_COMPANY_CATEGORIES_HUA" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;冶金</label><input type="checkbox" name="YQQY_COMPANY_CATEGORIES_YE" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;纺织印染</label><input type="checkbox" name="YQQY_COMPANY_CATEGORIES_FANG" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生物医药</label><input type="checkbox" name="YQQY_COMPANY_CATEGORIES_SHENG" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;造纸工业</label><input type="checkbox" name="YQQY_COMPANY_CATEGORIES_ZAO" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;电子电工</label><input type="checkbox" name="YQQY_COMPANY_CATEGORIES_DIAN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;机械</label><input type="checkbox" name="YQQY_COMPANY_CATEGORIES_JI" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;轻工食品</label><input type="checkbox" name="YQQY_COMPANY_CATEGORIES_QING" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;新型材料</label><input type="checkbox" name="YQQY_COMPANY_CATEGORIES_XIN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;印刷包装</label><input type="checkbox" name="YQQY_COMPANY_CATEGORIES_YIN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;现代制造</label><input type="checkbox" name="YQQY_COMPANY_CATEGORIES_XIAN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="text" name="YQQY_COMPANY_CATEGORIES_OTHER" placeholder="" ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区企业环保要求及执行情况(所占比例)</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">环评</label> <input type="number" class="form-control" name="YQQY_ENVIRONMENT_PROTECTION_HUAN" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">清洁生产</label> <input type="number" class="form-control" name="YQQY_ENVIRONMENT_PROTECTION_QING" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">ISO14001认证</label> <input type="number" class="form-control" name="YQQY_ENVIRONMENT_PROTECTION_ISO" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">总量控制</label> <input type="number" class="form-control" name="YQQY_ENVIRONMENT_PROTECTION_ZONG" placeholder="" ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设置污水处理设施的企业数量(个)</label> <input type="number" class="form-control" name="YQQY_COMPANY_HAVE_TREATMENT_NUMBER" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">设置标准化排放口的企业数量(个)</label> <input type="number" class="form-control" name="YQQY_COMPANY_HAVE_STANDARD_UNLOADPLACE_NUMBER" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">企业排放污水执行标准（可多选）</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;GB8978-1996《污水综合排放标准》</label><input type="checkbox" name="YQQY_STANDARD_GB" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;地标《污水综合排放标准》</label><input type="checkbox" name="YQQY_STANDARD_DB" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;行业标准</label><input type="checkbox" name="YQQY_STANDARD_HY" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;《污水排入城镇下水道水质标准》CJ343-2010</label><input type="checkbox" name="YQQY_STANDARD_CJ" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他标准</label><input type="checkbox" name="YQQY_STANDARD_OTHER" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;协议</label><input type="checkbox" name="YQQY_STANDARD_LC" placeholder="" ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">日排放水量100吨以上企业数量(个)</label> <input type="number" class="form-control" name="YQQY_COMPANY_LARGERTHAN100_NUMBER" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">达标直排外环境，不进园区污水管网企业数量(个)</label> <input type="number" class="form-control" name="YQQY_COMPANY_OUT_DIRECTLY_NUMBER" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">排水纳入园区污水厂的企业数量(个)</label> <input type="number" class="form-control" name="YQQY_COMPANY_IN_TREATMENT_NUMBER" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">设置事故水池的企业数量(个)</label> <input type="number" class="form-control" name="YQQY_COMPANY_HAVE_POOL_NUMBER" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">设置事故水池企业所属行业</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;化工</label><input type="checkbox" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_HUA" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;冶金</label><input type="checkbox" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_YE" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;纺织印染</label><input type="checkbox" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_FANG" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生物医药</label><input type="checkbox" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_SHENG" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;造纸工业</label><input type="checkbox" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_ZAO" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;电子电工</label><input type="checkbox" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_DIAN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;机械</label><input type="checkbox" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_JI" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;轻工食品</label><input type="checkbox" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_QING" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;新型材料</label><input type="checkbox" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_XIN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;印刷包装</label><input type="checkbox" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_YIN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;现代制造</label><input type="checkbox" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_XIAN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="text" name="YQQY_COMPANY_HAVE_POOL_CATEGORY_OTHER" placeholder="" ><br/><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区管网</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区收水管网</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;雨污合流</label><input type="radio" name="YQGW_NETWORK_CATEGORY" value="雨污合流" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;雨污分流</label><input type="radio" name="YQGW_NETWORK_CATEGORY" value="雨污分流" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工业废水分质分类收集</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="YQGW_YN_WASTE_DIVIDE" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="YQGW_YN_WASTE_DIVIDE" value="0" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">生活污水和工业废水分流</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="YQGW_YN_LIFE_AND_INDUSTRIAL_WASTE_DIVIDE" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="YQGW_YN_LIFE_AND_INDUSTRIAL_WASTE_DIVIDE" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网转输形式</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;地上管廊</label><input type="radio" name="YQGW_TRANSFER" value="地上管廊" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;地埋式</label><input type="radio" name="YQGW_TRANSFER" value="地埋式" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区污水管网节点监控</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="YQGW_YN_MONITORING" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="YQGW_YN_MONITORING" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网节点监控个数(个)</label> <input type="number" class="form-control" name="YQGW_MONITORING_NODE_NUMBER" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水管网节点监控指标</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;流量</label><input type="checkbox" name="YQGW_MONITORING_PARAMETERS_LIU" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;pH</label><input type="checkbox" name="YQGW_MONITORING_PARAMETERS_PH" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;温度</label><input type="checkbox" name="YQGW_MONITORING_PARAMETERS_WEN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;化学需氧量</label><input type="checkbox" name="YQGW_MONITORING_PARAMETERS_HUA" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生化需氧量</label><input type="checkbox" name="YQGW_MONITORING_PARAMETERS_SHENG" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;氨氮</label><input type="checkbox" name="YQGW_MONITORING_PARAMETERS_AN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总氮</label><input type="checkbox" name="YQGW_MONITORING_PARAMETERS_DAN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总磷</label><input type="checkbox" name="YQGW_MONITORING_PARAMETERS_LIN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;重金属</label><input type="checkbox" name="YQGW_MONITORING_PARAMETERS_ZHONG" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;难降解有机物</label><input type="checkbox" name="YQGW_MONITORING_PARAMETERS_NAN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="checkbox" name="YQGW_MONITORING_PARAMETERS_OTHER" placeholder="" ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">排污收费标准</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;浓度</label><input type="radio" name="YQGW_WASTE_UNLOAD_STANDARD" value="浓度" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总量</label><input type="radio" name="YQGW_WASTE_UNLOAD_STANDARD" value="总量" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;统一收费</label><input type="radio" name="YQGW_WASTE_UNLOAD_STANDARD" value="统一收费" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;分类收费</label><input type="radio" name="YQGW_WASTE_UNLOAD_STANDARD" value="分类收费" placeholder="" required>
                        <!--label>&nbsp;&nbsp;&nbsp;&nbsp;生活废水</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;工业废水</label><input type="checkbox" name="contact" placeholder="" required--><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水管网节点监控频次(次/周)</label> <input type="number" class="form-control" name="YQGW_MONITORING_FREQUENCY" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网投资来源</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;政府</label><input type="radio" name="YQGW_WASTEWATER_NETWORK_INVESTMENT_SOURCE" value="政府" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;企业</label><input type="radio" name="YQGW_WASTEWATER_NETWORK_INVESTMENT_SOURCE" value="企业" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;第三方</label><input type="radio" name="YQGW_WASTEWATER_NETWORK_INVESTMENT_SOURCE" value="第三方" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水管网运行费用(元/m^3水)</label> <input type="number" class="form-control" name="YQGW_NETWORK_RUNNING_FEE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网维护费来源</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;企业缴纳污水处理费</label><input type="radio" name="YQGW_NETWORK_RUNNING_FEE_SOURCE" value="企业缴纳污水处理费" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;政府提供</label><input type="radio" name="YQGW_NETWORK_RUNNING_FEE_SOURCE" value="政府提供" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="radio" name="YQGW_NETWORK_RUNNING_FEE_SOURCE" value="其他" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水回用管道</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="YQGW_YN_RESYCLE_NETWORK" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="YQGW_YN_RESYCLE_NETWORK" value="0" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">中水管网投资来源</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;政府</label><input type="radio" name="YQGW_WATER_NETWORK_INVESTMENT_SOURCE" value="政府" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;企业</label><input type="radio" name="YQGW_WATER_NETWORK_INVESTMENT_SOURCE" value="企业" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;第三方</label><input type="radio" name="YQGW_WATER_NETWORK_INVESTMENT_SOURCE" value="第三方" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水管网运行费用(元/m^3水)</label> <input type="number" class="form-control" name="YQGW_PIPE_NETWORK_RUNNING_FEE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">中水管网运行费用来源</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;企业</label><input type="radio" name="YQGW_PIPE_NETWORK_SOURCE" value="企业" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;政府提供</label><input type="radio" name="YQGW_PIPE_NETWORK_SOURCE" value="政府提供" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="radio" name="YQGW_PIPE_NETWORK_SOURCE" value="其他" placeholder="" required><br/><br/><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区水资源循环利用</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">年污水排放量(m^3)</label> <input type="number" class="form-control" name="YQSZ_WASTEWATER_DISCHARGE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年再生水回用量(m^3)</label> <input type="number" class="form-control" name="YQSZ_WASTEWATER_RESYCLE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">回用类型</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;再生水厂回用</label><input type="radio" name="YQSZ_WASTEWATER_RESYCLE_CATEGORY" value="再生水厂回用" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;企业内部自身回用</label><input type="radio" name="YQSZ_WASTEWATER_RESYCLE_CATEGORY" value="企业内部自身回用" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="text" name="YQSZ_WASTEWATER_RESYCLE_CATEGORY" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">再生水制备工艺</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;膜滤法</label><input type="radio" name="YQSZ_WASTEWATER_RESYCLE_MEANS" value="膜滤法" placeholder="">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;活性炭吸附法</label><input type="radio" name="YQSZ_WASTEWATER_RESYCLE_MEANS" value="活性炭吸附法" placeholder="">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;高级氧化法</label><input type="radio" name="YQSZ_WASTEWATER_RESYCLE_MEANS" value="高级氧化法" placeholder=""><br/>
                    </div>
                    <div class="col-xs-6">
                        <label>多方法联用</label> <input type="text" class="form-control" name="YQSZ_WASTEWATER_RESYCLE_MEANS" placeholder="" >
                    </div>
                    <div class="col-xs-6">
                        <label>其它方法</label> <input type="text" class="form-control" name="YQSZ_WASTEWATER_RESYCLE_MEANS" placeholder="" ><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">再生水回用用途</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;地下水回灌</label><input type="radio" name="YQSZ_WASTEWATER_RESYCLE_USAGE" value="地下水回灌" placeholder="">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;工业用水</label><input type="radio" name="YQSZ_WASTEWATER_RESYCLE_USAGE" value="工业用水" placeholder="">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;冲洗、消防用水</label><input type="radio" name="YQSZ_WASTEWATER_RESYCLE_USAGE" value="冲洗、消防用水" placeholder="">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;绿化、建筑用水</label><input type="radio" name="YQSZ_WASTEWATER_RESYCLE_USAGE" value="绿化、建筑用水" placeholder="">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;景观用水</label><input type="radio" name="YQSZ_WASTEWATER_RESYCLE_USAGE" value="景观用水" placeholder="">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;农林业</label><input type="radio" name="YQSZ_WASTEWATER_RESYCLE_USAGE" value="农林业" placeholder="">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;牧畜业</label><input type="radio" name="YQSZ_WASTEWATER_RESYCLE_USAGE" value="牧畜业" placeholder="">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其它</label><input type="text" name="YQSZ_WASTEWATER_RESYCLE_USAGE" placeholder=""><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">梯级利用用途</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生产用水</label><input type="radio" name="YQSZ_STAIRSTEP_USAGE" value="生产用水" placeholder="">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;循环冷却</label><input type="radio" name="YQSZ_STAIRSTEP_USAGE" value="循环冷却" placeholder="">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;冲洗、消防用水</label><input type="radio" name="YQSZ_STAIRSTEP_USAGE" value="冲洗、消防用水" placeholder="">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其它</label><input type="text" name="XHJJ_YN_WATER_RESYCLE_METHOD3" placeholder=""><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否存在企业间废水再利用</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="YQSZ_YN_INTERCOMPANY_USAGE" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="YQSZ_YN_INTERCOMPANY_USAGE" value="0" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">重要资源回收收益(万元)</label> <input type="number" class="form-control" name="YQSZ_RESOURCE_RESYCLE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水价格(元/m^3)</label> <input type="number" class="form-control" name="YQSZ_RESYCLE_WATER_VALUE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">梯级利用和再生回用奖励政策</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;有</label><input type="radio" name="YQSZ_RESYCLE_REWARDS_POLICY" value="1" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="radio" name="YQSZ_RESYCLE_REWARDS_POLICY" value="0" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">废水中重要资源回收方式</label>
                        <input type="text" class="form-control" name="YQSZ_RESYCLE_MEANS" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">重要资源回收种类及回收量(吨/年)</label>
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">金</label> <input type="number" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_AU" placeholder="" >
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">银</label> <input type="number" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_AG" placeholder="" >
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">铜</label> <input type="number" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_CU" placeholder="" >
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">镍</label> <input type="number" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_NI" placeholder="" >
                    </div>
                    <div class="col-xs-3">
                        <label for="InputName">镉</label> <input type="number" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_CD" placeholder="" >
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">其他</label> <input type="number" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_OTHER" placeholder="" >
                    </div>
                    <div class="col-xs-5">
                        <label for="InputName">有机物质</label> <input type="number" class="form-control" name="YQSZ_RESYCLE_CATEGORIES_AND_VALUE_OR" placeholder="" ><br/><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区污水厂</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水处理厂建设和运行主体</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;园区政府</label><input type="radio" name="YQWS_RUNING_PARTY" value="园区政府" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;第三方</label><input type="radio" name="YQWS_RUNING_PARTY" value="第三方" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="radio" name="YQWS_RUNING_PARTY" value="其他" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运行模式</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;BOT</label><input type="radio" name="YQWS_RUNING_PATTERN" value="BOT" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;TOT</label><input type="radio" name="YQWS_RUNING_PATTERN" value="TOT" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;DBO</label><input type="radio" name="YQWS_RUNING_PATTERN" value="DBO" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="radio" name="YQWS_RUNING_PATTERN" value="其他" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">运行负荷率(%)</label> <input type="number" class="form-control" name="YQWS_RUNING_LOAD_RATE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">建厂时间</label> <input type="date" class="form-control" name="YQWS_BUILD_DATE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区主要污染物种类</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;化学需氧量CODcr</label><input type="checkbox" name="YQWS_POLLUTION_CATEGORIES_HUA" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生化需氧量BOD5</label><input type="checkbox" name="YQWS_POLLUTION_CATEGORIES_SHENG" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;氨氮NH3</label><input type="checkbox" name="YQWS_POLLUTION_CATEGORIES_AN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总氮TN</label><input type="checkbox" name="YQWS_POLLUTION_CATEGORIES_DAN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总磷TP</label><input type="checkbox" name="YQWS_POLLUTION_CATEGORIES_LIN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;重金属</label><input type="checkbox" name="YQWS_POLLUTION_CATEGORIES_ZHONG" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;难降解有机物</label><input type="checkbox" name="YQWS_POLLUTION_CATEGORIES_NAN" placeholder="" >
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="checkbox" name="YQWS_POLLUTION_CATEGORIES_OTHER" placeholder="" ><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区污水主要来源及比例</label>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生产废水(%)</label> <input type="number" class="form-control" name="YQWS_POLLUTION_SOURCE_PROD" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生活污水(%)</label> <input type="number" class="form-control" name="YQWS_POLLUTION_SOURCE_LIFE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-4">
                        <label for="InputName">生产废水的主要来源</label> <input type="text" class="form-control" name="YQWS_POLLUTION_SOURCE" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水厂水质监测点覆盖率(%)</label> <input type="number" class="form-control" name="YQWS_MONITORING_COVER_RATE" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">主要影响污水处理厂运行的企业个数</label> <input type="number" class="form-control" name="YQWS_COMPANY_INFLENCE_TREATMENT" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水处理厂排放标准</label> <input type="text" class="form-control" name="YQWS_TREATMENT_UNLOAD_STANDARD" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">企业类型(填行业)</label> <input type="text" class="form-control" name="YQWS_COMPANY_CATEGORIES" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">主要企业排水量(m^3/d)</label> <input type="number" class="form-control" name="YQWS_DISCHARGE_VOLUME" placeholder="" required><br/><br/>
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

