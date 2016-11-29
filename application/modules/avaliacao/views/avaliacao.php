<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Atualizar avaliação</title>
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
						<?php if(!empty($avaliacoes)){
							foreach($avaliacoes as $avaliacao){ ?>
							<h1 class="page-header text-center"> <?php echo '['.$avaliacao->idDisciplina.'] - '.$avaliacao->nomeAvaliacao.' - '.$avaliacao->turma ?></h1>
							<!--Formulario de cadastro -->
							<form action="<?php echo base_url('avaliacao/fazerAvaliacao/')?>" method="post">
							<!--Ids hidden-->
							<input readonly type="hidden" name="idAvaliacao" value="<?php echo $avaliacao->idAvaliacao ?>">
							<!--Ids hidden-->
						<?php break; } ?>
							<legend class="text-center">Interpretação faz parte da prova!</legend>
							<?php $j=0; foreach($avaliacoes as $avaliacao){ ?>	
								<!--Lista de questões da disciplina-->
								<div class="form-group">
						            <span><b>Questão <?php echo ++$j.":</b> ".$avaliacao->enunciado; ?></span><br>
						            	<ul>
						                   <div class="radio">
											<label>
												<input type="radio" name="q<?php echo $j ?>" value="r1" checked="" required><?php echo $avaliacao->r1; ?>
											</label>
										   </div>
						                    <div class="radio">
											<label>
												<input type="radio" name="q<?php echo $j ?>" value="r2" checked="" required><?php echo $avaliacao->r2; ?>
											</label>
										   </div>
										    <div class="radio">
											<label>
												<input type="radio" name="q<?php echo $j ?>" value="r3" checked="" required><?php echo $avaliacao->r3; ?>
											</label>
										   </div>
										    <div class="radio">
											<label>
												<input type="radio" name="q<?php echo $j ?>" value="r4" checked="" required><?php echo $avaliacao->r4; ?>
											</label>
										   </div>
										   <!--Ids hidden-->
											<input readonly type="hidden" name="correta<?php echo $j ?>" value="<?php echo $avaliacao->respostaCerta ?>">
										   <!--Ids hidden-->
						                   
						                </ul>
						        </div>
						        <hr>
								<!--Lista de questões da disciplina-->	
								<?php	
									}
								}else{ ?>
									<div class="form-group">
										<h3 class="alert alert-info text-center">Não existem questões adicionanadas nesta avaliação!</h3>
									</div>
								<?php }	?>
								<div class='text-center'>
									<button type="submit" class="btn btn-success">Enviar avaliação</button>
									<a href="<?php echo base_url('avaliacao/listarAvaliacoes') ?>" type="submit" class="btn btn-default">Cancelar</a>
								</div>
							</form>
						<!--Formulario de cadastro -->
					</div>
					<!--Formulario de cadastro -->
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