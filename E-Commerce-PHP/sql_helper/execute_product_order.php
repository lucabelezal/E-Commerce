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

$id_user = utf8_decode($_POST['id_user']);
$name_user = utf8_decode($_POST['name_user']);
$cpf_user = utf8_decode($_POST['cpf_user']);
$random_string = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
$number_order = $random_string;
$payment = utf8_decode($_POST['payment']);


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


$sql = "INSERT INTO `product_order`(id_user,name_user, cpf_user, number_order, payment) 
        VALUES ('$id_user','$name_user','$cpf_user','$number_order', '$payment');";

if ($conn->query($sql) === TRUE) {

	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Pedido realizado com sucesso!')
    window.location.href='http://localhost:8888/E-Commerce/E-Commerce-PHP/finish_order.php';
    </SCRIPT>");

}else {
	echo "Error: " . $sql . "<br>" . $conn->error;
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
		<br />
		<a href="http://localhost:3306/E-Commerce/E-Commerce-PHP/">Voltar</a>
	</div>
</body>
</html>
