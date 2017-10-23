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

<!-- <table class="table">
<thead>
<tr>
<th>#</th>
<th>Produto</th>
<th>Preço</th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach ($products as $product) : ?>
<tr>
<td><?php echo $product->getId();?></td>
<td><?php echo $product->getName();?></td>
<td>R$ <?php echo number_format($product->getPrice(), 2, ',', '.');?></td>
<td>
<form action="index2.php?page=cart&action=add" method="post">
<input name="id" type="hidden" value="<?php echo $product->getId()?>"/>
<button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
</form>
</td>
</tr>
<?php endforeach?>
</tbody>
</table> -->

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
                                                    <li><span></span><a href="#">Sofás</a></li>
                                                    <li><span></span><a href="#">Poltronas</a></li>
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


                                <div class="search_content">


                                    <?php foreach ($products as $product) : ?>
                                     <li class="col-sx-12 col-sm-4">

                                        <div class="product-container">

                                            <div class="left-block">
                                                <a href="specific_id.php?id=<?php echo $product->getId();?>">
                                                    <img class="img-responsive" alt="product" src="img/<?php echo $product->getId();?>">
                                                </a>  

                                                <div class="quick-view">
                                                    <a title="Add to my wishlist" class="heart" href="#"></a>
                                                    <a title="Add to compare" class="compare" href="#"></a>
                                                    <a title="Quick view" class="search" href="#"></a>
                                                </div>
                                                <div class="add-to-cart">
                                                    <form action="index.php?page=cart&action=add" method="post">

                                                        <input name="id" type="hidden" value="<?php echo $product->getId()?>"/>
                                                        <button title="Add to Cart" type="submit"><a"title="Add to Cart">Adicionar</a></button>

                                                    </a> 
                                                </form>

                                            </div>  
                                        </div>

                                        <div class="right-block">
                                            <h5 class="product-name"><a href="specific_id.php"><?php echo $product->getName();?></a></h5>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                            <div class="content_price">
                                                <span class="price product-price">

                                                    R$ <?php echo number_format($product->getPrice(), 2, ',', '.');?>

                                                </span>
                                                <span class="price old-price"><br>R$ <?php echo number_format($product->getPrice()-900, 2, ',', '.');?></span>
                                            </div>
                                            <div class="info-orther">
                                                <p>Código: <?php echo $product->getId();?></p>
                                                <p class="availability">Disponibilidade: <span>Em estoque</span></p>
                                                <div class="product-desc">
                                                    Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                <?php endforeach?>
                            </div> 
                        </ul>
                    </div>
                </div>


            </div>  <!-- container -->
        </div> <!-- columns-container -->
    </div><!-- ./row-->
    <!-- END PRODUCTS -->

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

    <footer>
        <div class="footer">
            <?php include 'include/footer.html';?>
        </div>
    </footer>

</body>
</html>