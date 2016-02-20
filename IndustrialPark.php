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
    <link rel="icon" href="image/photo.jpg">

    <title>主管部门调研表</title>

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

    <div class="rows">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <form class="form-signin" method="POST" action="#">

                <h4 align="center">“重点流域典型工业园区水污染防治技术评估和管理制度研究”课题<br/>工业园区管委会\园区环保主管部门</h4><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">调查人</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">数据年限</label> <input type="text" class="form-control" name="facebookid" required placeholder=""><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">基本情况</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区名称</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">主导行业类型</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区地址</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">上级主管部门</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区联系人</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">联系电话</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区占地面积(km^2)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">建立时间</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区内企业数量(个)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">已入园企业污水排放达标率(%)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">入园企业验收执行率</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">入园企业环评执行率(%)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">对园区企业准入考虑的环保因素（可多选）</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;所属行业</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;历史环境表现</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;拟建项目环评</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;产业政策</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生产工艺先进程度</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;园区规划环评结论</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;园区所在地环境功能区划</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="text" name="contact" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">年工业产值(亿元)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">使用循环水的企业数量(个)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区出让工业土地面积(km2)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区年税收额(万元)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区公共绿地比率(%)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">排污费征收额度(万元/年)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">企业污水排放执行标准（可多选）</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;GB8978-1996《污水综合排放标准》</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;地标《污水综合排放标准》</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;行业标准</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;《污水排入城镇下水道水质标准》CJ343-2010</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他标准</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;协议</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区用水量(万m^3/d)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工业用水售价(元/m^3)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区用水水源</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区排水水体</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">设置环保管理部门</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">是否制定了污水回用管理办法</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否将环境绩效纳入政府考核</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">是否建立了应急预案</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区一般固废产生量(t/a)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区危险固废产生量(t/a)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">排污收费的覆盖率/执行率(%)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">考核指标或方法(如单位工业年产值耗水量)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">对企业超标/违规排放的处罚措施</label><br/>
                        <label>有</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;如有处罚措施请列举</label><input type="text" name="contact" placeholder="" required><br/><br/>
                        <br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">对企业超标/违规排放的处罚措施</label><br/>
                        <label>有</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;处罚依据举</label><input type="text" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;处罚措施列举</label><input type="text" name="contact" placeholder="" required><br/><br/>
                        <br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区污水厂数量(个)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水处理厂建设和运行主体</label><br/>
                        <label>园区政府</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;第三方</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="checkbox" name="contact" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区污水厂设计规模(m^3/d)(若有多个，请分别填写)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运行模式</label><br/>
                        <label>BOT</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;TOT</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="checkbox" name="contact" placeholder="" required><br/><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区事故水池设置</label><br/>
                        <label>有</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">园区事故水池容积(m^3)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区污水收集、转输、监控技术</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区收水管网</label><br/>
                        <label>雨污合流</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;雨污分流</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水收集方式</label><br/>
                        <label>分类收集</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;非分类收集</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">生活污水与工业废水分流</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">工业废水分质分类收集</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">企业排放口数量(个)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">企业排放口监控量(个)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">特征污染物监控</label><br/>
                        <label>有</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网转输形式</label><br/>
                        <label>地上管廊</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;地埋式</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水管网监控点位(个)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">水质监控频次(次/月)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">污水管网节点监控指标</label><br/>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;流量</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;pH</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;温度</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;化学需氧量</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;生化需氧量</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;氨氮</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总氮</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;总磷</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;重金属</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;难降解有机物</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水管网投资来源</label><br/>
                        <label>政府</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;企业</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;第三方</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">污水管网维护费来源</label><br/>
                        <label>企业缴纳污水处理费</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;政府提供</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="checkbox" name="contact" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">再生回用水</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水回用</label><br/>
                        <label>有</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">环保部门设置的回用率目标(%)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水回用管道</label><br/>
                        <label>有</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;无</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">中水管网管材</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水管网运行费用(元/m^3水)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">中水管网投资来源</label><br/>
                        <label>政府</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;企业</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;第三方</label><input type="checkbox" name="contact" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">中水管网运行费用来源</label><br/>
                        <label>企业</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;政府提供</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">年回用水量(m^3/a)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水售价(元/m^3)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水建设投资费用(万元)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水厂或车间占地(m^2)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">运行费用(万元/a)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">制备再生水电耗(kWh/m^3)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">回用收益(万元/a)</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">投资回收期(a)</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水用途</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水厂进水水质标准</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">再生水厂出水水质标准</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">处理工艺流程简介（描述）</label> <input type="text" class="form-control" name="contact" placeholder="" required><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水厂是否稳定达标</label> <input type="text" class="form-control" name="facebookid" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">一般固废产生量(t/a)<br/>（膜组件寿命、废活性炭产生量等）</label> <input type="text" class="form-control" name="contact" placeholder="" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">再生水厂运行问题与建议</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">废水梯级利用</h3><br/>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">废水梯级利用形式</label><br/>
                        <label>企业内梯级利用</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;园区内企业间梯级利用</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="checkbox" name="contact" placeholder="" required><br/>
                        <label>如有企业间梯级利用请说明具体形式</label><input type="text" name="contact" placeholder="" required><br/><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">废水、废液中金属类、有机物、无机物等资源回收</h3><br/>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">资源回收途径</label><br/>
                        <label>企业自行回收</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;专业公司回收</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;其他</label><input type="checkbox" name="contact" placeholder="" required><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">资源回收种类</label> <input type="text" class="form-control" name="facebookid" placeholder="" required><br/><br/>
                    </div>
                </div>

                <br/><h3 align="center">园区水环境管理</h3><br/>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区的组织架构图</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区规划和规划环评文件，落实情况</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区回顾性环评文件</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区年度环境质量报告</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区是否实现了园区层面水资源梯级利用</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如果已实现，请提供相应管理文件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区是否制定了环境污染事故应急预案</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如果已制定，请提供应急预案</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区是否建立了水污染减排的奖惩制度</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区水收费管理情况（包含自来水、再生水、废水排放、污水处理厂接管收费）</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;如有，请提供相关文件作为附件</label> <br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区再生水管理文件</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">再生水管网概化图</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区水环境管理职责文件</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区企业准入文件及其落实情况</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区企业排污许可证制度</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">重点排污企业/国控企业的废水监测报告</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区年度发展报告</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区环境质量报告</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区及企业污染物总量控制数据</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">园区内主要企业的环评文件及验收批复文件（10家左右）</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;如有，请提供相关文件作为附件</label> <br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区管网设计文件</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区污水处理厂设计文件</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区地表水、地下水、气、声、固现状监测报告</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">污水梯级利用、再生利用的鼓励政策</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">废水中重要资源回收的鼓励政策</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否制定了园区清洁生产目标，实施情况</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如果已制定，请提供园区清洁生产比例及规划文件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">是否设定园区清洁生产奖惩制度</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区是否设置了污水总量控制要求</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如果设置了污水总量控制要求，请提供水环境管理规划</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区制定了污水排放的总量控制分配制度</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如果已经制定，请提供制度文件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区建设或扩建过程中，是否存在征地、拆迁之类的矛盾？有无圆桌会、协调会之类的沟通机制？</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">园区内的水环境信息是否向公众公开？主要通过哪些渠道和形式？</label><br/>
                        <label>是</label><input type="checkbox" name="contact" placeholder="" required>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;否</label><input type="checkbox" name="contact" placeholder="" required>
                    </div>
                    <div class="col-xs-6">
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="InputName">其他文件</label><br/>
                        <label>如有，请提供相关文件作为附件</label>
                    </div>
                    <div class="col-xs-6">
                        <label for="InputName">地方上针对水污染排放制定的特殊政策或标准</label><br/>
                        <label>如有，请提供相关文件作为附件</label> <br/><br/><br/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="InputName">第三方环保服务商进入情况，存在的主要问题</label>
                        <textarea class="textarea form-control input-lg" rows="5" name="address" title=""></textarea><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">园区对企业污水排放的监管措施，以及违规或超标排放的处罚措施</label>
                        <textarea class="textarea form-control input-lg" rows="5" name="address" title=""></textarea><br/>
                    </div>
                    <div class="col-xs-12">
                        <label for="InputName">国家或地方法律法规、政策、标准的落实情况及存在的问题，包括政策的合理性和政策实施的有效性</label>
                        <textarea class="textarea form-control input-lg" rows="5" name="address" title=""></textarea><br/><br/>
                    </div>
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

