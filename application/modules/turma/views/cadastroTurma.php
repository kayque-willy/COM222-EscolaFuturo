<!DOCTYPE html>
<html>

<head>
	<title>Gerenciamento de Turmas</title>
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
					<a href="#">
                       Brand
                    </a>
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
						<h1>Cadastro de Turmas</h1>
						<form action="turma/cadastrarTurma" method="post">
							<div class="form-group">
								<label for="id">Nome da Turma:</label>
								<input type="text" class="form-control" id="id" name="id">
							</div>
							<div class="form-group">
								<label for="idDisciplina">Disciplina:</label>
								<select class="form-control" id="idDisciplina" name="idDisciplina">
       					<option>Selecione</option>
									<?php foreach ($disciplinas as $row) { ?>
        								<option value="<?php echo $row['id'] ?>"><?php echo $row['id'] ?></option>
        						<?php } ?>
      					</select>
							</div>
							<div class="form-group">
								<label for="loginProfessor">Professor:</label>
								<select class="form-control" id="loginProfessor" name="loginProfessor">
       					<option>Selecione</option>
									<?php foreach ($professores as $row) { ?>
        								<option value="<?php echo $row['login'] ?>"><?php echo $row['nome'] ?></option>
        						<?php } ?>
      					</select>
							</div>
							<div class="form-group">
								<label for="loginAluno">Alunos:</label>
								<select multiple class="form-control" id="loginAluno" name="loginAluno[]">
       					<option>Selecione</option>
									<?php foreach ($alunos as $row) { ?>
        								<option value="<?php echo $row['login'] ?>"><?php echo $row['nome'] ?></option>
        						<?php } ?>
      					</select>
							</div>
							<button type="submit" class="btn btn-default">Cadastrar</button>
						</form>
					</div>

					<div class="col-lg-8 col-lg-offset-2">
						<div class="accordion">
							<table class="table table-striped table-condensed">
								<thead>
									<tr>
										<th>TURMA</th>
										<th>DISCIPLINA</th>
										<th>PROFESSOR</th>
									</tr>
								</thead>
							</table>
							<?php $i = 0; foreach ($turmas as $row) { $i ++;?>
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" style="decoration:none;" data-toggle="collapse" href="#tab<?php echo $i?>">
										<table class="table table-striped table-condensed">
											<tbody>
												<tr>
													<td>
														<?php echo $row['id']?>
													</td>
													<td>
														<?php echo $row['idDisciplina']?>
													</td>
													<td>
														<?php echo $row['loginProfessor']?>
													</td>
												</tr>
											</tbody>
										</table>
									</a>
								</div>
								<div id="tab<?php echo $i?>" class="accordion-body collapse">
									<div class="accordion-inner">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>ALUNO</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($row['alunos'] as $a) { ?>
												<tr>
													<td>
														<?php echo $a['loginAluno']?>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#sidebar-wrapper -->

</body>

</html>