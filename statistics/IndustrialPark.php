<?php
session_start();
$error='';
if(!isset($_SESSION['username'])){		//未登录
    header("location: ../home.php");
    exit;
}
include("../connectdb.php");
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

    <title>信息检索</title>

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
            <form class="form-signin" method="post" action="">

                <h2 class="form-signin-heading" align="center">信息检索</h2><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>排序依据</label>
                        <select class = "select form-control" name="PXYJ" title="">
                            <option value="IndustrialParkQuestionnaire.ID">默认</option>
                            <option value="JBQK_YEAR_PROFIT" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="JBQK_YEAR_PROFIT") echo "selected" ?> >年工业产值</option>
                            <option value="JBQK_TAX" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="JBQK_TAX") echo "selected" ?> >年税收额</option>
                            <option value="sum(WSCL_YN_SEWAGE_TREATMENT_FACILITY)/JBQK_NUMBER_COMPANY" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="sum(WSCL_YN_SEWAGE_TREATMENT_FACILITY)/JBQK_NUMBER_COMPANY") echo "selected" ?> >设置污水处理设施企业数/总企业数</option>
                            <option value="sum(QJSC_YN_CLEANPRODUCT)/JBQK_NUMBER_COMPANY" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="sum(QJSC_YN_CLEANPRODUCT)/JBQK_NUMBER_COMPANY") echo "selected" ?> >清洁生产比例</option>
                            <option value="sum(GLWJ_YN_ENVIRONMENT_EVALUATE)/JBQK_NUMBER_COMPANY" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="sum(GLWJ_YN_ENVIRONMENT_EVALUATE)/JBQK_NUMBER_COMPANY") echo "selected" ?> >环评比例</option>
                            <option value="ZSHY_RESCYCLE_WATER_VALUE" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="ZSHY_RESCYCLE_WATER_VALUE") echo "selected" ?> >再生水价格</option>
                            <option value="SGCL_YN_ACCIDENT_POOL_VOLUME/JBQK_WASTE_PROCESSING_SIZE" <?php if(isset($_POST['search'])&&$_POST['PXYJ']=="SGCL_YN_ACCIDENT_POOL_VOLUME/JBQK_WASTE_PROCESSING_SIZE") echo "selected" ?> >生产废水比例</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>排序方法</label>
                        <select class = "select form-control" name="PXFF" title="">
                            <option value="ASC" >升序</option>
                            <option value="DESC" <?php if(isset($_POST['search'])&&$_POST['PXFF']=="DESC") echo "selected" ?> >降序</option>
                        </select><br>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>园区级别</label>
                        <select class = "select form-control" name="YQJB" title="">
                            <option value="">不限</option>
                            <option value="国家级" <?php if(isset($_POST['search'])&&$_POST['YQJB']=="国家级") echo "selected" ?> >国家级</option>
                            <option value="省市级" <?php if(isset($_POST['search'])&&$_POST['YQJB']=="省市级") echo "selected" ?> >省市级</option>
                            <option value="区县级" <?php if(isset($_POST['search'])&&$_POST['YQJB']=="区县级") echo "selected" ?> >区县级</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>园区省份</label>
                        <select class = "select form-control" name="YQSF" title="">
                            <option value="">不限</option>
                            <option value="北京" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="北京") echo "selected" ?> >北京</option>
                            <option value="天津" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="天津") echo "selected" ?> >天津</option>
                            <option value="河北" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="河北") echo "selected" ?> >河北</option>
                            <option value="山西" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="山西") echo "selected" ?> >山西</option>
                            <option value="内蒙古" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="内蒙古") echo "selected" ?> >内蒙古</option>
                            <option value="辽宁" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="辽宁") echo "selected" ?> >辽宁</option>
                            <option value="吉林" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="吉林") echo "selected" ?> >吉林</option>
                            <option value="黑龙江" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="黑龙江") echo "selected" ?> >黑龙江</option>
                            <option value="上海" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="上海") echo "selected" ?> >上海</option>
                            <option value="江苏" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="江苏") echo "selected" ?> >江苏</option>
                            <option value="浙江" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="浙江") echo "selected" ?> >浙江</option>
                            <option value="安徽" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="安徽") echo "selected" ?> >安徽</option>
                            <option value="福建" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="福建") echo "selected" ?> >福建</option>
                            <option value="江西" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="江西") echo "selected" ?> >江西</option>
                            <option value="山东" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="山东") echo "selected" ?> >山东</option>
                            <option value="河南" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="河南") echo "selected" ?> >河南</option>
                            <option value="湖北" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="湖北") echo "selected" ?> >湖北</option>
                            <option value="湖南" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="湖南") echo "selected" ?> >湖南</option>
                            <option value="广东" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="广东") echo "selected" ?> >广东</option>
                            <option value="广西" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="广西") echo "selected" ?> >广西</option>
                            <option value="海南" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="海南") echo "selected" ?> >海南</option>
                            <option value="重庆" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="重庆") echo "selected" ?> >重庆</option>
                            <option value="四川" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="四川") echo "selected" ?> >四川</option>
                            <option value="贵州" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="贵州") echo "selected" ?> >贵州</option>
                            <option value="云南" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="云南") echo "selected" ?> >云南</option>
                            <option value="西藏" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="西藏") echo "selected" ?> >西藏</option>
                            <option value="陕西" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="陕西") echo "selected" ?> >陕西</option>
                            <option value="甘肃" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="甘肃") echo "selected" ?> >甘肃</option>
                            <option value="青海" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="青海") echo "selected" ?> >青海</option>
                            <option value="宁夏" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="宁夏") echo "selected" ?> >宁夏</option>
                            <option value="新疆" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="新疆") echo "selected" ?> >新疆</option>
                            <option value="香港" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="香港") echo "selected" ?> >香港</option>
                            <option value="澳门" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="澳门") echo "selected" ?> >澳门</option>
                            <option value="台湾" <?php if(isset($_POST['search'])&&$_POST['YQSS']=="台湾") echo "selected" ?> >台湾</option>
                        </select><br>
                    </div>
                </div><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>园区类型</label>
                        <select class = "select form-control" name="YQLX" title="">
                            <option value="">不限</option>
                            <option value="行业主导型" <?php if(isset($_POST['search'])&&$_POST['YQLX']=="行业主导型") echo "selected" ?> >行业主导型</option>
                            <option value="综合型" <?php if(isset($_POST['search'])&&$_POST['YQLX']=="综合型") echo "selected" ?> >综合型</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>主导行业</label>
                        <input type="text" class="form-control" placeholder="关键字" name="ZDHY" value=<?php if(isset($_POST['search'])) echo $_POST['ZDHY'] ?> ><br/>
                    </div><br>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>事故水池</label>
                        <select class = "select form-control" name="SGSC" title="">
                            <option value="">不限</option>
                            <option value="1" <?php if(isset($_POST['search'])&&$_POST['SGSC']=="1") echo "selected" ?> >有</option>
                            <option value="0" <?php if(isset($_POST['search'])&&$_POST['SGSC']=="0") echo "selected" ?> >无</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>事故水池位置</label>
                        <select class = "select form-control" name="SCWZ" title="">
                            <option value="">不限</option>
                            <option value="1" <?php if(isset($_POST['search'])&&$_POST['SCWZ']=="1") echo "selected" ?> >污水处理厂内</option>
                        </select><br>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>雨污分流</label>
                        <select class = "select form-control" name="YWFL" title="">
                            <option value="">不限</option>
                            <option value="雨污分流" <?php if(isset($_POST['search'])&&$_POST['YWFL']=="雨污分流") echo "selected" ?> >是</option>
                            <option value="雨污合流" <?php if(isset($_POST['search'])&&$_POST['YWFL']=="雨污合流") echo "selected" ?> >否</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>工业废水分质分类收集</label>
                        <select class = "select form-control" name="FZFL" title="">
                            <option value="">不限</option>
                            <option value="1" <?php if(isset($_POST['search'])&&$_POST['FZFL']=="1") echo "selected" ?> >是</option>
                            <option value="0" <?php if(isset($_POST['search'])&&$_POST['FZFL']=="0") echo "selected" ?> >否</option>
                        </select><br>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>生活污水和工业废水分流</label>
                        <select class = "select form-control" name="WSFL" title="">
                            <option value="">不限</option>
                            <option value="1" <?php if(isset($_POST['search'])&&$_POST['WSFL']=="1") echo "selected" ?> >是</option>
                            <option value="0" <?php if(isset($_POST['search'])&&$_POST['WSFL']=="0") echo "selected" ?> >否</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>中水回用管道</label>
                        <select class = "select form-control" name="ZSHY" title="">
                            <option value="">不限</option>
                            <option value="1" <?php if(isset($_POST['search'])&&$_POST['ZSHY']=="1") echo "selected" ?> >有</option>
                            <option value="0" <?php if(isset($_POST['search'])&&$_POST['ZSHY']=="0") echo "selected" ?> >无</option>
                        </select><br>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label>再生水回用用途</label>
                        <select class = "select form-control" name="HYYT" title="">
                            <option value="">不限</option>
                            <option value="地下水回灌" <?php if(isset($_POST['search'])&&$_POST['HYYT']=="地下水回灌") echo "selected" ?> >地下水回灌</option>
                            <option value="工业用水" <?php if(isset($_POST['search'])&&$_POST['HYYT']=="工业用水") echo "selected" ?> >工业用水</option>
                            <option value="冲洗、消防用水" <?php if(isset($_POST['search'])&&$_POST['HYYT']=="冲洗、消防用水") echo "selected" ?> >冲洗、消防用水</option>
                            <option value="绿化" <?php if(isset($_POST['search'])&&$_POST['HYYT']=="绿化") echo "selected" ?> >绿化</option>
                            <option value="建筑用水" <?php if(isset($_POST['search'])&&$_POST['HYYT']=="建筑用水") echo "selected" ?> >建筑用水</option>
                            <option value="景观用水" <?php if(isset($_POST['search'])&&$_POST['HYYT']=="景观用水") echo "selected" ?> >景观用水</option>
                            <option value="农林业" <?php if(isset($_POST['search'])&&$_POST['HYYT']=="建筑用水") echo "selected" ?> >农林业</option>
                            <option value="牧畜业" <?php if(isset($_POST['search'])&&$_POST['HYYT']=="景观用水") echo "selected" ?> >牧畜业</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label>企业间废水利用</label>
                        <select class = "select form-control" name="FSLY" title="">
                            <option value="">不限</option>
                            <option value="企业间" <?php if(isset($_POST['search'])&&$_POST['FSLY']=="企业间") echo "selected" ?> >是</option>
                        </select><br>
                    </div>
                </div><br/>

                <div class="col-xs-12">
                    <div class="col-xs-3"></div>
                    <div class="col-xs-6">
                        <h4 align="center"><button class="submit btn btn-primary btn-lg btn-block" name="search">检索</button></h4>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-3"></div>
        <?php

        if(isset($_POST['search'])) {
        $query = "SELECT JBQK_NAME, YQJB, YQSS, JBQK_YEAR_PROFIT, JBQK_TAX, YQLX, JBQK_TYPE, JBQK_YN_ACCIDENT_POOL, sum(YQWS_YN_ACCIDENT_POOL),
            sum(WSCL_YN_SEWAGE_TREATMENT_FACILITY)/JBQK_NUMBER_COMPANY, sum(QJSC_YN_CLEANPRODUCT)/JBQK_NUMBER_COMPANY,
            sum(GLWJ_YN_ENVIRONMENT_EVALUATE)/JBQK_NUMBER_COMPANY, YQCL_WATER_COLLECTION_NETWORK, YQCL_YN_COLLECTION_SEPERATION,
            YQCL_YN_INDUSTRIAL_LIFE_SEPERATION, ZSHY_YN_RESCYCLE_NETWORK, ZSHY_RESCYCLE_WATER_USAGE, FSTJ_USAGE, ZSHY_RESCYCLE_WATER_VALUE
            FROM IndustrialParkQuestionnaire LEFT JOIN SewageTreatmentQuestionnaire ON SewageTreatmentQuestionnaire.GYYQ_NAME LIKE concat('%',`JBQK_NAME`,'%')
            RIGHT JOIN CompanyQuestionnaire ON CompanyQuestionnaire.GYYQ_NAME LIKE concat('%',`JBQK_NAME`,'%')
            WHERE `YQJB` LIKE '%$_POST[YQJB]%' AND `YQSS` LIKE '%$_POST[YQSF]%' AND `YQLX` LIKE '%$_POST[YQLX]%'
            AND `JBQK_TYPE` LIKE '%$_POST[ZDHY]%' AND `JBQK_YN_ACCIDENT_POOL` LIKE '%$_POST[SGSC]%' AND `JBQK_ACCIDENT_POOL_VOLUME` LIKE '%$_POST[SCWZ]%'
            AND `YQCL_WATER_COLLECTION_NETWORK` LIKE '%$_POST[YWFL]%' AND `YQCL_YN_COLLECTION_SEPERATION` LIKE '%$_POST[FZFL]%' AND `YQCL_YN_INDUSTRIAL_LIFE_SEPERATION` LIKE '%$_POST[WSFL]%'
            AND `ZSHY_YN_RESCYCLE_NETWORK` LIKE '%$_POST[ZSHY]%' AND `ZSHY_RESCYCLE_WATER_USAGE` LIKE '%$_POST[HYYT]%' AND `FSTJ_USAGE` LIKE '%$_POST[FSLY]%'
            GROUP BY JBQK_NAME ORDER BY $_POST[PXYJ] $_POST[PXFF]";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        ?>
        <div class="rows">
            <div class="col-lg-12" style="height:20px"></div>
        </div>

    </div>
    <div class="rows">
        <div class="col-lg-12" ><h3 align="center"><br/>本次查询返回 <?php echo $rows ?> 条结果<br/></h3> </div>
    </div>

    <table class="table" border="1px">
        <thead>
        <tr>
            <th width="5%">园区名称</th>
            <th width="5%">级别</th>
            <th width="5%">省份</th>
            <th width="5%">年工业产值</th>
            <th width="5%">年税收额</th>
            <th width="5%">类型</th>
            <th width="5%">主导行业</th>
            <th width="5%">事故水池</th>
            <th width="5%">事故水池位置</th>
            <th width="5%">设置污水处理设施企业数/总企业数</th>
            <th width="5%">清洁生产比例</th>
            <th width="5%">环评比例</th>
            <th width="5%">雨污分流</th>
            <th width="5%">工业废水分质分类收集</th>
            <th width="5%">生活污水工业废水分流</th>
            <th width="5%">中水回用管道</th>
            <th width="5%">再生水回用用途</th>
            <th width="5%">企业间废水再利用</th>
            <th width="5%">再生水价格</th>
            <th width="5%">生产废水比例</th>
        </tr>
        </thead>
        <tbody>

        <?php
        while($rows = mysqli_fetch_array($result)) {
            ?>
            <tr >
                <td><?php echo $rows[0] ?></td>
                <td><?php echo $rows[1] ?></td>
                <td><?php echo $rows[2] ?></td>
                <td><?php echo $rows[3] ?></td>
                <td><?php echo $rows[4] ?></td>
                <td><?php echo $rows[5] ?></td>
                <td><?php echo $rows[6] ?></td>
                <td><?php echo $rows[7] ?></td>
                <td><?php echo $rows[8] ?></td>
                <td><?php echo $rows[9] ?></td>
                <td><?php echo $rows[10] ?></td>
                <td><?php echo $rows[11] ?></td>
                <td><?php echo $rows[12] ?></td>
                <td><?php echo $rows[13] ?></td>
                <td><?php echo $rows[14] ?></td>
                <td><?php echo $rows[15] ?></td>
                <td><?php echo $rows[16] ?></td>
                <td><?php echo $rows[17] ?></td>
                <td><?php echo $rows[18] ?></td>
                <td><?php echo "怎么算" ?></td>
            </tr>
        <?php }} ?>
        </tbody>
    </table>


</div> <!-- /container -->


</body>

</html>

