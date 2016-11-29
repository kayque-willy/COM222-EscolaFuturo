<!DOCTYPE html>
<html>

<head>
	<title>Sucesso</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Navibar -->
	<link rel="stylesheet" href="/assets/css/side.css">

	<!-- jQuery library -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

	<!-- Sidebar -->
	<div id="wrapper">
		<div class="overlay"></div>

		<!--Sidebar-->
		<?php $this->load->view('layout/sidebar'); ?>
	    <!--Sidebar-->

		<!-- Page Content -->
		<div id="page-content-wrapper">
			<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						
						<h3 style="color: green;">Cadastro Efetuado com Sucesso!!</h3>
						
					</div>
				</div>
			</div>
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#sidebar-wrapper -->

</body>

</html>