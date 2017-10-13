<?php
require_once("sql_helper/db.php");
$query_cat = "select * from category";
$result_cat = mysqli_query($db_con, $query_cat);
?>

<?php
require_once("sql_helper/db.php");
$query = "select * from product where c_id={$_GET['cid']}";
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
	<link rel="stylesheet" type="text/css" href="assets/css/animate.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="css/style_products.css">
	<title>Products</title>
</head>


<body>


	<div class="menu">
		<?php include 'include/header.html';?>
	</div>


	<!-- BEGIN PRODUCTS-->
	<div class="row">
		<div class="columns-container">
			<div class="container" id="columns">

				<!-- breadcrumb -->
				<div class="breadcrumb clearfix">
					<a class="home" href="#" title="Return to Home">Home</a>
					<span class="navigation-pipe">&nbsp;</span>
					<span class="navigation_page">Produtos</span>
				</div>
				<!-- ./breadcrumb -->

				<div class="column col-xs-12 col-sm-3" id="left_column">
					<div class="container">

						<!-- row -->
						<div class="row">
							<!-- Left colunm -->
							<div class="column col-xs-12 col-sm-3" id="left_column">

								<!-- block category -->
								<div class="block left-module">
									<div class="block_content">
										<div class="layered layered-category">
											<div class="layered-content">

												<p class="title_block">Tipos de produtos</p>

												<div class="side_navigation">
													<ul>
														<?php
														while ($row_cat = mysqli_fetch_assoc($result_cat)) 
														{
															$cat_id = $row_cat["c_id"];
															$category_name = $row_cat["c_name"];								
															echo "<a class='' style='margin-left: 20px;' 
															href='products.php?cid={$cat_id}'>	
															<li>$category_name</li>
															</a>";
														}
														?>
													</ul>
													<p class="title_block"></p>
												</div>

											</div>
										</div>
									</div>
								</div>

								<!-- block category -->
								<div class="block left-module">
									<p class="title_block">CATEGORIAS</p>
									<div class="block_content">
										
										<div class="layered layered-category">
											<div class="layered-content">
												<ul class="tree-menu">
													<li class="active">
														<span></span><a href="#">Melhores</a>
														<ul>
															<li><span></span><a href="#">Sofás</a></li>
															<li><span></span><a href="#">Poltronas</a></li>
															<li><span></span><a href="#">Cadeiras</a></li>
															<li><span></span><a href="#">Mesas</a></li>
															<li><span></span><a href="#">Racks</a></li>
															<li><span></span><a href="#">Iluminação</a></li>
															<li><span></span><a href="#"><span></span>Blouses</a></li>
														</ul>
													</li>
													<li><span></span><a href="#">Poltronas</a></li>
													<li><span></span><a href="#">Dresses</a></li>
													<li><span></span><a href="#">Cadeiras</a></li>
													<li><span></span><a href="#">Mesas</a></li>
													<li><span></span><a href="#">Racks</a></li>
													<li><span></span><a href="#">Iluminação</a></li>
													<li><span></span><a href="#">Decoração</a></li>
												</ul>
											</div>
										</div>
										
									</div>
								</div>
								<!-- ./block category  -->

								<!-- block filter -->
								<div class="block left-module">
									<p class="title_block">Filtro</p>
									<div class="block_content">
										
										<div class="layered layered-filter-price">

											
											<div class="layered_subtitle">preço</div>
											<div class="layered-content slider-range">

												<div data-label-reasult="Range:" data-min="0" data-max="500" data-unit="$" class="slider-range-price" data-value-min="50" data-value-max="350"></div>
												<div class="amount-range-price">De: $50 - $350</div>
												<ul class="check-box-list">
													<li>
														<input type="checkbox" id="p1" name="cc" />
														<label for="p1">
															<span class="button"></span>
															$20 - $50<span class="count">(0)</span>
														</label>   
													</li>
													<li>
														<input type="checkbox" id="p2" name="cc" />
														<label for="p2">
															<span class="button"></span>
															$50 - $100<span class="count">(0)</span>
														</label>   
													</li>
													<li>
														<input type="checkbox" id="p3" name="cc" />
														<label for="p3">
															<span class="button"></span>
															$100 - $250<span class="count">(0)</span>
														</label>   
													</li>
												</ul>
											</div>
											
										</div>
										

									</div>
								</div>
								<!-- ./block filter  -->

								<!-- left silide -->
