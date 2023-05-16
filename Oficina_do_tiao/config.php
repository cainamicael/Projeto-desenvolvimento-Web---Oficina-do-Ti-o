<?php



	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoLoad.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	//Constantes
	define('INCLUDE_PATH','http://localhost/Projeto-desenvolvimento-Web---Oficina-do-Ti-o/Oficina_do_tiao/'); 
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/'); 
	define('BASE_DIR_PAINEL', __DIR__.'/painel');
	define('NOME_EMPRESA', 'Danki Code');

	//Conectar com o banco de dados
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'projeto_01');

	//funções do Painel
	function pegaCargo($indice){
		return Painel::$cargos[$indice];
	}



	function selecionadoMenu($par){ //para escurecer a opção escolhida, ex: adicionar usuarios
		$url = explode('/', @$_GET['url'])[0];
		if($url == $par){
			echo 'class="menu-active"';
		}
	}

	function verificaPermissaoMenu($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return '';
		} else {
			echo 'style="display:none;"';
		}
	
	}

	function verificaPermissaoPagina($permissao){
		
		if($_SESSION['cargo'] >= $permissao){
			return '';
		} else {
			include('painel/pages/permissao_negada.php');
			die();//Obrigatório
		}
	
	}

?>
