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
	</head>
	<body>

		<div class="menu">
			<?php include 'include/header.html';?>
		</div>

<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Fale Conosco</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Fale Conosco</span>
        </h2>
        <!-- ../page heading-->
        <div id="contact" class="page-content page-contact">
            <div id="message-box-conact"></div>
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-subheading">FORMULÁRIO DE CONTATO</h3>
                    <div class="contact-form-box">
                        <div class="form-selector">
                            <label>Título do assunto</label>
                            <select class="form-control input-sm" id="subject">
                                <option value="Customer service">Serviço ao cliente</option>
                                <option value="Webmaster">Webmaster</option>
                            </select>
                        </div>
                        <div class="form-selector">
                            <label>Endereço de E-mail</label>
                            <input type="text" class="form-control input-sm" id="email" />
                        </div>
                        <div class="form-selector">
                            <label>Referência do pedido</label>
                            <input type="text" class="form-control input-sm" id="order_reference" />
                        </div>
                        <div class="form-selector">
                            <label>Mensagem</label>
                            <textarea class="form-control input-sm" rows="10" id="message"></textarea>
                        </div>
                        <div class="form-selector">
                            <button id="btn-send-contact" class="btn">Enviar</button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6" id="contact_form_map">
                    <h3 class="page-subheading">INFORMAÇÃO</h3>
                    <p>Lorem ipsum dolor sit amet onsectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor dapibus eget. Mauris tincidunt aliquam lectus sed vestibulum. Vestibulum bibendum suscipit mattis.</p>
                    <br/>
                    <ul>
                        <li>Praesent nec tincidunt turpis.</li>
                        <li>Aliquam et nisi risus.&nbsp;Cras ut varius ante.</li>
                        <li>Ut congue gravida dolor, vitae viverra dolor.</li>
                    </ul>
                    <br/>
                    <ul class="store_info">
                        <li><i class="fa fa-home"></i>Nosso endereço, Av. Otto Baumgart, 500 </li>
                        <li><i class="fa fa-phone"></i><span>0800 704 8383</span></li>
                        <li><i class="fa fa-phone"></i><span>(11) 3868-0780</span></li>
                        <li><i class="fa fa-envelope"></i>E-mail: <span><a href="mailto:%73%75%70%70%6f%72%74@%6b%75%74%65%74%68%65%6d%65.%63%6f%6d">cliente@atendimento.com.br</a></span></li>
                    </ul>                
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->

		<div class="footer">
			<?php include 'include/footer.html';?>
		</div>
	</body>
	</html>