<!-- 								<div class="col-left-slide left-module">
									<ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
										<li><a href="#"><img src="assets/data/slide-left.jpg" alt="slide-left"></a></li>
										<li><a href="#"><img src="assets/data/slide-left2.jpg" alt="slide-left"></a></li>
										<li><a href="#"><img src="assets/data/slide-left3.png" alt="slide-left"></a></li>
									</ul>
								</div> -->
								<!--./left silde-->

								<!-- SPECIAL -->
<!-- 								<div class="block left-module">
									<p class="title_block">SPECIAL PRODUCTS</p>
									<div class="block_content">
										<ul class="products-block">
											<li>
												<div class="products-block-left">
													<a href="#">
														<img src="assets/data/product-100x122.jpg" alt="SPECIAL PRODUCTS">
													</a>
												</div>
												<div class="products-block-right">
													<p class="product-name">
														<a href="#">Woman Within Plus Size Flared</a>
													</p>
													<p class="product-price">$38,95</p>
													<p class="product-star">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-o"></i>
													</p>
												</div>
											</li>
										</ul>
										<div class="products-block">
											<div class="products-block-bottom">
												<a class="link-all" href="#">All Products</a>
											</div>
										</div>
									</div>
								</div> -->
								<!-- ./SPECIAL -->

								<!-- TAGS -->
<!-- 								<div class="block left-module">
									<p class="title_block">TAGS</p>
									<div class="block_content">
										<div class="tags">
											<a href="#"><span class="level1">actual</span></a>
											<a href="#"><span class="level2">adorable</span></a>
											<a href="#"><span class="level3">change</span></a>
											<a href="#"><span class="level4">consider</span></a>
											<a href="#"><span class="level3">phenomenon</span></a>
											<a href="#"><span class="level4">span</span></a>
											<a href="#"><span class="level1">spanegs</span></a>
											<a href="#"><span class="level5">spanegs</span></a>
											<a href="#"><span class="level1">actual</span></a>
											<a href="#"><span class="level2">adorable</span></a>
											<a href="#"><span class="level3">change</span></a>
											<a href="#"><span class="level4">consider</span></a>
											<a href="#"><span class="level2">gives</span></a>
											<a href="#"><span class="level3">change</span></a>
											<a href="#"><span class="level2">gives</span></a>
											<a href="#"><span class="level1">good</span></a>
											<a href="#"><span class="level3">phenomenon</span></a>
											<a href="#"><span class="level4">span</span></a>
											<a href="#"><span class="level1">spanegs</span></a>
											<a href="#"><span class="level5">spanegs</span></a>
										</div>
									</div>
								</div> -->
								<!-- ./TAGS -->

								<!-- Testimonials -->
