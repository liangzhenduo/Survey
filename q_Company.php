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
	if($type!=1&&$type!=0||$submit==1){
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

	<title>现场调查表</title>

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

  					<h4 align="center">“重点流域典型工业园区水污染防治技术评估和管理制度研究”课题<br/>工业园区主要排污企业现场调查表</h4><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">调查人</label> <input type="text" class="form-control" name="INVESTIGATOR" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">数据年限</label> <input type="date" class="form-control" name="REPORT_DATE" placeholder="" required><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">企业信息</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业名称</label> <input type="text" class="form-control" name="QYXX_NAME" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">行业类型</label> <input type="text" class="form-control" name="QYXX_TYPE" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">占地面积</label> <input type="number" class="form-control" name="QYXX_AREA" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">企业地址</label> <input type="text" class="form-control" name="QYXX_LOCATION" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业主要产品</label> <input type="text" class="form-control" name="QYXX_PRODUCT" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">生产规模(年产量)</label> <input type="number" class="form-control" name="QYXX_PRODUCTION" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业环保联系人及电话</label> <input type="text" class="form-control" name="QYXX_CONTACT" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">工业生产总值(万元)</label> <input type="number" class="form-control" name="QYXX_VALUE" placeholder="" required><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">清洁生产</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否开展了清洁生产</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="QJSC_Y/N_CLEANPRODUCT" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="QJSC_Y/N_CLEANPRODUCT" value="0" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">如果开展了清洁生产工作，请提供清洁生产审计报告（方案）</label>
							<input type="file" name="" value=""><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">主要原料消耗量(m^3/年)</label> <input type="number" class="form-control" name="QJSC_RAW_MATERIAL_CONSUMPTION" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">年新水用量(m^3/年)</label> <input type="number" class="form-control" name="QJSC_NEW_WATER_CONSUMPTION" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否有水梯级利用</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="QJSC_Y/N_WATER_RUNDLEUSE" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="QJSC_Y/N_WATER_RUNDLEUSE" value="0" placeholder="" required><br/><br/>
						</div>
						<div class="col-xs-6">
							<label for="InputName">是否有再生水利用</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="QJSC_Y/N_WATER_REUSE" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="QJSC_Y/N_WATER_REUSE" value="0" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">梯级利用水量(m^3/年)</label> <input type="number" class="form-control" name="QJSC_RUNDLE_WATER_CONSUMPTION" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">再生水用量(m^3/年)</label> <input type="number" class="form-control" name="QJSC_REUSE_WATER_CONSUMPTION" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">年电耗量(kw/年)</label> <input type="number" class="form-control" name="QJSC_ELECTRICITY_CONSUMPTION" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">其他能源耗量(如煤、油等)</label> <input type="text" class="form-control" name="QJSC_OTHER_ENERGY_CONSUMPTION" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">生产工艺</label> <input type="text" class="form-control" name="QJSC_PRODUCTION_TECHNOLOGY" placeholder="" required><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">污水处理</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否设置污水处理设施</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="WSCL_Y/N_SEWAGE_TREATMENT_FACILITY" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="WSCL_Y/N_SEWAGE_TREATMENT_FACILITY" value="0" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">请提供企业污水处理管理文件</label>
							<input type="file" name="" value=""><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">污水处理后的排放途径</label><br/>
							<label>深度处理实现企业内部循环利用</label><input type="radio" name="WSCL_SEWAGE_DISCHARGE_PATH" value="1" placeholder="" required>
							<label>排放至园区污水处理厂</label><input type="radio" name="WSCL_SEWAGE_DISCHARGE_PATH" value="0" placeholder="" required>
						</div>
						<div class="col-xs-6"><label for="InputName">如果实现了再生循环利用，请提供<br/> </label></div>
							<div class="col-xs-3">
								<label for="InputName">利用率</label> <input type="number" class="form-control" name="WSCL_REUSE_UTILIZATION_RATIO" placeholder="" >
							</div>
							<div class="col-xs-3">
								<label for="InputName">再生循环利用管理办法</label> <input type="text" class="form-control" name="WSCL_REUSE_UTILIZATION_METHOD" placeholder="" ><br/>
							</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">设计水量(m^3/d)</label> <input type="number" class="form-control" name="WSCL_PLAN_WATER_CONSUMPTION" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">运行水量(m^3/d)</label> <input type="number" class="form-control" name="WSCL_RUN_WATER_CONSUMPTION" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">占地面积(m^2)</label> <input type="number" class="form-control" name="WSCL_COVERY_AREA" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">出水标准</label> <input type="text" class="form-control" name="WSCL_OUTPUT_WATER_STANDARD" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">设施投资(万元)</label> <input type="number" class="form-control" name="WSCL_FACILITY_INVESTMENT" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">年耗电量(kw/年)</label> <input type="number" class="form-control" name="WSCL_ELECTRICITY_CONSUMPTION" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">加药种类</label> <input type="text" class="form-control" name="WSCL_MEDICINE_TYPE" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">年药剂费(万元/年)</label> <input type="number" class="form-control" name="WSCL_MEDICINE_MONEY" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">环保人员数量(人)</label> <input type="number" class="form-control" name="WSCL_PEOPLE" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">电费价格(元/度)</label> <input type="number" class="form-control" name="WSCL_ELECTRISITY_MONEY_DEGREE" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">人员平均工资(万元/年)</label> <input type="number" class="form-control" name="WSCL_SALARY_PEOPLE" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">峰时排水量(m^3/h)</label> <input type="number" class="form-control" name="WSCL_WATER_DISCHARGE_PEAK" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">调节池容积(m^3)</label> <input type="number" class="form-control" name="WSCL_ADJUST_POOL_VOLUME" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">废气中的污染物</label> <input type="text" class="form-control" name="WSCL_POLLUTION_IN_WASTEGAS" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">固废中的污染物</label> <input type="text" class="form-control" name="WSCL_POLLUTION_IN_WASTESOLID" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">一般固废产生量(t/a)</label> <input type="number" class="form-control" name="WSCL_GENERAL_SOLID_PRODUCTION" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">危险固废产生量(t/a)</label> <input type="number" class="form-control" name="WSCL_DANGEROUS_SOLID_PRODUCTION" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">设施是否存在高温、高压条件</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="WSCL_Y/N_HIGH_TEMPREATURE_PRESSURE" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="WSCL_Y/N_HIGH_TEMPREATURE_PRESSURE" value="0" placeholder="" required><br/><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物种类</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;重金属</label><input type="checkbox" name="WSCL_TYPICAL_POLLUTION_ZHONG" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;盐类</label><input type="checkbox" name="WSCL_TYPICAL_POLLUTION_YAN" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;难降解机物</label><input type="checkbox" name="WSCL_TYPICAL_POLLUTION_NAN" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;放射性</label><input type="checkbox" name="WSCL_TYPICAL_POLLUTION_FANG" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="checkbox" name="WSCL_TYPICAL_POLLUTION_OTHER" placeholder=""><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">进水主要污染物浓度(mg/L)</label><br/>
						</div>
						<div class="col-xs-3">
							<label for="InputName">CODcr</label> <input type="number" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_COD" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">BOD5</label> <input type="number" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_BOD" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">TN</label> <input type="number" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_TN" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">NH3-N</label> <input type="number" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_NH" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">TP</label> <input type="number" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_TP" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">SS</label> <input type="number" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_SS" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">pH</label> <input type="number" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_PH" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">进水特征污染物浓度(mg/L)</label><br/>
						</div>
						<div class="col-xs-4">
							<label for="InputName">重金属</label> <input type="number" class="form-control" name="WSCL_INPUT_TYPICAL_POLLUTION_DENSITY_ZHONG" placeholder="" required>
						</div>
						<div class="col-xs-4">
							<label for="InputName">难降解机物</label> <input type="number" class="form-control" name="WSCL_INPUT_TYPICAL_POLLUTION_DENSITY_NAN" placeholder="" required>
						</div>
						<div class="col-xs-4">
							<label for="InputName">盐类</label> <input type="number" class="form-control" name="WSCL_INPUT_TYPICAL_POLLUTION_DENSITY_YAN" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">出水主要污染物浓度(mg/L)</label><br/>
						</div>
						<div class="col-xs-3">
							<label for="InputName">CODcr</label> <input type="number" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_COD" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">BOD5</label> <input type="number" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_BOD" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">TN</label> <input type="number" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_TN" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">NH3-N</label> <input type="number" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_NH" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">TP</label> <input type="number" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_TP" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">SS</label> <input type="number" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_SS" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">pH</label> <input type="number" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_PH" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">出水特征污染物浓度(mg/L)</label><br/>
						</div>
						<div class="col-xs-4">
							<label for="InputName">重金属</label> <input type="number" class="form-control" name="WSCL_OUTPUT_TYPICAL_POLLUTION_DENSITY_ZHONG" placeholder="" required>
						</div>
						<div class="col-xs-4">
							<label for="InputName">难降解机物</label> <input type="number" class="form-control" name="WSCL_OUTPUT_TYPICAL_POLLUTION_DENSITY_NAN" placeholder="" required>
						</div>
						<div class="col-xs-4">
							<label for="InputName">盐类</label> <input type="number" class="form-control" name="WSCL_OUTPUT_TYPICAL_POLLUTION_DENSITY_YAN" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物的管控途径</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;车间管控</label><input type="radio" name="WSCL_POLLUTION_CONTROL_METHOD" value="车间管控" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;总排放口管控</label><input type="radio" name="WSCL_POLLUTION_CONTROL_METHOD" value="总排放口管控" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物废水1#</label><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">污染物种类</label> <input type="text" class="form-control" name="WSCL_WASTE_WATER1_POLLUTION_TYPE" placeholder="" required>
						</div>
						<div class="col-xs-12">
							<label for="InputName">处理流程</label> <input type="text" class="form-control" name="WSCL_WASTE_WATER1_PROCESSING" placeholder="进水->" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物废水2#</label><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">污染物种类</label> <input type="text" class="form-control" name="WSCL_WASTE_WATER2_POLLUTION_TYPE" placeholder="" required>
						</div>
						<div class="col-xs-12">
							<label for="InputName">处理流程</label> <input type="text" class="form-control" name="WSCL_WASTE_WATER2_PROCESSING" placeholder="进水->" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物废水3#</label><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">污染物种类</label> <input type="text" class="form-control" name="WSCL_WASTE_WATER3_POLLUTION_TYPE" placeholder="" required>
						</div>
						<div class="col-xs-12">
							<label for="InputName">处理流程</label> <input type="text" class="form-control" name="WSCL_WASTE_WATER3_PROCESSING" placeholder="进水->" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">综合处理工艺流程简介</label> <input type="text" class="form-control" name="WSCL_GENERAL_PROCESSING_PROCEDURE" placeholder="进水->" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">影响废水设施稳定运行的制约因素</label> <input type="text" class="form-control" name="WSCL_STABILITY_INFLUENCE_FACTOR" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">设施事故数量(个)</label> <input type="number" class="form-control" name="WSCL_MUD_PRODUCTION" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">污泥产生量(t/d)含水率80%</label> <input type="number" class="form-control" name="WSCL_MUD_PRODUCTION" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">污泥是否属于危废</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="WSCL_MUD_Y/N_DANGEROUS_WASTE" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="WSCL_MUD_Y/N_DANGEROUS_WASTE" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">污泥排放去处</label> <input type="text" class="form-control" name="WSCL_MUD_DISCHARGE_PLACE" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">非常规工况废水处理措施</label> <input type="text" class="form-control" name="WSCL_ABNORMAL_WASTE_PROCESSING_METHOD" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">标准化排放口设置</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="WSCL_Y/N_STANDARD_DISCHARGE_OUTLET" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="WSCL_Y/N_STANDARD_DISCHARGE_OUTLET" value="0" placeholder="" required><br/><br/>
						</div>
						<div class="col-xs-6">
							<label for="InputName">是否对污水进行日常监测</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="WSCL_Y/N_DAILY_MONITORING" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="WSCL_Y/N_DAILY_MONITORING" value="0" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">在线仪表设置情况</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;流量</label><input type="checkbox" name="WSCL_ONLINE_INSTRUMENT_SETTING_DIS" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;pH</label><input type="checkbox" name="WSCL_ONLINE_INSTRUMENT_SETTING_PH" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;COD</label><input type="checkbox" name="WSCL_ONLINE_INSTRUMENT_SETTING_COD" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;NH3</label><input type="checkbox" name="WSCL_ONLINE_INSTRUMENT_SETTING_NH" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;Cu</label><input type="checkbox" name="WSCL_ONLINE_INSTRUMENT_SETTING_CU" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;Ni</label><input type="checkbox" name="WSCL_ONLINE_INSTRUMENT_SETTING_NI" placeholder=""><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">何种监测手段</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;在线监测</label><input type="radio" name="WSCL_WHICH_MONITOR_METHOD" value="在线监测" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;人工监测</label><input type="radio" name="WSCL_WHICH_MONITOR_METHOD" value="人工监测" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;人工与自动监测结合</label><input type="radio" name="WSCL_WHICH_MONITOR_METHOD" value="人工与自动监测结合" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">请提供相应的管理文件及监测标准</label>
							<input type="file" name="" value=""><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">循环经济</h3><br/>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">是否使用再生水、梯级利用或重要资源回收技术</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;再生水回用</label><input type="checkbox" name="XHJJ_Y/N_RESYCLE_WATER" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;废水梯级利用</label><input type="checkbox" name="XHJJ_Y/N_RUNDLE" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;重要资源回收</label><input type="checkbox" name="XHJJ_Y/N_RESOUCE_RESYCLE" placeholder=""><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">再生水制备工艺</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;膜滤法</label><input type="checkbox" name="XHJJ_Y/N_WATER_RESYCLE_METHOD1" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;活性炭吸附法</label><input type="checkbox" name="XHJJ_Y/N_WATER_RESYCLE_METHOD2" placeholder="">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;高级氧化法</label><input type="checkbox" name="XHJJ_Y/N_WATER_RESYCLE_METHOD3" placeholder=""><br/>
						</div>
						<div class="col-xs-6">
							<label>多方法联用</label> <input type="text" class="form-control" name="XHJJ_Y/N_WATER_RESYCLE_METHOD4" placeholder="" >
						</div>
						<div class="col-xs-6">
							<label>其它方法</label> <input type="text" class="form-control" name="XHJJ_Y/N_WATER_RESYCLE_METHOD5" placeholder="" ><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">再生水回用用途</label> <input type="text" class="form-control" name="XHJI_WATER_RESYCLE_REUSE" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">回用量(t/年)</label> <input type="number" class="form-control" name="XHJI_WATER_RESYCLE_REUSE_SIZE" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">回用收益(万元/年)</label> <input type="number" class="form-control" name="XHJI_WATER_RESYCLE_REUSE_PROFIT" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">净水减耗量(m^3/年)</label> <input type="number" class="form-control" name="XHJI_WATER_REDUCTION" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">废水梯级利用用途</label> <input type="text" class="form-control" name="XHJI_WASTE_WATER_STAIRE_USE" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">梯级利用量(t/年)</label> <input type="number" class="form-control" name="XHJI_WASTE_WATER_STAIRE_USE_SIZE" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">梯级利用收益(万元/年)</label> <input type="number" class="form-control" name="XHJI_WASTE_WATER_STAIRE_USE_PROFIT" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">废水减排量(m^3/年)</label> <input type="number" class="form-control" name="XHJI_WASTE_WATER_REDUCTION" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">废水、废液中金属类、有机物、无机物等资源</label>
						</div>
						<div class="col-xs-3">
							<label for="InputName">回收种类</label> <input type="text" class="form-control" name="XHJI_WASTE_WATER_RESOURCE_RESYCLE_TYPE" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">回收方法</label> <input type="text" class="form-control" name="XHJI_WASTE_WATER_RESOURCE_RESYCLE_METHOD" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">资源回收量(t/年)</label> <input type="number" class="form-control" name="XHJI_WASTE_WATER_RESOURCE_RESYCLE_CAPACITY" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">资源回收收益(万元/年)</label> <input type="number" class="form-control" name="XHJI_WASTE_WATER_RESOURCE_RESYCLE_PROFIT" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">废水减排量(m^3/年)</label> <input type="number" class="form-control" name="XHJI_WASTE_WATER_RESOURCE_REDUCTION" placeholder="" required><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">事故处理</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否实现了雨污分离</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="SGCLI_Y/N_RAIN_AND_WASTE_SEPERATION" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="SGCLI_Y/N_RAIN_AND_WASTE_SEPERATION" value="0" placeholder="" required><br/><br/>
						</div>
						<div class="col-xs-6">
							<label for="InputName">是否实现了生活污水与工业污水的分离</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="SGCL_Y/N_LIFEWASTE_INDUSTIRALWASTE_SEPERATION" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="SGCL_Y/N_LIFEWASTE_INDUSTIRALWASTE_SEPERATION" value="0" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否设置了事故水池</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="SGCL_Y/N_ACCIDENT_POOL" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="SGCL_Y/N_ACCIDENT_POOL" value="0" placeholder="" required><br/><br/>
						</div>
						<div class="col-xs-6">
							<label for="InputName">事故水池容积(m^3)</label> <input type="number" class="form-control" name="SGCL_Y/N_ACCIDENT_POOL_VOLUME" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">其他相关事宜</label> <input type="text" class="form-control" name="SGCL_OTHER" placeholder=""><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">企业水管理文件</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业ISO文件</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="GLWJ_Y/N_ISO" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="GLWJ_Y/N_ISO" value="0" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label>
							<input type="file" name="" value=""><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业环评文件</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="GLWJ_Y/N_ENVIRONMENT_EVALUATE" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="GLWJ_Y/N_ENVIRONMENT_EVALUATE" value="0" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label>
							<input type="file" name="" value=""><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">公司水污染管理措施文件(包括污水预处理管理规定、污水再生循环管理办法等)</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="GLWJ_Y/N_COMPANY_POLLUTION_MANAGEMENT" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="GLWJ_Y/N_COMPANY_POLLUTION_MANAGEMENT" value="0" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label>
							<input type="file" name="" value=""><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业污水处理设计文件</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="GLWJ_Y/N_COMPANY_POLLUTION_MANAGEMENT" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="GLWJ_Y/N_COMPANY_POLLUTION_MANAGEMENT" value="0" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label>
							<input type="file" name="" value=""><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业能源审计文件</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="GLWJ_Y/N_RESOURCE_AUDIT" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="GLWJ_Y/N_RESOURCE_AUDIT" value="0" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label>
							<input type="file" name="" value=""><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">污水预处理中控图</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="GLWJ_Y/N_WASTE_WATER_PREPROCESSING_DIAGRAM" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="GLWJ_Y/N_WASTE_WATER_PREPROCESSING_DIAGRAM" value="0" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label>
							<input type="file" name="" value=""><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">水污染日常监测管理文件</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="GLWJ_Y/N_WASTE_WATER_DAILY_VALIDATION" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="GLWJ_Y/N_WASTE_WATER_DAILY_VALIDATION" value="0" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label>
							<input type="file" name="" value=""><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">其他环境管理文件</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="GLWJ_Y/N_OTHER_MANAGEMENT" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="GLWJ_Y/N_OTHER_MANAGEMENT" value="0" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label>
							<input type="file" name="" value=""><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">有无环境污染事故应急预案</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;是</label><input type="radio" name="GLWJ_Y/N_POLLUTION_ACCIDENT_EMERGENCY" value="1" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="radio" name="GLWJ_Y/N_POLLUTION_ACCIDENT_EMERGENCY" value="0" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如果已建立应急预案，请提供文件</label>
							<input type="file" name="" value=""><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">企业废水达标排放存在的困难</label>
							<textarea class="textarea form-control input-lg" rows="5" name="GLWJ_DIFFICULTY" title=""></textarea><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">企业对目前法律法规、政策和管理措施的疑异，在实施过程中的障碍</label>
							<textarea class="textarea form-control input-lg" rows="5" name="GLWJ_QUESTION_OBSTACLE" title=""></textarea><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">企业从政府或管理部门处希望得到的支持</label>
							<textarea class="textarea form-control input-lg" rows="5" name="GLWJ_GOVERMENT_SUPPORT" title=""></textarea><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">其他</h3><br/>
					<div class="col-xs-12">
						<textarea class="textarea form-control input-lg" rows="5" name="OTHER" title=""></textarea><br/>
					</div>

					<h1 align="center"><input class="btn btn-primary" type="submit" name="submit"/></h1>

				</form>
			</div>
			<div class="col-lg-3"></div>

			</div>

  			</div> <!-- /container -->
  		</body>

  		</html>

