<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Avaliações</title>
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
	<?php var_dump($this->db->last_query()); break; ?>
	
	
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
				 <h1 class="col-lg-8 col-lg-offset-2 page-header text-center">
					 Lista de avaliações por turma
					</h1>
					<h3 class="col-lg-8 col-lg-offset-2 page-header text-center">Clique nas turmas abaixo para visualizar as suas avaliações</h3>
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
					<!--Lista de questões -->
					<div class="col-lg-8 col-lg-offset-2">
						<div class="accordion">
							<?php $i = 0; foreach ($avaliacoes as $avaliacao) { $i ++; ?>
								<div class="accordion-group">
									<div class="accordion-heading">
										<table class="table table-striped table-condensed">
											<tbody>
											<tr>
												<td class="active">
													<b>
													<a class="accordion-toggle" style="decoration:none;" data-toggle="collapse" href="#tab<?php echo $i?>" >
														<h4 class="text-center">
															[<?php echo $avaliacao['turma']->idDisciplina ?>] - <?php echo $avaliacao['turma']->id ?>
														</h4>
													</a>
													</b>
												</td>
											</tr>
										</tbody>
										</table>
									</div>
									<div id="tab<?php echo $i?>" class="accordion-body collapse  <?php if($avaliacao['turma']->id == $idTurma and $avaliacao['turma']->idDisciplina==$idDisciplina) echo 'in'; ?>">
										<div class="text-center">
												<a class="btn btn-sm btn-success" href="<?php echo base_url('avaliacao/cadastrarAvaliacao')."?idTurma=".$avaliacao['turma']->id."&loginProfessor=".$avaliacao['turma']->loginProfessor."&idDisciplina=".$avaliacao['turma']->idDisciplina ?>">Adicionar avaliação</a>
										</div>
										<div class="accordion-inner">
											<?php if(!empty($avaliacao['avaliacoes'])){ ?>
												<table class="table table-striped">
													<thead>
														<tr>
															<th>Avaliações desta disciplina</th>
															<th class="text-center">Ação</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($avaliacao['avaliacoes'] as $aval) {  ?>
														<tr>
															<td>
																<?php echo $aval->nome  ?>
															</td>
															<td class="text-center">
																<a class="btn btn-xs btn-info" href="<?php echo base_url('avaliacao/editarAvaliacao/')."/".$aval->id ?>">Editar</a> 
																<a class="btn btn-xs btn-danger" href="<?php echo base_url('avaliacao/excluirAvaliacao/')."/".$aval->id ?>">Excluir</a>
															</td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											<?php }else{ ?>
												<h4 class="alert alert-info text-center">Nenhuma avaliação cadastrada para esta disciplina</h4>
											<?php } ?>
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