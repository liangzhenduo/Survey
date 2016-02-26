#问卷调查系统
##概述
**工业园区污水处理管理系统**是一个使用PHP开发的Web问卷调查系统，将其搭建在服务器端可以实现使受访者通过互联网提交问卷并在后台进行结果统计汇总的功能，极大地减少了人工录入数据的工作量。

##结构
本系统主要由以下页面构成：

+ 主页面 home.php
+ 登录界面 signin.php
+ 注册界面 signup.php
+ 问卷填写（5张问卷） q\_\*.php && i\_\*.php
+ 关键字检索页面 search.php
+ 问卷结果显示（5张问卷） q\_\*\_r.php && i\_\*\_r.php

后台数据库由以下表构成：

+ user_info
+ CompanyQuestionnaire
+ SewageTreatmentQuestionnaire
+ IndustrialParkQuestionnaire
+ SewageTreatmentInvestigation
+ IndustrialParkInvestigation

##过程
首先通过`index.php`索引页面跳转：如果已经登录则跳转到主页面`home.php`；如果未登录则跳转到系统登录界面`signin.php`，登录后跳转到主页面。

在登录界面设置有*登录*和*注册*按钮，可以通过*注册*按钮跳转到注册界面`signup.php`。

主页面在未登录时会显示*登录*和*注册*按钮；登录后会出现5张问卷的跳转按钮，并且会根据登录用户的类型将其对应可见的问卷按钮设为可用，而其他问卷按钮设为禁用，这样可以保证用户仅能访问其应答的问卷。当用户类型为管理员时，其有权限看到所有问卷，而且管理员有权限进入问卷检索界面`search.php`。

在问卷填写界面，每个字段对其可填写的内容进行了限制（如必须填写数字的地方不能填写其他字符，必填项目不能留空等）。另外，问卷中还包含了附件上传功能。

在问卷检索界面，当选择要检索的问卷类型和填写关键字后，会对数据库中单位的名称进行与关键字匹配并返回查询的结果，可以通过查看详细信息看到每份问卷的详细内容。

##推荐环境：LEMP（或LAMP）
若要正常运行本系统，首先确保服务器端已经安装以下环境：

+ Linux发行版
+ Nginx（或Apache）服务器
+ MySQL数据库
+ PHP

##安装
首先在MySQL数据库中建立新数据库`GYYQ_database`：

	CREATE DATABASE GYYQ_database;	
	
之后将`db`目录下的`.sql`文件导入到新建的数据库中：

	USE GYYQ_database;
	SOURCE GYYQ_database_2016-02-25.sql;

将本项目上传到服务器端Nginx/Apache的html目录下，然后修改`connectdb.php`：

	$con=mysqli_connect("localhost","root","password","GYYQ_database");
	
将`password`改为MySQL的root密码。

这时可以通过浏览器打开`index.php`，如果正常打开说明服务器设置正确。

再打开`connectdb.php`，如果没有出现错误则说明数据库连接成功。

于是可以使用管理员账户登录测试功能

+ 用户名：`admin`
+ 密码：`password` (由于初始密码较弱，请到数据库中修改）

如果一切正常则部署完成。