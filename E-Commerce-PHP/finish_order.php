<?php
require_once("sql_helper/db.php");
$query_cat = "select * from category";
$result_cat = mysqli_query($db_con, $query_cat);
?>

<?php
session_start();
$id = $_SESSION['id'];

require_once("sql_helper/db.php");
$query = "select * from product where id={$_GET['$id']}";
$result = mysqli_query($db_con, $query);
?>

<?php
require_once("sql_helper/db.php");
$query = "select * from product where c_id={$_GET['cid']}";
$result = mysqli_query($db_con, $query);
?>


<?php
session_start();
$email = $_SESSION['email'];

$servername = "127.0.0.1:3306";
$username = "root";
$password = "root";
$dbname = "b_furniture";

$idResult="";
$nameResult = "";
$cpfResult = "";
$phoneResult = "";
$cepResult = "";
$adressResult = "";
$complementResult = "";
$emailResult = "";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "select * from client_user where email='$email' ;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $idResult = $row["c_id"];
        $nameResult = $row["full_name"];
        $cpfResult = $row["cpf"];
        $phoneResult = $row["cellphone"];
        $cepResult = $row["cep"];
        $adressResult = $row["full_adress"];
        $complementResult = $row["adress_complement"];
        $emailResult = $row["email"];
//echo $row["full_name"];

    }
} else {
    echo "0 results";
}
$conn->close();
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
                                        <li style="background-color: black;">
                                           <a href="">
                                               <p style="color: white;">Olá, <?php echo $nameResult;?></p>
                                               <!-- <p style="color: white;">Olá, <?php echo $idResult;?></p> -->
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

   <!-- -->
   <div class="row">
    <div class="columns-container">
        <div class="container" id="columns">

            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="#" title="Return to Home">Confirmação</a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page">Pedido</span>
            </div>
            <!-- ./breadcrumb -->

            <div class="col-sm-12">
                <div class="box-authentication">
                   <div class="page-content page-order">
                    <ul class="step">
                        <li class="current-step"><span>01. Resumo</span></li>
                        <li class="current-step"><span>02. Autenticação</span></li>
                        <li class="current-step"><span>03. Endereço</span></li>
                        <li class="current-step"><span>04. Remessa</span></li>
                        <li><span>05. Pagamento</span></li>
                    </ul>
                    <div class="">
                        <br>
                        <h3>Produto</h3>
                        <div class="page-content page-order">


                            <!-- <div class="order-detail-content">
                                <table class="table table-bordered table-responsive cart_summary">
                                    <thead>
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
                            </div> -->



                         <div class="page-content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box-authentication">
                                        <h3>Suas informações</h3>
                                        <form class="" action="sql_helper/execute_update_user.php" method="post">

                                            <div class="form-group">
                                                <label for="full_name"><b>Nome Completo:</b></label>
                                                <!-- <p style=""><?php echo $nameResult;?></p> -->
                                                <input style="width: 100%;" value="<?php echo $nameResult;?>" name="full_name" id="full_name" type="text" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="cpf"><b>CPF:</b></label>
                                                <!-- <p style=""><?php echo $cpfResult;?></p> -->
                                                <input style="width: 100%;" value="<?php echo $cpfResult;?>" name="cpf" maxlength="14" id="cpf" type="text" class="form-control" onkeydown="javascript: fMasc( this, mCPF );">
                                            </div>

                                            <div class="form-group">
                                                <label for="cellphone"><b>Telefone Celular:</b></label>
                                                <!-- <p style=""><?php echo $phoneResult;?></p> -->
                                                <input style="width: 100%;" value="<?php echo $phoneResult;?>" name="cellphone" id="cellphone" type="text" class="form-control" onkeydown="javascript: fMasc( this, mTel );">
                                            </div>

                                            <div class="form-group">
                                                <label for="cep"><b>CEP:</b></label>
                                                <!-- <p style=""><?php echo $cepResult;?></p> -->
                                                <input style="width: 100%;" value="<?php echo $cepResult;?>" name="cep" maxlength="9" id="cep" type="text" class="form-control" onkeydown="javascript: fMasc( this, mCEP );">
                                            </div>

                                            <div class="form-group">
                                                <label for="full_adress"><b>Endereço Completo:</b></label>
                                                <!-- <p style=""><?php echo $adressResult;?></p> -->
                                                <input style="width: 100%;" value="<?php echo $adressResult;?>" name="full_adress" id="full_adress" type="text" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label style="width: 100%;" for="adress_complement"><b>Complemento:</b></label>
                                                <!-- <p style=""><?php echo $complementResult;?></p> -->
                                                <input name="adress_complement" id="adress_complement" type="text" class="form-control" value="<?php echo $complementResult;?>">
                                            </div>

                                            <input hidden="true" name="email_register" id="" type="" class="" value="<?php echo $emailResult;?>">

                                            <input hidden="true" name="id_user" id="" type="text" class="" value="<?php echo $idResult;?>">

                                            <button class="button" type="submit" value="Criar uma conta" name="submit"><i class="fa fa-user"></i> Alterar</button>

                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                <!-- <div class="box-authentication">
                                    <h3>Produto</h3>

                                   <div class="page-content page-order">
                                        <div class="order-detail-content">
                                            <table class="table table-bordered table-responsive cart_summary">
                                                <thead>
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
                                     </div> 
                                 </div> -->

                                 <div class="box-authentication">
                                    <h3>Pagamento</h3>

                                    <form action="sql_helper/execute_product_order.php" method="post">


                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                     <label for="adress_complement"><b>Némero Cartão:</b></label>
                                                     <input name="" style="width: 100%;" name="adress_complement" id="adress_complement" type="text" class="form-control form-check-input">
                                                     <input name="payment" value="CARTAO" class="form-check-input" type="radio">
                                                 </div>
                                             </div>
                                             <div class="col-md-6">
                                                 <div class="form-group">
                                                     <label for="inputState">Parcelas</label>
                                                     <select id="inputState" class="form-control">
                                                        <option selected>Escolha</option>
                                                        <option>1x</option>
                                                        <option>2x</option>
                                                        <option>3x</option>
                                                        <option>4x</option>
                                                        <option>5x</option>
                                                        <option>6x</option>
                                                        <option>7x</option>
                                                        <option>8x</option>
                                                        <option>9x</option>
                                                        <option>10x</option>
                                                        <option>11x</option>
                                                        <option>12x</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                              <br>
                                              <input name="payment" value="BOLETO" class="form-check-input" type="radio"><b>Boleto</b>
                                          </label>
                                      </div>
                                  </div>
                                  <div class="form-group col-md-9">
                                    <br>
                                    <button style="width: 50%;" class="btn-primary btn" type="" value="" name="">Imprimir</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <input  name="id_user" type="hidden" value="<?php echo $idResult;?>">
                                <input  name="name_user" type="hidden" value="<?php echo $nameResult;?>">
                                <input  name="cpf_user" type="hidden" value="<?php echo $cpfResult;?>">
                                <button class="button" type="submit" value="Login" name="submit">Finalizar Pedido</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>  
</div>  
<!--  -->
</div>
<!-- ./row-->

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