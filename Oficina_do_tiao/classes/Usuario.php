<?php

    class Usuario {

        public function atualizarUsuario($nome, $senha, $imagem) {
            $sql = MySql::conectar()->prepare('UPDATE `tb_admin.usuarios` SET nome = ?, password = ?, img = ? WHERE user = ?');
            if($sql->execute(array($nome, $senha, $imagem, $_SESSION['user']))){
                //Usuario atualizado
                return true;
            } else {
                return false;
            }
        }

        public static function userExists($user){
            $sql = mySql::conectar()->prepare("SELECT `id` FROM `tb_admin.usuarios` WHERE user = ?");
            $sql->execute(array($user));
            if($sql->rowCount() == 1){ //Já existe este usuário
                return true;
            } else { //Podemos prosseguir
                return false;
            }
        }

        public function cadastrarUsuario($user, $senha, $imagem, $nome, $cargo){
            $sql = mySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null, ?, ?, ?, ?, ?)");
            $sql->execute(array($user, $senha, $imagem, $nome, $cargo));


        }

    }

?>