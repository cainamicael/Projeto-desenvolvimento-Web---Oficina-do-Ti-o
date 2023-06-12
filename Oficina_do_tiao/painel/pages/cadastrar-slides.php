<?php 
    verificaPermissaoPagina(2);
?>

<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Slides</h2>

    <form method="post" enctype="multipart/form-data"><!--Para trabalhar com o upload de imagem-->

        <?php
            if(isset($_POST['acao'])){
                //Enviei o formulario
                $nome = $_POST['nome'];
                $imagem = $_FILES['imagem'];//array para trabalhar com imagens
                //Painel::alert('sucesso', 'O cadastro foi feito com sucesso');

                //Required raiz com php
                if($nome == '') {
                    Painel::alert('erro', 'O Nome está vazio');

                } else {

                    if(Painel::imagemValida($imagem) == false){
                        Painel::alert('erro', 'O formato ou o tamanho da imagem não está correto');

                    } else {
                        //Apenas cadastrar no banco de dados
                        $imagem = Painel::uploadFile($imagem);
                        $arr = array('nome' => $nome,'imagem' => $imagem , 'order_id' => '0', 'nome_tabela' => 'tb_site.slides');
                        Painel::insert($arr);

                        Painel::alert('sucesso', "O cadastro do slide foi feito com sucesso ");

                    }
                }

            }   
        ?>
		<div class="form-group">
			<label>Nome do slide:</label>
			<input type="text" name="nome">
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