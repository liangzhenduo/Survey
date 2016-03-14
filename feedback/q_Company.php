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
if($type!=0){
	header("location: ../home.php");
	exit;
}
if(isset($_GET['id'])) {
	$select = "SELECT * FROM CompanyQuestionnaire WHERE `ID`='$_GET[id]'";
	$result = mysqli_query($con, $select);
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

  					<h4 align="center">“重点流域典型工业园区水污染防治技术评估和管理制度研究”课题<br/>工业园区主要排污企业现场调查表</h4><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">调查人</label> <input type="text" class="form-control" name="INVESTIGATOR" placeholder="" value="<?php echo $rows[1] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">数据年限</label> <input type="text" class="form-control" name="REPORT_DATE" placeholder="" value="<?php echo $rows[2] ?>" disabled><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">企业信息</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业名称</label> <input type="text" class="form-control" name="QYXX_NAME" placeholder="" value="<?php echo $rows[3] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">行业类型</label> <input type="text" class="form-control" name="QYXX_TYPE" placeholder="" value="<?php echo $rows[4] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">占地面积</label> <input type="number" step="0.001" class="form-control" name="QYXX_AREA" placeholder="" value="<?php echo $rows[5] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">企业地址</label> <input type="text" class="form-control" name="QYXX_LOCATION" placeholder="" value="<?php echo $rows[6] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业主要产品</label> <input type="text" class="form-control" name="QYXX_PRODUCT" placeholder="" value="<?php echo $rows[7] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">生产规模(年产量)</label> <input type="number" step="0.001" class="form-control" name="QYXX_PRODUCTION" placeholder="" value="<?php echo $rows[8] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业环保联系人及电话</label> <input type="text" class="form-control" name="QYXX_CONTACT" placeholder="" value="<?php echo $rows[9] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">工业生产总值(万元)</label> <input type="number" step="0.001" class="form-control" name="QYXX_VALUE" placeholder="" value="<?php echo $rows[10] ?>" disabled><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">清洁生产</h3><br/>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">是否开展了清洁生产</label> <input type="text" class="form-control" name="QJSC_YN_CLEANPRODUCT" placeholder="" value="<?php echo $rows[11] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">主要原料消耗量(m^3/年)</label> <input type="number" step="0.001" class="form-control" name="QJSC_RAW_MATERIAL_CONSUMPTION" placeholder="" value="<?php echo $rows[12] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">年新水用量(m^3/年)</label> <input type="number" step="0.001" class="form-control" name="QJSC_NEW_WATER_CONSUMPTION" placeholder="" value="<?php echo $rows[13] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否有水梯级利用</label> <input type="text" class="form-control" name="QJSC_YN_WATER_RUNDLEUSE" placeholder="" value="<?php echo $rows[14] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">是否有再生水利用</label> <input type="text" class="form-control" name="QJSC_YN_WATER_REUSE" placeholder="" value="<?php echo $rows[15] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">梯级利用水量(m^3/年)</label> <input type="number" step="0.001" class="form-control" name="QJSC_RUNDLE_WATER_CONSUMPTION" placeholder="" value="<?php echo $rows[16] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">再生水用量(m^3/年)</label> <input type="number" step="0.001" class="form-control" name="QJSC_REUSE_WATER_CONSUMPTION" placeholder="" value="<?php echo $rows[17] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">年电耗量(kw/年)</label> <input type="number" step="0.001" class="form-control" name="QJSC_ELECTRICITY_CONSUMPTION" placeholder="" value="<?php echo $rows[18] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">其他能源耗量(如煤、油等)</label> <input type="text" class="form-control" name="QJSC_OTHER_ENERGY_CONSUMPTION" placeholder="" value="<?php echo $rows[19] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">生产工艺</label> <input type="text" class="form-control" name="QJSC_PRODUCTION_TECHNOLOGY" placeholder="" value="<?php echo $rows[20] ?>" disabled><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">污水处理</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否设置污水处理设施</label> <input type="text" class="form-control" name="WSCL_YN_SEWAGE_TREATMENT_FACILITY" placeholder="" value="<?php echo $rows[21] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">污水处理后的排放途径</label> <input type="text" class="form-control" name="WSCL_SEWAGE_DISCHARGE_PATH" placeholder="" value="<?php echo $rows[22] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12"><label for="InputName">如果实现了再生循环利用，请提供<br/> </label></div>
							<div class="col-xs-6">
								<label for="InputName">利用率(%)</label> <input type="number" step="0.001" max="100" class="form-control" name="WSCL_REUSE_UTILIZATION_RATIO" placeholder="" value="<?php echo $rows[23] ?>" disabled >
							</div>
							<div class="col-xs-6">
								<label for="InputName">再生循环利用管理办法</label> <input type="text" class="form-control" name="WSCL_REUSE_UTILIZATION_METHOD" placeholder="" value="<?php echo $rows[24] ?>" disabled ><br/>
							</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">设计水量(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="WSCL_PLAN_WATER_CONSUMPTION" placeholder="" value="<?php echo $rows[25] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">运行水量(m^3/d)</label> <input type="number" step="0.001" class="form-control" name="WSCL_RUN_WATER_CONSUMPTION" placeholder="" value="<?php echo $rows[26] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">占地面积(m^2)</label> <input type="number" step="0.001" class="form-control" name="WSCL_COVERY_AREA" placeholder="" value="<?php echo $rows[27] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">出水标准</label> <input type="text" class="form-control" name="WSCL_OUTPUT_WATER_STANDARD" placeholder="" value="<?php echo $rows[28] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">设施投资(万元)</label> <input type="number" step="0.001" class="form-control" name="WSCL_FACILITY_INVESTMENT" placeholder="" value="<?php echo $rows[29] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">年耗电量(kw/年)</label> <input type="number" step="0.001" class="form-control" name="WSCL_ELECTRICITY_CONSUMPTION" placeholder="" value="<?php echo $rows[30] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">加药种类</label> <input type="text" class="form-control" name="WSCL_MEDICINE_TYPE" placeholder="" value="<?php echo $rows[31] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">年药剂费(万元/年)</label> <input type="number" step="0.001" class="form-control" name="WSCL_MEDICINE_MONEY" placeholder="" value="<?php echo $rows[32] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">环保人员数量(人)</label> <input type="number" class="form-control" name="WSCL_PEOPLE" placeholder="" value="<?php echo $rows[33] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">电费价格(元/度)</label> <input type="number" step="0.01" class="form-control" name="WSCL_ELECTRISITY_MONEY_DEGREE" placeholder="" value="<?php echo $rows[34] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">人员平均工资(万元/年)</label> <input type="number" step="0.001" class="form-control" name="WSCL_SALARY_PEOPLE" placeholder="" value="<?php echo $rows[35] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">峰时排水量(m^3/h)</label> <input type="number" step="0.001" class="form-control" name="WSCL_WATER_DISCHARGE_PEAK" placeholder="" value="<?php echo $rows[36] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">调节池容积(m^3)</label> <input type="number" step="0.001" class="form-control" name="WSCL_ADJUST_POOL_VOLUME" placeholder="" value="<?php echo $rows[37] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">废气中的污染物</label> <input type="text" class="form-control" name="WSCL_POLLUTION_IN_WASTEGAS" placeholder="" value="<?php echo $rows[38] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">固废中的污染物</label> <input type="text" class="form-control" name="WSCL_POLLUTION_IN_WASTESOLID" placeholder="" value="<?php echo $rows[39] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">一般固废产生量(t/a)</label> <input type="number" step="0.001" class="form-control" name="WSCL_GENERAL_SOLID_PRODUCTION" placeholder="" value="<?php echo $rows[40] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">危险固废产生量(t/a)</label> <input type="number" step="0.001" class="form-control" name="WSCL_DANGEROUS_SOLID_PRODUCTION" placeholder="" value="<?php echo $rows[41] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">设施是否存在高温、高压条件</label> <input type="text" class="form-control" name="WSCL_YN_HIGH_TEMPREATURE_PRESSURE" placeholder="" value="<?php echo $rows[42] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物种类</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;重金属</label><input type="hidden" name="WSCL_TYPICAL_POLLUTION_ZHONG" value="0">
							<input type="checkbox" value="1" name="WSCL_TYPICAL_POLLUTION_ZHONG" placeholder="" <?php if($rows[43]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;盐类</label><input type="hidden" name="WSCL_TYPICAL_POLLUTION_YAN" value="0">
							<input type="checkbox" value="1" name="WSCL_TYPICAL_POLLUTION_YAN" placeholder="" <?php if($rows[44]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;难降解机物</label><input type="hidden" name="WSCL_TYPICAL_POLLUTION_NAN" value="0">
							<input type="checkbox" value="1" name="WSCL_TYPICAL_POLLUTION_NAN" placeholder="" <?php if($rows[45]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;放射性</label><input type="hidden" name="WSCL_TYPICAL_POLLUTION_FANG" value="0">
							<input type="checkbox" value="1" name="WSCL_TYPICAL_POLLUTION_FANG" placeholder="" <?php if($rows[46]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="hidden" name="WSCL_TYPICAL_POLLUTION_OTHER" value="0">
							<input type="checkbox" value="1" name="WSCL_TYPICAL_POLLUTION_OTHER" placeholder="" <?php if($rows[47]==1){ ?> checked <?php } ?> disabled><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">进水主要污染物浓度(mg/L)</label><br/>
						</div>
						<div class="col-xs-3">
							<label for="InputName">CODcr</label> <input type="number" step="0.001" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_COD" placeholder="" value="<?php echo $rows[48] ?>" disabled>
						</div>
						<div class="col-xs-3">
							<label for="InputName">BOD5</label> <input type="number" step="0.001" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_BOD" placeholder="" value="<?php echo $rows[49] ?>" disabled>
						</div>
						<div class="col-xs-3">
							<label for="InputName">TN</label> <input type="number" step="0.001" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_TN" placeholder="" value="<?php echo $rows[50] ?>" disabled>
						</div>
						<div class="col-xs-3">
							<label for="InputName">NH3-N</label> <input type="number" step="0.001" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_NH" placeholder="" value="<?php echo $rows[51] ?>" disabled>
						</div>
						<div class="col-xs-3">
							<label for="InputName">TP</label> <input type="number" step="0.001" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_TP" placeholder="" value="<?php echo $rows[52] ?>" disabled>
						</div>
						<div class="col-xs-3">
							<label for="InputName">SS</label> <input type="number" step="0.001" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_SS" placeholder="" value="<?php echo $rows[53] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">pH</label> <input type="number" step="0.1" max="14" class="form-control" name="WSCL_INPUT_PRIMARY_POLLUTION_DENSITY_PH" placeholder="" value="<?php echo $rows[54] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">进水特征污染物浓度(mg/L)</label><br/>
						</div>
						<div class="col-xs-4">
							<label for="InputName">重金属</label> <input type="number" step="0.001" class="form-control" name="WSCL_INPUT_TYPICAL_POLLUTION_DENSITY_ZHONG" placeholder="" value="<?php echo $rows[55] ?>" disabled>
						</div>
						<div class="col-xs-4">
							<label for="InputName">难降解机物</label> <input type="number" step="0.001" class="form-control" name="WSCL_INPUT_TYPICAL_POLLUTION_DENSITY_NAN" placeholder="" value="<?php echo $rows[56] ?>" disabled>
						</div>
						<div class="col-xs-4">
							<label for="InputName">盐类</label> <input type="number" step="0.001" class="form-control" name="WSCL_INPUT_TYPICAL_POLLUTION_DENSITY_YAN" placeholder="" value="<?php echo $rows[57] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">出水主要污染物浓度(mg/L)</label><br/>
						</div>
						<div class="col-xs-3">
							<label for="InputName">CODcr</label> <input type="number" step="0.001" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_COD" placeholder="" value="<?php echo $rows[58] ?>" disabled>
						</div>
						<div class="col-xs-3">
							<label for="InputName">BOD5</label> <input type="number" step="0.001" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_BOD" placeholder="" value="<?php echo $rows[59] ?>" disabled>
						</div>
						<div class="col-xs-3">
							<label for="InputName">TN</label> <input type="number" step="0.001" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_TN" placeholder="" value="<?php echo $rows[60] ?>" disabled>
						</div>
						<div class="col-xs-3">
							<label for="InputName">NH3-N</label> <input type="number" step="0.001" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_NH" placeholder="" value="<?php echo $rows[61] ?>" disabled>
						</div>
						<div class="col-xs-3">
							<label for="InputName">TP</label> <input type="number" step="0.001" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_TP" placeholder="" value="<?php echo $rows[62] ?>" disabled>
						</div>
						<div class="col-xs-3">
							<label for="InputName">SS</label> <input type="number" step="0.001" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_SS" placeholder="" value="<?php echo $rows[63] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">pH</label> <input type="number" step="0.1" max="14" class="form-control" name="WSCL_OUTPUT_PRIMARY_POLLUTION_DENSITY_PH" placeholder="" value="<?php echo $rows[64] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">出水特征污染物浓度(mg/L)</label><br/>
						</div>
						<div class="col-xs-4">
							<label for="InputName">重金属</label> <input type="number" step="0.001" class="form-control" name="WSCL_OUTPUT_TYPICAL_POLLUTION_DENSITY_ZHONG" placeholder="" value="<?php echo $rows[65] ?>" disabled>
						</div>
						<div class="col-xs-4">
							<label for="InputName">难降解机物</label> <input type="number" step="0.001" class="form-control" name="WSCL_OUTPUT_TYPICAL_POLLUTION_DENSITY_NAN" placeholder="" value="<?php echo $rows[66] ?>" disabled>
						</div>
						<div class="col-xs-4">
							<label for="InputName">盐类</label> <input type="number" step="0.001" class="form-control" name="WSCL_OUTPUT_TYPICAL_POLLUTION_DENSITY_YAN" placeholder="" value="<?php echo $rows[67] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物的管控途径</label> <input type="text" class="form-control" name="WSCL_POLLUTION_CONTROL_METHOD" placeholder="" value="<?php echo $rows[68] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物废水1#</label><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">污染物种类</label> <input type="text" class="form-control" name="WSCL_WASTE_WATER1_POLLUTION_TYPE" placeholder="" value="<?php echo $rows[69] ?>" disabled >
						</div>
						<div class="col-xs-12">
							<label for="InputName">处理流程</label> <input type="text" class="form-control" name="WSCL_WASTE_WATER1_PROCESSING" placeholder="" value="<?php echo $rows[70] ?>" disabled ><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物废水2#</label><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">污染物种类</label> <input type="text" class="form-control" name="WSCL_WASTE_WATER2_POLLUTION_TYPE" placeholder="" value="<?php echo $rows[71] ?>" disabled  >
						</div>
						<div class="col-xs-12">
							<label for="InputName">处理流程</label> <input type="text" class="form-control" name="WSCL_WASTE_WATER2_PROCESSING" placeholder="" value="<?php echo $rows[72] ?>" disabled ><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物废水3#</label><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">污染物种类</label> <input type="text" class="form-control" name="WSCL_WASTE_WATER3_POLLUTION_TYPE" placeholder="" value="<?php echo $rows[73] ?>" disabled  >
						</div>
						<div class="col-xs-12">
							<label for="InputName">处理流程</label> <input type="text" class="form-control" name="WSCL_WASTE_WATER3_PROCESSING" placeholder="" value="<?php echo $rows[74] ?>" disabled ><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">综合处理工艺流程简介</label> <input type="text" class="form-control" name="WSCL_GENERAL_PROCESSING_PROCEDURE" placeholder="" value="<?php echo $rows[75] ?>" disabled ><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">影响废水设施稳定运行的制约因素</label> <input type="text" class="form-control" name="WSCL_STABILITY_INFLUENCE_FACTOR" placeholder="" value="<?php echo $rows[76] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">设施事故数量(个)</label> <input type="number" class="form-control" name="WSCL_MUD_PRODUCTION" placeholder="" value="<?php echo $rows[77] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">污泥产生量(t/d)含水率80%</label> <input type="number" step="0.001" class="form-control" name="WSCL_MUD_PRODUCTION" placeholder="" value="<?php echo $rows[78] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">污泥是否属于危废</label> <input type="text" class="form-control" name="WSCL_MUD_YN_DANGEROUS_WASTE" placeholder="" value="<?php echo $rows[79] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">污泥排放去处</label> <input type="text" class="form-control" name="WSCL_MUD_DISCHARGE_PLACE" placeholder="" value="<?php echo $rows[80] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">非常规工况废水处理措施</label> <input type="text" class="form-control" name="WSCL_ABNORMAL_WASTE_PROCESSING_METHOD" placeholder="" value="<?php echo $rows[81] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">标准化排放口设置</label> <input type="text" class="form-control" name="WSCL_YN_STANDARD_DISCHARGE_OUTLET" placeholder="" value="<?php echo $rows[82] ?>" disabled><br/>
						</div>
						<div class="col-xs-6">
							<label for="InputName">是否对污水进行日常监测</label> <input type="text" class="form-control" name="WSCL_YN_DAILY_MONITORING" placeholder="" value="<?php echo $rows[83] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">在线仪表设置情况</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;流量</label><input type="hidden" name="WSCL_ONLINE_INSTRUMENT_SETTING_DIS" value="0">
							<input type="checkbox" value="1" name="WSCL_ONLINE_INSTRUMENT_SETTING_DIS" placeholder="" <?php if($rows[84]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;pH</label><input type="hidden" name="WSCL_ONLINE_INSTRUMENT_SETTING_PH" value="0">
							<input type="checkbox" value="1" name="WSCL_ONLINE_INSTRUMENT_SETTING_PH" placeholder="" <?php if($rows[85]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;COD</label><input type="hidden" name="WSCL_ONLINE_INSTRUMENT_SETTING_COD" value="0">
							<input type="checkbox" value="1" name="WSCL_ONLINE_INSTRUMENT_SETTING_COD" placeholder="" <?php if($rows[86]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;NH3</label><input type="hidden" name="WSCL_ONLINE_INSTRUMENT_SETTING_NH" value="0">
							<input type="checkbox" value="1" name="WSCL_ONLINE_INSTRUMENT_SETTING_NH" placeholder="" <?php if($rows[87]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;Cu</label><input type="hidden" name="WSCL_ONLINE_INSTRUMENT_SETTING_CU" value="0">
							<input type="checkbox" value="1" name="WSCL_ONLINE_INSTRUMENT_SETTING_CU" placeholder="" <?php if($rows[88]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;Ni</label><input type="hidden" name="WSCL_ONLINE_INSTRUMENT_SETTING_NI" value="0">
							<input type="checkbox" value="1" name="WSCL_ONLINE_INSTRUMENT_SETTING_NI" placeholder="" <?php if($rows[89]==1){ ?> checked <?php } ?> disabled><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">何种监测手段</label> <input type="text" class="form-control" name="WSCL_WHICH_MONITOR_METHOD" placeholder="" value="<?php echo $rows[90] ?>" disabled><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">循环经济</h3><br/>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">是否使用再生水、梯级利用或重要资源回收技术</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;再生水回用</label><input type="hidden" name="XHJJ_YN_RESYCLE_WATER" value="0">
							<input type="checkbox" value="1" name="XHJJ_YN_RESYCLE_WATER" placeholder="" <?php if($rows[91]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;废水梯级利用</label><input type="hidden" name="XHJJ_YN_RUNDLE" value="0">
							<input type="checkbox" value="1" name="XHJJ_YN_RUNDLE" placeholder="" <?php if($rows[92]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;重要资源回收</label><input type="hidden" name="XHJJ_YN_RESOUCE_RESYCLE" value="0">
							<input type="checkbox" value="1" name="XHJJ_YN_RESOUCE_RESYCLE" placeholder="" <?php if($rows[93]==1){ ?> checked <?php } ?> disabled><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">再生水制备工艺</label><br/>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;膜滤法</label><input type="hidden" name="XHJJ_YN_WATER_RESYCLE_METHOD1" value="0">
							<input type="checkbox" value="1" name="XHJJ_YN_WATER_RESYCLE_METHOD1" placeholder="" <?php if($rows[94]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;活性炭吸附法</label><input type="hidden" name="XHJJ_YN_WATER_RESYCLE_METHOD2" value="0">
							<input type="checkbox" value="1" name="XHJJ_YN_WATER_RESYCLE_METHOD2" placeholder="" <?php if($rows[95]==1){ ?> checked <?php } ?> disabled>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;高级氧化法</label><input type="hidden" name="XHJJ_YN_WATER_RESYCLE_METHOD3" value="0">
							<input type="checkbox" value="1" name="XHJJ_YN_WATER_RESYCLE_METHOD3" placeholder="" <?php if($rows[96]==1){ ?> checked <?php } ?> disabled><br/>
						</div>
						<div class="col-xs-6">
							<label>多方法联用</label> <input type="text" class="form-control" name="XHJJ_YN_WATER_RESYCLE_METHOD4" placeholder="" value="<?php echo $rows[97] ?>" disabled >
						</div>
						<div class="col-xs-6">
							<label>其它方法</label> <input type="text" class="form-control" name="XHJJ_YN_WATER_RESYCLE_METHOD5" placeholder="" value="<?php echo $rows[98] ?>" disabled ><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">再生水回用用途</label> <input type="text" class="form-control" name="XHJI_WATER_RESYCLE_REUSE" placeholder="" value="<?php echo $rows[99] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">回用量(t/年)</label> <input type="number" step="0.001" class="form-control" name="XHJI_WATER_RESYCLE_REUSE_SIZE" placeholder="" value="<?php echo $rows[100] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">回用收益(万元/年)</label> <input type="number" step="0.001" class="form-control" name="XHJI_WATER_RESYCLE_REUSE_PROFIT" placeholder="" value="<?php echo $rows[101] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">净水减耗量(m^3/年)</label> <input type="number" step="0.001" class="form-control" name="XHJI_WATER_REDUCTION" placeholder="" value="<?php echo $rows[102] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">废水梯级利用用途</label> <input type="text" class="form-control" name="XHJI_WASTE_WATER_STAIRE_USE" placeholder="" value="<?php echo $rows[103] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">梯级利用量(t/年)</label> <input type="number" step="0.001" class="form-control" name="XHJI_WASTE_WATER_STAIRE_USE_SIZE" placeholder="" value="<?php echo $rows[104] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">梯级利用收益(万元/年)</label> <input type="number" step="0.001" class="form-control" name="XHJI_WASTE_WATER_STAIRE_USE_PROFIT" placeholder="" value="<?php echo $rows[105] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">废水减排量(m^3/年)</label> <input type="number" step="0.001" class="form-control" name="XHJI_WASTE_WATER_REDUCTION" placeholder="" value="<?php echo $rows[106] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">废水、废液中金属类、有机物、无机物等资源</label>
						</div>
						<div class="col-xs-3">
							<label for="InputName">回收种类</label> <input type="text" class="form-control" name="XHJI_WASTE_WATER_RESOURCE_RESYCLE_TYPE" placeholder="" value="<?php echo $rows[107] ?>" disabled>
						</div>
						<div class="col-xs-3">
							<label for="InputName">回收方法</label> <input type="text" class="form-control" name="XHJI_WASTE_WATER_RESOURCE_RESYCLE_METHOD" placeholder="" value="<?php echo $rows[108] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">资源回收量(t/年)</label> <input type="number" step="0.001" class="form-control" name="XHJI_WASTE_WATER_RESOURCE_RESYCLE_CAPACITY" placeholder="" value="<?php echo $rows[109] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">资源回收收益(万元/年)</label> <input type="number" step="0.001" class="form-control" name="XHJI_WASTE_WATER_RESOURCE_RESYCLE_PROFIT" placeholder="" value="<?php echo $rows[110] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">废水减排量(m^3/年)</label> <input type="number" step="0.001" class="form-control" name="XHJI_WASTE_WATER_RESOURCE_REDUCTION" placeholder="" value="<?php echo $rows[111] ?>" disabled><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">事故处理</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否实现了雨污分离</label> <input type="text" class="form-control" name="SGCLI_YN_RAIN_AND_WASTE_SEPERATION" placeholder="" value="<?php echo $rows[112] ?>" disabled><br/>
						</div>
						<div class="col-xs-6">
							<label for="InputName">是否实现了生活污水与工业污水的分离</label> <input type="text" class="form-control" name="SGCL_YN_LIFEWASTE_INDUSTIRALWASTE_SEPERATION" placeholder="" value="<?php echo $rows[113] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否设置了事故水池</label> <input type="text" class="form-control" name="SGCL_YN_ACCIDENT_POOL" placeholder="" value="<?php echo $rows[114] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">事故水池容积(m^3)</label> <input type="number" step="0.001" class="form-control" name="SGCL_YN_ACCIDENT_POOL_VOLUME" placeholder="" value="<?php echo $rows[115] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">其他相关事宜</label> <input type="text" class="form-control" name="SGCL_OTHER" placeholder="" value="<?php echo $rows[116] ?>" disabled><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">企业水管理文件</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业ISO文件</label> <input type="text" class="form-control" name="GLWJ_YN_ISO" placeholder="" value="<?php echo $rows[117] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">企业环评文件</label> <input type="text" class="form-control" name="GLWJ_YN_ENVIRONMENT_EVALUATE" placeholder="" value="<?php echo $rows[118] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">公司水污染管理措施文件(污水预处理管理规定、污水再生循环管理办法等)</label> <input type="text" class="form-control" name="GLWJ_YN_COMPANY_POLLUTION_MANAGEMENT" placeholder="" value="<?php echo $rows[119] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业污水处理设计文件</label> <input type="text" class="form-control" name="GLWJ_YN_COMPANY_POLLUTION_DESIGN" placeholder="" value="<?php echo $rows[120] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">企业能源审计文件</label> <input type="text" class="form-control" name="GLWJ_YN_RESOURCE_AUDIT" placeholder="" value="<?php echo $rows[121] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">污水预处理中控图</label> <input type="text" class="form-control" name="GLWJ_YN_WASTE_WATER_PREPROCESSING_DIAGRAM" placeholder="" value="<?php echo $rows[122] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">水污染日常监测管理文件</label> <input type="text" class="form-control" name="GLWJ_YN_WASTE_WATER_DAILY_VALIDATION" placeholder="" value="<?php echo $rows[123] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">其他环境管理文件</label> <input type="text" class="form-control" name="GLWJ_YN_OTHER_MANAGEMENT" placeholder="" value="<?php echo $rows[124] ?>" disabled>
						</div>
						<div class="col-xs-6">
							<label for="InputName">有无环境污染事故应急预案</label> <input type="text" class="form-control" name="GLWJ_YN_POLLUTION_ACCIDENT_EMERGENCY" placeholder="" value="<?php echo $rows[125] ?>" disabled><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">企业废水达标排放存在的困难</label>
							<textarea class="textarea form-control input-lg" rows="5" name="GLWJ_DIFFICULTY" title="" disabled><?php echo $rows[126] ?></textarea><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">企业对目前法律法规、政策和管理措施的疑异，在实施过程中的障碍</label>
							<textarea class="textarea form-control input-lg" rows="5" name="GLWJ_QUESTION_OBSTACLE" title="" disabled><?php echo $rows[127] ?></textarea><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">企业从政府或管理部门处希望得到的支持</label>
							<textarea class="textarea form-control input-lg" rows="5" name="GLWJ_GOVERMENT_SUPPORT" title="" disabled><?php echo $rows[128] ?></textarea><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">其他</h3><br/>
					<div class="col-xs-12">
						<textarea class="textarea form-control input-lg" rows="5" name="OTHER" title="" disabled><?php echo $rows[129] ?></textarea><br/><br/>
					</div>

				</form>
			</div>
			<div class="col-lg-3"></div>

		</div>

	</div> <!-- /container -->
  </body>

</html>

<?php } ?>