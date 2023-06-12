<?php
if (isset($_GET['url']) && $_GET['url'] == 'logout'){ 
    Painel::logout();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css"> <!--Icones-->
     <script src="https://kit.fontawesome.com/ef74014cf4.js" crossorigin="anonymous"></script> <!--Icones-->

    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>images/favicon.ico" type="image/x-icon" /> <!--Favicon-->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">

</head>
<body>

    <div class="menu">
        <div class="menu-wrapper">
            <div class="box-usuario">
                <?php
                    if($_SESSION['img'] == ''){
                ?>

                <div class="avatar-usuario">
                    <i class="fa fa-user"></i>
                </div><!--avatar-usuario-->

                <?php } else { ?>

                <div class="imagem-usuario">
                    <img src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $_SESSION['img']?>">
                </div><!--avatar-usuario-->

                <?php }?>
                    
                <div class="nome-usuario">
                    <p><?php echo $_SESSION['nome'];?></p>
                    <p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
                </div><!--nome-usuario-->
                
            </div><!--box-usuario-->

            <div class="items-menu">
                    <h2>Cadastro</h2>
                    <a <?php selecionadoMenu('cadastrar-depoimento');?>href="<?php echo INCLUDE_PATH_PAINEL;?>cadastrar-depoimento">Cadastrar Depoimento</a>
                    <a <?php selecionadoMenu('cadastrar-servico'); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>cadastrar-servico">Cadastrar Serviço</a>
                    <a <?php selecionadoMenu('cadastrar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>cadastrar-slides">Cadastrar Slides</a>

                    <h2>Gestão</h2>
                    <a <?php selecionadoMenu('listar-depoimentos'); ?> href="<?php echo INCLUDE_PATH_PAINEL?>listar-depoimentos">Listar Depoimentos</a>
                    <a <?php selecionadoMenu('listar-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL?>listar-servicos">Listar Serviços</a>
                    <a <?php selecionadoMenu('listar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL?>listar-slides">Listar Slides</a>


                    <h2>Administração do Painel</h2>
                    <a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuario">Editar Usuário</a>
                    <a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2);?> href="<?php echo INCLUDE_PATH_PAINEL?>adicionar-usuario">Adicionar Usuário</a>

                    <!-- <h2>Configuração Geral</h2>
                    <a <?php selecionadoMenu('editar-site'); ?> href="">Editar Site</a> -->
            </div><!--itens-menu-->

        </div><!--menu-wrapper-->

    </div><!--menu-->

    <header>

        <div class="center">

            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div><!--menu-btn-->

            <div class="logout">
                <a <?php if(@$_GET['url'] == '') { ?> style="background: #60727a; padding: 13px" <?php } ?>href="<?php echo INCLUDE_PATH_PAINEL;?>">
                    <i class="fa fa-home"></i>
                    <span>Pagina Inicial</span>
                </a>

                <a href="<?php echo INCLUDE_PATH_PAINEL;?>logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Sair</span> 
                </a>
            </div><!--logout-->

            <div class="clear"></div><!--clear-->

        </div><!--center-->

    </header>

    <div class="content">

        <?php
            Painel::carregarPagina();
        ?>

    </div><!--content-->

    <script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH?>js/jquery.mask.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>

</body>
</html>