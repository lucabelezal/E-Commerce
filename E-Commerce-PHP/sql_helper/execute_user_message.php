
<?php 

header("Content-Type: text/html;  charset=ISO-8859-1",true);
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$subject = utf8_decode($_POST['formSubject']);
$email = utf8_decode($_POST['email']);
$number_requested = utf8_decode($_POST['number_requested']);
$message = utf8_decode($_POST['message']);

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


$sql = "INSERT INTO `contact_us` (subject_message , email, number_requested, message)
VALUES ('$subject','$email','$number_requested','$message')";

if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    // sleep(1);
	// header("location:$redirect");
	echo '<script language="javascript">';
	echo 'alert("MENSAGEM ENVIADA COM SUCESSO!!!")';
	echo '</script>';
	echo "<script type='text/javascript'>window.top.location='http://localhost:8888/E-Commerce/E-Commerce-PHP/index.php';</script>"; exit;
	
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>