<!-- 								<div class="block left-module">
									<p class="title_block">Testimonials</p>
									<div class="block_content">
										<ul class="testimonials owl-carousel" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause = "true" data-items="1">
											<li>
												<div class="client-mane">Roverto & Maria</div>
												<div class="client-avarta">
													<img src="assets/data/testimonial.jpg" alt="client-avarta">
												</div>
												<div class="testimonial">
													"Your product needs to improve more. To suit the needs and update your image up"
												</div>
											</li>
											<li>
												<div class="client-mane">Roverto & Maria</div>
												<div class="client-avarta">
													<img src="assets/data/testimonial.jpg" alt="client-avarta">
												</div>
												<div class="testimonial">
													"Your product needs to improve more. To suit the needs and update your image up"
												</div>
											</li>
											<li>
												<div class="client-mane">Roverto & Maria</div>
												<div class="client-avarta">
													<img src="assets/data/testimonial.jpg" alt="client-avarta">
												</div>
												<div class="testimonial">
													"Your product needs to improve more. To suit the needs and update your image up"
												</div>
											</li>
										</ul>
									</div>
								</div> -->
								<!-- ./Testimonials -->
							</div>
						</div>

					</div>
				</div>


				<div class="center_column col-xs-12 col-sm-9" id="center_column">
					<!-- category-slider -->
					<div class="category-slider">
						<ul class="owl-carousel owl-style2" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1">
							<li>
								<img src="assets/data/painel_1.jpg" alt="category-slider">
							</li>
							<li>
								<img src="assets/data/painel_2.jpg" alt="category-slider">
							</li>
						</ul>
					</div>
					<!-- ./category-slider -->

					<!-- view-product-list-->
					<div id="view-product-list" class="view-product-list">
						<h2 class="page-heading">
							<span class="page-heading-title">Produtos</span>
						</h2>

						<ul class="display-product-option">
							<li class="view-as-grid selected">
								<span>grid</span>
							</li>
							<li class="view-as-list">
								<span>list</span>
							</li>
						</ul>

						<!-- PRODUCT LIST -->
						<div class="tab-container">
							<ul class="row product-list grid tab-panel active" id="tab-1">

								<?php
								if(!isset($_GET["cid"])){
									?>

									<div class="products_banner">
										<h2>
											PESQUISE ALGO
										</h2>
									</div>					


									<?php } else{ 
										$query_pd = "select * from product where c_id={$_GET['cid']} order by id desc";
										$result_pd = mysqli_query($db_con, $query_pd); ?>

										<div class="search_content">

											<?php
											$found = 0;
											while ($row_pd = mysqli_fetch_assoc($result_pd)) { $found = 1; ?>

											<li class="col-sx-12 col-sm-4">
												<div class="product-container">

													<div class="left-block">
														<a href="specific_id.php?id=<?php echo $row_pd['id']; ?>">
															<img class="img-responsive" alt="product" src="img/<?php echo $row_pd["id"];?>">
														</a>	
														<div class="quick-view">
															<a title="Add to my wishlist" class="heart" href="#"></a>
															<a title="Add to compare" class="compare" href="#"></a>
															<a title="Quick view" class="search" href="#"></a>
														</div>
														<div class="add-to-cart">
															<a title="Add to Cart" href="#add">Adicionar</a>
														</div>	
													</div>

													<div class="right-block">
														<h5 class="product-name"><a href="dspecific_id.php"><?php echo $row["name"] ?></a></h5>
														<div class="product-star">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-o"></i>
														</div>
														<div class="content_price">
															<span class="price product-price">
																<?php if($row = mysqli_fetch_assoc($result)){ ?>

																R$<?php echo $row["price"] ?>,00

																<?php }
																else
																	echo "This product does not exist or may be removed.";
																?>
															</span>
															<span class="price old-price">R$<?php echo $row["price"] + 880?>,00</span>
														</div>
														<div class="info-orther">
															<p>Item Code: <?php echo $row["id"] ?></p>
															<p class="availability">Availability: <span>In stock</span></p>
															<div class="product-desc">
																Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
															</div>
														</div>
													</div>

												</div>
											</li>
											<?php 
										}
										if($found == 0)
											echo "<br/><p>No products has been added or might be removed from this category.</p>";
										?>

									</div>
									<?php } ?>

								</div>
							</div>
						</ul>
					</div>
				</div>

				<!-- PAGINATION -->		
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="sortPagiBar row">
								<div class="bottom-pagination" style="margin-bottom: 25px; margin-right: 100px;">
									<nav>
										<ul class="pagination">
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li>
												<a href="#" aria-label="Next">
													<span aria-hidden="true">Próximo &raquo;</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
								<div class="show-product-item">
									<select name="">
										<option value="">Mostrar 18</option>
										<option value="">Mostrar 20</option>
										<option value="">Mostrar 50</option>
										<option value="">Mostrar 100</option>
									</select>
								</div>
								<div class="sort-product">
									<select>
										<option value="">Nome do produto</option>
										<option value="">Preço</option>
									</select>
									<div class="sort-product-icon">
										<i class="fa fa-sort-alpha-asc"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END PAGINATION -->

			</div>	
		</div>	
		<!-- END PRODUCTS -->
	</div>
	<!-- ./row-->


	<div class="footer">
		<?php include 'include/footer.html';?>
	</div>

</body>
</html>


<?php
mysqli_close($db_con);
?>