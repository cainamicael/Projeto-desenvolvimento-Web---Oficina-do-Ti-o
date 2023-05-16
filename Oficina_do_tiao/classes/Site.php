<?php

    class Site {

        public static function updateUsuarioOnline(){
            if(isset($_SESSION['online'])){
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');

                $check = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.online` WHERE token = ?");
                $check->execute(array($token));

                if($check->rowCount() == 1){
                    $sql = MySql::conectar()->prepare('UPDATE `tb_admin.online` SET ultima_acao = ? WHERE token = ?');
                    $sql->execute(array($horarioAtual, $token));

                } else {
                    $ip = $_SERVER['REMOTE_ADDR']; //ip do usuario
                    $token = $_SESSION['online'];
                    $horarioAtual = date('Y-m-d H:i:s');
                    $sql = MySql::conectar()->prepare('INSERT INTO `tb_admin.online` (id, ip, ultima_acao, token) VALUES (null, ?, ?, ?)');
                    $sql->execute(array($ip, $horarioAtual, $token));
                }
                
            } else {
                $_SESSION['online'] = uniqid();//Gera um id único;
                $ip = $_SERVER['REMOTE_ADDR']; //ip do usuario
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');
                $sql = MySql::conectar()->prepare('INSERT INTO `tb_admin.online` (id, ip, ultima_acao, token) VALUES (null, ?, ?, ?)');
                $sql->execute(array($ip, $horarioAtual, $token));

            }
        }

        public static function contador(){//por usuario diferente
            //setcookie('visita', true, time() - 1);//apagar cookie
            if(!isset($_COOKIE['visita'])){
                //Usuario ainda não foi registrado como visitante no site
                setcookie('visita', true, time()+ (60 * 60 * 24 * 1));//Para ter um cookie de 7 dias
                $sql = MySql::conectar()->prepare('INSERT INTO `tb_admin.visitas` VALUES (null, ?, ?)');
                $sql->execute(array($_SERVER['REMOTE_ADDR'], date('Y-m-d')));//ip e dia

            }

        }

    }

?>