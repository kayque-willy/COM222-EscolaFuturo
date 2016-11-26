<!DOCTYPE html>
<html>

<head>
	<title>Cadastro de Professores</title>
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
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<h1>Cadastro de Professores</h1>
						<form action="cadastrarProfessor" method="post">
							<div class="form-group">
								<label for="nome">Nome do Professor:</label>
								<input type="text" class="form-control" id="nome" name="nome">
							</div>
							<div class="form-group">
								<label for="login">Login (E-mail):</label>
								<input type="text" class="form-control" id="login" name="login">
							</div>
							<div class="form-group">
								<label for="senha">Senha:</label>
								<input type="password" class="form-control" id="senha" name="senha">
							</div>
							<button type="submit" class="btn btn-default">Cadastrar</button>
						</form>
					</div>
					<div class="col-lg-8 col-lg-offset-2">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>NOME</th>
									<th>LOGIN</th>
									<th>AÇÕES</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($professores as $row) { ?>
								<tr>
									<td><?php echo $row['nome']?></td>
									<td><?php echo $row['login']?></td>
									<td>Excluir, Editar</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#sidebar-wrapper -->

</body>

</html>