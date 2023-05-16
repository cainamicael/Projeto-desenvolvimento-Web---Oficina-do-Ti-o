<?php 
    verificaPermissaoPagina(2);
?>

<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Usuario</h2>

    <form method="post" enctype="multipart/form-data"><!--Para trabalhar com o upload de imagem-->

        <?php
            if(isset($_POST['acao'])){
                //Enviei o formulario
                $login = $_POST['login'];
                $nome = $_POST['nome'];
                $password = $_POST['password'];
                $imagem = $_FILES['imagem'];//array para trabalhar com imagens
                $usuario = new Usuario();
                $cargo = $_POST['cargo'];
                //Painel::alert('sucesso', 'O cadastro foi feito com sucesso');

                //Required raiz com php
                if($login == '') {
                    Painel::alert('erro', 'O Login está vazio');

                } else if($nome == '') {
                    Painel::alert('erro', 'O Nome está vazio');

                } else if($password == '') {
                    Painel::alert('erro', 'A Senha está vazia');

                } else if($cargo == '') {
                    Painel::alert('erro', 'O Cargo não está selecionado');

                } else if($imagem['name'] == ''){
                    Painel::alert('erro', 'Selecione uma imagem');

                } else {
                    //Podemos cadastrar
                    if ($cargo >= $_SESSION['cargo']){//Dupla verificação. Já fizemos no front, e agora no back
                        Painel::alert('erro', 'Você precisa selecionar um cargo menor que o seu');

                    } else if(Painel::imagemValida($imagem) == false){
                        Painel::alert('erro', 'O formato ou o tamanho da imagem não está correto');

                    } else if(Usuario::userExists($login)){
                        Painel::alert('erro', 'Este login já existe! Selecione outro por favor!');


                    } else {
                        //Apenas cadastrar no banco de dados
                        $usuario = new Usuario();
                        $imagem = Painel::uploadFile($imagem);
                        $usuario->cadastrarUsuario($login, $password, $imagem, $nome, $cargo);

                        Painel::alert('sucesso', "O cadastro do usuário $login foi feito com sucesso");

                    }
                }
                

            }   
        ?>
		<div class="form-group">
			<label>Login:</label>
			<input type="text" name="login">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div><!--form-group-->

		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password">
		</div><!--form-group-->

        <div class="form-group">
            <label for="cargo">Cargo: </label>
            <select name="cargo">
                <?php
                    foreach (Painel::$cargos as $key => $value) {
                        if($key < $_SESSION['cargo']){//Para eu não poder criar outro administrador
                            echo '<option value="'.$key.'">'.$value.'</option>';

                        }
                    }
                ?>
            </select>
        </div><!--form-group-->

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Adicionar!">
		</div><!--form-group-->

	</form>

</div><!--box-content-->