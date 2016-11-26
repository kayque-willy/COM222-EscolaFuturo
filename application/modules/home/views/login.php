<!DOCTYPE html>
    <html style="height: 100%">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
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
                <div class="row"> 
                    <div class="col-md-offset-3 col-md-6">
									 		<!--Formulario de login -->
											<form method="POST" role="form" class="text-center" action="<?php echo base_url('home/login') ?>">
                        <div class="form-group">
                            <label class="control-label"></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"></span>
                                <input type="text" class="form-control" name="login" value="" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"></span>
                                <input type="password"  name="senha" class="form-control" placeholder="Senha">
                            </div>
                        </div>
											  <div class="form-group">
                          <h4 class="control-label" style=" color: white; text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Tipo de usuario</h4>
													<div class="form-group">
														<div class="radio">
															<label style=" color: white; text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
																<input type="radio" name="tipoUsuario" value="professor"
																checked="">Professor</label>
														</div>
														<div class="radio">
															<label style=" color: white; text-shadow: 1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
																<input type="radio" name="tipoUsuario"  value="aluno"
																checked="">Aluno</label>
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
