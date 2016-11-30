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
	<?php var_dump($notas); ?>
	
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
					 Lista de notas por turma
					</h1>
					<h3 class="col-lg-8 col-lg-offset-2 page-header text-center">Clique nas turmas abaixo para visualizar as notas dos alunos</h3>
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
							<?php $i = 0; foreach ($notas as $nota) { $i ++; ?>
								<div class="accordion-group">
									<div class="accordion-heading">
										<table class="table table-striped table-condensed">
											<tbody>
											<tr>
												<td class="active">
													<b>
													<a class="accordion-toggle" style="decoration:none;" data-toggle="collapse" href="#tab<?php echo $i?>" >
														<h4 class="text-center">
															[<?php echo $nota['turma']->idDisciplina ?>] - <?php echo $nota['turma']->id ?> - Média: <?php echo $nota['media'][0]->media ?>
														</h4>
													</a>
													</b>
												</td>
											</tr>
										</tbody>
										</table>
									</div>
									<div id="tab<?php echo $i?>" class="accordion-body collapse">
										<div class="accordion-inner">
											<?php if(!empty($nota['avaliacoes'])){ ?>
												<table class="table table-striped">
													<thead>
														<tr>
															<th>Aluno</th>
														</tr>
													</thead>
													<tbody>
													<tr>
														<ul class="list-group">
													<?php 
													$aluno='';
													$media=0;
													$cont=0;
													foreach($nota['notas'] as $notaAluno) { ?>
														<?php 
														if($aluno!=$notaAluno->nomeAluno){	?>
															<?php if ($cont!=0){ ?> 
																<?php if (floatval($media/$cont)>=6){ ?> 
																	<li class="list-group-item list-group-item-success"><b>Média: <?php echo floatval($media/$cont) ?></b> (Aprovado)</li><hr>
																<?php }else{ ?> 
																	<li class="list-group-item list-group-item-danger"><b>Média: <?php echo floatval($media/$cont) ?></b> (Reprovado)</li><hr>
																<?php } ?> 
															<?php } ?> 
														<?php 
															$aluno = $notaAluno->nomeAluno; 
															$cont=0;
															$media=0;?>
																<li class="list-group-item list-group-item-info"><b><?php echo $notaAluno->nomeAluno  ?></b></li>
														<?php } ?>
														<?php 
														if($aluno==$notaAluno->nomeAluno){ 
															$cont++;
															$media+= (float) $notaAluno->nota?>
																<li class="list-group-item"><b><?php echo $notaAluno->nomeAvaliacao.':</b> '.$notaAluno->nota  ?></li>
														<?php } ?>
													<?php }?>
														<?php if (floatval($media/$cont)>=6){ ?> 
															<li class="list-group-item list-group-item-success"><b>Media: <?php echo floatval($media/$cont) ?></b> (Aprovado)</li><hr>
														<?php }else{ ?> 
															<li class="list-group-item list-group-item-danger"><b>Média: <?php echo floatval($media/$cont) ?></b> (Reprovado)</li><hr>
														<?php } ?> 
														</ul>
													</tr>
													</tbody>
												</table>
											<?php }else{ ?>
												<h4 class="alert alert-info text-center">Nenhuma nota para esta disciplina</h4>
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