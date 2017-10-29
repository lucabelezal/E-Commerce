<?php
require_once("sql_helper/db.php");
$query = "select * from showroom";
$result = mysqli_query($db_con, $query);
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

	<title>Showroom</title>
</head>
<body>

	<div class="menu">
		<?php include 'include/header.html';?>
	</div>


	<div class="container">
		<div class="row" style="margin: 100px;">

			<table  class="table table-responsive table-bordered">

				<tr style="background: #eaeaea">
					<th>Identificação</th>
					<th>Estado</th>
					<th>Local</th>
					<th>Contato</th>
				</tr>

				<?php
				while ($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<td><?php echo $row["s_id"]; ?></td>
						<td><?php echo $row["district"]; ?></td>
						<td><?php echo $row["location"]; ?></td>
						<td><?php echo "0". $row["contact_no"]; ?></td>
					</tr>

				<?php } ?>

				</table>
				
			</div>
		</div>

		

		<div class="footer">
			<?php include 'include/footer.html';?>
		</div>


	</body>
	</html>


	<?php
	mysqli_close($db_con);
	?>