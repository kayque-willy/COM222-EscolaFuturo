<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<!-- Navibar -->
	<link rel="stylesheet" href="/assets/css/side.css">
	<!-- jQuery library -->
	<script src="/assets/js/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="/assets/js/bootstrap.min.js"></script>
</head>

<body background="/assets/image/background.jpg" style="background-size: cover;">

	<!-- Sidebar -->
	<div id="wrapper">
		<div class="overlay"></div>
  
		<!--Sidebar-->
		<?php $this->load->view('layout/sidebar'); ?>
	  <!--Sidebar-->
		
		<!-- Page Content -->
		<div id="page-content-wrapper">
			<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top" style="background-color: #fff"></span>
    						<span class="hamb-middle" style="background-color: #fff"></span>
								<span class="hamb-bottom" style="background-color: #fff"></span>
      </button>
		
            <div class="container" style="background-color: transparent;"> 
								<!--Cabeçalho -->  
								<div class="row">
									<br><br><br>
											<div class="col-md-offset-3 col-md-8"> 
													<h1 class="text-center page-header" style=" color: white; text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Sistema de gereciamento de avaliações</h1>
													<h2 class="text-center"  style=" color: white; text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Bem vindo!</h2>
												  <br>
												  <h4 class="text-center"  style=" color: white; text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Navegue pela barra lateral a esquerda para começar!</h4>
											</div>
									</div>
								<!--Cabeçalho -->
            </div>
        </div>
		<!-- /#page-content-wrapper -->
	</div>
	<!-- /#sidebar-wrapper -->
  <!--Footer-->
	<?php $this->load->view('layout/footer'); ?>
	<!--Footer-->
</body>
</html>