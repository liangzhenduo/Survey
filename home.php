<?php
	session_start();
	include "connectdb.php";
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

    <title>污水处理管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#myModal").on('show.bs.modal', function(event){
				var button = $(event.relatedTarget);  // Button that triggered the modal
				var titleData = button.data('title'); // Extract value from data-* attributes
				$(this).find('.modal-title').text(titleData);
			});
		});
	</script>
	<style type="text/css">
		.bs-example{
			margin: 20px;
		}
	</style>

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
              <li ><a href="#" data-toggle="modal" data-target="#about"  data-title="About">关于<span class="glyphicon glyphicon-info-sign"></span></a></li>
              <li><a href="#" data-toggle="modal" data-target="#myModal"  data-title="Contact Us">联系我们<span class="glyphicon glyphicon-earphone"></span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              
              <li><a href="ranklist.php?id=1">Ranklist <span class="glyphicon glyphicon-list-alt"></span></a></li>

              <?php 
              	if(isset($_SESSION['username'])){
              ?>
              <li><a href="user.php">User<span class="glyphicon glyphicon-user"></span></a></li>
              <li><a href="logout.php">注销&nbsp;<b><?php echo "(".$_SESSION['username'].")";?></b> <span class="glyphicon glyphicon-off"></span></a></li>
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
	  
		<div style="background: #10bbf1" class="jumbotron">
			<span style="color: white; "><h2 align="center">天津市环境保护科学研究院</h2><br>
				<h1 align="center">工业园区污水处理管理系统</h1><br>

			<?php
				if(isset($_SESSION['username'])){
					$username=$_SESSION['username'];
					$query="select `type` from user_info where username='$username'";
					$result = mysqli_query($con,$query);
					$row =mysqli_fetch_array($result);
					$res=$row[0];
			?>

			<div class="rows">
				<div class="col-lg-12" style="height:100px"></div>
			</div>
				<?php if($res==1||$res==0){?>
					<div class="col-lg-4">
						<a href="Company.php" class="btn btn-primary btn-lg btn-block active" name="but_c">排污企业调查表</a>
					</div>
				<?php }else{?>
					<div class="col-lg-4">
						<a href="Company.php" class="btn btn-primary btn-lg btn-block disabled" name="but_c">排污企业调查表</a>
					</div>

				<?php }
				if($res==2||$res==0){?>
			<div class="col-lg-4">
				<a href="SewageTreatment.php" class="btn btn-primary btn-lg btn-block active" name="but_s" >运营商调查表</a>
			</div>
				<?php }else{?>
					<div class="col-lg-4">
						<a href="SewageTreatment.php" class="btn btn-primary btn-lg btn-block disabled" name="but_s" >运营商调查表</a>
					</div>

				<?php }
				if($res==3||$res==0){?>
			<div class="col-lg-4">
				<a href="IndustrialPark.php" class="btn btn-primary btn-lg btn-block active" name="but_i">管委会调查表</a>
			</div>
				<?php }else{?>
					<div class="col-lg-4">
						<a href="IndustrialPark.php" class="btn btn-primary btn-lg btn-block disabled" name="but_i">管委会调查表</a>
					</div>
				<?php }?>

			<div class="col-lg-12" style="height:100px"></div>

			<?php
				}else{ //未登录
			?>

			<div class="rows">
				<div class="col-lg-12" style="height:100px"></div>
			</div>
			<div class="rows"><div class="col-lg-4"></div>
  			<div class="col-lg-2">
  				<a href="signin.php" class="btn btn-primary btn-lg btn-block" name="signin">登录</a>
			</div>
			<div class="col-lg-2">
  				<a href="signup.php" class="btn btn-lg btn-primary btn-block" name="signup" >注册</a>
  			</div>
  			<div class="col-lg-4"></div>
  			<div class="rows">
				<div class="col-lg-12" style="height:100px"></div>
			</div>
			<?php
				}
			?>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
				<h3><ul class="nav navbar-nav navbar-right">
						<li><a class="page-scroll" href="#info"><span style="color: black; ">Info &nbsp;</span></a></li>
						<li><a class="page-scroll" href="#rules"><span style="color: black; ">Rules &nbsp;</span></a></li>
						<li><a class="page-scroll" href="#scoring"><span style="color: black; ">Scoring </span></a></li>
					</ul>
				</h3>	
			</div>
			
			</span>


		</section>
	</div><!--  container -->	
	
	<div id="about" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">About</h4>
                </div>
                <div class="modal-body">
					<p style="color:#dd6f00; font-size:18px">关于……
					</p>
                </div>
                
            </div>
        </div>
    </div>
	
		 <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">联系我们</h4>
                </div>
                <div class="modal-body">
					
					<p style="color:#dd6f00; font-size:18px">
						<a href="https://www.shintaku.cc/">https://www.shintaku.cc/</a>
						<br><br>
						<span class="glyphicon glyphicon-earphone"></span> 
						+86 22 12345678<br><br>
						<span class="glyphicon glyphicon-map-marker"> 
						 地址<br>
						
					</p>
				   
                </div>
                
            </div>
        </div>
    </div>
		
</body>
</html>
