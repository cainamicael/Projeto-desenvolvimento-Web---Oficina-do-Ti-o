<?php include('config.php');?>
<?php Site::updateUsuarioOnline();?>
<?php Site::contador();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Oficina do Tião</title>

	 <!--Importando fontes-->
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">
     
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css"> <!--Icones-->
     <script src="https://kit.fontawesome.com/ef74014cf4.js" crossorigin="anonymous"></script> <!--Icones-->

	<link href="<?php echo INCLUDE_PATH; ?>estilo/style.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu website">

	<link rel="icon" href="<?php echo INCLUDE_PATH; ?>images/favicon.ico" type="image/x-icon" /> <!--Favicon-->
	<meta charset="utf-8" />
</head>
<body>


	<base base="<?php echo INCLUDE_PATH; ?>" />

	<?php 
		$url = isset($_GET['url']) ? $_GET['url'] : 'home';

		switch ($url) {
			case 'depoimentos':
				echo '<target target="depoimentos" />';
				break;

			case 'servicos':
				echo '<target target="servicos" />';
				break;
		}
	?>

	<div class="erro">O formulario não foi enviado</div><!--sucesso-->
	<div class="sucesso">Formulário enviado com sucesso</div><!--sucesso-->

	<div class="overlay-loading ">
		<img src="<?php echo INCLUDE_PATH; ?>images/ajax-loader.gif">
	</div><!--overlay-loading -->


	<header>
		<div class="center">
			<div class="logo left"><a href="<?php echo INCLUDE_PATH; ?>">O Tião Oficial</a></div><!--logo-->
			<nav class="desktop right">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>
			 <nav class="mobile right">
			 	<div class="botao-menu-mobile">
				 	<i class="fa-solid fa-bars"></i>
			 	</div>
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a id="contato"realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>
			<div class="clear"></div>
		</div><!--center-->
	</header>

	<div class="container-principal">
		<?php 
			if ($url == '404'){
				$pagina404 = true;
				include('pages/404.php');
			} else {
				if(file_exists('pages/'.$url.'.php')){
					include('pages/'.$url.'.php');
				}else{
					if($url != 'depoimentos' && $url != 'servicos'){
						$pagina404 = true;
						include('pages/404.php');
					}else{
						$pagina404 = false;
						include('pages/home.php');
					}
				}
			}
			
		?>
	</div>

	<footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
		<div class="center">
			<p>Todos os direitos reservados</p>
		</div><!--center-->
	</footer>

	<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>

	<!--
	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
	<script src="<?php #echo INCLUDE_PATH; ?>js/map.js"></script>  Para usar o mapa via api--> 
	<script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>

	<?php
		if($url == 'home' || $url == '' || $url == 'depoimentos' || $url == 'servicos'){
	?>
	<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
	<?php } ?>
	

	<?php
		if($url == 'contato'){
	?>
	<?php } ?>
	<script src="<?php echo INCLUDE_PATH; ?>js/carregarEspecialidades.js"></script>

	<script src="<?php echo INCLUDE_PATH;?>js/formularios.js"></script>
</body>
</html>