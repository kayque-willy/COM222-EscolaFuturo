<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Professores</title>
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
					<!--mensagem-->
		            <?php if (isset($sucesso)){  ?>
		            <div class="col-lg-8 col-lg-offset-2 alert alert-success text-center">
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <strong>SUCESSO!</strong>
		                <p>
		                    <?php echo $msg; ?>
		                </p>
		            </div>
		            <?php } ?>
		            <?php if (isset($falha)){ ?>
		            <div class="col-lg-8 col-lg-offset-2 alert alert-danger text-center">
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <strong>FALHA!</strong>
		                <p>
		                    <?php echo $msg; ?>
		                </p>
		            </div>
		            <?php } ?>
		            <!--mensagem-->
					<div class="col-lg-8 col-lg-offset-2">
						<h1>Cadastro de Professores</h1>
						<form action="<?php echo base_url('turma/atualizarProfessor') ?>" method="post">
							<div class="form-group">
								<label for="nome">Nome do Professor:</label>
								<input type="text" value="<?php echo $professor[0]['nome']?>" class="form-control" id="nome" name="nome">
							</div>
							<div class="form-group">
								<label for="login">Login (E-mail):</label>
								<input type="text" disabled="true" value="<?php echo $professor[0]['login']?>" class="form-control" id="login" name="login">
								<input type="hidden" value="<?php echo $professor[0]['login']?>" name="login">
							</div>
							<div class="form-group">
								<label for="senha">Senha:</label>
								<input type="password" value="<?php echo $professor[0]['senha']?>"  class="form-control" id="senha" name="senha">
							</div>
							<button type="submit" class="btn btn-default">Salvar</button>
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
									<td><a href="<?php echo base_url('turma/editarProfessor?login=').$row['login'] ?>">Editar</a>, <a href="<?php echo base_url('turma/excluirProfessor?login=').$row['login'] ?>">Excluir</a></td>
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