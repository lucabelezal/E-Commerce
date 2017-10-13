<?php
error_reporting(0);
session_start();

if($_SESSION['type'] != "admin"){
	header('Location: logout.php');
}

require_once("sql_helper/db.php");
$query_cat = "select * from category";
$result_cat1 = mysqli_query($db_con, $query_cat);
$result_cat2 = mysqli_query($db_con, $query_cat);
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

	<style>

	.form_manager {
		border:1px solid #ccc;
		margin: 25px;
		padding: 25px;
	}
</style>
</head>
<body>

	<div class="container">
		<header>
			<h1><br><br></h1>
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
													<input type="submit" value="SAIR" id="logout_button">
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

	<div class="container-fluid" style="background: #F1F1F1; margin: 100px;">

		<br />
		<hr /> 			
		<p class="intro">
			Gerenciador:
		</p>
		<hr />


		<form class="form_manager" action="sql_helper/execute.php" method="post">	

			<div class="form-group">
				<label>Adicionar uma categoria de produto:</label>
			</div>

			<div class="form-group">
				<label for="cat_name">Categoria:</label>
				<input class="form-control" type="text" name="cat_name" id="cat_name">
			</div>				
			<button class="btn btn-primary" type="submit" name="submit">ADICIONAR CATEGORIA</button>
		</form>



		<form class="form_manager" action="sql_helper/execute.php" method="post">
			<div class="form-group">					
				<label class="title">Excluir uma categoria de produto:</label>
			</div>
			<div class="class="form-group"">
				<label for="del_p_category">Selecione a Categoria:</label>
				<select class="form-control" name="del_p_category" id="del_p_category">

					<?php
					while ($row_cat = mysqli_fetch_assoc($result_cat1)) {
						$cat_id = $row_cat["c_id"];
						$category_name = $row_cat["c_name"];
						echo "<option value={$cat_id}>{$category_name}</option>";
					}
					mysqli_free_result($result_cat1);
					?>

				</select>
				<label>(A categoria deve estar vazia antes de ser excluída.)</label>
				<br />
			</div>
			<br />
			<button class="btn btn-primary" type="submit" name="submit">DELETAR CATEGORIA</button>
		</form>

		

		<form class="form_manager" action="sql_helper/execute.php" method="post" enctype="multipart/form-data">		

			<div class="form-group">
				<label class="title">Adicionar um Produto:</label>
			</div>
			
			<div class="form-group">
				<label for="image">Escolha uma imagem:</label>
				<input class="form-control-file" type="file" name="image" id="image">
			</div>
			
			<div class="form-group">
				<label for="add_p_name">Tipo do Produto:</label>
				<input class="form-control" type="text" name="add_p_name" id="add_p_name">
			</div>

			<div class="form-group">
				<label for="set_p_category">Selecione uma categoria:</label>
				<select class="form-control" name="set_p_category" id="set_p_category">

					<?php
					while ($row_cat = mysqli_fetch_assoc($result_cat2)) {
						$cat_id = $row_cat["c_id"];
						$category_name = $row_cat["c_name"];
						echo "<option value={$cat_id}>{$category_name}</option>";
					}
					mysqli_free_result($result_cat2);
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="set_price">Preço:</label>
				<input class="form-control" type="text" name="set_price" id="set_price">
			</div>

			<button type="submit" class="btn btn-primary" name="submit">ADICIONAR PRODUTO</button>
		</form>



		<form class="form_manager" action="sql_helper/execute.php" method="post">	

			<div class="form-group">
				<label class="title">Change Product Price:</label>
			</div>

			<div class="form-group">
				<label for="ch_price_pid">ID do tipo de produto:</label>
				<input class="form-control" type="text" name="ch_price_pid" id="ch_price_pid">
			</div>

			<div class="form-group">
				<label for="ch_price" >Novo valor:</label>
				<input class="form-control" type="text" name="ch_price" id="ch_price">
			</div>

			<button type="submit" class="btn btn-primary" name="submit">MUDAR O PREÇO</button>
		</form>



		<form class="form_manager" action="sql_helper/execute.php" method="post">	


			<div class="form-group">
				<label class="title">Exclua um produto:</label>
			</div>	

			<div class="form-group">
				<label for="del_p_id">ID Tipo do Produto:</label>
				<input class="form-control" type="text" name="del_p_id" id="del_p_id">
			</div>				
			
			<button type="submit" class="btn btn-primary" name="submit">EXCLUIR PRODUTO</button>
		</form>



		<form class="form_manager" action="sql_helper/execute.php" method="post">

			<div class="form-group">
				<label class="title">Adicionar um showroom:</label>
			</div>

			<div class="form-group">
				<label for="district">Estado:</label>
				<input class="form-control" type="text" name="district" id="district">
			</div>

			<div class="form-group">


				<label for="location">Local:</label>
				<textarea class="form-control" name="location" id="location" rows="6" cols="30"></textarea>
				<label>(max 180 characteres)</label>
			</div>

			<div class="form-group">
				<label for="contact" >Contato:<span id="span_contact"> +55</span></label>
				<input class="form-control" type="text" name="contact" id="contact">
			</div>
			
			<button class="btn btn-primary" type="submit" name="submit">ADICIONAR Showroom</button>
		</form>



		<form class="form_manager" action="sql_helper/execute.php" method="post">

			<div class="form-group">
				<label class="title">Excluir Showroom:</label>
			</div>

			<div class="form-group">
				<label for="del_show_id" >ID Showroom:</label>
				<input class="form-control" type="text" name="del_show" id="del_show_id">
			</div>

			<button class="btn btn-primary" type="submit" name="submit">EXCLUIR Showroom</button>
		</form>



		<form class="form_manager" action="sql_helper/execute.php" method="post">	

			<div class="form-group">
				<label class="title">Mudar Senha:</label>
			</div>	

			<div class="form-group">
				<label>Antiga senha:</label>
				<input class="form-control" type="password" name="old_pass" id="old_pass">
			</div>		

			<div class="form-group">

				<label>Nova senha:</label>
				<input class="form-control" type="password" name="new_pass" id="new_pass">
				<label>(minimum 10 characters)</label>
			</div>	

			<div class="form-group">
				<label for="conf_pass">Confirmar senha:</label>
				<input class="form-control" type="password" name="conf_pass" id="conf_pass">
			</div>			

			<button type="submit" class="btn btn-primary" name="submit">MUDAR SENHA</button>
		</form>

	</div>

</body>
</html>
<?php mysqli_close($db_con); ?>