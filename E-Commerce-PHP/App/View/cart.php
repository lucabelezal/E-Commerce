<?php
require_once("sql_helper/db.php");
$query = "select * from product where id={$_GET['id']}";
$result = mysqli_query($db_con, $query);
$id = $_GET['id'];
session_start();
$_SESSION['id'] = $id;
?>

<!doctype html>
<html lang="pt-br">
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
   <!-- Header -->
   <div class="menu">
    <?php include 'include/header.html';?>
</div>
<!-- Header -->


<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">


        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Seu carrinho de compras</span>
        </div>
        <!-- ./breadcrumb -->

        <!-- page heading-->
        <h2 class="page-heading no-line">
            <span class="page-heading-title2">Resumo do carrinho de compras</span>
        </h2>
        <!-- ../page heading-->


        <div class="page-content page-order">
            <ul class="step">
                <li class="current-step"><span>01. Resumo</span></li>
                <li><span>02. Autenticação</span></li>
                <li><span>03. Endereço</span></li>
                <li><span>04. Remessa</span></li>
                <li><span>05. Pagamento</span></li>
            </ul>
            <!-- <div class="heading-counter warning">O seu carrinho de compras contém:
                <span>Produto</span>
            </div> -->
            <div class="order-detail-content">
                <table class="table table-bordered table-responsive cart_summary">
                    <thead>
                        <!-- <tr>
                            <th class="cart_product">Product</th>
                            <th>Description</th>
                            <th>Avail.</th>
                            <th>Unit price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th  class="action"><i class="fa fa-trash-o"></i></th>
                        </tr> -->

                        <tr>
                            <th class="cart_product">Produto</th>
                            <th>Cod. Categoria</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Disponibilidade</th>
                            <th></th>
                            <th>Preço</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>R$ <?php echo number_format($cartTotal, 2, ',', '.')?></b></td>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php foreach ($cartItems as $item) : ?>
                            <tr>
                                <td class="cart_product">

                                    <a href="#" data-image="img/<?php echo $item->getProduct()->getId()?>">
                                        <img id="product-zoom"  src="img/<?php echo $item->getProduct()->getId()?>" /> 
                                    </a>



                                </td>
                                <td><?php echo $item->getProduct()->getId()?></td>
                                <td lass="cart_description"><p class="product-name"><?php echo $item->getProduct()->getName()?></p></td>
                                <td class="qty">
                                    <form action="index.php?page=cart&action=update" method="post">
                                        <input class="form-control input-sm" name="id" type="hidden" value="<?php echo $item->getProduct()->getId()?>" />
                                        <input size="2" type="text" name="quantity" value=" <?php echo $item->getQuantity()?>"/>
                                        <button type="submit" class="btn btn-primary btn-xs">Alterar</button>
                                    </form>
                                </td>
                                <td class="cart_avail"><span class="label label-success">Em estoque</span></td>
                                <td>
                                 <a href="index.php?page=cart&action=delete&id=<?php echo $item->getProduct()->getId()?>" class="btn btn-danger">Excluir</a>
                             </td>
                             <td class="price">R$ <?php echo number_format($item->getProduct()->getPrice(), 2, ',', '.')?></td>
                             <td class="price"> R$ <?php echo number_format($item->getSubTotal(), 2, ',', '.')?></td>

                         </tr>
                     <?php endforeach;?>
                 </tbody>

             </table>
             <div class="cart_navigation">
                <a class="prev-btn" href="index.php">Continue comprando</a>
                <a class="next-btn" href="login.php">Próximo passo</a>
            </div>
        </div>
    </div>


</div>
</div>
<!-- ./page wapper-->


<!-- Footer -->
<div class="footer">
    <?php include 'include/footer.html';?>
</div>
<!-- Footer -->

</body>
</html>