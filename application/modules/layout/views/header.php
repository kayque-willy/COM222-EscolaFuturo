<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">     
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
            <a class="navbar-brand" href="<?php echo base_url() ?>">UNIFUNDING</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url() ?>">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tipos de projetos<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('/projeto/?categoria=Pesquisa') ?>">Pesquisa</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('/projeto/?categoria=Competição Tecnológica') ?>">Competição Tecnológica</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('/projeto/?categoria=Inovação no Ensino') ?>">Inovação no Ensino</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('/projeto/?categoria=Manutenção e Reforma') ?>">Manutenção e Reforma</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('/projeto/?categoria=Pequenas Obras') ?>">Pequenas Obras</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url("/projeto/"); ?>">Projetos</a></li>
                <li>
                    <form action="<?php echo base_url('/projeto/'); ?>" class="navbar-form navbar-right" role="search" method="GET">
                            <div class="form-group">
                                <input name="nome" type="text" class="form-control" placeholder="Escreva o nome do projeto a ser buscado">
                            </div>
                            <inpu type="submit" class="btn btn-default">Buscar Projeto</button>
                        </form>
                    <!--Navegação a direita-->
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(($_SESSION['tipo']=='Administrativo') or ($_SESSION['tipo']=='Gestor de Projetos')){ ?>
                <!--Administração Projetos candidatos-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Relatórios<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('/financiamento/relatorio'); ?>">Investimentos por projeto</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('/financiamento/relatorioCategoria'); ?>">Investimentos por categoria</a></li>
                    </ul>
                </li>
                <!--Administração Projetos candidatos-->
                <?php } ?>   
                
                <!--Administração Projetos candidatos-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrar projetos<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php if(($_SESSION['tipo']=='Administrativo') or ($_SESSION['tipo']=='Gestor de Projetos')){ ?>
                            <li><a href="<?php echo base_url('/repasse/consultar'); ?>">Repasses financeiros</a></li>
                        <?php } ?>   
                        <?php if(($_SESSION['tipo']=='Administrativo') or ($_SESSION['tipo']=='Gestor de Projetos') or ($_SESSION['tipo']=='Avaliador de Projetos') ) {?>
                            <li class="divider"></li>
                           <li><a href="<?php echo base_url('/projeto/todosProjetos'); ?>">Todos os projetos</a></li>
                        <?php } ?>
                        <?php if(($_SESSION['tipo']=='Administrativo') or ($_SESSION['tipo']=='Gestor de Projetos') or ($_SESSION['tipo']=='Avaliador de Projetos') ) {?>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('/projeto/consultar'); ?>">Projetos Candidatos</a></li>
                        <?php } ?>
                        <?php if(($_SESSION['tipo']=='Administrativo') or ($_SESSION['tipo']=='Avaliador de Projetos')){ ?>
                           
                            <li><a href="<?php echo base_url('/avaliacao/consultar'); ?>">Avaliações de projetos candidatos</a></li>
                        <?php } ?>
                        <?php if(($_SESSION['tipo']=='Administrativo') or ($_SESSION['tipo']=='Gestor de Projetos') or ($_SESSION['tipo']=='Avaliador de Projetos') ) {?>
                            <li><a href="<?php echo base_url('/criterio/consultar'); ?>">Critérios de avaliação</a></li>
                        <?php } ?>
                       
                    </ul>
                </li>
                <!--Administração Projetos candidatos-->
                <!--Login-->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php echo $_SESSION['login'] ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                         <li><a href="<?php echo base_url('/financiamento/consultar'); ?>">Meus financiamentos</a></li>    
                         <li class="divider"></li>
                        <?php if($_SESSION['tipo']=='Administrativo') {?>
                            <li><a class="btn" href="<?php echo base_url("/usuario/cadastrar ") ?>">Adicionar usuario</a></li>
                        <?php } ?>
                        <?php if($_SESSION['tipo']!='Usuário Público') {?>
                            <li><a class="btn" href="<?php echo base_url("/usuario/consultar ") ?>">Ver usuarios</a></li>
                            <li class="divider"></li>
                        <?php } ?>
                        <li><a class="btn" href='<?php echo base_url("/usuario/alterar/".$_SESSION["login"]) ?>'>Atualizar perfil</a></li>
                        <li><a class="btn" href="<?php echo base_url("/usuario/logoff ") ?>">Sair</a></li>
                    </ul>
                    <!-- Formulario do login-->
                </li>
                <!--Login-->
            </ul>
            <!--Navegação a direita-->
        </div>
    </div>
</nav>