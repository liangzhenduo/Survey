<?php
session_start();
$error='';
if (isset($_POST['submit'])) {
    include "connectdb.php";
    $username = $_POST['username'];
	$password = $_POST['password'];
	$username = htmlspecialchars($username);
	$password = htmlspecialchars($password);
	$query = "SELECT username, password FROM user_info WHERE `password`='$password' AND `username`='$username'";
	$result = mysqli_query($con, $query);
	$rows = mysqli_num_rows($result);
	if($rows > 0){
		$_SESSION['username'] = $username;
        header("location: home.php");
        exit;
	}
	else {
		$error="用户名或密码错误!";
	}
	mysqli_close($con);
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
    <link rel="icon" href="image/logo.gif">

    <title>调研数据库</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

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
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a class="navbar-brand" href="home.php">重点流域典型工业园区水污染防治及管理制度研究调研数据库</a></li>
                <!--li class="active"><a href="#" data-toggle="modal" data-target="#about"  data-title="关于">关于<span class="glyphicon glyphicon-info-sign"></span></a></li>
                <li class="active"><a href="#" data-toggle="modal" data-target="#myModal"  data-title="联系我们">联系我们<span class="glyphicon glyphicon-earphone"></span></a></li-->
            </ul>
            <ul class="nav navbar-nav navbar-right">

              <?php
              	if(isset($_SESSION['username'])){
              ?>
                    <li class="active"><a href="home.php">主页<span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="search.php">检索 <span class="glyphicon glyphicon-search"></span></a></li>
					<li><a href="user.php"><b><?php echo $_SESSION['username'] ?></b> <span class="glyphicon glyphicon-user"></span></a></li>
              		<li><a href="signout.php">注销 <span class="glyphicon glyphicon-off"></span></a></li>
              <?php 
              	}else{
              ?>
              	<li><a href="signup.php">注册<span class="glyphicon glyphicon-user"></span></a></li>
              <?php
              	}
              ?>

            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>


		<div style="background: #10bbf1" class="jumbotron">
			<span style="color: white; ">

				<div class="col-lg-12">
					<h1 align="center">重点流域典型工业园区水污染防治</h1>
				</div>
				<div class="col-lg-12">
					<h1 align="center">及管理制度研究调研数据库</h1><br>
				</div>

			<?php
				if(isset($_SESSION['username'])){
					include "connectdb.php";
					$username=$_SESSION['username'];
					$query="SELECT `type` FROM user_info WHERE username='$username'";
					$result = mysqli_query($con, $query);
					$row =mysqli_fetch_array($result);
					$type=$row[0];
			?>

				<div class="col-lg-12" style="height:40px"></div>

                    <div class="col-lg-4">
                        <a href="statistics/IndustrialPark.php" class="btn btn-primary btn-lg btn-block active" name="but_i">管委会数据统计</a>
                    </div>

                    <div class="col-lg-4">
                        <a href="statistics/SewageTreatment.php" class="btn btn-primary btn-lg btn-block active" name="but_s">污水处理厂数据统计</a>
                    </div>

                    <div class="col-lg-4">
                        <a href="statistics/Company.php" class="btn btn-primary btn-lg btn-block active" name="but_c">排污企业数据统计</a>
                    </div>

                    <div class="col-lg-12" style="height:40px"></div>

				<?php
					if($type==3||$type==0){ ?>
						<div class="col-lg-4">
							<a href="questionnaire/q_IndustrialPark.php" class="btn btn-primary btn-lg btn-block active" name="but_i">管委会现场调查表</a>
						</div>
				<?php
					}
                    else { ?>
						<div class="col-lg-4">
							<a class="btn btn-primary btn-lg btn-block disabled" name="but_i">管委会现场调查表</a>
						</div>
				<?php
					}
					if($type==2||$type==0){ ?>
                        <div class="col-lg-4">
                            <a href="questionnaire/q_SewageTreatment.php" class="btn btn-primary btn-lg btn-block active" name="but_s" >污水处理厂现场调查表</a>
                        </div>
				<?php
					}
					else { ?>
						<div class="col-lg-4">
							<a class="btn btn-primary btn-lg btn-block disabled" name="but_s">污水处理厂现场调查表</a>
						</div>
				<?php
					}
					if($type==1||$type==0){?>
						<div class="col-lg-4">
							<a href="questionnaire/q_Company.php" class="btn btn-primary btn-lg btn-block active" name="but_c">排污企业现场调查表</a>
						</div>
				<?php
                    }
                    else { ?>
						<div class="col-lg-4">
							<a class="btn btn-primary btn-lg btn-block disabled" name="but_c">排污企业现场调查表</a>
						</div>
				<?php
					} ?>

                    <div class="col-lg-12" style="height:20px"></div>

                <?php
                    if($type==3||$type==0) { ?>
                        <div class="col-lg-4">
                            <a href="questionnaire/i_IndustrialPark.php" class="btn btn-primary btn-lg btn-block active" name="but_i">管委会函件调查表</a>
                        </div>
                <?php
                    }
                    else { ?>
                        <div class="col-lg-4">
                            <a class="btn btn-primary btn-lg btn-block disabled" name="but_i">管委会函件调查表</a>
                        </div>
                <?php
                    }
					if($type==2||$type==0) { ?>
                        <div class="col-lg-4">
                            <a href="questionnaire/i_SewageTreatment.php" class="btn btn-primary btn-lg btn-block active" name="but_s" >污水处理厂函件调查表</a>
                        </div>
				<?php
					}
                    else { ?>
                        <div class="col-lg-4">
                            <a class="btn btn-primary btn-lg btn-block disabled" name="but_s" >污水处理厂函件调查表</a>
                        </div>
                <?php
                    } ?>
                        <div class="rows">
                            <div class="col-lg-4" style="height:80px"></div>
                        </div>

                <?php
                    if(isset($_GET['status']) && $_GET['status']==2){
                ?>
                    <div class="col-lg-4" style="height:100px">
                        <br><div class="alert alert-success" align="center">提交成功!</div>
                    </div>
                <?php
                    }else{
                ?>
                    <div class="col-lg-12" style="height:20px"></div>
                <?php
                    }
                }
                else{ //未登录
			    ?>
				<div class="rows">
					<div class="col-lg-4"></div>

					<div class="col-lg-4">
						<form class="form-signin" action="" method="post">
							<label for="inputEmail" >用户名</label>
							<input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required><br/>
							<label for="inputPassword">密码</label>
							<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>

							<br>
							<div class="rows">
								<div class="col-lg-6">
									<button class="submit btn btn-primary btn-lg btn-block" name="submit">登录</button>
								</div>
								<div class="col-lg-6">
									<a href="signup.php" class="btn btn-lg btn-primary btn-block" name="signup" >注册</a>
								</div>
							</div>
                            <br><br>

                            <?php
                            if($error!='')
                                echo "<br><div class=\"alert alert-danger \" align=\"center\">$error</div>";
                            else if(isset($_GET['status']) && $_GET['status']==1)
                                echo "<br><div class=\"alert alert-success\" align=\"center\">注册成功,请登录!</div>";
                            else
                                echo "<div class=\"col-lg-12\" style=\"height:80px\"></div>";
                            ?>

						</form>
					</div>

					<div class="col-lg-4"></div>

				</div>

			<?php
				}
			?>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div>
			
			</span>



	
	<div id="about" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">关于</h4>
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
						<span class="glyphicon glyphicon-home"><a href="http://www.taes.org/"> 天津市环境保护科学研究院</a><br>
						<span class="glyphicon glyphicon-earphone"> 86-22-87671609<br>
						<span class="glyphicon glyphicon-map-marker"> 天津市南开区复康路17号<br>
						<span class="glyphicon glyphicon-envelope"><a href=mailto:developtaes@163.com> developtaes@163.com</a><br>
					</p>
				   
                </div>
                
            </div>
        </div>
    </div>
		
</body>
</html>
