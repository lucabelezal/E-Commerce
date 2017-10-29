<?php
header("Content-Type: text/html;  charset=ISO-8859-1",true);
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

error_reporting(0);
session_start();

require_once("sql_helper/db.php");

if(isset($_POST['submit'])){
	$email = $_POST['uname'];
	$password = md5($_POST['pass']);

	$query = "select * from client_user where email='{$email}' and password='{$password}'";
	$result = mysqli_query($db_con, $query);
	
	if(mysqli_num_rows($result) == 1){
		$_SESSION['email'] = $email;
		header('Location: finish_order.php');
	}
	else{
		$err = "E-mail ou Senha inválido.";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('E-mail ou Senha inválido.')
			window.location.href='http://localhost:8888/E-Commerce/E-Commerce-PHP/login.php';
			</SCRIPT>");
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
	<script type="text/javascript">
		function fMasc(objeto,mascara) {
			obj=objeto
			masc=mascara
			setTimeout("fMascEx()",1)
		}
		function fMascEx() {
			obj.value=masc(obj.value)
		}
		function mTel(tel) {
			tel=tel.replace(/\D/g,"")
			tel=tel.replace(/^(\d)/,"($1")
			tel=tel.replace(/(.{3})(\d)/,"$1)$2")
			if(tel.length == 9) {
				tel=tel.replace(/(.{1})$/,"-$1")
			} else if (tel.length == 10) {
				tel=tel.replace(/(.{2})$/,"-$1")
			} else if (tel.length == 11) {
				tel=tel.replace(/(.{3})$/,"-$1")
			} else if (tel.length == 12) {
				tel=tel.replace(/(.{4})$/,"-$1")
			} else if (tel.length > 12) {
				tel=tel.replace(/(.{4})$/,"-$1")
			}
			return tel;
		}
		function mCNPJ(cnpj){
			cnpj=cnpj.replace(/\D/g,"")
			cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
			cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
			cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
			cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
			return cnpj
		}
		function mCPF(cpf){
			cpf=cpf.replace(/\D/g,"")
			cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
			cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
			cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
			return cpf
		}
		function mCEP(cep){
			cep=cep.replace(/\D/g,"")
			cep=cep.replace(/^(\d{5})(\d)/,"$1-$2")
			cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
			return cep
		}
		function mNum(num){
			num=num.replace(/\D/g,"")
			return num
		}
	</script>
</head>
<body>

	<div class="menu">
		<?php include 'include/header.html';?>
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
							<p>Preencha as infomações para criar uma conta.</p>

							<form class="form_manager" action="sql_helper/execute_register.php" method="post">


								<div class="form-group">
									<label for="full_name">Nome Completo</label>
									<input  name="full_name" id="full_name" type="text" class="form-control">
								</div>

								<div class="form-group">
									<label for="cpf">CPF</label>
									<input name="cpf" maxlength="14" id="cpf" type="text" class="form-control" onkeydown="javascript: fMasc( this, mCPF );">
								</div>

								<div class="form-group">
									<label for="cellphone">Telefone Celular</label>
									<input name="cellphone" id="cellphone" type="text" class="form-control" onkeydown="javascript: fMasc( this, mTel );">
								</div>

								<div class="form-group">
									<label for="cep">CEP</label>
									<input name="cep" maxlength="9" id="cep" type="text" class="form-control" onkeydown="javascript: fMasc( this, mCEP );">
								</div>

								<div class="form-group">
									<label for="full_adress">Endereço Completo</label>
									<input name="full_adress" id="full_adress" type="text" class="form-control">
								</div>

								<div class="form-group">
									<label for="adress_complement">Complemento</label>
									<input name="adress_complement" id="adress_complement" type="text" class="form-control">
								</div>

								<div class="form-group">
									<label for="email_register">Email</label>
									<input name="email_register" id="email_register" type="text" class="form-control">
								</div>

								<div class="form-group">
									<label for="password_register">Senha</label>
									<input name="password_register" id="password_register" type="password" class="form-control">
								</div>


								<button class="button" type="submit" value="Criar uma conta" name="submit"><i class="fa fa-user"></i>Criar uma conta</button>

							</form>

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
		<?php include 'include/footer.html';?>
	</div>
</body>
</html>