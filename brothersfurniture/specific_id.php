<?php
require_once("db.php");
$query = "select * from product where id={$_GET['id']}";
$result = mysqli_query($db_con, $query);
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/lib/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/lib/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/lib/jquery.bxslider/jquery.bxslider.css" />
	<link rel="stylesheet" type="text/css" href="assets/lib/owl.carousel/owl.carousel.css" />
	<link rel="stylesheet" type="text/css" href="assets/lib/jquery-ui/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="assets/lib/fancyBox/jquery.fancybox.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/animate.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />

	<title>Kute shop</title>
</head>
<body class="product-page">


	<!-- HEADER -->

	<div class="menu">
		<?php include 'header.html';?>
	</div>

	<!-- end header -->

	<div class="columns-container">
		<div class="container" id="columns">
			<!-- breadcrumb -->
			<div class="breadcrumb clearfix">
				<a class="home" href="#" title="Return to Home">Home</a>
				<span class="navigation-pipe">&nbsp;</span>
				<a href="#" title="Return to Home">Móveis</a>
				<span class="navigation-pipe">&nbsp;</span>
			</div>
			<!-- ./breadcrumb -->
			<!-- row -->
			<div class="row">

				<!-- Center colunm-->
				<div class="center_column col-xs-12 col-sm-12" id="center_column">
					<!-- Product -->
					<div id="product">
						<div class="primary-box row">
							<div class="pb-left-column col-xs-12 col-sm-5">
								<!-- product-imge-->
								<div class="product-image">
									<div class="product-full">
										<!-- <img id="product-zoom" src='assets/data/product-s3-420x512.jpg' data-zoom-image="assets/data/product-s3-850x1036.jpg"/> -->

										<?php if($row = mysqli_fetch_assoc($result)){ ?>
										<img id="product-zoom" src="img/<?php echo $row["id"] ?>" data-zoom-image="img/<?php echo $row["id"] ?>">	
										<?php }
										else
											echo "This product does not exist or may be removed.";
										?>

									</div>
									<div class="product-img-thumb" id="gallery_01">
										<ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="21" data-loop="false">
											<li>
												<a href="#" data-image="img/<?php echo $row["id"] ?>" data-zoom-image="img/<?php echo $row["id"] ?>">
													<img id="product-zoom"  src="img/<?php echo $row["id"] ?>" /> 
												</a>
											</li>
											<li>
												<a href="#" data-image="img/<?php echo $row["id"] ?>" data-zoom-image="img/<?php echo $row["id"] ?>">
													<img id="product-zoom"  src="img/<?php echo $row["id"] ?>" /> 
												</a>
											</li>
											<li>
												<a href="#" data-image="img/<?php echo $row["id"] ?>" data-zoom-image="img/<?php echo $row["id"] ?>">
													<img id="product-zoom"  src="img/<?php echo $row["id"] ?>" /> 
												</a>
											</li>
											<li>
												<a href="#" data-image="img/<?php echo $row["id"] ?>" data-zoom-image="img/<?php echo $row["id"] ?>">
													<img id="product-zoom"  src="img/<?php echo $row["id"] ?>" /> 
												</a>
											</li>
											<li>
												<a href="#" data-image="img/<?php echo $row["id"] ?>" data-zoom-image="img/<?php echo $row["id"] ?>">
													<img id="product-zoom"  src="img/<?php echo $row["id"] ?>" /> 
												</a>
											</li>
											<li>
												<a href="#" data-image="img/<?php echo $row["id"] ?>" data-zoom-image="img/<?php echo $row["id"] ?>">
													<img id="product-zoom"  src="img/<?php echo $row["id"] ?>" /> 
												</a>
											</li>
										</ul>
									</div>
								</div>
								<!-- product-imge-->
							</div>
							<div class="pb-right-column col-xs-12 col-sm-7">

								<h1 class="product-name"><?php echo $row["name"] ?></h1>

								<div class="product-comments">
									<div class="product-star">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</div>
									<div class="comments-advices">
										<a href="#">Baseado em 3 avaliações</a>
										<a href="#"><i class="fa fa-pencil"></i> escreva uma avaliação</a>
									</div>
								</div>
								<div class="product-price-group">
									<span class="price">R$<?php echo $row["price"]?>,00</span>
									<span class="old-price">R$<?php echo $row["price"] + 880?>,00</span>
									<span class="discount">-30%</span>
								</div>
								<div class="info-orther">
									<p>Código do item: <?php echo $row["id"] ?></p>
									<p>Disponibilidade: <span class="in-stock">Em estoque</span></p>
									<p>Condições: Novo</p>
								</div>
								<div class="product-desc">
									Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem. 
								</div>
								<div class="form-option">
									<p class="form-option-title">Opções disponíveis:</p>
									<div class="attributes">
										<div class="attribute-label">Cores:</div>
										<div class="attribute-list">
											<ul class="list-color">
												<li style="background:#3a3a3a;"><a href="#">red</a></li>
												<li style="background:#8d8684;" class="active"><a href="#">red</a></li>
												<li style="background:#54576d;"><a href="#">red</a></li>
												<li style="background:#48413e;"><a href="#">red</a></li>
											</ul>
										</div>
									</div>
									<div class="attributes">
										<div class="attribute-label">Qtde.:</div>
										<div class="attribute-list product-qty">
											<div class="qty">
												<input id="option-product-qty" type="text" value="1">
											</div>
											<div class="btn-plus">
												<a href="#" class="btn-plus-up">
													<i class="fa fa-caret-up"></i>
												</a>
												<a href="#" class="btn-plus-down">
													<i class="fa fa-caret-down"></i>
												</a>
											</div>
										</div>
									</div>
									<!-- <div class="attributes">
										<div class="attribute-label">Size:</div>
										<div class="attribute-list">
											<select>
												<option value="1">X</option>
												<option value="2">XL</option>
												<option value="3">XXL</option>
											</select>
											<a id="size_chart" class="fancybox" href="assets/data/size-chart.jpg">Size Chart</a>
										</div>

									</div> -->
								</div>
								<div class="form-action">
									<div class="button-group">
										<a class="btn-add-cart" href="#">Adicionar ao carrinho</a>
									</div>
									<div class="button-group">
										<a class="wishlist" href="#"><i class="fa fa-heart-o"></i>
											<br>Carrinho</a>
											<a class="compare" href="#"><i class="fa fa-signal"></i>
												<br>        
											Compare</a>
										</div>
									</div>
									<div class="form-share">
										<div class="sendtofriend-print">
											<a href="javascript:print();"><i class="fa fa-print"></i> Imprimir</a>
											<a href="#"><i class="fa fa-envelope-o fa-fw"></i>Enviar a um amigo</a>
										</div>
										<div class="network-share">
										</div>
									</div>
								</div>
							</div>
							<!-- tab product -->
							<div class="product-tab">
								<ul class="nav-tab">
									<li class="active">
										<a aria-expanded="false" data-toggle="tab" href="#product-detail">Detalhes do produto</a>
									</li>
									<li>
										<a aria-expanded="true" data-toggle="tab" href="#information">Informações</a>
									</li>
									<li>
										<a data-toggle="tab" href="#reviews">reviews</a>
									</li>
									<li>
										<a data-toggle="tab" href="#extra-tabs">Extra</a>
									</li>
									<li>
										<a data-toggle="tab" href="#guarantees">garantia</a>
									</li>
								</ul>
								<div class="tab-container">
									<div id="product-detail" class="tab-panel active">
										<p>Morbi mollis tellus ac sapien. Nunc nec neque. Praesent nec nisl a purus blandit viverra. Nunc nec neque. Pellentesque auctor neque nec urna.</p>

										<p>Curabitur suscipit suscipit tellus. Cras id dui. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Maecenas vestibulum mollis diam.</p>

										<p>Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Sed lectus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Nam at tortor in tellus interdum sagittis. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est.</p>
									</div>
									<div id="information" class="tab-panel">
										<table class="table table-bordered">
											<tr>
												<td width="200">Material</td>
												<td>Cotton</td>
											</tr>
											<tr>
												<td>Estilo</td>
												<td>Girly</td>
											</tr>
											<tr>
												<td>Propriedades</td>
												<td>Colorful Dress</td>
											</tr>
										</table>
									</div>
									<div id="reviews" class="tab-panel">
										<div class="product-comments-block-tab">
											<div class="comment row">
												<div class="col-sm-3 author">
													<div class="grade">
														<span>Grade</span>
														<span class="reviewRating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</span>
													</div>
													<div class="info-author">
														<span><strong>Roberto</strong></span>
														<em>04/08/2015</em>
													</div>
												</div>
												<div class="col-sm-9 commnet-dettail">
													Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar
												</div>
											</div>
											<div class="comment row">
												<div class="col-sm-3 author">
													<div class="grade">
														<span>Grade</span>
														<span class="reviewRating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</span>
													</div>
													<div class="info-author">
														<span><strong>Autor</strong></span>
														<em>04/08/2015</em>
													</div>
												</div>
												<div class="col-sm-9 commnet-dettail">
													Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar
												</div>
											</div>
											<p>
												<a class="btn-comment" href="#">Write your review !</a>
											</p>
										</div>

									</div>
									<div id="extra-tabs" class="tab-panel">
										<p>Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est. Sed lectus. Sed a libero. Vestibulum eu odio.</p>

										<p>Maecenas vestibulum mollis diam. In consectetuer turpis ut velit. Curabitur at lacus ac velit ornare lobortis. Praesent ac sem eget est egestas volutpat. Nam eget dui.</p>

										<p>Maecenas nec odio et ante tincidunt tempus. Vestibulum suscipit nulla quis orci. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Aenean ut eros et nisl sagittis vestibulum. Aliquam eu nunc.</p> 
									</div>
									<div id="guarantees" class="tab-panel">
										<p>Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est. Sed lectus. Sed a libero. Vestibulum eu odio.</p>

										<p>Maecenas vestibulum mollis diam. In consectetuer turpis ut velit. Curabitur at lacus ac velit ornare lobortis. Praesent ac sem eget est egestas volutpat. Nam eget dui.</p>

										<p>Maecenas nec odio et ante tincidunt tempus. Vestibulum suscipit nulla quis orci. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Aenean ut eros et nisl sagittis vestibulum. Aliquam eu nunc.</p> 
										<p>Maecenas vestibulum mollis diam. In consectetuer turpis ut velit. Curabitur at lacus ac velit ornare lobortis. Praesent ac sem eget est egestas volutpat. Nam eget dui.</p>
									</div>
								</div>
							</div>
							<!-- ./tab product -->
						</div>
						<!-- Product -->
					</div>
					<!-- ./ Center colunm -->
				</div>
				<!-- ./row-->
			</div>
		</div>

		<div class="footer">
			<?php include 'footer.html';?>
		</div>



		<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
		<!-- Script-->
		<script type="text/javascript" src="assets/lib/jquery/jquery-1.11.2.min.js"></script>

		<script type="text/javascript" src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/lib/select2/js/select2.min.js"></script>
		<script type="text/javascript" src="assets/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
		<script type="text/javascript" src="assets/lib/owl.carousel/owl.carousel.min.js"></script>
		<script type="text/javascript" src="assets/lib/jquery.countdown/jquery.countdown.min.js"></script>
		<script type="text/javascript" src="assets/lib/jquery.elevatezoom.js"></script>

		<script type="text/javascript" src="assets/lib/jquery-ui/jquery-ui.min.js"></script>

		<script type="text/javascript" src="assets/lib/fancyBox/jquery.fancybox.js"></script>

		<script type="text/javascript" src="assets/js/jquery.actual.min.js"></script>


		<script type="text/javascript" src="assets/js/theme-script.js"></script>

	</body>
	</html>