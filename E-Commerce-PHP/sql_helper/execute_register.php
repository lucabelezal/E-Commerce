<?php	
header("Content-Type: text/html;  charset=ISO-8859-1",true);
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$full_name = utf8_decode($_POST['full_name']);
$cpf = utf8_decode($_POST['cpf']);
$cellphone = utf8_decode($_POST['cellphone']);
$cep = utf8_decode($_POST['cep']);
$full_adress = utf8_decode($_POST['full_adress']);
$adress_complement = utf8_decode($_POST['adress_complement']);
$email = utf8_decode($_POST['email_register']);
$password = utf8_decode($_POST['password_register']);
$MD5_password= md5($password);


$servername = "127.0.0.1:3306";
$username = "root";
$password = "root";
$dbname = "b_furniture";

$servidor = &$_SERVER["http://localhost:8888/"];
$redirect = $servidor."E-Commerce/E-Commerce-PHP/";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 


$sql = "INSERT INTO `client_user`(full_name, cpf, cellphone, cep, full_adress, adress_complement, email, password) VALUES ('$full_name','$cpf','$cellphone','$cep', '$full_adress','$adress_complement','$email', '$MD5_password');";

if ($conn->query($sql) === TRUE) {

	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Cadastro realizado com sucesso!')
    window.location.href='http://localhost:8888/E-Commerce/E-Commerce-PHP/login.php';
    </SCRIPT>");

}else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	echo $full_name;
	echo "</br>";
	echo $cpf;
	echo "</br>";
	echo $cellphone;
	echo "</br>";
	echo $cep;
	echo "</br>";
	echo $full_adress;
	echo "</br>";
	echo $adress_complement;
	echo "</br>";
	echo $email;
	echo "</br>";
	echo $password;
	echo "</br>";
	echo $MD5_password;
	echo "</br>";
	echo $query;
}
$conn->close();

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
