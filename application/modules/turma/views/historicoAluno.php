<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Histórico do Aluno</title>
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
						<h1>Histórico do Aluno</h1>
					</div>
					<div class="col-lg-8 col-lg-offset-2">
						<?php if (!empty($_GET['login'])){ ?>
							<h1 style="color:red;"><?php echo $retorno ?></h1>
						<?php } ?>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>NOME</th>
									<th>LOGIN</th>
									<th>AÇÕES</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($alunos as $row) { ?>
								<tr>
									<td><?php echo $row['nome']?></td>
									<td><?php echo $row['login']?></td>
									<td><a href="<?php echo base_url('turma/editarAluno?login=').$row['login'] ?>">Editar</a>, <a href="<?php echo base_url('turma/excluirAluno?login=').$row['login'] ?>">Excluir</a></td>
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