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
						<h1 class="page-header text-center"> <?php echo '['.$avaliacao['idDisciplina'].'] - '.$avaliacao['idTurma'] ?> - Atualizar avaliação</h1>
						<!--Formulario de cadastro -->
						<?php if(!empty($avaliacao)){ ?>
							<form action="<?php echo base_url('avaliacao/editarAvaliacao/')?>" method="post">
								<!--Ids hidden-->
								<input readonly type="hidden" name="idAvaliacao" value="<?php echo $avaliacao['id'] ?>">
								<input readonly type="hidden" name="idTurma" value="<?php echo $avaliacao['idTurma'] ?>">
								<input readonly type="hidden" name="loginProfessor" value="<?php echo $avaliacao['loginProfessor'] ?>">
								<input readonly type="hidden" name="idDisciplina" value="<?php echo $avaliacao['idDisciplina'] ?>">
								<!--Ids hidden-->
								<!--Nome da avaliação-->
							    <div class="form-group">
								<label for="r1">Nome da avaliação</label>
									<input required type="text" class="form-control" id="nome" name="nome" value="<?php echo $avaliacao['nome'] ?>">
								</div>
								<!--Nome da avaliação-->
							    <legend>Questões da avaliação</legend>
								<?php if(!empty($questoes)){
									foreach($questoes as $questao){ ?>
									<!--Lista de questões da disciplina-->
									<div class="form-group">
						                  	<a href="<?php echo base_url('avaliacao/removerQuestaoAvaliacao').'/'.$questao->id.'/'.$questao->idAvaliacao; ?>"class="btn btn-xs btn-danger">Remover</a>
						                    <span><b>Questão: </b><?php echo $questao->enunciado; ?></span><br>
						                    <span><br><b>Respostas:</b></span>
						                    <ul>
						                    	<li>1 - <?php echo $questao->r1; ?> <?php if($questao->respostaCerta=='r1') echo ' (Correta)' ?></li>
						                    	<li>2 - <?php echo $questao->r2; ?> <?php if($questao->respostaCerta=='r2') echo ' (Correta)' ?></li>
						                    	<li>3 - <?php echo $questao->r3; ?> <?php if($questao->respostaCerta=='r3') echo ' (Correta)' ?></li>
						                    	<li>4 - <?php echo $questao->r4; ?> <?php if($questao->respostaCerta=='r4') echo ' (Correta)' ?></li>
						                    </ul>
						             </div>
						             <hr>
									<!--Lista de questões da disciplina-->	
								<?php	
									}
								}else{ 
								?>
									<div class="form-group">
										<h3 class="alert alert-info text-center">Não existem questões adicionanadas nesta avaliação!</h3>
									</div>
								<?php }	?>
								<legend>Selecione as questões abaixo para adiciona-las na avaliação</legend>
								<?php if(!empty($questoes_fora)){
									foreach($questoes_fora as $questao){?>
									<!--Lista de questões da disciplina-->
									<div class="form-group">
						                <div class="checkbox">
						                  <label>
						                    <input type="checkbox" name="questoes[]" value="<?php echo $questao->id; ?> ">
						                    <span><?php echo $questao->enunciado; ?></span>
						                    <span><br><b>Respostas:</b></span>
						                    <ul>
						                    	<li>1 - <?php echo $questao->r1; ?> <?php if($questao->respostaCerta=='r1') echo ' (Correta)' ?></li>
						                    	<li>2 - <?php echo $questao->r2; ?> <?php if($questao->respostaCerta=='r2') echo ' (Correta)' ?></li>
						                    	<li>3 - <?php echo $questao->r3; ?> <?php if($questao->respostaCerta=='r3') echo ' (Correta)' ?></li>
						                    	<li>4 - <?php echo $questao->r4; ?> <?php if($questao->respostaCerta=='r4') echo ' (Correta)' ?></li>
						                    </ul>
						                    </label>
						                </div>
						             </div>
									<!--Lista de questões da disciplina-->	
								<?php	
									}
								}else{ 
								?>
									<div class="form-group">
										<h3 class="alert alert-info text-center">Não existem questões cadastradas para essa avaliação!</h3>
									</div>
								<?php }	?>
								<button type="submit" class="btn btn-primary">Atualizar avaliação</button>
								<a href="<?php echo base_url('avaliacao/') ?>" type="submit" class="btn btn-default">Cancelar</a>
							</form>
						<?php } ?>
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