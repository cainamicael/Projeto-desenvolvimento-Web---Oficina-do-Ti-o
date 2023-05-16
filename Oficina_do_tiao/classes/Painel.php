<?php

    class Painel {

        public static $cargos = ['0' => 'Normal', '1' => 'Sub-Administrador', '2' => 'Administrador'];

        public static function logado(){
            return (isset($_SESSION['login'])) ? true : false;
        }
        
        public static function logout(){
            
            session_destroy();setcookie('lembrar', true, time() - 1, '/'); //A barra é para pegar em todo site
            header('Location: '.INCLUDE_PATH_PAINEL);
            
        }

        public static function carregarPagina(){
            if(isset($_GET['url'])){
                $url = explode('/', $_GET['url']);//Para criar um array em cada barra para evitar erros.
                if (file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                } else {
                    header('Location: '.INCLUDE_PATH_PAINEL);//No caso, volta para o home. Mas poderia ser uma página de erro
                }
            } else {
                include('pages/home.php');
            }
        }

        public static function listarUsuariosOnline() {
              self::limparUsuariosOnline();
              $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
              $sql->execute();
              return $sql->fetchAll();
          }
  
          public static function limparUsuariosOnline() {
              $date = date('Y-m-d H:i:s');
              $sql = MySql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");//Pra limpar tudo depois do intervalo de 1 minuto
  
          }

          public static function alert($tipo,$mensagem){
			if($tipo == 'sucesso'){
				echo '<div class="box-alert sucesso"><i class="fa fa-check"></i> '.$mensagem.'</div>';
			}else if($tipo == 'erro'){
				echo '<div class="box-alert erro"><i class="fa fa-times"></i> '.$mensagem.'</div>';
			}
		}

        public static function imagemValida($imagem){
            if($imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/png'){
                $tamanho = intval($imagem['size'] / 1024); //para converter em kb e arredondar

                if($tamanho < 300)
                    return true;
                else
                    return false;
                
            } else {
                return false;
            }

        }

        public static function uploadFile($file){
            $formatoArquivo = explode('.', $file['name']);//Pra pegar o que está depois do ponto
            $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome)){
                return $imagemNome;
            } else {
                return false;
            }

        }

        public static function deleteFile($file){
			@unlink('uploads/'.$file);

		}

        public static function insert($arr){
            $certo = true;
            $nome_tabela = $arr['nome_tabela'];
            $query = "INSERT INTO `$nome_tabela` VALUES (null";
            foreach ($arr as $key => $value) {
                $nome = $key;
                $valor = $value;
                if($nome == 'acao' || $nome == 'nome_tabela')
                    continue;
                if($value == ''){
                    $certo = false;
                    break;
                }
                $query.=",?";
                $parametros[] = $value;
            }

            $query.=")";
            if($certo == true){
                $sql = MySql::conectar()->prepare($query);
                $sql->execute($parametros);
                //$lastId = MySql::conectar()->lastInsertId();
                //$sql = MySql::conectar()->prepare("UPDATE `$nome_tabela` SET order_id = ? WHERE id = $lastId");
                //$sql->execute(array($lastId));
            }
            return $certo;
        }

        public static function selectAll($tabela, $start = null, $end = null){
            if($start == null && $end == null)//Para não fazer a paginação
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
            else
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY id DESC LIMIT $start, $end");

            $sql->execute();
            return $sql->fetchAll();

        }

        public static function deletarRegistro($tabela, $id = false){
            if($id == false){
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
            } else {
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");

            }

            $sql->execute();

        }

        public static function redirect($url){
            echo '<script>location.href="'.$url.'"</script>';
                die();
        }

        //Método específico para selecionar apenas um registro
        public static function select($tabela, $query, $arr){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE $query");
            $sql->execute($arr);
            return $sql->fetch();

        }

        public static function update($arr){
            $certo = true;
            $first = false;
            $nome_tabela = $arr['nome_tabela'];
            $query = "UPDATE `$nome_tabela` SET ";
            foreach ($arr as $key => $value) {
                $nome = $key;
                $valor = $value;
                if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id')
                    continue;
                if($value == ''){
                    $certo = false;
                    break;
                }
                
                if($first == false){
                    $first = true;
                    $query.="$nome=?";
                } else {
                    $query.=", $nome=?";
                }
                $parametros[] = $value;
            }

            if($certo == true){
                $parametros[] = $arr['id'];
                $sql = MySql::conectar()->prepare($query.' WHERE id = ?');
                $sql->execute($parametros);
                //$lastId = MySql::conectar()->lastInsertId();
                //$sql = MySql::conectar()->prepare("UPDATE `$nome_tabela` SET order_id = ? WHERE id = $lastId");
                //$sql->execute(array($lastId));
            }
            return $certo;
        }

    }

?>