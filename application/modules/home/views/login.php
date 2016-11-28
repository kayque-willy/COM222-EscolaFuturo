<!DOCTYPE html>
    <html style="height: 100%">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	     <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
		<!-- Navibar -->
		<link rel="stylesheet" href="/assets/css/side.css">
		<!-- jQuery library -->
		<script src="/assets/js/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="/assets/js/bootstrap.min.js"></script>
    </head>
    <body style="height: 100%">
        <div class="section" style=" width: 100%;height: 100%; background-image: url('/assets/image/login.jpg'); background-size: 100%">
            <div class="container" style="background-color: transparent;"> 
								<!--Cabeçalho -->  
								<div class="row"> 
											<div class="col-md-12"> 
													<h1 class="text-center page-header" style=" color: white; text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Sistema de gereciamento de avaliações</h1>
													<h2 class="text-center"  style=" color: white; text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Login</h2>
											</div>
									</div>
								<!--Cabeçalho -->
							 <!-- Mensagem -->
								<?php if (isset($msg)){ ?>
								<div class="col-md-offset-3 col-md-6 alert alert-danger">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<h3 class="text-center text-danger">Falha ao realizar o login!</h3>
										<p  class="text-center">
												<?php echo $msg; ?>
										</p>
								</div>
								<?php } ?>
								<!-- Mensagem -->
                <div class="row"> 
                    <div class="col-md-offset-3 col-md-6">
									 		<!--Formulario de login -->
											<form method="POST" role="form" class="text-center" action="<?php echo base_url('home/login') ?>">
                        <div class="form-group">
                            <label class="control-label"></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"></span>
                                <input type="text" class="form-control" name="login" value="" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"></span>
                                <input type="password"  name="senha" class="form-control" placeholder="Senha" required>
                            </div>
                        </div>
											  <div class="form-group">
                          <h4 class="control-label" style=" color: white; text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Tipo de usuario</h4>
													<div class="form-group">
														<div class="radio">
															<label style=" color: white; text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
																<input type="radio" name="tipoUsuario" value="professor"
																checked="" required>Professor</label>
														</div>
														<div class="radio">
															<label style=" color: white; text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
																<input type="radio" name="tipoUsuario"  value="aluno"
																checked="" required>Aluno</label>
														</div>
													</div>
												</div>
                        <button type="submit" class="btn btn-lg btn-primary">Entrar</button>
                    </form> 
											<!--Formulario de login -->
									  </div>
                </div>
            </div>
        </div>
    </body>
</html>
