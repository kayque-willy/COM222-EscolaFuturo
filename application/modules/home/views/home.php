<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Navibar -->
	<link rel="stylesheet" href="/assets/css/side.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body background="http://www.chainimage.com/download.php?img=images/education-ppt-background-study-time-for-education-ppt-backgrounds.jpg" style="background-size: cover;">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script>
		$(document).ready(function() {
			var trigger = $('.hamburger'),
				overlay = $('.overlay'),
				isClosed = false;

			trigger.click(function() {
				hamburger_cross();
			});

			function hamburger_cross() {

				if (isClosed == true) {
					overlay.hide();
					trigger.removeClass('is-open');
					trigger.addClass('is-closed');
					isClosed = false;
				} else {
					overlay.show();
					trigger.removeClass('is-closed');
					trigger.addClass('is-open');
					isClosed = true;
				}
			}

			$('[data-toggle="offcanvas"]').click(function() {
				$('#wrapper').toggleClass('toggled');
			});
		});
	</script>
	<!-- Sidebar -->
	<div id="wrapper">
		<div class="overlay"></div>

		<!-- Sidebar -->
		<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
			<ul class="nav sidebar-nav">
				<li class="sidebar-brand">
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Gerenciamento de Notas</a>
				</li>
				<li>
					<a href="#">Gerenciamento de Avaliações</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerenciamento de Turmas <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li class="dropdown-header">Opções</li>
						<li><a href="<?php echo base_url('turma/aluno') ?>">Alunos</a></li>
						<li><a href="<?php echo base_url('turma/disciplina') ?>">Disciplinas</a></li>
						<li><a href="<?php echo base_url('turma/professor') ?>">Professores</a></li>
						<li><a href="<?php echo base_url('turma') ?>">Turmas</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<!-- /#sidebar-wrapper -->

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
											</div>
									</div>
								<!--Cabeçalho -->
            </div>
        </div>
	
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#sidebar-wrapper -->

</body>

</html>