<?php
	error_reporting(0);
	session_start();
	require_once("db.php");

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
	<body>

		<div class="menu">
			<?php include 'header.html';?>
		</div>

		<!-- page wapper-->
		<div class="columns-container">
			<div class="container" id="columns">
				<!-- breadcrumb -->
				<div class="breadcrumb clearfix">
					<a class="home" href="#" title="Return to Home">Home</a>
					<span class="navigation-pipe">&nbsp;</span>
					<span class="navigation_page">Autenticação</span>
				</div>
				<!-- ./breadcrumb -->
				<!-- page heading-->
				<h2 class="page-heading">
					<span class="page-heading-title2">Autenticação</span>
				</h2>
				<!-- ../page heading-->
				<div class="page-content">
					<div class="row">
						<div class="col-sm-6">
							<div class="box-authentication">
								<h3>Criar conta</h3>
								<p>Digite seu endereço de e-mail para criar uma conta.</p>
								<label for="emmail_register">Email</label>
								<input id="emmail_register" type="text" class="form-control">
								<button class="button"><i class="fa fa-user"></i> Criar uma conta</button>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="box-authentication">
								<h3>Já é cadastrado?</h3>

								<form action="login.php" method="post">
									<?php echo $err; ?>
									<br /><br />

									<label for="uname" type="text" name="uname" id="uname">Email</label>
									<input type="text" name="uname" id="uname" class="form-control">

									<label for="pass" type="password" name="pass" id="pass">Senha</label>
									<input type="password" name="pass" id="pass" class="form-control">

									<p class="forgot-pass"><a href="#">Esqueceu sua senha?</a></p>
									<button class="button" type="submit" value="Login" name="submit"><i class="fa fa-lock"></i> Entrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ./page wapper-->

		<div class="footer">
			<?php include 'footer.html';?>
		</div>
	</body>
	</html>