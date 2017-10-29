<?php
header("Content-Type: text/html;  charset=ISO-8859-1",true);
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

error_reporting(0);
session_start();
require_once("sql_helper/db.php");

if(isset($_POST['submit'])){
	$name = $_POST['uname'];
	$pass = md5($_POST['pass']);

	$query = "select * from user where uname='{$name}' and password='{$pass}'";
	$result = mysqli_query($db_con, $query);
	if(mysqli_num_rows($result) == 1){
		$_SESSION['name'] = $name;
		if($name == "admin"){
			$_SESSION['type']="admin";
		}
		header('Location: manage.php');
	}
	else{
		$err = "Invalid username or password";
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/lib/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/lib/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/lib/jquery.bxslider/jquery.bxslider.css" />
	<link rel="stylesheet" type="text/css" href="assets/lib/owl.carousel/owl.carousel.css" />
	<link rel="stylesheet" type="text/css" href="assets/lib/jquery-ui/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/animate.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />
	<title></title>
</head>
<style type="text/css" media="screen">
html, body {
	height: 100%;
	margin: 0px;
	padding: 0px;
	background-color: #FAFAFA; 
}
</style>
<body>

	<div class="container">
		<header>
			<h1><br></h1>
		</header>

		<div id="nav-top-menu" class="nav-top-menu">
			<div class="container">
				<div class="row">

					<div id="main-menu" class="col-sm-9 main-menu">
						<nav class="navbar navbar-default">
							<div class="container">

								<form action="logout.php">
									<div id="navbar">
										<ul class="nav navbar-nav">

											<li class="active" style="margin-left: 25px;">
												<a >
													<input type="submit" value="VOLTAR" id="logout_button">
												</a>
											</li>

										</ul>
									</div><!--/.nav-collapse -->
								</form>

							</div>
						</nav>
					</div>

				</div>     
			</div>
		</div>	
	</div>	


	<!-- page wapper-->
	<div class="columns-container">
		<div class="container" id="columns">
			<!-- ../page heading-->
			<div class="page-content">
				<div class="row" style=" display: table; height: 100%; margin: 0 auto;">


					<div class="" style="display: table-cell; vertical-align: middle; background-color: white; ">
						<div class="" style="border: 1px solid #c0c0c0; padding: 40px;">
							<h3>Já é cadastrado?</h3>

							<form action="login.php" method="post" style="width: 300px;">
								<?php echo $err; ?>
								<br /><br />

								<label for="uname" type="text" name="uname" id="uname">Email</label>
								<input type="text" name="uname" id="uname" class="form-control">
								<br />
								<label for="pass" type="password" name="pass" id="pass">Senha</label>
								<input type="password" name="pass" id="pass" class="form-control">
								<br />
								<p class="forgot-pass"><a href="#">Esqueceu sua senha?</a></p>
								<br />
								<button class="button" type="submit" value="Login" name="submit"><i class="fa fa-lock"></i> Entrar</button>
							</form>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
	<!-- ./page wapper-->


</body>
</html>