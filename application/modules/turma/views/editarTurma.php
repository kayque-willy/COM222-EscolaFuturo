<!DOCTYPE html>
<html>

<head>
	<title>Gerenciamento de Turmas</title>
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
		<div id="page-content-wrapper" style="margin-bottom: 150px;">
			<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
			<div class="container">
				<div class="row">

					<div class="col-lg-8 col-lg-offset-2">
						<h1>Cadastro de Turmas</h1>
						<form action="turma/atualizarTurma" method="post">
							<div class="form-group">
								<label for="id">Nome da Turma:</label>
								<input type="text" disabled="true" value="<?php echo $turma[0]['id']?>" class="form-control" id="id">
								<input type="hidden" value="<?php echo $turma[0]['id']?>" name="id">
							</div>
							<div class="form-group">
								<?php print_r($turma)?>
								<label for="idDisciplina">Disciplina:</label>
								<select class="form-control" disabled="true" value="<?php echo $turma[0]['idDisciplina']?>" id="idDisciplina">
       					<option>Selecione</option>
									<?php foreach ($disciplinas as $row) { ?>
        								<option value="<?php echo $row['id'] ?>"><?php echo $row['id'] ?></option>
        						<?php } ?>
      					</select>
								<input type="hidden" value="<?php echo $turma[0]['idDisciplina']?>" name="idDisciplina">
							</div>
							<div class="form-group">
								<label for="loginProfessor">Professor:</label>
								<select class="form-control" disabled="true" value="<?php echo $turma[0]['loginProfessor']?>" id="loginProfessor">
       					<option>Selecione</option>
									<?php foreach ($professores as $row) { ?>
        								<option value="<?php echo $row['login'] ?>"><?php echo $row['nome'] ?></option>
        						<?php } ?>
      					</select>
								<input type="hidden" value="<?php echo $turma[0]['loginProfessor']?>" name="loginProfessor">
							</div>
							<div class="form-group">
								<label for="loginAluno">Alunos:</label>
								<select multiple class="form-control" value="<?php echo $turma[0]['alunos'][0]?>" id="loginAluno" name="loginAluno[]">
       					<option>Selecione</option>
									<?php foreach ($alunos as $row) { ?>
        								<option value="<?php echo $row['login'] ?>"><?php echo $row['nome'] ?></option>
        						<?php } ?>
      					</select>
							</div>
							<button type="submit" class="btn btn-default">Salvar</button>
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
										<th>AÇÕES</th>
									</tr>
								</thead>
							</table>
							<?php $i = 0; foreach ($turmas as $row) { $i ++;?>
							<div class="accordion-group">
								<div class="accordion-heading">
										<table class="table table-striped table-condensed">
											<tbody>
												<tr>
													<td>
														<a class="accordion-toggle" style="decoration:none;" data-toggle="collapse" href="#tab<?php echo $i?>"><?php echo $row['id']?></a>
													</td>
													<td>
														<?php echo $row['idDisciplina']?>
													</td>
													<td>
														<?php echo $row['loginProfessor']?>
													</td>
													<td>
														<a href="<?php echo base_url('turma/editarTurma?id=').$row['id'].'&disciplina='.$row['idDisciplina'].'&professor='.$row['loginProfessor'] ?>">Editar</a>, <a href="<?php echo base_url('turma/excluirTurma?id=').$row['id'].'&disciplina='.$row['idDisciplina'].'&professor='.$row['loginProfessor'] ?>">Excluir</a>
													</td>
												</tr>
											</tbody>
										</table>
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
  <!--Footer-->
	<?php $this->load->view('layout/footer'); ?>
	<!--Footer-->
</body>

</html>