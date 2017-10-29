		<div class="content">

			<?php if($row = mysqli_fetch_assoc($result)){ ?>
			<img src="img/<?php echo $row["id"] ?>">	
			<h2><?php echo $row["name"] ?></h2>
			<p>
				Product ID: <?php echo $row["id"] ?><br />
				Price: <?php echo $row["price"] ?> Tk.
			</p>
			<?php }
			else
				echo "This product does not exist or may be removed.";
			?>

		</div>


											<?php if($row = mysqli_fetch_assoc($result)){ ?>

									<h1 class="product-name"><?php echo $row["name"] ?></h1>
									
									<?php }
									else
										echo "";
									?>




									<?php if($row = mysqli_fetch_assoc($result)){ ?>
										<img id="product-zoom" src="img/<?php echo $row["id"] ?>" data-zoom-image="img/<?php echo $row["id"] ?>">	
										<h2><?php echo $row["name"] ?></h2>
										<?php }
										else
											echo "This product does not exist or may be removed.";
										?>



										<!-- kjhfsdljhfdkjhdfskhfdsjhdhafsk -->

										<?php
require_once("sql_helper/db.php");
$query = "select * from product where id={$_GET['id']}";
$result = mysqli_query($db_con, $query);
?>
<!DOCTYPE html>
<html lang="pt-bt">
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
<body class="category-page">
    <!-- HEADER -->
    <div id="header" class="header">

        <!-- top-header -->
        <div class="top-header">
            <div class="container">
<!--             <div class="nav-top-links">
                <a class="first-item" href="#"><img alt="phone" src="assets/images/phone.png" />00-62-658-658</a>
                <a href="#"><img alt="email" src="assets/images/email.png" />Contact us today!</a>
            </div> -->
<!--             <div class="currency ">
                <div class="dropdown">
                      <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">USD</a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Dollar</a></li>
                        <li><a href="#">Euro</a></li>
                      </ul>
                </div>
            </div> -->
            <!-- <div class="language ">
                <div class="dropdown">
                      <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                      <img alt="email" src="assets/images/fr.jpg" />French
                      </a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><img alt="email" src="assets/images/en.jpg" />English</a></li>
                        <li><a href="#"><img alt="email" src="assets/images/fr.jpg" />French</a></li>
                    </ul>
                </div>
            </div> -->
            <div class="support-link">
                <a href="#">Serviço</a>
                <a href="#">Suporte</a>
                <a href="admin_login.php">Sou Administrador</a>
            </div>
            <!-- <div id="user-info-top" class="user-info pull-right">
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>Minha Conta</span></a>
                    <ul class="dropdown-menu mega_dropdown" role="menu">
                        <li><a href="login.html">Login</a></li>
                        <li><a href="#">Comparar</a></li>
                        <li><a href="#">Lista de desejo</a></li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="index.php"><img alt="Kute Shop" src="assets/images/logo_oppa.svg" /></a>
            </div>
            <div class="col-xs-6 col-sm-6 header-search-box">
                <form class="form-inline">
                  <div class="form-group form-category">
                    <select class="select-category">
                        <option value="1">Categorias</option>
                        <option value="2">Móveis</option>
                        <option value="3">Decoração</option>
                    </select>
                </div>
                <div class="form-group input-serach">
                    <input type="text"  placeholder="Palavra chave aqui...">
                </div>
                <button type="submit" class="pull-right btn-search"></button>
            </form>
        </div>
        <?php foreach ($cartItems as $item) : ?>
        <div id="cart-block" class="col-xs-5 col-sm-3 shopping-cart-box" style="width: 220px;">
            <a class="cart-link" href="index.php?page=cart">
                <span class="title">Carrinho</span>
                <span class="total"><?php echo $item->getQuantity()?> itens - R$ <?php echo number_format($item->getSubTotal(), 2, ',', '.')?></span>
                <span class="notify notify-left"><?php echo $item->getQuantity()?></span>
            </a>
        </div>
        <?php endforeach;?>
    </div>
