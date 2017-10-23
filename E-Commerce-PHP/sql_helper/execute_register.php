<?php	
header("Content-Type: text/html;  charset=ISO-8859-1",true);
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
error_reporting(0);

$email = utf8_decode($_POST['email_register']);
$password = utf8_decode($_POST['password_register']);
$MD5_password= md5($password);


if(!isset($_POST['submit'])){
	header('Location: login.php');
}
$msg = "";

if($_POST['submit'] == "Criar uma conta"){
	$msg = register_user();
}

require_once("db.php");

$query = "INSERT INTO `user`(uname, password) 
VALUES ('$email', '$MD5_password');";

$result = mysqli_query($db_con, $query);

if($result){
	// $success_msg = "Cadastro realizado com sucesso!";
	// echo $success_msg;
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Cadastro realizado com sucesso!')
    window.location.href='http://localhost:8888/E-Commerce/E-Commerce-PHP/login.php';
    </SCRIPT>");
}else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

?>


<html>
<head>
	<title>Execute</title>
	<style type="text/css">
	div{
		width: 960px;
		margin-top: 20px;
		margin: auto;
	}
	img{
		max-width: 500px;
		max-height: 400px;
	}
</style>
</head>
<body>
	<div>
		<p><?php echo $msg; ?></p>
		<p><?php echo $nome; ?></p>
		<p><?php echo $senha; ?></p>
		<p><?php echo $md5_teste; ?></p>
		<br />
		<a href="http://localhost:3306/E-Commerce/E-Commerce-PHP/">Voltar</a>
	</div>
</body>
</html>
