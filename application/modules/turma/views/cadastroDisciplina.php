<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Disciplina</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<!-- Navibar -->
	<link rel="stylesheet" href="/assets/css/side.css">
	<!-- jQuery library -->
	<script src="/assets/js/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="/assets/js/bootstrap.min.js"></script>
</head>

<body>
	<!-- Sidebar -->
	<div id="wrapper">
		<div class="overlay"></div>

		<!--Sidebar-->
		<?php $this->load->view('layout/sidebar'); ?>
	  <!--Sidebar-->
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
						<h1>Cadastro de Disciplinas</h1>
						<form action="cadastrarDisciplina" method="post">
							<div class="form-group">
								<label for="id">Código da Disciplina:</label>
								<input type="id" class="form-control" id="id" name="id">
							</div>
							<div class="form-group">
								<label for="nome">Nome da Disciplina:</label>
								<input type="nome" class="form-control" id="nome" name="nome">
							</div>
							<button type="submit" class="btn btn-default">Cadastrar</button>
						</form>
					</div>
					<div class="col-lg-8 col-lg-offset-2">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>CÓDIGO</th>
									<th>NOME</th>
									<th>AÇÕES</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($disciplinas as $row) { ?>
								<tr>
									<td><?php echo $row['id']?></td>
									<td><?php echo $row['nome']?></td>
									<td><a href="<?php echo base_url('turma/editarDisciplina?id=').$row['id'] ?>">Editar</a>, <a href="<?php echo base_url('turma/excluirDisciplina?id=').$row['id'] ?>">Excluir</a></td>
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
	<!--Footer-->
	<?php $this->load->view('layout/footer'); ?>
	<!--Footer-->

</body>

</html>