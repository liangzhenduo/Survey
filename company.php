<?php
session_start();
$error='';



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
	<link rel="icon" href="../image/photo.jpg">

	<title>企业调研表</title>

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
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

  		<div class="rows">
  			<div class="col-lg-3"></div>
  			<div class="col-lg-6">
  				<form class="form-signin" method="POST" action="#">

  					<h4 align="center">“重点流域典型工业园区水污染防治技术评估和管理制度研究”课题<br/>园区内主要排污企业的调研表</h4><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">调查人</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">数据年限</label> <input type="text" class="form-control" name="facebookid" required placeholder="2016-01-01"><br/>
						</div>
					</div>

					<br/><h3 align="center">企业信息</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业名称</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">行业类型</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">占地面积</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">企业地址</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业主要产品</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">生产规模（年产量）</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业环保联系人及电话</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">工业生产总值（万元）</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<br/><h3 align="center">清洁生产</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否开展了清洁生产</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">如果开展了清洁生产工作，请提供清洁生产审计报告（方案）</label> <br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">主要原料消耗量（m^3/年）</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">年新水用量（m^3/年）</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否有水梯级利用</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
						<div class="col-xs-6">
							<label for="InputName">是否有再生水利用</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">梯级利用水量（m^3/年）</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">再生水用量（m^3/年）</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">年电耗量（kw/年）</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">其他能源耗量（如煤、油等）</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">生产工艺</label> <input type="text" class="form-control" name="contact" placeholder="" required><br/>
						</div>
					</div>

					<br/><h3 align="center">污水处理</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否设置污水处理设施</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">请提供企业污水处理管理文件</label> <br/><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否设置污水处理设施</label><br/>
							<label>深度处理实现企业内部循环利用</label><input type="checkbox" name="contact" placeholder="" required>
							<label>排放至园区污水处理厂</label><input type="checkbox" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">如果实现了再生循环利用，请提供<br/> 1）利用率。<br/> 2）再生循环利用管理办法。</label> <br/><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">设计水量(m^3/d)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">运行水量(m^3/d)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">占地面积(m^2)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">出水标准</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">设施投资(万元)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">年耗电量(kw/年)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">加药种类</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">年药剂费(万元/年)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">环保人员数量(人)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">电费价格(元/度)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">人员平均工资(万元/年)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">峰时排水量(m^3/h)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">调节池容积(m^3)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">废气中的污染物</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">固废中的污染物</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">一般固废产生量(t/a)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">危险固废产生量(t/a)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">设施是否存在高温、高压条件</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">进水主要污染物浓度(mg/L)</label><br/>
							<label>重金属</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;盐类</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;难降解机物</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;放射性</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">进水主要污染物浓度(mg/L)</label><br/>
						</div>
						<div class="col-xs-3">
							<label for="InputName">CODcr</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">BOD5</label> <input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">TN</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">NH3-N</label> <input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">TP</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">SS</label> <input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">pH</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">进水特征污染物浓度(mg/L)</label><br/>
						</div>
						<div class="col-xs-4">
							<label for="InputName">重金属</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-4">
							<label for="InputName">难降解机物</label> <input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-4">
							<label for="InputName">盐类</label> <input type="text" class="form-control" name="contact" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">出水主要污染物浓度(mg/L)</label><br/>
						</div>
						<div class="col-xs-3">
							<label for="InputName">CODcr</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">BOD5</label> <input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">TN</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">NH3-N</label> <input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">TP</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">SS</label> <input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">pH</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">出水特征污染物浓度(mg/L)</label><br/>
						</div>
						<div class="col-xs-4">
							<label for="InputName">重金属</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-4">
							<label for="InputName">难降解机物</label> <input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-4">
							<label for="InputName">盐类</label> <input type="text" class="form-control" name="contact" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物的管控途径</label><br/>
							<label>车间管控</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;总排放口管控</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物废水1#</label><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">污染物种类</label> <input type="text" class="form-control" name="contact" placeholder="" required><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">处理流程</label><br/>
						</div>
						<div class="col-xs-2">
							<label for="InputName">进水</label>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物废水2#</label><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">污染物种类</label> <input type="text" class="form-control" name="contact" placeholder="" required><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">处理流程</label><br/>
						</div>
						<div class="col-xs-2">
							<label for="InputName">进水</label>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">特征污染物废水3#</label><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">污染物种类</label> <input type="text" class="form-control" name="contact" placeholder="" required><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">处理流程</label><br/>
						</div>
						<div class="col-xs-2">
							<label for="InputName">进水</label>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" name="facebookid" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">影响废水设施稳定运行的制约因素</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">设施事故数量(个)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">污泥产生量(t/d)含水率80%</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">污泥是否属于危废</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">污泥排放去处</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">非常规工况废水处理措施</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">标准化排放口设置</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
						<div class="col-xs-6">
							<label for="InputName">是否对污水进行日常监测</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">在线仪表设置情况</label><br/>
							<label>流量</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;pH</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;COD</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;NH3</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;Cu</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;Ni</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">何种监测手段</label><br/>
							<label>在线监测</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;人工监测</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;人工与自动监测结合</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">请提供相应的管理文件及监测标准</label><br/>
						</div>
					</div>

					<br/><h3 align="center">循环经济</h3><br/>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">是否使用再生水、梯级利用或重要资源回收技术</label><br/>
							<label>再生水回用</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;废水梯级利用</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;重要资源回收</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">再生水制备工艺</label><br/>
							<label>膜滤法</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;活性炭吸附法</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;高级氧化法</label><input type="checkbox" name="contact" placeholder="" required><br/>
						</div>
						<div class="col-xs-6">
							<label>多方法联用</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>其它方法</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">再生水回用用途</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">回用量(t/年)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">回用收益(万元/年)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">净水减耗量(m^3/年)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">废水梯级利用用途</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">梯级利用量(t/年)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">梯级利用收益(万元/年)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">废水减排量(m^3/年)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">废水、废液中金属类、有机物、无机物等资源</label>
						</div>
						<div class="col-xs-3">
							<label for="InputName">回收种类</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-3">
							<label for="InputName">回收方法</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">资源回收量(t/年)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">资源回收收益(万元/年)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label for="InputName">废水减排量(m^3/年)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<br/><h3 align="center">事故处理</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否实现了雨污分离</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
						<div class="col-xs-6">
							<label for="InputName">是否实现了生活污水与工业污水的分离</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">是否设置了事故水池</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
						</div>
						<div class="col-xs-6">
							<label for="InputName">事故水池容积(m^3)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">其他相关事宜</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/><br/>
						</div>
					</div>

					<br/><h3 align="center">企业水管理文件</h3><br/>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业ISO文件</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业环评文件</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">公司水污染管理措施文件</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>包括污水预处理管理规定、污水再生循环管理办法等；如有，请提供相关文件作为附件</label> <br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业污水处理设计文件</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">企业能源审计文件</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">污水预处理中控图</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">水污染日常监测管理文件</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">其他环境管理文件</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-6">
							<label for="InputName">有无环境污染事故应急预案</label><br/>
							<label>是</label><input type="checkbox" name="contact" placeholder="" required>
							<label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
						</div>
						<div class="col-xs-6">
							<label>如果已建立应急预案，请提供文件</label> <br/><br/><br/>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<label for="InputName">企业废水达标排放存在的困难</label>
							<textarea class="textarea form-control input-lg" rows="5" name="address" title=""></textarea><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">企业对目前法律法规、政策和管理措施的疑异，在实施过程中的障碍</label>
							<textarea class="textarea form-control input-lg" rows="5" name="address" title=""></textarea><br/>
						</div>
						<div class="col-xs-12">
							<label for="InputName">企业从政府或管理部门处希望得到的支持</label>
							<textarea class="textarea form-control input-lg" rows="5" name="address" title=""></textarea><br/>
						</div>
					</div>

					<br/><h3 align="center">其他</h3><br/>
					<div class="col-xs-12">
						<textarea class="textarea form-control input-lg" rows="5" name="address" title=""></textarea><br/>
					</div>

					<h1 align="center"><input class="btn btn-primary" type="submit" name="submit"/></h1>

				</form>
			</div>
			<div class="col-lg-3"></div>

			</div>

  			</div> <!-- /container -->


  			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  			<script src="ie10-viewport-bug-workaround.js"></script>
  		</body>

  		</html>

  		</html>

