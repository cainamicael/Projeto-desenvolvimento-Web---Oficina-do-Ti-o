<?php
    if(isset($_COOKIE['lembrar'])){
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];

        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
        $sql->execute(array($user, $password));

        if ($sql->rowCount() == 1){
            $info = $sql->fetch();

            //usuário existe e logamos
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];

            header('Location: '.INCLUDE_PATH_PAINEL); //para fazer o redirecionamento
            die();

        }

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
    
    <div class="box-login">
        <?php
            if(isset($_POST['acao'])){
                $user = $_POST['user'];
                $password = $_POST['password'];

                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
                $sql->execute(array($user, $password));

                if ($sql->rowCount() == 1){
                    $info = $sql->fetch();
                    //usuário existe e logamos
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $user;
                    $_SESSION['password'] = $password;
                    $_SESSION['cargo'] = $info['cargo'];
                    $_SESSION['nome'] = $info['nome'];
                    $_SESSION['img'] = $info['img'];

                    if (isset($_POST['lembrar'])){//Quer dizer que o usuário quer lembrar o login
                        setcookie('lembrar', true, time()+(60*60*24), '/');//Um dia - A barra é para pegar em todo o site
                        setcookie('user', $user, time()+(60*60*24), '/');
                        setcookie('password', $password, time()+(60*60*24), '/');

                    }

                    header('Location: '.INCLUDE_PATH_PAINEL); //para fazer o redirecionamento
                    die();

                } else {
                    //falhou
                    echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário e/ou senha incorretos!</div>';
                }
            }
        ?>

        <h2>Efetue o login</h2>
        <form method="post">
            <input type="text" name="user" placeholder="Login..." required>
            <input type="password" name="password" placeholder="Senha...">

            <div class="form-group-login left">
                <input type="submit" name="acao" value="Logar">
            </div><!--form-group-login-->

            <div class="form-group-login right">
                <label for="lembrar">Lembrar-me</label>
                <input type="checkbox" name="lembrar">
            </div><!--form-group-login-->
            <div class="clear"></div>
           
        </form>
    </div><!--box-login-->

</body>
</html>