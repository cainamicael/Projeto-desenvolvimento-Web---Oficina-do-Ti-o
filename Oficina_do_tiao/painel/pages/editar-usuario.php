<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Usuário</h2>

    <form method="post" enctype="multipart/form-data"><!--Para trabalhar com o upload de imagem-->

        <?php
            if(isset($_POST['acao'])){
                //Enviei o formulario
                $nome = $_POST['nome'];
                $password = $_POST['password'];
                $imagem = $_FILES['imagem'];//array para trabalhar com imagens
                $imagem_atual = $_POST['imagem_atual'];
                $usuario = new Usuario();

                if($imagem['name'] != ''){
                    
                    //Selecionou uma imagem
                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = Painel::uploadFile($imagem);
                        
                        if($usuario->atualizarUsuario($nome, $password, $imagem)){
                            $_SESSION['img'] = $imagem;
                            $_SESSION['nome'] = $nome;
                            $_SESSION['password'] = $password;
                            Painel::alert('sucesso', 'Atualizado com sucesso ao atualizar com imagem');
    
                        } else {
                            Painel::alert('erro', 'Ocorreu um erro ao atualizar com imagem');
    
                        }
                    } else {
                        Painel::alert('erro', 'O formato da imagem não é válido ou o tamanho é maior que o tamanho máximo');
                    }
                } else {
                    //Não selecionou
                    $imagem = $imagem_atual;

                    if($usuario->atualizarUsuario($nome, $password, $imagem)){
                        Painel::alert('sucesso', 'Atualizado com sucesso');

                    } else {
                        Painel::alert('erro', 'Ocorreu um erro ao atualizar');

                    }
                }
            }   
        ?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?php echo $_SESSION['nome'];?>" required>
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password" value="<?php echo $_SESSION['password'];?>" required>
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem">
            <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>

</div><!--box-content-->