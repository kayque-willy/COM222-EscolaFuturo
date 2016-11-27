<!DOCTYPE html>
<html>

<head>
	<title>Banco de questões</title>
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
					<!--Formulario de cadastro -->
					<div class="col-lg-8 col-lg-offset-2">
						<h1>Cadastro de Questões</h1>
						<!--Formulario de cadastro -->
						<form action="avaliacao/cadastrarQuestao" method="post">
							<!--idDisciplina-->
							<div class="form-group">
								<label for="idDisciplina">Disciplina:</label>
								<select class="form-control" id="idDisciplina" name="idDisciplina">
       					<option selected="true" disabled="disabled">Selecione</option>
									<?php foreach ($disciplinas as $disciplina) { ?>
        								<option value="<?php echo $disciplina->id ?>"><?php echo $disciplina->id ?></option>
        						<?php } ?>
      					</select>
							</div>
							<!--idDisciplina-->
							<!--Enunciado-->
							<div class="form-group">
								<label for="id">Enunciado:</label>
								<textarea type="text" class="form-control" id="enunciado" name="enunciado"></textarea>
							</div>
							<!--Enunciado-->
						  <!--Resp1-->
							<div class="form-group">
								<label for="r1">Resposta 1:</label>
								<input type="text" class="form-control" id="r1" name="r1">
							</div>
							<!--Resp1-->
							<!--Resp2-->
							<div class="form-group">
								<label for="r2">Resposta 2:</label>
								<input type="text" class="form-control" id="r2" name="r2">
							</div>
							<!--Resp2-->
							<!--Resp3-->
							<div class="form-group">
								<label for="r3">Resposta 3:</label>
								<input type="text" class="form-control" id="r3" name="r3">
							</div>
							<!--Resp3-->
							<!--Resp4-->
							<div class="form-group">
								<label for="r4">Resposta 4:</label>
								<input type="text" class="form-control" id="r4" name="r4">
							</div>
							<!--Resp4-->
							<!--Reposta correta-->
							<div class="form-group">
								<label for="respostaCerta">Resposta correta:</label>
								<select class="form-control" id="respostaCerta" name="respostaCerta">
       						<option selected="true" disabled="disabled">Selecione</option>
									<option value="r1">Respota 1</option>
									<option value='r2'>Respota 2</option>
									<option value='r3'>Respota 3</option>
									<option value='r4'>Respota 4</option>
      					</select>
							</div>
							<!--Reposta correta-->
							<button type="submit" class="btn btn-success">Cadastrar</button>
						</form>
						<!--Formulario de cadastro -->
					</div>
					<!--Formulario de cadastro -->
					<!--Lista de questões -->
					<div class="col-lg-8 col-lg-offset-2">
						<div class="accordion">
							<table class="table table-striped table-condensed">
								<thead>
									<tr>
										<th>LISTA DE DISCIPLINAS</th>
									</tr>
								</thead>
							</table>
							<?php $i = 0; foreach ($disciplinas as $disciplina) { $i ++; ?>
								<div class="accordion-group">
									<div class="accordion-heading">
										<table class="table table-striped table-condensed">
											<tbody>
											<tr>
												<td>
													<a class="accordion-toggle" style="decoration:none;" data-toggle="collapse" href="#tab<?php echo $i?>">
														[<?php echo $disciplina['disciplina']->id ?>] - <?php echo $disciplina['disciplina']->nome?>
													</a>
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
														<th>Questao</th>
														<th>Ação</th>
													</tr>
												</thead>
												<tbody>
													<?php $j=1; foreach($disciplina['questoes'] as $questao) {  ?>
													<tr>
														<td>
															<?php echo "(".$j++.") - ".$questao->enunciado  ?>
														</td>
														<td>
															<a href="<?php echo base_url('avaliacao/editarQuestao/')."/".$questao->id ?>">Editar</a>, 
															<a href="<?php echo base_url('avaliacao/excluirQuestao/')."/".$questao->id ?>">Excluir</a>
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
					<!--Lista de questões -->
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