</div>
<!-- END MANIN HEADER -->
<!-- nav-top-menu -->
<div id="nav-top-menu" class="nav-top-menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-3" id="box-vertical-megamenus">
                <div class="box-vertical-megamenus">
                    <h4 class="title">
                        <span class="title-menu">Categorias</span>
                        <span class="btn-open-mobile pull-right"><i class="fa fa-bars"></i></span>
                    </h4>
                    <!-- <div class="vertical-menu-content is-home">
                        <ul class="vertical-menu-list">
                            <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="assets/data/1.png">Electronics</a></li>
                            <li>
                                <a class="parent" href="category2.html"><img class="icon-menu" alt="Funky roots" src="assets/data/2.png">Sports &amp; Outdoors</a>
                                <div class="vertical-dropdown-menu">
                                    <div class="vertical-groups col-sm-12">
                                        <div class="mega-group col-sm-4">
                                            <h4 class="mega-group-header"><span>Tennis</span></h4>
                                            <ul class="group-link-default">
                                                <li><a href="#">Tennis</a></li>
                                                <li><a href="#">Coats &amp; Jackets</a></li>
                                                <li><a href="#">Blouses &amp; Shirts</a></li>
                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                <li><a href="#">Intimates</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-group col-sm-4">
                                            <h4 class="mega-group-header"><span>Swimming</span></h4>
                                            <ul class="group-link-default">
                                                <li><a href="#">Dresses</a></li>
                                                <li><a href="#">Coats &amp; Jackets</a></li>
                                                <li><a href="#">Blouses &amp; Shirts</a></li>
                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                <li><a href="#">Intimates</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-group col-sm-4">
                                            <h4 class="mega-group-header"><span>Shoes</span></h4>
                                            <ul class="group-link-default">
                                                <li><a href="#">Dresses</a></li>
                                                <li><a href="#">Coats &amp; Jackets</a></li>
                                                <li><a href="#">Blouses &amp; Shirts</a></li>
                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                <li><a href="#">Intimates</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-custom-html col-sm-12">
                                            <a href="#"><img src="assets/data/banner-megamenu.jpg" alt="Banner"></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="assets/data/3.png">Smartphone &amp; Tablets</a></li>
                            <li><a href="category2.html"><img class="icon-menu" alt="Funky roots" src="assets/data/4.png">Health &amp; Beauty Bags</a></li>
                            <li>
                                <a class="parent" href="category.html">
                                    <img class="icon-menu" alt="Funky roots" src="assets/data/5.png">Shoes &amp; Accessories</a>
                                    <div class="vertical-dropdown-menu">
                                        <div class="vertical-groups col-sm-12">
                                            <div class="mega-group col-sm-12">
                                                <h4 class="mega-group-header"><span>Special products</span></h4>
                                                <div class="row mega-products">
                                                    <div class="col-sm-3 mega-product">
                                                        <div class="product-avatar">
                                                            <a href="#"><img src="assets/data/p10.jpg" alt="product1"></a>
                                                        </div>
                                                        <div class="product-name">
                                                            <a href="#">Fashion hand bag</a>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="new-price">$38</div>
                                                            <div class="old-price">$45</div>
                                                        </div>
                                                        <div class="product-star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 mega-product">
                                                        <div class="product-avatar">
                                                            <a href="#"><img src="assets/data/p11.jpg" alt="product1"></a>
                                                        </div>
                                                        <div class="product-name">
                                                            <a href="#">Fashion hand bag</a>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="new-price">$38</div>
                                                            <div class="old-price">$45</div>
                                                        </div>
                                                        <div class="product-star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 mega-product">
                                                        <div class="product-avatar">
                                                            <a href="#"><img src="assets/data/p12.jpg" alt="product1"></a>
                                                        </div>
                                                        <div class="product-name">
                                                            <a href="#">Fashion hand bag</a>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="new-price">$38</div>
                                                            <div class="old-price">$45</div>
                                                        </div>
                                                        <div class="product-star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 mega-product">
                                                        <div class="product-avatar">
                                                            <a href="#"><img src="assets/data/p13.jpg" alt="product1"></a>
                                                        </div>
                                                        <div class="product-name">
                                                            <a href="#">Fashion hand bag</a>
                                                        </div>
                                                        <div class="product-price">
                                                            <div class="new-price">$38</div>
                                                            <div class="old-price">$45</div>
                                                        </div>
                                                        <div class="product-star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="assets/data/6.png">Toys &amp; Hobbies</a></li>
                                <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="assets/data/7.png">Computers &amp; Networking</a></li>
                                <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="assets/data/8.png">Laptops &amp; Accessories</a></li>
                                <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="assets/data/9.png">Jewelry &amp; Watches</a></li>
                                <li><a href="category.html"><img class="icon-menu" alt="Funky roots" src="assets/data/10.png">Flashlights &amp; Lamps</a></li>
                                <li>
                                    <a href="category.html">
                                        <img class="icon-menu" alt="Funky roots" src="assets/data/11.png">
                                        Cameras &amp; Photo
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                    <a href="category.html">
                                        <img class="icon-menu" alt="Funky roots" src="assets/data/5.png">
                                        Television
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                    <a href="category.html">
                                        <img class="icon-menu" alt="Funky roots" src="assets/data/7.png">Computers &amp; Networking
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                    <a href="category.html">
                                        <img class="icon-menu" alt="Funky roots" src="assets/data/6.png">
                                        Toys &amp; Hobbies
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                    <a href="category.html"><img class="icon-menu" alt="Funky roots" src="assets/data/9.png">Jewelry &amp; Watches</a></li>
                                </ul>
                                <div class="all-category"><span class="open-cate">All Categories</span></div>
                            </div>
                        </div>
                    </div> -->
                    <div id="main-menu" class="col-sm-9 main-menu">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <a class="navbar-brand" href="#">MENU</a>
                                </div>
                                <div id="navbar" class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav">

                                        <li class="active dropdown">
                                            <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" href="#">Home</a>
                                        <!-- <ul class="dropdown-menu container-fluid">
                                            <li class="block-container">
                                                <ul class="block">
                                                    <li class="link_container"><a href="index-2.html">Home Style 1</a></li>
                                                    <li class="link_container"><a href="index2.html">Home Style 2</a></li>
                                                    <li class="link_container"><a href="index3.html">Home Style 3</a></li>
                                                    <li class="link_container"><a href="index4.html">Home Style 4</a></li>
                                                    <li class="link_container"><a href="index5.html">Home Style 5</a></li>
                                                    <li class="link_container"><a href="index6.html">Home Style 6</a></li>
                                                    <li class="link_container"><a href="index7.html">Home Style 7</a></li>
                                                    <li class="link_container"><a href="index8.html">Home Style 8</a></li>
                                                </ul>
                                            </li>
                                        </ul> -->
                                    </li>

                                    <!--  <li><a href="index.html" class="first_nav">HOME</a></li> -->
                                    <!-- <li><a href="products.php">PRODUTOS</a></li> -->
                                    <li><a href="showrooms.php">SHOWROOMS</a></li>
                                    <li><a href="about.php">SOBRE NÓS</a></li>
                                    <li><a href="contact.php" class="last_nav">FALE CONOSCO</a></li>
                                    <li><a href="login.php" class="last_nav">ENTRAR</a></li>


                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>
    <!-- END nav-top-menu -->
</div>
<!-- end header -->

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->
<script type="text/javascript" src="assets/lib/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/lib/select2/js/select2.min.js"></script>
<script type="text/javascript" src="assets/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="assets/lib/owl.carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/lib/jquery.countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="assets/lib/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.actual.min.js"></script>
<script type="text/javascript" src="assets/js/theme-script.js"></script>
</body>

<!-- Mirrored from kutethemes.com/html/kuteshop/html/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 27 Sep 2015 11:10:49 GMT -->
</html>